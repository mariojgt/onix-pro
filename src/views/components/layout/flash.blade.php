@if ($message = Session::get('success'))
    @push('js')
        <script>
            setTimeout(() => {
                window.Swal.fire({
                    icon: 'success',
                    title: '{{ $message }}',
                    showConfirmButton: false,
                    timer: 1500
                });
            }, 500);
        </script>
    @endpush
@endif
@if ($message = Session::get('error'))
    @push('js')
        <script>
            setTimeout(() => {
                window.Swal.fire({
                    icon: 'error',
                    title: '{{ $message }}',
                    showConfirmButton: false,
                    timer: 1500
                });
            }, 500);
        </script>
    @endpush
@endif

@if ($message = Session::get('info'))
    @push('js')
        <script>
           setTimeout(() => {
                window.Swal.fire({
                    icon: 'info',
                    title: '{{ $message }}',
                    showConfirmButton: false,
                    timer: 1500
                });
            }, 500);
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
                setTimeout(() => {
                    window.Swal.fire({
                        icon: 'error',
                        title: '{{ $error }}',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }, 500);
            </script>
        @endpush
    @endforeach
@endif
