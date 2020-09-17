<template>
    <div id="WidgetsSlot">
        <div class="flex flex-wrap">
            <slot>
                Add you Widget here
            </slot>
        </div>
    </div>
</template>

<script>
export default {
    name: "WidgetsSlot",
    props: {
        title: {
            type: String,
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
