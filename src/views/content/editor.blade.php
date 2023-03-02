<x-onix::onix.main/>

@if (!empty($page))
    <script>
        setTimeout(() => {
            // Get the php data from the blade template
            window.loadEditorData('page', "{{ $page->slug }}");
        }, 1000);
    </script>
@endif
