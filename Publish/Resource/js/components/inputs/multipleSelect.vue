<template>
  <div>
    <div class="rounded overflow-hidden text-white shadow-lg bg-gray-800">
        <p class="p-">{{label_name}}</p>
        <div class="border-b-2 m-0"></div>
        <p class="p-4">Select Option: </p>
        <div class="mr-8 ml-4">
            <div class="relative">

                <select
                v-model="selectedValue"
                @change="increasedValue($event)"
                class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                name="icon"
                >
                    <slot name="data"></slot>
                </select>

                <div class="rounded shadow-md my-2 relative pin-t pin-l bg-gray-600">
                    <ul class="list-reset">
                        <div v-for="(value, key) in data" >
                            <li class="hover:bg-gray-400" @click="removeElement(value)">
                                <p class="p-2 block text-black hover:bg-grey-light cursor-pointer">
                                    {{value.text}}
                                    <i class="fas fa-check-square float-right"></i>
                                    <input type="hidden" :name="field_name + '[]'" :value="value.value" >
                                </p>
                            </li>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
export default {
    name: "multiple-select",
    props: {
        field_name: {
            type: String,
            default: 'field_name'
        },
        label_name: {
            type: String,
            default: 'Label Name'
        },
        values: {
            type: Object,
            default: []
        },
    },
    data: function() {
        return {
            selectedValue: '',
            data: []
        };
    },
    methods: {
        increasedValue(event) {
            //geting the select value and the option text
            var optionValue = event.target.value;
            var optionText = event.target.options[event.target.options.selectedIndex].text;
            //creating the array with the option that the user select
            var person = {
                value: optionValue,
                text: optionText
            };

            //pushin in to the array if arayd exis will delete the option
            if (this.data.includes(optionValue) == false) {
                this.data.push(person);
            } else {
                this.removeElement(person);
            }
        },
        removeElement(arrayValue) {
            //remove the array value form the array
            var index = this.data.indexOf(arrayValue);
            if (index > -1) {
                this.data.splice(index, 1);
            }
        }
    },
    mounted() {

        for (const [key, value] of Object.entries(this.values)) {
            var person = {
                value: key,
                text: value
            };
            this.data.push(person);
        }

    }
}
</script>

<style>

</style>
