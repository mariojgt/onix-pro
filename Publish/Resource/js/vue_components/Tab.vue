<template>
  <div v-show="isActive">
      <slot></slot>
    </div>
</template>

<script>
export default {
    name: "tab",
    props: {
        name: {
            required: true
        },
        selected: {
            default: false
        },
        icon: {
            default: 'fa-space-shuttle'
        }
    },
    data() {
        return {
            isActive: false
        }
    },created() {
        // Push this componente to the vue js
        this.$parent.$data.tabs.push(this);
    },
    computed: {
        href() {
            return '#' + this.name.toLowerCase().replace(/ /g, '-');
        }
    },
    mounted() {
        this.isActive = this.selected;
    },
}
</script>
