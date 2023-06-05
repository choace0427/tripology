<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script src="{{ asset('frontend/js/wow.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.slicknav.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('frontend/js/superfish.js') }}"></script>
<script src="{{ asset('frontend/js/custom.js') }}"></script>
<script src="{{ asset('frontend/js/toastr.min.js') }}"></script>
<!--
@if($g_setting->layout_direction == 'Left to Right')
<script src="{{ asset('frontend/js/ltr.js') }}"></script>
@endif

@if($g_setting->layout_direction == 'Right to Left')
<script src="{{ asset('frontend/js/rtl.js') }}"></script>
@endif
-->
<script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "5000",
        "hideDuration": "5000",
        "timeOut": "10000",
        "extendedTimeOut": "5000",
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



<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>

<script>
    $('.runforthree').owlCarousel({
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

$('.runforfive').owlCarousel({
      rtl: false,
      loop: false,
      margin: 10,
      nav: false,
      dots: false,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 2
        },
        1000: {
          items: 5
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
 
<script>
      jQuery('#pills-tab li').on('click',function(){
        jQuery('#pills-tab li button').removeClass('bhan active');
        jQuery(this).find('button').addClass('bhan active');
      });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
<script type="text/javascript">
  const path = "{{ route('autocomplete') }}";
  $('#search').typeahead({
    source: function (query, process) {
      return $.get(path, {
        query: query
      }, function (data) {
        return process(data);
      });
    }
  });
</script>