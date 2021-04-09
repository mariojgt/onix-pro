// Load vue js
import { createApp, h } from 'vue';

import tabs from "./vue_components/Tabs";
import Tab from "./vue_components/Tab";
import Example from "./vue_components/Example";

const el = document.getElementById('app');

const app = createApp({});

// Reusable
app.component('tabs', tabs);
app.component('tab', Tab);
app.component('example', Example);

app.mount(el);
