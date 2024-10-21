import onixApi from './onixApi.js';
// ES6 Modules or TypeScript
import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'

// Dynamic update the editor style
const updateEditorStyle = async () => {

    await onixApi.get('/config').then((response) => {
        const config = response.data;

        const primaryColor = config.primaryColor;
        const secondaryColor = config.secondaryColor;
        const tertiaryColor = config.tertiaryColor;
        const quaternaryColor = config.quaternaryColor;
        const prefix = 'gjs-';
        let cssString = '';

        [
            ['one', primaryColor],
            ['two', secondaryColor],
            ['three', tertiaryColor],
            ['four', quaternaryColor],
        ].forEach(([cnum, ccol]) => {
            cssString += `
            .${prefix}${cnum}-bg {
            background-color: ${ccol};
            }

            .${prefix}${cnum}-color {
            color: ${ccol};
            }

            .${prefix}${cnum}-color-h:hover {
            color: ${ccol};
            }
        `;
        });

        const style = document.createElement('style');
        style.innerText = cssString;
        document.head.appendChild(style);

    });
};

/**
 * Load the editor css and javascript files so we can use them in the editor
 */
const getSiteStyles = async (template) => {
    try {
        return await onixApi.get('/site-styles?template=' + template).then((response) => {
            return response.data;
        });
    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong loading the site styles!😭',
        });
    }
};

// Start the code editor plugin
const startCodeEditor = async (editor) => {
    // Start the code editor plugin
    const pn = editor.Panels;
    const panelViews = pn.addPanel({
        id: 'views'
    });
    panelViews.get('buttons').add([{
        attributes: {
            title: 'Open Code'
        },
        className: 'fa fa-file-code-o',
        command: 'open-code',
        togglable: false, //do not close when button is clicked again
        id: 'open-code'
    }]);
};

const loadBlocks = async (editor, template) => {
    await onixApi.get('/load/blocks?template=' + template).then((response) => {
        const blocks = response.data.blocks;
        // If we are editng a block prevent the block to add himself to the editor
        blocks.forEach((block) => {
            editor.BlockManager.add(block.componentId, {
                label: block.label,
                media: block.media,
                category: block.category,
                content: block.content,
                attributes: {
                    component_sync: block.component_sync,
                }
            });
        });
    });
};

const saveEditorData = async (editor, silentSave = false) => {
    let loadedData = JSON.parse(localStorage.getItem("onix-data"));

    // Instance of the grape js storage manager
    const storageManager = editor.Storage;
    const data = editor.getProjectData();
    let editorData = await storageManager.store(data);

    let apiUrl = null;
    switch (loadedData.mode) {
        case 'page':
            apiUrl = '/save/page';
            break;
        case 'block':
            apiUrl = '/save/block';
        default:
            break;
    }
    // Add the page information to the editor data and post it to the server
    await onixApi.post(apiUrl, {
        slug: loadedData.slug,
        data: editorData,
        preview: editor.getHtml(),
        // Send the data without the body tag
        just_content: editor.getHtml().replace(/<body[^>]*>/g, '').replace(/<\/body>/g, ''),
        preview_no_body: editor.getHtml().replace(/<body/g, '<div data-onix="onix-resuable-block-' + loadedData.componentId + '"').replace(/body>/g, 'div>')
    }).then((response) => {

        if (silentSave) {
            // Display a toast message
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: response.data.message,
                toast: true,
                position: 'bottom-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });
        } else {
            // Display a success message
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: response.data.message,
            });
        }
    }).catch((error) => {
        // Check if the code is 422
        if (error.response.status === 422) {
            const errors = error.response.data.errors;
            let errorArray = [];
            for (const [key, value] of Object.entries(errors)) {
                errorArray.push('<p>' + value + '</p>');
            }
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                html: errorArray.join(''),
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
            });
        }
    });
};

// Load the page of the component we are editing
const loadEditorData = async (editor, mode = 'page', slug, template) => {
    // Clear the local storage
    localStorage.removeItem("onix-data");

    let editorData = null;
    await onixApi.get('/load/' + mode + '/' + slug).then((response) => {
        if (response.data.data.content) {
            editorData = JSON.parse(response.data.data.content);
        }
        // Onix loaded Data
        localStorage.setItem("onix-data", JSON.stringify({
            slug: slug,
            mode: mode,
            // Only for components
            componentId: response.data?.data?.componentId,
        }));
    }).catch((error) => {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!',
        });
    });

    // Load the editor data
    if (editorData) {
        editor.loadProjectData(editorData);
    }
    // Automatically update the editor style when the page is loaded
    await updateEditorStyle();
    // Load the blocks so when we load load the page the blocks are up to date
    await loadBlocks(editor, template);

    // Get all the blocks from the editor
    const blocks = editor.BlockManager.getAll();
    // Now update the project data with the loaded blocks
    blocks.forEach((block) => {
        const elementId = block.id;
        // Should the component automatically sync ?
        if (block.attributes.attributes.component_sync) {
            // Now find the element in the editor
            const component = editor.DomComponents.getWrapper().find(`[data-onix="onix-resuable-block-${elementId}"]`);
            if (component.length) {
                for (const [key, value] of Object.entries(component)) {
                    // value.components(block.get('content'));
                }
            }
        }
    });
}

export { updateEditorStyle, startCodeEditor, saveEditorData, loadEditorData, loadBlocks, getSiteStyles };
