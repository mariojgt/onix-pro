// This js scirpte have some extra commands for grape js
// Add command in here
const cm = editor.Commands;
const txtConfirm = 'Are You Sure ?';

//cm.add('gjs-open-import-webpage', openImport(editor, config));
cm.add('set-device-desktop', e => e.setDevice('Desktop'));
cm.add('set-device-tablet', e => e.setDevice('Tablet'));
cm.add('set-device-mobile', e => e.setDevice('Mobile portrait'));
cm.add('canvas-clear', e => confirm(txtConfirm) && e.runCommand('core:canvas-clear'));
// End add commands
// Add some panel configurations
const pn = editor.Panels;
const eConfig = editor.getConfig();

// Commands
const crc = 'create-comp';
const mvc = 'move-comp';
const swv = 'sw-visibility';
const expt = 'export-template';
const osm = 'open-sm';
const otm = 'open-tm';
const ola = 'open-layers';
const obl = 'open-blocks';
const ful = 'fullscreen';
const prv = 'preview';
const cmdClear = 'canvas-clear';
const cmdImport = 'gjs-open-import-webpage';
pn.getPanels().reset([{
id: 'commands',
    buttons: [{}],
},{
    id: 'options',
    buttons: [{
    id: swv,
    command: swv,
    context: swv,
    className: 'fa fa-square-o',
    },{
    id: prv,
    context: prv,
    command: e => e.runCommand(prv),
    className: 'fa fa-eye',
    },{
    id: ful,
    command: ful,
    context: ful,
    className: 'fa fa-arrows-alt',
    },{
    id: expt,
    className: 'fa fa-code',
    command: e => e.runCommand(expt),
    },{
    id: 'undo',
    className: 'fa fa-undo',
    command: e => e.runCommand('core:undo'),
    },{
    id: 'redo',
    className: 'fa fa-repeat',
    command: e => e.runCommand('core:redo'),
    },{
    id: cmdImport,
    className: 'fa fa-download',
    command: e => e.runCommand(cmdImport),
    },{
    id: cmdClear,
    className: 'fa fa-trash',
    command: e => e.runCommand(cmdClear),
    }],
},{
    id: 'views',
    buttons  : [{
    id: osm,
    command: osm,
    active: true,
    className: 'fa fa-paint-brush',
    },{
    id: otm,
    command: otm,
    className: 'fa fa-cog',
    },{
    id: ola,
    command: ola,
    className: 'fa fa-bars',
    },{
    id: obl,
    command: obl,
    className: 'fa fa-th-large',
    }],
}]);
// End Commands
