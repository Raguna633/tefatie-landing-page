<script type="text/javascript">
    {{-- Success Message --}}
    @if (session()->has('success'))
    Swal.fire({
        icon: 'success',
        title: 'Done',
        text: '{{ session("success") }}',
        confirmButtonColor: "#3a57e8"
    });
    @endif

    {{-- Error Message --}}
    @if (session()->has('error'))
    Swal.fire({
        icon: 'error',
        title: 'Opps!!!',
        text: '{{ session("error") }}',
        confirmButtonColor: "#3a57e8"
    });
    @endif

    {{-- Validation Errors --}}
    @if ($errors->any())
    Swal.fire({
        icon: 'error',
        title: 'Opps!!!',
        text: '{{ $errors->first() }}',
        confirmButtonColor: "#3a57e8"
    });
    @endif
</script>
