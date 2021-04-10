import openImport from './openImport';
import saveCommand from './saveCommand';
import loadCommand from './loadCommand';
import autoloadComponents from './autoloadComponents';
import clearCanvasCommand from './clearCanvasCommand';

import {
  cmdImport,
  cmdDeviceDesktop,
  cmdDeviceTablet,
  cmdDeviceMobile,
  cmdClear,
  cmdCanvasSave,
  cmdCanvasLoad,
  cmdAutoLoadBlock
} from './../consts';

export default (editor, config) => {
  const cm         = editor.Commands;

  // Dialogs
  const txtConfirm = config.textCleanCanvas;

  cm.add(cmdImport, openImport(editor, config));
  cm.add(cmdDeviceDesktop, e => e.setDevice('Desktop'));
  cm.add(cmdDeviceTablet, e => e.setDevice('Tablet'));
  cm.add(cmdDeviceMobile, e => e.setDevice('Mobile portrait'));
  //cm.add(cmdClear, e => confirm(txtConfirm) && e.runCommand('core:canvas-clear'));
  cm.add(cmdClear, clearCanvasCommand(editor, config));

  // Onix Custom commands
  cm.add(cmdCanvasSave, saveCommand(editor, config));
  cm.add(cmdCanvasLoad, loadCommand(editor, config));
  cm.add(cmdAutoLoadBlock, autoloadComponents(editor, config));
}
