<template>
  <div>
    <a
      class="block py-1 md:py-3 pl-1 align-middle text-blue-400 no-underline hover:text-gray-100"
      :class="activeClass"
      v-on:click="toggleDropdown()"
      ref="btnDropdownRef"
    >
      <i class="fas fa-fw mr-3 text-blue-400" :class="icon"></i>
      <span class="pb-1 md:pb-0 text-sm">{{title}}</span>
    </a>
    <div
      v-bind:class="{'hidden': !dropdownPopoverShow, 'block': dropdownPopoverShow}"
      class="bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg mt-1"
      style="min-width:12rem"
      ref="popoverDropdownRef"
    >
      <slot></slot>
    </div>
  </div>
</template>

<script>
import Popper from "popper.js";

export default {
    name: "dropdown",
    props: {
        title: {
            type: String,
            default: "Enter your title here"
        },
        icon: {
            type: String,
            default: "fa-cog"
        },
        active: {
            type: String,
            default: false
        }
    },
    data() {
        return {
            dropdownPopoverShow: false,
            activeClass: ''
        };
    },
    methods: {
        toggleDropdown: function() {
            if (this.dropdownPopoverShow) {
                this.dropdownPopoverShow = false;
            } else {
                this.dropdownPopoverShow = true;
                new Popper(this.$refs.btnDropdownRef, this.$refs.popoverDropdownRef, {
                    placement: "bottom-start"
                });
            }
        }
    },
    mounted() {
        if (this.active == 'true') {
            this.activeClass = "border-b-2 border-blue-400 hover:border-blue-400";
        }
    },
};
</script>
