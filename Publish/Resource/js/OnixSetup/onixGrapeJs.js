// Import the grape scss file
import 'grapesjs/dist/css/grapes.min.css';
import grapesjs from 'grapesjs';
import onixPreset from './webpreset/index.ts';
import javascriptEditor from 'grapesjs-script-editor';
import codeEditor from 'grapesjs-component-code-editor';
import { startCodeEditor, loadEditorData, saveEditorData, getSiteStyles } from './helpers/onixEditorHelper.js';

let editor = null;

const startOnixEditor = async (cssStyles = [], jsScripts = []) => {
    // Create the grape js editor
    editor = grapesjs.init({
        container: '#gjs',
        width: 'auto',
        height: '1000px',
        showOffsets: true,
        noticeOnUnload: false,
        storageManager: false,
        fromElement: true,
        plugins: [onixPreset, codeEditor, javascriptEditor],
        canvas: {
            styles: cssStyles,
            scripts: jsScripts
        }
    });
    // Automatically update the editor style when the page is loaded
    startCodeEditor(editor);
};

// Create a function and export to the window so we can call and start the editor from the blade file
window.startEditor = async function (mode, slug) {
    const styles = await getSiteStyles();
    await startOnixEditor(styles.css, styles.js);
    await loadEditorData(editor, mode, slug);
}
// Expose to the browser the save function so we can use it in the blade file
window.saveEditorData = function () {
    saveEditorData(editor, true);
}
