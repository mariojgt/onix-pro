<x-onix::layout.main>
    <x-onix::onix.main/>
    @if (!empty($block))
        <script>
            setTimeout(() => {
                window.startEditor('block', "{{ $block->slug }}");
            }, 500);
        </script>
    @endif
</x-onix::layout.main>
