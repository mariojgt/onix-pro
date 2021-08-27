import commands from "./commands";

window.grapesjs.plugins.add("grapesjs-script-editor", (editor, opts = {}) => {
    const options = {
        ...{
            // Starter code
            starter: "let el = this",

            toolbarIcon: '<i class="fa fa-file-code-o"></i>',

            // Component types to allow script editing
            // Avoid components with predefined scripts
            scriptTypesSupport: [
                "default",
                "wrapper",
                "text",
                "textnode",
                "image",
                "video",
                "svg",
            ],

            // Object to extend the default component's toolbar button for the code, eg. `{ label: '</>', attributes: { title: 'Open custom code' } }`
            // Pass a falsy value to avoid adding the button
            toolbarBtnCustomScript: {},

            // On run success
            onRun: () => console.log("valid syntax"),

            // Logic when there is an error on run
            onError: (err) => console.log("error", err),

            // Title for the custom code modal
            modalTitle: "Script",

            // Textarea label
            codeLabel: "JS",

            // Additional options for the code viewer, eg. `{ theme: 'hopscotch', readOnly: 0 }`
            codeViewOptions: {},

            // Label for the default save button
            buttonLabel: "Save",

            // Object to extend the default inject logic command.
            // Check the source to see all available methods
            commandAttachScript: {},
        },
        ...opts,
    };

    // load commands
    commands(editor, options);
});
