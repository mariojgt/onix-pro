<div class="flex items-center justify-center h-screen bg-slate-700">
    <div class="bg-white rounded-3xl border shadow-xl p-3 w-11/12">
        <div class="justify-between items-center mb-4">
            <div id="gjs" style="z-index: 99999;"></div>
        </div>
        <div>
            <h1 class="font-semibold text-xl text-gray-700">Enable Auto Save</h1>
            <input type="checkbox" id="autosave" class="toggle toggle-primary"/>
            <progress class="progress progress-primary w-full" id="progress-bar" value="0" max="100"></progress>
        </div>
    </div>
    <script>
        // If the user enable the autosave, the editor will save the data every 5 seconds
        let autosave = document.getElementById('autosave');
        let interval = null;
        let progressBar = document.getElementById('progress-bar');
        autosave.addEventListener('change', function() {
            if (autosave.checked) {
                // Call the save method
                window.saveEditorData();
                interval = setInterval(function() {
                    if (progressBar.value >= 100) {
                        progressBar.value = 0;
                        // Call the save method
                        window.saveEditorData();
                    } else {
                        progressBar.value += 1;
                    }
                }, 100);
            } else {
                clearInterval(interval);
                progressBar.value = 0;
            }
        });
    </script>

</div>
