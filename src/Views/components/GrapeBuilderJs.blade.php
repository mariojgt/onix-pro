
{{-- need for the editor login --}}
<script src="{{ asset('vendor/Onix/js/app.js') }}"></script>
{{-- need for the editor plugins  --}}
<script src="{{ asset('vendor/Onix/grapesjs-preset-webpage/dist/grapesjs-preset-webpage.min.js') }}"></script>

{{-- in here we start the editor with our setup --}}
<script>
    const editor = grapesjs.init({
        // Indicate where to init the editor. You can also pass an HTMLElement
        container: '#gjs',
        // Get the content for the canvas directly from the element
        // As an alternative we could use: `components: '<h1>Hello World Component!</h1>'`,
        fromElement: true,
        // Size of the editor
        height: '300px',
        width: 'auto',
        // Disable the storage manager for the moment
        storageManager: false,
        plugins: ['gjs-preset-webpage', 'myPlugin'],
        pluginsOpts: {
            'gjs-preset-webpage': {
                // options
            }
        }
    });

    function myPlugin(editor) {
        editor.BlockManager.add('my-first-block', {
            label: 'Boostrap-buttons',
            content: `<div>
                <button type="button" class="btn btn-primary">Primary</button>
                <button type="button" class="btn btn-secondary">Secondary</button>
                <button type="button" class="btn btn-success">Success</button>
                <button type="button" class="btn btn-danger">Danger</button>
                <button type="button" class="btn btn-warning">Warning</button>
                <button type="button" class="btn btn-info">Info</button>
                <button type="button" class="btn btn-light">Light</button>
                <button type="button" class="btn btn-dark">Dark</button>
                <button type="button" class="btn btn-link">Link</button>
                </div>`,
        });
    }

    //add the top panel
    editor.Panels.addPanel({
        id: 'panel-top',
        el: '.panel__top',
    });
    editor.Panels.addPanel({
        id: 'basic-actions',
        el: '.panel__basic-actions',
        buttons: [{
            id: 'visibility',
            active: true, // active by default
            className: 'btn-toggle-borders',
            label: '<u>B</u>',
            command: 'sw-visibility', // Built-in command
        }, {
            id: 'export',
            className: 'btn-open-export',
            label: 'Exp',
            command: 'export-template',
            context: 'export-template', // For grouping context of buttons from the same panel
        }, {
            id: 'show-json',
            className: 'btn-show-json',
            label: 'JSON',
            context: 'show-json',
            command(editor) {
                editor.Modal.setTitle('Components JSON')
                    .setContent(`<textarea style="width:100%; height: 250px;">
                                            ${JSON.stringify(editor.getComponents())}
                                        </textarea>`)
                    .open();
            },
        }],
    });

    // styles manager
    // Define commands
    editor.Commands.add('show-layers', {
        getRowEl(editor) {
            return editor.getContainer().closest('.editor-row');
        },
        getLayersEl(row) {
            return row.querySelector('.layers-container')
        },

        run(editor, sender) {
            const lmEl = this.getLayersEl(this.getRowEl(editor));
            lmEl.style.display = '';
        },
        stop(editor, sender) {
            const lmEl = this.getLayersEl(this.getRowEl(editor));
            lmEl.style.display = 'none';
        },
    });
    editor.Commands.add('show-styles', {
        getRowEl(editor) {
            return editor.getContainer().closest('.editor-row');
        },
        getStyleEl(row) {
            return row.querySelector('.styles-container')
        },

        run(editor, sender) {
            const smEl = this.getStyleEl(this.getRowEl(editor));
            smEl.style.display = '';
        },
        stop(editor, sender) {
            const smEl = this.getStyleEl(this.getRowEl(editor));
            smEl.style.display = 'none';
        },
    });

    // tratis
    // Commands
    editor.Commands.add('set-device-desktop', {
        run: editor => editor.setDevice('Desktop')
    });
    editor.Commands.add('set-device-mobile', {
        run: editor => editor.setDevice('Mobile')
    });
</script>
