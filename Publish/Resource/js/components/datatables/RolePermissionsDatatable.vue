<template>
  <div id="role-permission-datatables">
    <table class="border-collapse w-full">
      <thead>
        <tr>
          <th
            class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell"
          >Permissions</th>
          <th
            class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell"
          >Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr
            v-for="(value, key) in data.data"
          class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0"
        >
          <td
            class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static"
          >
            <span class="rounded bg-green-400 py-1 px-3 text-xs font-bold">{{value.name}}</span>
          </td>
          <td
            class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static"
          >
            <span
              class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase"
            >Actions</span>

            <div v-if="candelete == 1" >
              <delete-modal-reusable
                  @onDelete="reloadMethod"
                  v-bind:objectId="value.id+'-'+roleid"
                  urldelete="/admin/delete/role-permissions"
              >
              </delete-modal-reusable>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
    name: "role-permission-datatables",
    props: {
        roleid: {
            type: String,
            default: ""
        },
        candelete: {
            type: String,
            default: ""
        }
    },
    data: function() {
        return {
            urlIndex: '/api/permissions/roles-permissions',
            data: []
        };
    },
    methods: {
        getData() {
            axios.get(this.urlIndex, {
                    params: {
                        id: this.roleid
                    }
                })
                .then(response => this.data = response.data)
                .catch(function(error) {})
        },
        reloadMethod() {
            //reloading the data basing in a event caming inside a component
            this.getData();

            //Display a sucess message to the user
            this.toast('Permission deleted successfully !!', 'success');
        },
    },
    mounted() {
        this.getData();
    }
}
</script>

<style>
</style>
