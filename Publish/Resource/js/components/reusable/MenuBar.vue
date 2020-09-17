<template>
    <div id="menu-bar">
        <div class="group inline-block">
            <button
                class="outline-none focus:outline-none border px-3 py-1 bg-white rounded-sm flex items-center min-w-32"
                >
                <span class="pr-1 font-semibold flex-1">
                    <slot name="button" >
                        <i class="fas fa-user"></i>   {{title}}
                    </slot>
                </span>
                <span>
                    <i class="fas fa-angle-right"></i>
                </span>
            </button>
            <slot>
                <ul
                class="bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute
                transition duration-150 ease-in-out origin-top min-w-32"
                >
                    <li class="rounded-sm px-3 py-1 hover:bg-gray-100">Programming</li>
                    <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
                        <button
                            class="w-full text-left flex items-center outline-none focus:outline-none"
                            >
                            <span class="pr-1 flex-1">Langauges</span>
                            <span class="mr-auto">
                                <i class="fas fa-angle-right"></i>
                            </span>
                        </button>
                        <ul
                            class="bg-white border rounded-sm absolute top-0 right-0
                            transition duration-150 ease-in-out origin-top-left
                            min-w-32
                            "
                            >
                            <li class="px-3 py-1 hover:bg-gray-100">test</li>
                        </ul>
                    </li>
                </ul>
            </slot>
        </div>
    </div>
</template>

<script>
export default {
    name: "menu-bar",
    props: {
        title: {
            type: String,
            default: 'Title Here'
        }
    },
    data: function() {
        return {
            // newName: '',
            // names:['mario','jack','marry']
        };
    },
    methods: {
        // addName() {
        //     this.names.push(this.newName);
        //     this.newName = '';
        // }
    },
    mounted() {

    }
}
</script>

<style>
  /* since nested groupes are not supported we have to use
     regular css for the nested dropdowns
  */
  li>ul                 { transform: translatex(100%) scale(0) }
  li:hover>ul           { transform: translatex(101%) scale(1) }
  li > button svg       { transform: rotate(-90deg) }
  li:hover > button svg { transform: rotate(-270deg) }

  /* Below styles fake what can be achieved with the tailwind config
     you need to add the group-hover variant to scale and define your custom
     min width style.
  	 See https://codesandbox.io/s/tailwindcss-multilevel-dropdown-y91j7?file=/index.html
  	 for implementation with config file
  */
  .group:hover .group-hover\:scale-100 { transform: scale(1) }
  .group:hover .group-hover\:-rotate-180 { transform: rotate(180deg) }
  .scale-0 { transform: scale(0) }
  .min-w-32 { min-width: 8rem }
</style>
