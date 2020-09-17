<template>
    <div id="flash-message">

    </div>
</template>

<script>
export default {
    name: "flash-message",
    props: {
        type: {
            type: String,
            default: 'success'
        },
        message: {
            type: String,
            default: 'Your message here'
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
        var flashIcon = null;
        switch (this.type) {
            case 'success':
                flashIcon = 'success';
                break;
            case 'info':
                flashIcon = 'info';
                break;
            default:
                flashIcon = 'error';
                break;
        }

        Swal.fire({
            position: 'center',
            icon: flashIcon,
            title: this.message,
            showConfirmButton: false,
            timer: 2500
        })
    }
}
</script>

<style>

</style>
