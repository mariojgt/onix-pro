@if ($message = Session::get('success'))
    @push('js')
        <script>
            Toast.fire({
            icon: 'success',
            title: '{{ $message }}'
            });
        </script>
    @endpush
@endif

@if ($message = Session::get('error'))
    @push('js')
        <script>
            Toast.fire({
            icon: 'error',
            title: '{{ $message }}'
            });
        </script>
    @endpush
@endif

@if ($message = Session::get('info'))
    @push('js')
        <script>
            Toast.fire({
            icon: 'info',
            title: '{{ $message }}'
            });
        </script>
    @endpush
@endif

{{-- general message --}}
@if ($errors->any())
    @php
        $count= 0;
    @endphp
    @foreach ($errors->all() as $error)
        @push('js')
            <script>
                Toastify({
                text: ` <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon w-5 h-5 mx-2">
                    <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                </svg> {{ $error }}`,
                duration: 30000,
                close: true,
                gravity: "top",
                position: "center", // `left`, `center` or `right`
                className: "flex font-medium py-5 px-2 rounded-md text-white",
                escapeMarkup : false,
                }).showToast();
            </script>
        @endpush
    @endforeach
@endif
