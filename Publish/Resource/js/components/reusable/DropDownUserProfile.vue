<template>
  <div>
  <button class="flex items-center focus:outline-none mr-3"
    v-on:click="toggleDropdown()"
  >
      <img class="w-8 h-8 rounded-full mr-4" :src="image" alt="Avatar of User"> <span class="hidden md:inline-block text-gray-100">Hi, {{user_name}}</span>
      <svg class="pl-2 h-2 fill-current text-gray-100" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 129 129">
          <g>
              <path d="m121.3,34.6c-1.6-1.6-4.2-1.6-5.8,0l-51,51.1-51.1-51.1c-1.6-1.6-4.2-1.6-5.8,0-1.6,1.6-1.6,4.2 0,5.8l53.9,53.9c0.8,0.8 1.8,1.2 2.9,1.2 1,0 2.1-0.4 2.9-1.2l53.9-53.9c1.7-1.6 1.7-4.2 0.1-5.8z"/>
          </g>
      </svg>
  </button>

    <div
      v-bind:class="{'hidden': !dropdownPopoverShow, 'block': dropdownPopoverShow}"
      class="bg-gray-600 text-base z-50 absolute float-left py-2 list-none text-left rounded shadow-lg mt-1"
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
        user_name: {
            type: String,
            default: "User name here"
        },
        image: {
            type: String,
            default: "image Here"
        },
        icon: {
            type: String,
            default: "fa-cog"
        },
        active: {
            type: Boolean,
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
