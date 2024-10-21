<x-onix::layout.main :footer="false" >
    <x-onix::onix.main />
    @if (!empty($page))
        <script>
            setTimeout(() => {
                window.startEditor('page', "{{ $page->slug }}", "{{ $template->slug }}");
            }, 500);
        </script>
    @endif
</x-onix::layout.main>
