<template>
    <div>


    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div>
                <h2 class="text-2xl font-semibold leading-tight text-white">{{ model }}</h2>
            </div>
            <div class="relative">
                <slot></slot>
            </div>
            <div class="my-2 flex sm:flex-row flex-col">
                <div class="flex flex-row mb-1 sm:mb-0">
                    <div class="relative">
                        <select
                            @change="getData(searchUrl)"
                            v-model="pagination"
                            class="appearance-none h-full rounded-l border block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="5" >5</option>
                            <option value="10" >10</option>
                            <option value="20" >20</option>
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>
                    <div class="relative">
                        <select
                            @change="getData(searchUrl)"
                            v-model="filterStatus"
                            class="appearance-none h-full rounded-r border-t sm:rounded-r-none sm:border-r-0 border-r border-b block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500">
                            <option v-for="(value, key) in filters"
                            :value="value" >{{ value.label }}</option>
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
                        @keyup="getData(searchUrl)"
                        v-model="search"
                        class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
                </div>
            </div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <!-- the table head -->
                            <tr>
                                <th v-for="(colum, key) in fields"
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"
                                    >
                                    {{colum.label}}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- the table data -->
                            <tr v-for="(rows, key) in data.data" >
                                <td
                                    v-for="(field, field_key) in rows"
                                    class="px-5 py-5 border-b border-gray-200 bg-white text-sm"
                                    v-if="field.type != 'id'"
                                    >
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-10 h-10"
                                            v-if="field.type == 'gravatar'"
                                             >
                                            <img class="w-full h-full rounded-full"
                                                :src="field.value"
                                                alt="" />
                                        </div>
                                        <div class="ml-3" v-else-if="field.type == 'image'">
                                            <img class="w-20 h-20 rounded-full mr-4"
                                                :src="field.value.thumbnail"
                                                alt="" />
                                        </div>
                                        <div class="ml-3" v-else-if="field.type == 'boolean'">
                                            <status-reusable v-bind:status="field.value" >
                                            </status-reusable>
                                        </div>
                                        <div class="ml-3" v-else-if="field.type == 'icon'">
                                            <i class="fas fa-fw fa-3x mr-3 text-blue-400"
                                            :class="field.value"></i>
                                        </div>
                                        <div class="ml-3" v-else-if="field.type == 'action'">

                                            <div v-if="candelete == 1" >
                                                <delete-modal-generic-reusable
                                                v-if="rows.deleted_at.value == null"
                                                    @genericDelete="deletion"
                                                    v-bind:model="model"
                                                    v-bind:prefix="prefix"
                                                    v-bind:objectId="rows.id.value"
                                                    urldelete="/admin/generic/delete"
                                                >
                                                </delete-modal-generic-reusable>

                                                <div v-if="rows.deleted_at.value != null" >
                                                    <delete-modal-generic-reusable
                                                        @genericDelete="restoreUser"
                                                        v-bind:model="model"
                                                        v-bind:prefix="prefix"
                                                        v-bind:objectId="rows.id.value"
                                                        buttonClass="bg-green-500"
                                                        urldelete="/admin/generic/restore"
                                                    >
                                                        <i class="fas fa-trash-restore"></i>
                                                        <template v-slot:message>
                                                            <p class="my-4 text-gray-600 text-lg leading-relaxed">
                                                                Are you sure you want to restore this user?
                                                            </p>
                                                        </template>
                                                    </delete-modal-generic-reusable>
                                                </div>
                                            </div>
                                            <div v-if="canedit == 1">
                                                <a href="#" v-bind:href="editroute+rows.id.value"
                                                    v-if="rows.deleted_at.value == null"
                                                 class="bg-blue-500 text-white active:bg-blue-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1">
                                                    <i class="fas fa-pen-square"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="ml-3" v-else>
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ field.value }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>

                    <div
                        class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between">
                        <span class="text-xs xs:text-sm text-gray-900" v-if="data.meta">
                        Showing {{ data.meta.from }} to {{ data.meta.to }} of {{ data.meta.total }} Entries
                        </span>
                        <div class="inline-flex mt-2 xs:mt-0">
                            <button
                                @click="getData(data.links.prev)"
                                class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-l">
                            Prev
                            </button>
                            <button
                                @click="getData(data.links.next)"
                                class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-r">
                            Next
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
      name: "generic-datatable",
        props: {
            model: {
                type: String,
                required: true
            },
            prefix: {
                type: String,
                required: true
            },
            fields: {
                type: Array,
                required: true
            },
            filters: {
                type: Array,
                required: true
            },
            editroute: {
                type: String,
                required: true
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
          url:"/admin/show-all",
          searchUrl:"/admin/search",
          data:[],
          pagination:10,
          filterStatus:'all',
          search:''
        };
      },
      methods: {
          getData(url = this.url) {
              axios.get(url, {
                  params: {
                      model:this.model,
                      prefix:this.prefix,
                      fields:this.fields,
                      pagination:this.pagination,
                      search:this.search,
                      filter:this.filterStatus
                  }
              })
            .then(response => this.data = response.data)
            .catch(function(error) {})
          },
          deletion (response) {
              if (response.response == true) {
                  this.message(response.message);
              } else {
                  this.message(response.message, 'error');
              }
              this.getData(this.searchUrl);
          },
          restoreUser(response){
              if (response.response == true) {
                  this.message(response.message);
              } else {
                  this.message(response.message, 'error');
              }
              this.getData(this.searchUrl);
          },
          message(message, type = 'success') {
                //Display a sucess message to the user
                this.toast(message, type);
          }
      },
      created() {},
      computed: {},
      mounted() {
          this.getData();
      }
    };
</script>
<style>
</style>

