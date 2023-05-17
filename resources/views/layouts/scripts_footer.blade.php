<!--script src="{{ asset('frontend/js/custom.js') }}"></script>

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
-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>

    <script>
    $('.runforthree').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
})

$('.runforfour').owlCarousel({
    rtl:true,
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:4
        }
    }
});

    // const recent_viewed = [1,3,4];
    // const all_packages = "<?php //echo $packages; ?>";

    // let recent_views = all_packages.filter(package =>  recent_viewed.map(recent => recent.id).includes(package.id));
    // const result = all_packages.filter(c => recent_viewed.some(s => s.id == c.id))
    // const recent_views = all_packages.filter(package => {recent_viewed.includes(package.id)});
    // console.log(typeof all_packages);
    // let  recent_views = all_packages.filter(function(package){
    //   console.log(package);
    // });
    // console.log(recent_views);
    // const result = cuisines.filter(c => selected.map(s => s.cuisine_id).includes(c.id))
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
 