@php
	$business = business_info();
    $pages = other_pages();

    $wishlist_count = 0;

    if(Auth::check()) {
        $wishlists = App\Models\Wishlist::where('customer_id', Auth::id())->count('id');
        $wishlist_count = $wishlists;
    }
@endphp
<!doctype html>
<html lang="{{ session()->get('locale') == 'bn' ? 'bn' : 'en' }}">
<head>
    @include('googletagmanager::head')
    <meta charset="utf-8">
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1'/>
    <title>@yield('title') | {{optional($business)->name}}</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
    <meta name="description" content="@yield('description')">
    <link rel="canonical" href="{{Request::url()}}" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="fashion-ecommerce" />
    <meta property="og:title" content="@yield('title') | {{optional($business)->name}}" />
    <meta property="og:description" content="@yield('description')" />
    <meta property="og:url" content="{{Request::url()}}" />
    <meta property="og:site_name" content="{{optional($business)->name}}" />
    <meta property="article:publisher" content="{{optional($business)->facebook}}">
    <meta property="article:modified_time" content="{{Carbon\Carbon::now()}}">
    <meta property="og:image" content="@yield('og_image')">
    <meta property="og:image:width" content="500">
    <meta property="og:image:height" content="500">
    <meta property="og:image:type" content="image/jpeg">

    <meta name="keywords" content="@yield('keywords')">
    <meta name="author" content="{{optional($business)->name}}">
    <meta name="Classification" content="Business">
    <meta name="coverage" content="Worldwide">
    <meta name="distribution" content="Global">
    <meta name="fb:page_id" content="{{optional($business)->facebook}}">
    <meta property="og:site_name" content="{{optional($business)->name}}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta content="yes" name="apple-touch-fullscreen">
    <meta name="apple-mobile-web-app-status-bar-style" content="#b41f23">

    <!-- Twitter -->
    <meta name="twitter:title" content="@yield('title') | {{optional($business)->name}}">
    <meta name="twitter:description" content="@yield('description')">
    <meta name="twitter:image" content="@yield('og_image')">
    <meta name="twitter:site" content="{{optional($business)->name}}">
    <meta name="twitter:creator" content="{{optional($business)->name}}">
    <meta name="twitter:label1" content="Est. reading time">
    <meta name="twitter:data1" content="1 minutes"/>

    <meta name="csrf-token" content="{{csrf_token()}}">



  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/website/'.optional($business)->favicon) }}">
    
   <!-- ======= All CSS Plugins here ======== -->
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/swiper-bundle.min.css')}}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/glightbox.min.css')}}">
  
    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    
  <!-- Plugin css -->
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/bootstrap.min.css')}}">

  <!-- Custom Style CSS -->
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/toastify.min.css') }}">
  {{-- font-awesome --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  {!! optional($business)->google_tag_manager_head !!}

  <!-- Start style -->
  @include('user.partials.style')
  <!-- End style -->
</head>

<body>
    @include('googletagmanager::body')
    {!! optional($business)->google_tag_manager_body !!}
    <!-- Start header area -->
    @include('user.partials.header')
    <!-- End header area -->

    <main class="main__content_wrapper">
        <!-- Body Content Start-->
        @yield('content')

    </main>

    <!-- Start footer area -->
    @include('user.partials.footer')
    <!-- End footer area -->

  <!-- Scroll top bar -->
  {{--
  <a id="scroll__top" class="active whatsapp" href="tel:{{optional($business)->phone}}"><i class="fa fa-phone custom_phone text-right" style="" aria-hidden="true"></i></a> 
  --}}
    

  <!-- All Script JS Plugins here  -->
  <script src="{{ asset('frontend/assets/js/vendor/popper.js')}}" defer="defer"></script>
  <script src="{{ asset('frontend/assets/js/plugins/swiper-bundle.min.js')}}"></script>
  <script src="{{ asset('frontend/assets/js/vendor/bootstrap.min.js')}}" defer="defer"></script>
  <script src="{{ asset('frontend/assets/js/plugins/glightbox.min.js')}}"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- Customscript js -->
  <script src="{{ asset('frontend/assets/js/script.js')}}"></script>
  <script src="{{ asset('js/toastify-js.js') }}"></script>
  
  <script>    

    $(document).ready(function(){
        cart_load();
        var url = "{{ route('changeLang') }}";
        $(".changeLang").change(function(){
            window.location.href = url + "?lang="+ $(lang).val();
        });
    
    });

    @if(session('success'))
        Toastify({
            text: "{{ session('success') }}",
            backgroundColor: "linear-gradient(to right, #269E70, #00BFA6)",
            className: "success",
        }).showToast();
    @endif

    @if(session('error'))
        Toastify({
            text: "{{ session('error') }}",
            backgroundColor: "linear-gradient(to right, #EE2761, #FFA300)",
            className: "error",
        }).showToast();
    @endif

    //function for increase and decrease qty
    function quantity_change(type, product_id) {
        if(product_id != null) {
            let current_qty = $('.quantity__number_'+product_id).val();
            if(current_qty === '') {
                current_qty = 0;
            }
            let max_qty = $('#stock_qty_'+product_id).val();
            
            if(type == 'de' && current_qty > 1) {
                $('.quantity__number_'+product_id).val((current_qty - 1));
            }
            else if(type == 'in') {
                if(parseInt(max_qty) > parseInt(current_qty)) {
                    $('.quantity__number_'+product_id).val((parseInt(current_qty) + 1));
                }
                else {
                    error("Stock quantity over.")
                }
            }
        }
    }

    //add to cart
    function addToCart(product_id, type, page) { 
        open_cart();
      url = "{{ route('cart.add') }}";
      
      if(type === 'details') {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: url,
            type: "POST",
            data: $('#add_to_server'+product_id).serialize(),
            success:function(response){
                if(response.status == 'yes') {
                    cart_load();
                    success(response.reason);
                    open_cart();
                    if(page == 'checkout') {
                        window.location.href = '{{route('checkout')}}';
                    }
                }
                else {
                    error(response.reason);
                }
            }
        });
      }
      else {
        $.ajax({
            url: url,
            type: "POST",
            data:{
                product_id:product_id,_token: '{{csrf_token()}}',
            },
            success:function(response){
                if(response.status == 'yes') {
                    cart_load();
                    if(page == 'cart') {
                        open_cart();
                    }
                    if(page == 'checkout') {
                        window.location.href = '{{route('checkout')}}';
                    }
                    success(response.reason);
                }
                else {
                    error(response.reason);
                }
            }
        });

      }
      
    }

    function open_cart() {
        var btn = document.querySelector(".minicart__open--btn");
            if (btn) {
                btn.click();
            }
    }

    function cart_load() {
        $.ajax({
            url: "{{route('ajax.load.cart.data')}}",
            type: "get",
            data:{},
            success:function(response){
                $('#side_cart_info').html(response.cart_sidebar);
                $('#cart_count_1').text(response.cart_count);
                $('#cart_count_2').text(response.cart_count);
                $('#cart_count_3').text(response.cart_count);
                 //console.log(response);
            }
        });
    }

    function product_buy_now(pruduct_id) {
        $.ajax({
            type: 'get',
            url: '{{route('product.quick.view')}}',
            data: {
                'pruduct_id': pruduct_id,
            },
            beforeSend: function() {
                $('#quick_view_inner').html('<div class="col-md-12 p-10"><h2>Loading...</h2>');
            },
            success: function (data) {
                $('#quick_view_inner').html(data);
            }
        });
    }

    function quick_view(pruduct_id) {
        $.ajax({
            type: 'get',
            url: '{{route('product.quick.view')}}',
            data: {
                'pruduct_id': pruduct_id,
            },
            beforeSend: function() {
                $('#quick_view_inner').html('<div class="col-md-12 p-10"><h2>Loading...</h2>');
            },
            success: function (data) {
                $('#quick_view_inner').html(data);
            }
        });
    }

    function addToWishlist(product_id) {
      //alert(product_id);
      url = "{{ route('wishlist.add') }}";
      var product_id = product_id;
      $.ajax({
          url: url,
          type: "POST",
          data:{
              product_id:product_id,_token: '{{csrf_token()}}',
          },
          success:function(response){
            // toastr.options = {
            //   "positionClass": "toast-top-right"
            // }
            if (response.auth == 1) {
              if(response.status == 0){
                error("Something went wrong!");
              }
              if (response.status == 1) {
                success('Product Added into Wishlist!')
                toastr.success('Product Added into Wishlist!');
              }
              if(response.status == 2){
                error('Product already in  your wishlist!');
              }
            }
            else{
              error('You are not logged in!');
            }
          }
      });
    }

    function search_product(type) {
        //console.log(type);
        
        if(type == 'd2') {
            var input = $('#d2_product_search').val();
            var category_id = 'all';
        }
        else {
            var input = $('#d1_product_search').val();
            var category_id = $('#d1_product_search_category').val();
        }
        if(category_id==''){
            $('#search_product_output_d1_main').hide();
        }
        

        $.ajax({
            type : 'get',
            url: '{{route('ajax.product.search')}}',
            data:{
                'input': input,
                'category_id': category_id,
            },
            beforeSend: function() {
                if(type == 'd2') {
                    $('#search_product_output_d2').html('<div class="text-center col-md-12 p-4">Searching.....</div>');
                }
                else {
                    $('#search_product_output_d1_main').show();
                    $('#search_product_output_d1').html('<div class="text-center col-md-12 p-4">Searching.....</div>');
                }
            },
            success:function(data){
                if(type == 'd2') {
                    $('#search_product_output_d2').html(data);
                }
                else {
                    if(data){
                        $('#search_product_output_d1_main').show();
                    }else{
                        $('#search_product_output_d1_main').hide();
                    }
                    $('#search_product_output_d1').html(data);
                }
            }
        });
        $('#search_product_output_d1_main').hide();
    }

    function change_cart_qty(up_or_down, row_id, page) {
        $.ajax({
            type : 'get',
            url: '{{route('ajax.cart.qty.update')}}',
            data:{
                'up_or_down': up_or_down,
                'row_id': row_id,
                'page':page,
            },
            beforeSend: function() {
                if(page == 'cart_page') {
                    
                }
                else if(page == 'side_cart') {
                    //$('#side_cart_info').html('');
                }
            },
            success:function(data){
                if(data.status == 'yes') { success(data.reason); }
                else{ error(data.reason); }

                if(page == 'cart_page') {
                    $('.cart_page_qty_'+row_id).val(data.cart_qty);
                }
                else if(page == 'side_cart') {
                    var currency = "{{ __currency() }}"
                   $('.side_cart_qty_'+row_id).val(data.cart_qty);
                   $('#side_cart_subtotal').text(currency+data.cart_subtotal);
                }
            }
        });
    }

    function featured_products(){
        $.ajax({
            url: "{{route('ajax.featured.products')}}",
            type: "get",
            data:{},
            beforeSend: function() {
                $('#featured_products_Stop').html('<div class="col-md-12 mb-5 p-10 text-center"><h2>Loading...</h2>');
            },
            success:function(response){
                $('#featured_products').html(response);
            },
            error: function(xhr, status, error) {
                $('#featured_products').html('');
            }
        });
    }

    function trending_now(){
        $.ajax({
            url: "{{route('ajax.trending.now')}}",
            type: "get",
            data:{},
            beforeSend: function() {
                $('#trending_now_Stop').html('<div class="col-md-12 mb-5 p-10 text-center"><h2>Loading...</h2>');
            },
            success:function(response){
                $('#trending_now').html(response);
            },
            error: function(xhr, status, error) {
                $('#trending_now').html('');
            }
        });
    }

    function category_wise_product(){
        $.ajax({
            url: "{{route('ajax.category_wise_product')}}",
            type: "get",
            data:{},
            beforeSend: function() {
                $('#category_wise_product_Stop').html('<div class="col-md-12 mb-5 p-10 text-center"><h2>{{ __('messages.Category Wise Product') }}</h2>');
            },
            success:function(response){
                $('#category_wise_product').html(response);
            },
            error: function(xhr, status, error) {
                $('#category_wise_product').html('');
            }
        });
    }

    function best_selling_products() {
        $.ajax({
            url: "{{route('ajax.best.selling.products')}}",
            type: "get",
            data:{},
            beforeSend: function() {
                $('#best_selling_products_Stop').html('<div class="col-md-12 mb-5 p-10 text-center"><h2>Loading...</h2>');
            },
            success:function(response){
                $('#best_selling_products').html(response);
            },
            error: function(xhr, status, error) {
                $('#best_selling_products').html('');
            }
        });
    }

    function flash_sale_offer() {
        $.ajax({
            url: "{{route('ajax.flash.sale.offer')}}",
            type: "get",
            data:{},
            beforeSend: function() {
                $('#flash_sale_offer_Stop').html('<div class="col-md-12 mb-5 p-10 text-center"><h2>Loading...</h2>');
            },
            success:function(response){
                $('#flash_sale_offer').html(response);
            },
            error: function(xhr, status, error) {
                $('#flash_sale_offer').html('');
            }
        });
    }

    function error(info) {
        Toastify({
            text: info,
            backgroundColor: "linear-gradient(to right, #6E32CF, #FFA300)",
            className: "error",
            close: true,
        }).showToast();
    }

    function success(info) {
        Toastify({
            text: info,
            backgroundColor: "linear-gradient(to right, #269E70, #00BFA6)",
            className: "success",
            close: true,
        }).showToast();
    }

  </script>

  {{-- @include('user.partials.script') --}}
@yield('scripts')
</body>

</html>
