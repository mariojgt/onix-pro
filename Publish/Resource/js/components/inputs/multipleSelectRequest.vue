<template>
    <div>


        <div class="rounded overflow-hidden text-white shadow-lg bg-gray-800">
        <div class="border-b-2 m-0"></div>
        <p class="p-4">{{field_label}}</p>
        <div class="mr-8 ml-4">
            <div class="relative">
                <input type="text" v-model="search" @keyup="searchData()" placeholder="Type you serach in here" class="border-2 rounded h-8 w-full text-gray-900 font-weight-bolder"><br>
                <div class="rounded shadow-md my-2 relative pin-t pin-l bg-gray-600">
                    <ul class="list-reset">
                        <div v-for="(value, key) in dataResponse" >
                            <li class="flex flex-row items-center relative bg-gray-200 hover:bg-gray-600 cursor-pointer p-2 rounded"
                            @click="addData(value, key)"
                             >
                                <div class="flex flex-col ml-10 float-right">
                                    <h3 class="font-bold text-gray-900">{{ value }}</h3>
                                </div>
                            </li>
                        </div>
                    </ul>
                </div>
                <div class="rounded shadow-md my-2 relative pin-t pin-l bg-gray-400 hover:bg-gray-600">
                    <ul class="list-reset">
                        <div
                            v-if="is_multiple == 'true'" >
                            <li class="hover:bg-gray-400"
                                v-for="(value_selected, key_selected) in dataSelect"
                                @click="removeData(value_selected)"
                                >
                                <p class="p-2 block text-black hover:bg-grey-light cursor-pointer">
                                    {{ value_selected.text }}
                                    <i class="fas fa-check-square float-right"></i>
                                    <input type="hidden" :value="value_selected.value" :name="input_name+'[]'" >
                                </p>
                            </li>
                        </div>
                        <div
                            v-else >
                            <li class="hover:bg-gray-400" v-if="dataSelect.length != 0"
                                @click="removeData()"
                            >
                                <p class="p-2 block text-black hover:bg-grey-light cursor-pointer">
                                    {{ dataSelect.text }}
                                    <i class="fas fa-check-square float-right"></i>
                                    <input type="hidden" :value="dataSelect.value" :name="input_name" >
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
    name: "vue-select-request",
    props: {
        field_label: {
            type: String,
            default: ""
        },
        model: {
            type: String,
            default: ""
        },
        prefix: {
            type: String,
            default: ""
        },
        fields_search: {
            type: String,
            default: ""
        },
        is_multiple: {
            type: String,
            default: "false"
        },
        input_name: {
            type: String,
            default: "inputname"
        },
        value: {
            type: Object,
            default: []
        }
    },
    data: function() {
        return {
            dataResponse: [],
            dataSelect: [],
            url: "/admin/search/select",
            search: ""
        };
    },
    methods: {
        getData(url = this.url) {
            axios.get(url, {
                    params: {
                        search: this.search,
                        model: this.model,
                        prefix: this.prefix,
                        fields_search: this.fields_search,
                    }
                })
                .then(response => this.dataResponse = response.data)
                .catch(function(error) {})
        },
        searchData() {
            this.getData();
        },
        addData(value, key) {
            //clear the data
            this.dataResponse = [];

            var finalValue = {
                value: key,
                text: value
            };
            if (this.is_multiple == 'true') {
                this.dataSelect.push(finalValue)
            } else {
                this.dataSelect = finalValue;
            }
        },
        removeData(array = null) {
            if (this.is_multiple == 'true') {
                var index = this.dataSelect.indexOf(array);
                if (index > -1) {
                    this.dataSelect.splice(index, 1);
                }
            } else {
                this.dataSelect = [];
            }
        }
    },
    created() {},
    computed: {},
    mounted() {
        if (this.value.length != 0) {

            for (const [key, value] of Object.entries(this.value)) {
                var finalValue = {
                    value: key,
                    text: value
                };
                if (this.is_multiple == 'true') {
                    this.dataSelect.push(finalValue)
                } else {
                    this.dataSelect = finalValue;
                }
            }
        }
    }
};
</script>
<style></style>

