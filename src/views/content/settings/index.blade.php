<x-onix::layout.main>

    <!-- component -->
    <div class="bg-white pt-12 pr-0 pb-12 pl-0 mt-0 mr-auto mb-0 ml-auto sm:py-16 lg:py-20 rounded-lg">
        <div class="pt-0 pr-4 pb-0 pl-4 mt-0 mr-auto mb-0 ml-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="pt-0 pr-4 pb-0 pl-4 mt-0 mr-auto mb-0 ml-auto sm:px-6 lg:px-8">
                <div class="pt-0 pr-4 pb-0 pl-4 mt-0 mr-auto mb-0 ml-auto sm:flex sm:items-center sm:justify-between">
                    <div>
                        <h1 class="text-xl font-bold text-gray-900">Editor color</h1>
                    </div>
                </div>
                <form action="{{ route('onix.settings') }}" method="POST">
                    @csrf
                    <div class="shadow-xl bg-base-300 mt-8 mr-0 mb-0 ml-0 pt-4 pr-10 pb-4 pl-10 flow-root rounded-lg sm:py-2 border-purple-400">
                        <x-onix::settings.color
                            fieldName="color_primary"
                            label="Primary color"
                            :value="$settings->color_primary"
                            :colorOptions="
                                [
                                    '#000000ff',
                                    '#0d1b2aff',
                                    '#231942ff',
                                    '#01161eff',
                                    '#3d5a80ff',
                                    '#1f2041ff',
                                ]"
                        />

                        <x-onix::settings.color
                            fieldName="color_secondary"
                            label="Secondary color"
                            :value="$settings->color_secondary"
                            :colorOptions="
                                [
                                    '#14213dff',
                                    '#1b263bff',
                                    '#5e548eff',
                                    '#124559ff',
                                    '#98c1d9ff',
                                    '#4b3f72ff',
                                    '#f7b267ff',
                                    '#f79d65ff',
                                    '#f4845fff',
                                    '#f27059ff',
                                    '#f25c54ff',
                                ]"
                        />

                        <x-onix::settings.color
                            fieldName="color_tertiary"
                            :value="$settings->color_tertiary"
                            label="Tertiary color"
                            :colorOptions="
                                [
                                    '#fca311ff',
                                    '#415a77ff',
                                    '#9f86c0ff',
                                    '#598392ff',
                                    '#e0fbfcff',
                                    '#ffc857ff',
                                ]"
                        />

                        <x-onix::settings.color
                            fieldName="color_quaternary"
                            :value="$settings->color_quaternary"
                            label="Quaternary color"
                            :colorOptions="
                                [
                                    '#e5e5e5ff',
                                    '#778da9ff',
                                    '#be95c4ff',
                                    '#aec3b0ff',
                                    '#ee6c4dff',
                                    '#119da4ff',
                                ]"
                        />
                    </div>
                    <div class="pt--10 pr-0 pb-10 pl-0">
                        <div class="pt-5 pr-0 pb-0 pl-0 mt-5 mr-0 mb-0 ml-0">
                            <div class="sm:flex sm:items-center sm:justify-between sm:space-x-5">
                                <div class="flex items-center flex-1 min-w-0">
                                    <button class="btn btn-success">Update Settings</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-onix::layout.main>
