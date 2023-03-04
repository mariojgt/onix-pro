<x-onix::layout.main>


    <x-onix::onix.main/>
    @if (!empty($block))
        <script>
            setTimeout(() => {
                // Get the php data from the blade template
                window.loadEditorData('block', "{{ $block->slug }}");
            }, 500);
        </script>
    @endif
</x-onix::layout.main>
