<template>
  <div class="flex flex-wrap">
    <div class="w-full sm:w-6/12 md:w-4/12 px-4">
      <div class="relative inline-flex align-middle w-full">
        <button class="text-white font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 bg-gray-800"  type="button" v-on:click="toggleDropdown()" ref="btnDropdownRef">
          {{title}}
        </button>
        <div v-bind:class="{'hidden': !dropdownPopoverShow, 'block': dropdownPopoverShow}" class="bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg mb-1" style="min-width:12rem" ref="popoverDropdownRef">
            <slot> </slot>
        </div>
      </div>
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
            default: 'Enter your title here'
        }
    },
    data() {
        return {
            dropdownPopoverShow: false
        }
    },
    methods: {
        toggleDropdown: function() {
            if (this.dropdownPopoverShow) {
                this.dropdownPopoverShow = false;
            } else {
                this.dropdownPopoverShow = true;
                new Popper(this.$refs.btnDropdownRef, this.$refs.popoverDropdownRef, {
                    placement: "top-end"
                });
            }
        }
    }
}
</script>
