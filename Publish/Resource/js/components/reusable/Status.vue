<template>
    <div id="status">
        <div v-if="this.status == 1" >
            <span
                class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
            <span aria-hidden
                class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
            <span class="relative">Active</span>
            </span>
        </div>
        <div v-else >
            <span
                class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
            <span aria-hidden
                class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
            <span class="relative">Inactive</span>
            </span>
        </div>
    </div>
</template>

<script>
export default {
    name: "status",
    props: {
        status: {
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
