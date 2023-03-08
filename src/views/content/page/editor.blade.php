<x-onix::layout.main>
    <x-onix::onix.main/>
    @if (!empty($page))
        <script>
            setTimeout(() => {
                window.startEditor('page', "{{ $page->slug }}");
            }, 500);
        </script>
    @endif
</x-onix::layout.main>
