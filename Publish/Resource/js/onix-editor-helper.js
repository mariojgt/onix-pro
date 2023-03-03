import onixApi from './onix-api.js';
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

const saveEditorData = async (editor, silentSave = false) => {
    let loadedData = JSON.parse(localStorage.getItem("onix-data"));
    // Form that asks for page information
    // const formData = await Swal.fire({
    //     title: 'Page Information',
    //     html: `
    //     <div class="flex flex-col gap-4 w-full items-left">
    //         <input id="title-onix" type="text" placeholder="Page title" class="input input-bordered input-primary w-full max-w-xs" />
    //         <input id="slug-onix" type="text" placeholder="Your page slug" class="input input-bordered input-primary w-full max-w-xs" />
    //     </div>
    //     `,
    //     focusConfirm: false,
    //     preConfirm: () => {
    //         return {
    //             title: document.getElementById('title-onix').value,
    //             slug: document.getElementById('slug-onix').value
    //         }
    //     }
    // });
    // Instance of the grape js storage manager
    const storageManager = editor.Storage;
    const data = editor.getProjectData();
    let editorData = await storageManager.store(data);

    let apiUrl = null;
    switch (loadedData.mode) {
        case 'page':
            apiUrl = '/save/page';
            break;
        case 'component':
            apiUrl = '/save/component';
        default:
            break;
    }
    // Add the page information to the editor data and post it to the server
    await onixApi.post(apiUrl, {
        slug: loadedData.slug,
        data: editorData,
        preview: editor.getHtml(),
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
        // Loop on the 422 create a array of errors and display them
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
    });
};

const loadEditorData = async (editor, mode = 'page', slug) => {
    await onixApi.get('/load/' + mode + '/' + slug).then((response) => {

        if (response.data.page.content) {
            const editorData = JSON.parse(response.data.page.content);
            editor.loadProjectData(editorData);
        }
        // Onix loaded Data
        localStorage.setItem("onix-data", JSON.stringify({
            slug: slug,
            mode: mode,
        }));
    }).catch((error) => {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!',
        });
    });
}

export { updateEditorStyle, startCodeEditor, saveEditorData, loadEditorData };
