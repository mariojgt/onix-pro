<template>
  <div>
    <div class="rounded overflow-hidden text-white shadow-lg bg-gray-800">
        <div class="border-b-2 m-0"></div>
        <p class="p-4">{{ label }} </p>
        <div class="mr-8 ml-4">
            <div class="relative">
                <input type="text" v-model="search" @keyup="mediaSearch()" placeholder="media name" class="border-2 rounded h-8 w-full text-gray-900 font-weight-bolder"><br>
                <div class="rounded shadow-md my-2 relative pin-t pin-l bg-gray-600">
                    <ul class="list-reset">
                        <div v-for="(value, key) in dataRequest.data" >
                            <li class="flex flex-row items-center relative bg-gray-200 hover:bg-gray-600 cursor-pointer p-2 rounded" @click="increasedValue(value.id, value.file)" >
                                <div class="relative flex-shrink-0">
                                    <span class="absolute right-0 top-0 border-2 border-white mt-px mr-px flex items-center justify-center h-4 w-4 rounded-full bg-green-500"></span>
                                    <a href="#" class="flex rounded-full w-16 h-16">
                                    <img v-bind:src="value.path_sizes.thumbnail" alt="" class="w-full h-full rounded-full">
                                    </a>
                                </div>
                                <div class="flex flex-col ml-10 float-right">
                                    <h3 class="font-bold text-gray-900">{{value.file}}</h3>
                                </div>
                            </li>
                        </div>
                    </ul>
                </div>
                <div class="rounded shadow-md my-2 relative pin-t pin-l bg-gray-400 hover:bg-gray-600">
                    <ul class="list-reset">
                        <div v-for="(value, key) in data" >
                            <li class="hover:bg-gray-400" @click="removeElement(value)">
                                <p class="p-2 block text-black hover:bg-grey-light cursor-pointer">
                                    {{value.text}}
                                    <i class="fas fa-check-square float-right"></i>
                                    <input type="hidden" :name="'media[]'" :value="value.value" >
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
        values: {
            type: Object,
            default: function () {
                return {}
            }
        },
        label: {
            type: String,
            default: 'Select a Media:'
        },
    },
    data: function() {
        return {
            selectedValue: '',
            dataRequest: [],
            data: [],
            search: '',
        };
    },
    methods: {
        mediaSearch() {
            if (this.search.length >= 3 || this.search.length != '') {
                axios.get('/admin/media/search', {
                        params: {
                            search: this.search,
                        }
                    })
                    .then(response => this.dataRequest = response.data)
                    .catch(function(error) {})
            } else {
                this.dataRequest = [];
            }
        },
        increasedValue(id, value) {
            //geting the select value and the option text
            var optionText = value;
            var optionValue = id;
            //creating the array with the option that the user select
            var finalValue = {
                value: optionValue,
                text: optionText
            };

            //pushin in to the array if array exis will delete the option
            if (this.data.includes(optionValue) == false) {
                this.data.push(finalValue);
            } else {
                this.removeElement(finalValue);
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
