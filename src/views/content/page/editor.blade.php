<x-onix::layout.main>


    <x-onix::onix.main/>
    @if (!empty($page))
        <script>
            setTimeout(() => {
                // Get the php data from the blade template
                window.loadEditorData('page', "{{ $page->slug }}");
            }, 500);
        </script>
    @endif
</x-onix::layout.main>
