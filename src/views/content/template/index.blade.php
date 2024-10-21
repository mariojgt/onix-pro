<x-onix::layout.main>

    <!-- component -->
    <div class="bg-white pt-12 pr-0 pb-12 pl-0 mt-0 mr-auto mb-0 ml-auto sm:py-16 lg:py-20 rounded-lg">
        <div class="pt-0 pr-4 pb-0 pl-4 mt-0 mr-auto mb-0 ml-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="pt-0 pr-4 pb-0 pl-4 mt-0 mr-auto mb-0 ml-auto sm:px-6 lg:px-8">
                <div class="pt-0 pr-4 pb-0 pl-4 mt-0 mr-auto mb-0 ml-auto sm:flex sm:items-center sm:justify-between">
                    <div>
                        <p class="text-xl font-bold text-gray-900">Tempaltes</p>
                        <x-onix::modal.addEditTemplateModal :templates="$templates" :action="route('onix.templates.create')" />
                    </div>
                    <div class="mt-4 mr-0 mb-0 ml-0 sm:mt-0">
                        <div class="relative">
                            <input type="text" placeholder="Type here"
                                class="input input-bordered input-warning w-full max-w-xs" />
                        </div>
                    </div>
                </div>
                <div class="shadow-xl mt-8 mr-0 mb-0 ml-0 pt-4 pr-10 pb-4 pl-10 flow-root rounded-lg sm:py-2 border-purple-400">
                    <div class="pt--10 pr-0 pb-10 pl-0">
                        @if (count($templates) >= 1)
                            @foreach ($templates as $item)
                                <x-onix::table.row :templates="$templates" :item="$item" mode="template" />
                            @endforeach
                        @else
                            <div class="text-center">
                                <p class="text-lg font-bold text-gray-900">No pages found</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-onix::layout.main>
