<template>
  <div class="flex flex-wrap">
    <div class="w-full text-center">
      <button ref="btnRef" v-on:mouseenter="toggleTooltip()" v-on:mouseleave="toggleTooltip()" class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1" type="button" style="transition:all .15s ease">
        {{button}}
      </button>
      <div ref="tooltipRef" v-bind:class="{'hidden': !tooltipShow, 'block': tooltipShow}" class="bg-pink-600 border-0 ml-3 block z-50 font-normal leading-normal text-sm max-w-xs text-left no-underline break-words rounded-lg">
        <div>
          <div class="bg-pink-600 text-white opacity-75 font-semibold p-3 mb-0 border-b border-solid border-gray-200 uppercase rounded-t-lg">
            <slot name="title">
              pink tooltip title
            </slot>
          </div>
          <div class="text-white p-3">
            <slot name="body">
              And here's some amazing content. It's very engaging. Right?
            </slot>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

import Popper from "popper.js";

export default {
    name: "tooltip",
    props: {
        position: {
            type: String,
            default: 'right'
        },
        button: {
            type: String,
            default: 'add the name here'
        }
    },
    data() {
        return {
            tooltipShow: false
        }
    },
    methods: {
        toggleTooltip: function() {
            if (this.tooltipShow) {
                this.tooltipShow = false;
            } else {
                this.tooltipShow = true;
                new Popper(this.$refs.btnRef, this.$refs.tooltipRef, {
                    placement: this.position
                });
            }
        }
    }
}
</script>
