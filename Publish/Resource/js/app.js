// Import the grape scss file
import 'grapesjs/dist/css/grapes.min.css';
import grapesjs from 'grapesjs';
import webPreset from './webpreset/index.ts';
import codeEditor from 'grapesjs-component-code-editor';
import { updateEditorStyle, startCodeEditor, loadEditorData } from './onix-editor-helper.js';

// Export the function to the window object so that it can be called from the browser
const editor = grapesjs.init({
    container: '#gjs',
    width: 'auto',
    height: '1000px',
    showOffsets: true,
    noticeOnUnload: false,
    storageManager: false,
    fromElement: true,
    plugins: [webPreset, codeEditor],
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

// Export the function that load to the window object so that it can be called from the browser
window.loadEditorData = function (mode = 'page', slug) {
    loadEditorData(editor, mode, slug);
}
