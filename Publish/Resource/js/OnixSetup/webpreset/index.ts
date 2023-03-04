import type grapesjs from 'grapesjs';
import commands from './commands';
import blocks from './blocks';
import panels from './panels';
import components from './components';

export type PluginOptions = {
  /**
   * Which blocks to add.
   * @default ['link-block', 'quote', 'text-basic']
   */
  blocks?: string[];

  /**
   * Add custom block options, based on block id.
   * @default (blockId) => ({})
   * @example (blockId) => blockId === 'quote' ? { attributes: {...} } : {};
   */
  block?: (blockId: string) => ({});

  /**
   * Modal import title.
   * @default 'Import'
   */
  modalImportTitle?: string;

  /**
   * Modal import button text.
   * @default 'Import'
   */
  modalImportButton?: string;

  /**
   * Import description inside import modal.
   * @default ''
   */
  modalImportLabel?: string;

  /**
   * Default content to setup on import model open.
   * Could also be a function with a dynamic content return (must be a string).
   * @default ''
   * @example editor => editor.getHtml()
   */
  modalImportContent?: string | ((editor: grapesjs.Editor) => string);

  /**
   * Code viewer (eg. CodeMirror) options.
   * @default {}
   */
  importViewerOptions?: Record<string, any>;

  /**
   * Confirm text before clearing the canvas.
   * @default 'Are you sure you want to clear the canvas?'
   */
  textCleanCanvas?: string;

  /**
   * Show the Style Manager on component change.
   * @default true
   */
  showStylesOnChange?: boolean;

  /**
   * Load custom preset theme.
   * @default true
   */
  useCustomTheme?: boolean;
};

export type RequiredPluginOptions = Required<PluginOptions>;

const plugin: grapesjs.Plugin<PluginOptions> = (editor, opts: Partial<PluginOptions> = {}) => {
  const config: RequiredPluginOptions = {
    modalImportTitle: 'Import',
    modalImportButton: 'Import',
    modalImportLabel: '',
    modalImportContent: '',
    importViewerOptions: {},
    textCleanCanvas: 'Are you sure you want to clear the canvas?',
    showStylesOnChange: true,
    useCustomTheme: true,
    ...opts,
  };

    // Example change the editor theme
    //   if (config.useCustomTheme && typeof window !== 'undefined') {
    //     const primaryColor = '#0d3b66';
    //     const secondaryColor = '#faf0ca';
    //     const tertiaryColor = '#f4d35e';
    //     const quaternaryColor = '#ee964b';
    //     const prefix = 'gjs-';
    //     let cssString = '';

    //     [
    //       ['one', primaryColor],
    //       ['two', secondaryColor],
    //       ['three', tertiaryColor],
    //       ['four', quaternaryColor],
    //     ].forEach(([cnum, ccol]) => {
    //       cssString += `
    //         .${prefix}${cnum}-bg {
    //           background-color: ${ccol};
    //         }

    //         .${prefix}${cnum}-color {
    //           color: ${ccol};
    //         }

    //         .${prefix}${cnum}-color-h:hover {
    //           color: ${ccol};
    //         }
    //       `;
    //     });

    //     const style = document.createElement('style');
    //     style.innerText = cssString;
    //     document.head.appendChild(style);
    //   }

  // Load components
  components(editor, config);

  // Load blocks
  blocks(editor, config);

  // Load commands
  commands(editor, config);

  // Load panels
  panels(editor, config);
}

export default plugin;
