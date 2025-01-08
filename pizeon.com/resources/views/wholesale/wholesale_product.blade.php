
@extends('user.inc.master')
@section('title') {{ __('messages.Wholesale Products') }} @endsection
@section('description') {{ __('messages.Wholesale Products') }}  @endsection
@section('keywords') {{ __('messages.Wholesale Products') }}  @endsection
@section('content')
<style>
    /* Modal Styles */
    .custom-modal {
        display: none;
        position: fixed;
        z-index: 999;
        left: 0;
        width: 100%;
        height: 100%;
    }
    
    .custom-modal-content {
        top: -200px;
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 500px;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        text-align: center;
    }
    
</style>
    <!-- Start shop section -->
@if ($products->count()>0)
    <section class="product__section section--padding pt-5" style="padding-bottom: .3rem !important;">
        <div class="container-fluid">
            <div class="section__heading mb-2 border-bottom d-flex">
                <h2 class="section__heading-- style2 flex-grow-1">{{ __('messages.Wholesale Products') }} </h2>
            </div>
            <div class="product__section--inner">
                <div class="row row-cols-xxl-5 row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-1 mb--n30">
                    @foreach($products as $product)
                        @include('user.partials.product_wholesale')
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    
    <section class="m-5" style="float:center;">
        <ul class="pagination">
            {{ $products->links('pagination::bootstrap-4') }}
        </ul>
    </section>
    <!-- The Modal -->
<div class="custom-modal">
    <!-- Modal content -->
    <div class="custom-modal-content p-3" style="border-radius:10px;">
      {{-- Start --}}
      <div class="card" style="border-radius:10px;">
          <div class="card-header h4" style="border-radius:10px 10px 0px 0px;">
              Send a Message For Wholesale
          </div>
          <form action="{{route('wholesale.form.submit')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                      <input type="hidden" name="product_id" id="ProductID">
                      <div class="form-group mb-3 d-none">
                          <label for="Customer Name" class="text-start">Product Name: <span id="ProductTitle"></span> </label>
                      </div>
                      <div class="form-group">
                          <label for="Customer Name" class="text-start">Customer Name @required </label>   
                          <input type="text" name="customer_name" placeholder="Please provide your full name" 
                          class="account__login--input" required> 
                      </div>        
                      <div class="form-group">         
                          <label for="Phone Number" class="text-start"> Phone Number @required </label> 
                          <input type="text" name="phone" placeholder="Please provide your phone number"
                           class="account__login--input" required>
                      </div>
                      <div class="form-group">
                          <label for="Email" class="text-start">Email Address (Optional) </label> 
                          <input type="email" name="email"  placeholder="Please provide your email address" 
                          class="account__login--input">
                      </div>
                      <div class="form-group">
                          <label for="Note" class="text-start">Note (Optional)</label>
                          <textarea name="note" id="order_note"  placeholder="Please provide your note"
                          class="account__login--input" cols="30" rows="6"></textarea> 
                      </div>
              </div>
              <div class="card-footer">
                  <button type="button" class="btn btn-outline-danger btn-lg ps-5 pe-5 custom-close h4">
                      {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="9" x2="15" y2="15"></line><line x1="15" y1="9" x2="9" y2="15"></line></svg> --}}
                      Close
                  </button>
  
                  <button type="submit" class="btn btn-danger btn-lg ps-5 pe-5 text-right h4">
                      {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg> --}}
                      Submit 
                  </button>
  
              </div>
          </form>
      </div>
      {{-- End --}}
    </div>
</div>
@endif

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <!-- Modal -->
    <!-- End shop section -->

<script>
function getId(product_id){ $('#ProductID').val(product_id);} 
$(document).ready(function(){
    // Open Modal when Button is clicked
    $(".open-modal-btn").click(function(){
        $(".custom-modal").fadeIn();
    });

    // Close Modal when Close button or outside the modal is clicked
    $(".custom-close, .custom-modal").click(function(){
        $(".custom-modal").fadeOut();
    });

    // Prevent modal from closing when clicking inside the modal content
    $(".custom-modal-content").click(function(event){
        event.stopPropagation();
    });
});
</script>
@endsection



