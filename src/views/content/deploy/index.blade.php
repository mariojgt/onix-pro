<x-onix::layout.main>

    <!-- component -->
    <div class="bg-white pt-12 pr-0 pb-12 pl-0 mt-0 mr-auto mb-0 ml-auto sm:py-16 lg:py-20 rounded-lg">
        <div class="pt-0 pr-4 pb-0 pl-4 mt-0 mr-auto mb-0 ml-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="pt-0 pr-4 pb-0 pl-4 mt-0 mr-auto mb-0 ml-auto sm:px-6 lg:px-8">
                <div class="pt-0 pr-4 pb-0 pl-4 mt-0 mr-auto mb-0 ml-auto sm:flex sm:items-center sm:justify-between">
                    <div>
                        <h1 class="text-xl font-bold text-gray-900">Deploy log</h1>
                    </div>
                </div>

                <div class="mockup-code" id="deploy-code-log" >
                </div>
                <div class="pt--10 pr-0 pb-10 pl-0">
                    <div class="pt-5 pr-0 pb-0 pl-0 mt-5 mr-0 mb-0 ml-0">
                        <div class="sm:flex sm:items-center sm:justify-between sm:space-x-5 pb-4">
                            <div class="flex items-center flex-1 min-w-0">
                                <select class="select select-bordered w-full max-w-xs" id="deploy-mode" >
                                    <option disabled selected>Depoly mode?</option>
                                    <option value="blade">Blade File</option>
                                    <option value="inersia">Inersia JS</option>
                                  </select>
                            </div>
                        </div>
                        <div class="sm:flex sm:items-center sm:justify-between sm:space-x-5">
                            <div class="flex items-center flex-1 min-w-0">
                                <button class="btn btn-success" onclick="startDeploy()" >Deploy</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function startDeploy() {
            // Get the select elemtn value based in the id deploy-mode
            const deployModeSelectValue = document.getElementById('deploy-mode').value;
            window.deploySite(deployModeSelectValue, 'deploy-code-log');
        }
    </script>

</x-onix::layout.main>
