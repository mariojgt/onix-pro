import {
    cmdId
} from './consts';

export default (editor, opts = {}) => {
    const cm = editor.Commands;
    const md = editor.Modal;
    const domc = editor.Components;
    const {
        modalTitle,
        codeViewOptions,
        commandAttachScript,
        toolbarIcon,
        onRun,
        onError,
        starter
    } = opts;
    let scriptTypesSupport = opts.scriptTypesSupport;

    let content = null;

    const appendToContent = (target, content) => {
        if (content instanceof HTMLElement) {
            target.appendChild(content);
        } else if (content) {
            target.insertAdjacentHTML('beforeend', content);
        }
    };

    if (editor.$.isString(scriptTypesSupport)) {
        scriptTypesSupport = scriptTypesSupport.split(',');
    }

    if (editor.$.isArray(scriptTypesSupport)) {
        scriptTypesSupport = scriptTypesSupport.includes('*') ?
            domc.getTypes().map(c => c.id) : scriptTypesSupport;
    }

    // Add icons to specified component types
    scriptTypesSupport && scriptTypesSupport.forEach(type => {
        const typeOpt = domc.getType(type).model;
        domc.addType(type, {
            model: {
                initToolbar() {
                    typeOpt.prototype.initToolbar.apply(this, arguments);
                    const tb = this.get('toolbar');
                    const tbExists = tb.some(item => item.command === cmdId);

                    if (!tbExists) {
                        tb.unshift({
                            command: cmdId,
                            label: toolbarIcon,
                            ...opts.toolbarBtnCustomScript
                        });
                        this.set('toolbar', tb);
                    }
                }
            }
        });
    })

    // Add the script command
    cm.add(cmdId, {
        run(editor, sender, opts = {}) {
            this.editor = editor;
            this.options = opts;
            this.target = opts.target || editor.getSelected();
            const target = this.target;

            if (target) this.showCustomCode(target);
        },

        stop(editor) {
            md.close();
        },

        /**
         * Method which tells how to show the custom code
         * @param  {Component} target
         */
        showCustomCode(target) {
            const { editor, options } = this;
            const title = options.title || modalTitle;
            if (!content) content = this.getContent();
            let code = target.getScriptString() || starter;
            md.open({
                title,
                content
            }).getModel().once('change:open', () => editor.stopCommand(this.id));
            this.getCodeViewer().setContent(code);
        },

        /**
         * Custom pre-content. Can be a simple string or an HTMLElement
         */
        getPreContent() {},

        /**
         * Custom post-content. Can be a simple string or an HTMLElement
         */
        getPostContent() {},

        /**
         * Get all the content for the custom code
         * @return {HTMLElement}
         */
        getContent() {
            const { editor } = this;
            const content = document.createElement('div');
            const pfx = editor.getConfig('stylePrefix');
            content.className = `${pfx}attach-script`;
            appendToContent(content, this.getPreContent());
            const codeViewer = this.getCodeViewer();
            codeViewer.refresh();
            setTimeout(() => codeViewer.focus(), 0);
            content.appendChild(codeViewer.getElement());
            appendToContent(content, this.getPostContent());
            appendToContent(content, this.getContentActions());

            return content;
        },

        /**
         * Get the actions content. Can be a simple string or an HTMLElement
         * @return {HTMLElement|String}
         */
        getContentActions() {
            const { editor } = this;
            const actions = document.createElement('div');
            actions.id = "actns";
            const btn = document.createElement('button');
            const pfx = editor.getConfig('stylePrefix');
            btn.innerHTML = opts.buttonLabel;
            btn.className = `${pfx}btn-prim ${pfx}btn-save__inject-logic`;
            btn.onclick = () => this.handleSave();

            const runLogic = document.createElement('div');
            runLogic.id = "logic-toolbar";
            runLogic.className = "fa fa-bug";
            runLogic.style = "margin:5px;padding:10px;background:rgba(0,0,0,0.2);border-radius:3px;border:1px solid rgba(0,0,0,0.2);cursor:pointer";
            runLogic.onclick = () => this.runCode();

            actions.appendChild(runLogic);
            actions.appendChild(btn);

            return actions;
        },

        /**
         * Handle the main save task
         */
        handleSave() {
            const { editor, target } = this;
            const code = this.getCodeViewer().getContent();
            target.set('script', code);
            editor.Modal.close();
        },

        /**
         * Return the code viewer instance
         * @return {CodeViewer}
         */
        getCodeViewer() {
            const { editor } = this;

            if (!this.codeViewer) {
                this.codeViewer = editor.CodeManager.createViewer({
                    codeName: 'javascript',
                    theme: 'hopscotch',
                    readOnly: 0,
                    autoBeautify: 1,
                    ...codeViewOptions,
                });
            }

            return this.codeViewer;
        },

        /**
         * Evaluate code syntax
         */
        runCode() {
            //console.log("run")
            try {
                const code = this.getCodeViewer().getContent();
                Function('"use strict";' + code)(); // final code
                onRun && onRun();
            } catch (err) {
                console.log("error", err);
                onError && onError(err);
            }
        },

        ...commandAttachScript,
    });
}