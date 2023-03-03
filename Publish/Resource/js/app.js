// Import the grape scss file
import 'grapesjs/dist/css/grapes.min.css';
import grapesjs from 'grapesjs';
import onixPreset from './webpreset/index.ts';
import javascriptEditor from 'grapesjs-script-editor';
import codeEditor from 'grapesjs-component-code-editor';
import { updateEditorStyle, startCodeEditor, loadEditorData, saveEditorData } from './onix-editor-helper.js';
// ES6 Modules or TypeScript
import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'

// Create the grape js editor
const editor = grapesjs.init({
    container: '#gjs',
    width: 'auto',
    height: '1000px',
    showOffsets: true,
    noticeOnUnload: false,
    storageManager: false,
    fromElement: true,
    plugins: [onixPreset, codeEditor, javascriptEditor],
    canvas: {
        styles: [
            'https://cdn.jsdelivr.net/npm/daisyui@2.51.3/dist/full.css',
        ],
        scripts: [
            'https://cdn.tailwindcss.com',
        ],
    }
});

// Automatically update the editor style when the page is loaded
startCodeEditor(editor);
// Automatically update the editor style when the page is loaded
updateEditorStyle();

// Expose to the browser the load function so we can use it in the blade file
window.loadEditorData = function (mode = 'page', slug) {
    loadEditorData(editor, mode, slug);
}
// Expose to the browser the save function so we can use it in the blade file
window.saveEditorData = function () {
    saveEditorData(editor, true);
}

// Export the swetalert2 to the window object so we can use it in the blade file
window.Swal = Swal;
