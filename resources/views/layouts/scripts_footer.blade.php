<script src="{{ asset('frontend/js/custom.js') }}"></script>

@if($g_setting->layout_direction == 'Left to Right')
<script src="{{ asset('frontend/js/ltr.js') }}"></script>
@endif

@if($g_setting->layout_direction == 'Right to Left')
<script src="{{ asset('frontend/js/rtl.js') }}"></script>
@endif

<script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "20000",
        "hideDuration": "20000",
        "timeOut": "20000",
        "extendedTimeOut": "20000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>

@if ($errors->any())
    @php $err = '';  @endphp
    @foreach ($errors->all() as $error)
        <script>
            toastr.error('{{ $error }}');
        </script>
    @endforeach
@endif

@if(session()->get('error'))
    <script>
        toastr.error('{{ session()->get('error') }}');
    </script>
@endif

@if(session()->get('success'))
    <script>
        toastr.success('{{ session()->get('success') }}');
    </script>
@endif