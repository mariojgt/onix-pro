<template>
    <div id="notification-datatable">
            <div class="container mx-auto px-4 sm:px-8">
                <div class="py-8">
                    <div>
                        <h2 class="text-2xl font-semibold leading-tight text-white">My Notification</h2>
                    </div>
                    <div class="my-2 flex sm:flex-row flex-col">
                        <div class="flex flex-row mb-1 sm:mb-0">
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
                    </div>
                    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                        <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                            <table class="min-w-full leading-normal">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Action
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Model
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Data
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Created at
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
                                                <div class="ml-3">
                                                    <crud-status-reusable v-bind:status="value.data_action" ></crud-status-reusable>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">{{value.data_model}}</p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">

<div class="bg-teal-lightest border-t-4 border-teal rounded-b text-teal-darkest px-4 py-3 shadow-md my-2" role="alert">
    <div class="flex">
        <div class="h-6 w-6 text-teal mr-4">
            <i class="fas fa-2x fa-info-circle"></i>
        </div>
        <div>
            <p class="font-bold">Changes Notification</p>
            <p class="text-sm">
                <ul>
                    <li v-for="(value_model_info, key_model_info) in value.model_info" >
                        {{key_model_info}} : {{value_model_info}}
                    </li>
                </ul>
            </p>
        </div>
    </div>
</div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{value.created_at}}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <delete-modal-reusable
                                                @onDelete="reloadMethod"
                                                v-bind:objectId="value.notifiable_id"
                                                urldelete="/admin/delete/notifications"
                                            >
                                            </delete-modal-reusable>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div
                                class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between          ">
                                <span class="text-xs xs:text-sm text-gray-900">
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
    name: "user-notification-datatable",
    props: {
        userid: {
            type: String,
            default: '1'
        }
    },
    data: function() {
        return {
            data: [],
            indexUrl: "/api/notifications/user",
            searchUrl: "/api/search/notifications/user",
            pagination: "10",
            filterOne: "All",
        };
    },
    methods: {
        getData(url) {
            axios.get(url, {
                    params: {
                        objectId: this.userid,
                    }
                })
                .then(response => this.data = response.data)
                .catch(function(error) {})
        },
        postData(url) {
            axios.get(url, {
                    params: {
                        objectId: this.userid,
                        pagination: this.pagination,
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
            //reloading the data basing in a event caming inside a component
            this.getData(this.indexUrl);

            //Display a sucess message to the user
            this.toast('Notification deleted successfully !!', 'success');

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
