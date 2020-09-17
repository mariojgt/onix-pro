<template>
    <div id="status">
        <div v-if="type == 1" >
            <span
                class="relative inline-block px-3 py-1 font-semibold text-orange-900 leading-tight">
            <span aria-hidden
                class="absolute inset-0 bg-orange-200 opacity-50 rounded-full"></span>
            <span class="relative">Admin</span>
            </span>
        </div>
        <div v-else-if="type == 2" >
            <span
                class="relative inline-block px-3 py-1 font-semibold text-purple-900 leading-tight">
            <span aria-hidden
                class="absolute inset-0 bg-purple-200 opacity-50 rounded-full"></span>
            <span class="relative">User</span>
            </span>
        </div>
        <div v-else >
            <span
                class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
            <span aria-hidden
                class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
            <span class="relative">Undefine</span>
            </span>
        </div>
    </div>
</template>

<script>
export default {
    name: "user-type",
    props: {
        type: {
            type: Number,
            default: 'Enter your title here'
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
        //alert('read');
    }
}
</script>

<style>

</style>
