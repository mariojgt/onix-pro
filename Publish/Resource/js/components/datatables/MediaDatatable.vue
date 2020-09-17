<template>
    <div id="navigation-datatable">
            <div class="container mx-auto px-4 sm:px-8">
                <div class="py-8">
                    <div>
                        <h2 class="text-2xl font-semibold leading-tight text-white">Media</h2>
                    </div>
                    <br>
                    <div class="my-2 flex sm:flex-row flex-col">
                        <div class="flex flex-row mb-1 sm:mb-0">
                            <div class="relative">
                                <a href="/admin/media/create" class="bg-transparent hover:bg-blue text-white font-semibold hover:text-blue-dark py-6 px-4 border border-blue hover:border-transparent rounded">
                                    New
                                </a>
                            </div>
                            <div class="relative">
                                <select
                                    v-model="pagination"
                                    @click="postData(searchUrl)"
                                    class="appearance-none h-full rounded-l border block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <option>5</option>
                                    <option>10</option>
                                    <option>20</option>
                                    <option>45</option>
                                    <option>100</option>
                                </select>
                                <div
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="block relative">
                            <span class="h-full absolute inset-y-0 left-0 flex items-center pl-2">
                                <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current text-gray-500">
                                    <path
                                        d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                                    </path>
                                </svg>
                            </span>
                            <input placeholder="Search"
                                v-model="search"
                                @keyup="searchData()"
                                class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
                        </div>
                    </div>
                    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                        <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                            <table class="min-w-full leading-normal">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Media
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            File
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Extension
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(value, key) in data.data" >
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 w-10 h-10">
                                                    <img class="w-full h-full rounded-full"
                                                        v-bind:src="value.path_sizes.thumbnail"
                                                        alt="" />
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">{{value.file}}</p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">{{value.extension}}</p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <div v-if="candelete == 1">
                                                <delete-modal-reusable
                                                    @onDelete="reloadMethod"
                                                    v-bind:objectId="value.id"
                                                    urldelete="/admin/media/delete"
                                                >
                                                </delete-modal-reusable>
                                            </div>
                                            <div v-if="canedit == 1">
                                                <a href="#" v-bind:href="editroute+value.id" class="bg-blue-500 text-white active:bg-blue-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1">
                                                    <i class="fas fa-pen-square"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div
                                v-if="data.data"
                                class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between          ">
                                <span class="text-xs xs:text-sm text-gray-900" v-if="data.meta" >
                                Showing {{data.meta.from}} to {{data.meta.to}} of {{data.meta.total}} Entries
                                </span>
                                <div class="inline-flex mt-2 xs:mt-0">
                                    <button
                                        @click="postData(data.links.first)"
                                        class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-l">
                                    First
                                    </button>
                                    <button
                                        @click="postData(data.links.prev)"
                                        class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4">
                                    Prev
                                    </button>
                                    <button
                                        @click="postData(data.links.next)"
                                        class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4">
                                    Next
                                    </button>
                                    <button
                                        @click="postData(data.links.last)"
                                        class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-r">
                                    Last
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</template>

<script>
export default {
    name: "navigation-datatable",
    props: {
        editroute: {
            type: String,
            default: ''
        },
        canedit: {
            type: String,
            default: '0'
        },
        candelete: {
            type: String,
            default: '0'
        }
    },
    data: function() {
        return {
            data: [],
            indexUrl: "/admin/media/show-all",
            searchUrl: "/admin/media/search",
            search: "",
            pagination: "10",
            filterOne: "All",
        };
    },
    methods: {
        getData(url) {
            axios.get(url, {})
                .then(response => this.data = response.data)
                .catch(function(error) {})
        },
        postData(url) {
            axios.get(url, {
                    params: {
                        search: this.search,
                        pagination: this.pagination,
                        filterOne: this.filterOne,
                    }
                })
                .then(response => this.data = response.data)
                .catch(function(error) {})
        },
        searchData() {
            if (this.search.length >= 3) {
                this.postData(this.searchUrl);
            }
            if (this.search.length == 0) {
                this.getData(this.indexUrl);
            }
        },
        reloadMethod() {
            //Display a sucess message to the user
            this.toast('Media deleted successfully !!', 'success');

            //reloading the data basing in a event caming inside a component
            this.getData(this.indexUrl);
        },
    },
    mounted() {
        //load this page data on load
        this.getData(this.indexUrl);
    }
}
</script>

<style>

</style>
