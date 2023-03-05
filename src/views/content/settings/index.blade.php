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
                            :value="$settings->color_primary ?? null"
                            :colorOptions="config('onix.color_primary')"
                        />

                        <x-onix::settings.color
                            fieldName="color_secondary"
                            label="Secondary color"
                            :value="$settings->color_secondary ?? null"
                            :colorOptions="config('onix.color_secondary')"
                        />

                        <x-onix::settings.color
                            fieldName="color_tertiary"
                            :value="$settings->color_tertiary ?? null"
                            label="Tertiary color"
                            :colorOptions="config('onix.color_tertiary')"
                        />

                        <x-onix::settings.color
                            fieldName="color_quaternary"
                            :value="$settings->color_quaternary ?? null"
                            label="Quaternary color"
                            :colorOptions="config('onix.color_quaternary')"
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
