<template>
        <div id="MetricCard" class="w-full md:w-1/2 xl:w-1/3 p-3">
            <!--Metric Card-->
        <div class="loader ease-linear rounded-full border-8 border-t-8 border-gray-200 h-10 w-10"
          v-if="loading == true"></div>
            <div class="bg-gray-900 border border-gray-800 rounded shadow p-2"
            v-if="loading == false">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <slot name="header" >
                            <div class="rounded p-3 bg-green-600">
                                <i class="fa fa-wallet fa-2x fa-fw fa-inverse"></i>
                            </div>
                        </slot>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <slot name="title">
                            <h5 class="font-bold uppercase text-gray-400">Your title here</h5>
                        </slot>
                        <h3 class="font-bold text-3xl text-gray-600" v-text="data">$3249
                        </h3>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>
</template>

<script>
export default {
    name: "MetricCard",
    props: {
        urldata: {
            type: String,
            default: 'Modal name here'
        }
    },
    data: function() {
        return {
            data: '',
            loading: true
        };
    },
    methods: {
        getData(urldata) {
            axios.get(urldata, {})
                .then(response => this.data = response.data.data)
                .catch(function(error) {})
            setTimeout(() => this.loading = false, 500);
        }
    },
    mounted() {
        this.getData(this.urldata);
    }
}
</script>

<style>

</style>
