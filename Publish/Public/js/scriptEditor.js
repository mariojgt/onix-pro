(()=>{"use strict";var t="edit-script";function e(t){return e="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},e(t)}function r(t,e){var r=Object.keys(t);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(t);e&&(n=n.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),r.push.apply(r,n)}return r}function n(t){for(var e=1;e<arguments.length;e++){var n=null!=arguments[e]?arguments[e]:{};e%2?r(Object(n),!0).forEach((function(e){o(t,e,n[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(n)):r(Object(n)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(n,e))}))}return t}function o(t,r,n){return(r=function(t){var r=function(t,r){if("object"!==e(t)||null===t)return t;var n=t[Symbol.toPrimitive];if(void 0!==n){var o=n.call(t,r||"default");if("object"!==e(o))return o;throw new TypeError("@@toPrimitive must return a primitive value.")}return("string"===r?String:Number)(t)}(t,"string");return"symbol"===e(r)?r:String(r)}(r))in t?Object.defineProperty(t,r,{value:n,enumerable:!0,configurable:!0,writable:!0}):t[r]=n,t}const i=function(e){var r=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{},o=e.Commands,i=e.Modal,c=e.Components,a=r.modalTitle,s=r.codeViewOptions,u=r.commandAttachScript,l=r.toolbarIcon,p=r.onRun,f=r.onError,d=r.starter,b=r.scriptTypesSupport,m=null,g=function(t,e){e instanceof HTMLElement?t.appendChild(e):e&&t.insertAdjacentHTML("beforeend",e)};e.$.isString(b)&&(b=b.split(",")),e.$.isArray(b)&&(b=b.includes("*")?c.getTypes().map((function(t){return t.id})):b),b&&b.forEach((function(e){var o=c.getType(e).model;c.addType(e,{model:{initToolbar:function(){o.prototype.initToolbar.apply(this,arguments);var e=this.get("toolbar"),i=e.some((function(e){return e.command===t}));i||(e.unshift(n({command:t,label:l},r.toolbarBtnCustomScript)),this.set("toolbar",e))}}})})),o.add(t,n({run:function(t,e){var r=arguments.length>2&&void 0!==arguments[2]?arguments[2]:{};this.editor=t,this.options=r,this.target=r.target||t.getSelected();var n=this.target;n&&this.showCustomCode(n)},stop:function(t){i.close()},showCustomCode:function(t){var e=this,r=this.editor,n=this.options.title||a;m||(m=this.getContent());var o=t.getScriptString()||d;i.open({title:n,content:m}).getModel().once("change:open",(function(){return r.stopCommand(e.id)})),this.getCodeViewer().setContent(o)},getPreContent:function(){},getPostContent:function(){},getContent:function(){var t=this.editor,e=document.createElement("div"),r=t.getConfig("stylePrefix");e.className="".concat(r,"attach-script"),g(e,this.getPreContent());var n=this.getCodeViewer();return n.refresh(),setTimeout((function(){return n.focus()}),0),e.appendChild(n.getElement()),g(e,this.getPostContent()),g(e,this.getContentActions()),e},getContentActions:function(){var t=this,e=this.editor,n=document.createElement("div");n.id="actns";var o=document.createElement("button"),i=e.getConfig("stylePrefix");o.innerHTML=r.buttonLabel,o.className="".concat(i,"btn-prim ").concat(i,"btn-save__inject-logic"),o.onclick=function(){return t.handleSave()};var c=document.createElement("div");return c.id="logic-toolbar",c.className="fa fa-bug",c.style="margin:5px;padding:10px;background:rgba(0,0,0,0.2);border-radius:3px;border:1px solid rgba(0,0,0,0.2);cursor:pointer",c.onclick=function(){return t.runCode()},n.appendChild(c),n.appendChild(o),n},handleSave:function(){var t=this.editor,e=this.target,r=this.getCodeViewer().getContent();e.set("script",r),t.Modal.close()},getCodeViewer:function(){var t=this.editor;return this.codeViewer||(this.codeViewer=t.CodeManager.createViewer(n({codeName:"javascript",theme:"hopscotch",readOnly:0,autoBeautify:1},s))),this.codeViewer},runCode:function(){try{var t=this.getCodeViewer().getContent();Function('"use strict";'+t)(),p&&p()}catch(t){console.log("error",t),f&&f(t)}}},u))};function c(t){return c="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},c(t)}function a(t,e){var r=Object.keys(t);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(t);e&&(n=n.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),r.push.apply(r,n)}return r}function s(t){for(var e=1;e<arguments.length;e++){var r=null!=arguments[e]?arguments[e]:{};e%2?a(Object(r),!0).forEach((function(e){u(t,e,r[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(r)):a(Object(r)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(r,e))}))}return t}function u(t,e,r){return(e=function(t){var e=function(t,e){if("object"!==c(t)||null===t)return t;var r=t[Symbol.toPrimitive];if(void 0!==r){var n=r.call(t,e||"default");if("object"!==c(n))return n;throw new TypeError("@@toPrimitive must return a primitive value.")}return("string"===e?String:Number)(t)}(t,"string");return"symbol"===c(e)?e:String(e)}(e))in t?Object.defineProperty(t,e,{value:r,enumerable:!0,configurable:!0,writable:!0}):t[e]=r,t}window.grapesjs.plugins.add("grapesjs-script-editor",(function(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{},r=s(s({},{starter:"let el = this",toolbarIcon:'<i class="fa fa-file-code-o"></i>',scriptTypesSupport:["default","wrapper","text","textnode","image","video","svg"],toolbarBtnCustomScript:{},onRun:function(){return console.log("valid syntax")},onError:function(t){return console.log("error",t)},modalTitle:"Script",codeLabel:"JS",codeViewOptions:{},buttonLabel:"Save",commandAttachScript:{}}),e);i(t,r)}))})();
//# sourceMappingURL=scriptEditor.js.map