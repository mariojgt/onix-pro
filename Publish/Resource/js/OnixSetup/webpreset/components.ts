import type grapesjs from "grapesjs";
import { RequiredPluginOptions } from ".";

/*
|--------------------------------------------------------------------------
| Form Component
|--------------------------------------------------------------------------
| Think about this as a instructions for the form component to be created
| For example the form component will have a name, action, method, class, id
*/

export default (editor: grapesjs.Editor, opts: RequiredPluginOptions) => {
    // Form component
    editor.DomComponents.addType('form', {
        model: {
            defaults: {
                name: 'Form',
                tagName: 'form',
                draggable: true,
                droppable: true,
                editable: true,
                stylable: true,
                highlightable: true,
                copyable: true,
                removable: true,
                layerable: true,
                resizable: true,
                classes: ['p-10'],
                traits: [
                    {
                        type: 'text',
                        label: 'Action',
                        name: 'action',
                        placeholder: 'https://example.com',
                    },
                    {
                        type: 'select',
                        label: 'Method',
                        name: 'method',
                        options: [
                            { value: 'get', name: 'GET' },
                            { value: 'post', name: 'POST' },
                            { value: 'put', name: 'PUT' },
                            { value: 'delete', name: 'DELETE' },
                        ],
                    },
                    {
                        type: 'text',
                        label: 'Class',
                        name: 'class',
                        placeholder: 'form-control',
                    },
                    {
                        type: 'text',
                        label: 'ID',
                        name: 'id',
                        placeholder: 'form-id',
                    },
                ],
                // Add the csrf token to the form | TODO: make it dynamic to work with vue
                content: `
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                `,
            },
        },
        view: {
            tagName: 'form',
            events: {
                dblclick: 'dblclick',
            },
            init() {
                this.listenTo(this.model, 'change:action', this.updateAction);
                this.listenTo(this.model, 'change:method', this.updateMethod);
                this.listenTo(this.model, 'change:class', this.updateClass);
                this.listenTo(this.model, 'change:id', this.updateId);
            },
            updateAction() {
                this.el.action = this.model.get('action');
            },
            updateMethod() {
                this.el.method = this.model.get('method');
            },
            updateClass() {
                this.el.className = this.model.get('class');
            },
            updateId() {
                this.el.id = this.model.get('id');
            },
        },
    });

    // Input component with name, required, placeholder, type, class, id
    editor.DomComponents.addType('input', {
        model: {
            defaults: {
                name: 'Input',
                tagName: 'input',
                draggable: true,
                droppable: true,
                editable: true,
                stylable: true,
                highlightable: true,
                copyable: true,
                removable: true,
                layerable: true,
                resizable: true,
                classes: ['input', 'input-bordered', 'w-full', 'max-w-xs'],
                traits: [
                    {
                        type: 'text',
                        label: 'Name',
                        name: 'name',
                        placeholder: 'name',
                    },
                    {
                        type: 'checkbox',
                        label: 'Required',
                        name: 'required',
                    },
                    {
                        type: 'text',
                        label: 'Placeholder',
                        name: 'placeholder',
                        placeholder: 'Placeholder',
                    },
                    {
                        type: 'select',
                        label: 'Type',
                        name: 'type',
                        options: [
                            { value: 'text', name: 'Text' },
                            { value: 'email', name: 'Email' },
                            { value: 'password', name: 'Password' },
                            { value: 'number', name: 'Number' },
                            { value: 'date', name: 'Date' },
                            { value: 'time', name: 'Time' },
                            { value: 'datetime-local', name: 'Date Time' },
                            { value: 'month', name: 'Month' },
                            { value: 'week', name: 'Week' },
                            { value: 'url', name: 'URL' },
                            { value: 'tel', name: 'Telephone' },
                            { value: 'search', name: 'Search' },
                            { value: 'color', name: 'Color' },
                            { value: 'range', name: 'Range' },
                            { value: 'file', name: 'File' },
                            { value: 'hidden', name: 'Hidden' },
                        ],
                    },
                    // Number validation
                    {
                        type: 'text',
                        label: 'Min',
                        name: 'min',
                        placeholder: '0',
                    },
                    {
                        type: 'text',
                        label: 'Max',
                        name: 'max',
                        placeholder: '100',
                    },
                    {
                        type: 'text',
                        label: 'Class',
                        name: 'class',
                        placeholder: 'form-control',
                    },
                    {
                        type: 'text',
                        label: 'ID',
                        name: 'id',
                        placeholder: 'form-id',
                    },
                    {
                        type: 'dusk',
                        label: 'Dusk',
                        name: 'dusk',
                        placeholder: 'dusk-id',
                    },
                ],
            },
        },
        view: {
            tagName: 'input',
            events: {
                dblclick: 'dblclick',
            },
            init() {
                this.listenTo(this.model, 'change:name', this.updateName);
                this.listenTo(this.model, 'change:required', this.updateRequired);
                this.listenTo(this.model, 'change:placeholder', this.updatePlaceholder);
                this.listenTo(this.model, 'change:type', this.updateType);
                this.listenTo(this.model, 'change:class', this.updateClass);
                this.listenTo(this.model, 'change:id', this.updateId);
                this.listenTo(this.model, 'change:min', this.updateMin);
                this.listenTo(this.model, 'change:max', this.updateMax);
                this.listenTo(this.model, 'change:dusk', this.updateDusk);
            },
            updateName() {
                this.el.name = this.model.get('name');
            },
            updateRequired() {
                this.el.required = this.model.get('required');
            },
            updatePlaceholder() {
                this.el.placeholder = this.model.get('placeholder');
            },
            updateType() {
                this.el.type = this.model.get('type');
            },
            updateClass() {
                this.el.className = this.model.get('class');
            },
            updateId() {
                this.el.id = this.model.get('id');
            },
            updateMin() {
                this.el.min = this.model.get('min');
            },
            updateMax() {
                this.el.max = this.model.get('max');
            },
            updateDusk() {
                this.el.dataset.dusk = this.model.get('dusk');
            }
        },
    });

};
