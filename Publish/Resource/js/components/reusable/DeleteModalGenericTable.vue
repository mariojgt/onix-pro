<template>
    <div>
        <button :class="buttonClass" class="text-white active:bg-red-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1" type="button" style="transition: all .15s ease" v-on:click="toggleModal()">
        <slot><i class="fas fa-trash"></i></slot>
        </button>
        <div v-if="showModal" class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex">
            <div class="relative w-auto my-6 mx-auto max-w-3xl">
                <!--content-->
                <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                    <!--header-->
                    <div class="flex items-start justify-between p-5 border-b border-solid border-gray-300 rounded-t">
                        <slot name="header" >
                            <h3 class="text-3xl font-semibold">
                                Alert<i class="fas fa-exclamation-circle"></i>
                            </h3>
                        </slot>
                        <button class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" v-on:click="toggleModal()">
                        <span class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
                        ×
                        </span>
                        </button>
                    </div>
                    <!--body-->
                    <div class="relative p-6 flex-auto">
                        <slot name="message" >
                            <p class="my-4 text-gray-600 text-lg leading-relaxed">
                                You are about to delete this item, this action cannot be undone, you like to proceed?
                            </p>
                        </slot>
                    </div>
                    <!--footer-->
                    <slot name="footer" >
                        <div class="flex items-center justify-end p-6 border-t border-solid border-gray-300 rounded-b">
                            <button class="bg-blue-500 text-white active:bg-blue-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1" type="button" style="transition: all .15s ease" v-on:click="deleteRow()">
                            Save Changes
                            </button>
                            <button class="text-red-500 bg-transparent border border-solid border-red-500 hover:bg-red-500 hover:text-white active:bg-red-600 font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1" type="button" style="transition: all .15s ease" v-on:click="toggleModal()">
                            Close
                            </button>
                        </div>
                    </slot>
                </div>
            </div>
        </div>
        <div v-if="showModal" class="opacity-25 fixed inset-0 z-40 bg-black"></div>
    </div>
</template>

<script>
export default {
    name: "modal-delete",
    props: {
        objectId: {
            default: ''
        },
        urldelete: {
            type: String,
            default: ''
        },
        buttonClass: {
            type: String,
            default: 'bg-red-500'
        },
        model: {
            type: String,
            required: true
        },
        prefix: {
            type: String,
            required: true
        },
    },
    data() {
        return {
            showModal: false,
        }
    },
    methods: {
        toggleModal: function() {
            this.showModal = !this.showModal;
        },
        deleteRow() {
            //delete the data
            axios.get(this.urldelete, {
                  params: {
                      model:this.model,
                      prefix:this.prefix,
                      objectId:this.objectId
                  }
              })
            .then(response => this.$emit('genericDelete', response.data))
            .catch(function(error) {})
            //close modal
            this.toggleModal();
        }
    }
}
</script>
