@extends('layouts.app')
@section('content')
<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 text-center mb-5">
        <h2 class="heading-section">Online Store</h2>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="wrapper img" style="background-image: url({{asset('frontend/images/shopping _cart.jpg')}});">
          <div class="row">
            <div class="col-md-9 col-lg-7">
              <div class="contact-wrap w-100 p-md-5 p-4">
                <h3 class="mb-4">Add Order</h3>
                <div id="form-message-warning" class="mb-4"></div> 
                <div id="form-message-success" class="mb-4">
                  Order Submitted, thank you!
                </div>
                <form method = "POST"  action="" id="contactForm" name="contactForm" class="contactForm">
                  @csrf
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="label" for="name">Mobile Number</label>
                        <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile">
                        <small id="mobile_error" class="form-text text-danger"></small> 
                      </div>
                    </div>
                    <div class="col-md-6"> 
                      <div class="form-group">
                        <label class="label" for="name">Select Product</label>
                        <select name="products">
                          @foreach($shopProducts as $product)
                            <option type="checkbox" value="{{$product}}">{{$product->name}}</option>
                          @endforeach
                        </select>
                        <small id="products_error" class="form-text text-danger"></small> 
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <input id="save_order" value="Submit Order" class="btn btn-primary">
                        <div class="submitting"></div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@section('scripts')
  <script>
    $(document).on('click', '#save_order', function(e){
      e.preventDefault();
      $.ajax({
        type:'post',
        url:"{{ url('save/order/'.$shop_id) }}",
        data: {
          '_token': "{{csrf_token()}}", 
          'mobile': $("input[name='mobile']").val(),
          'products': $("select[name='products']").val(),
        },
        success: function(data) {
          if(data.status == true) {
            $('#form-message-success').show();
          }
        },
        error: function(reject) {
          var response = $.parseJson(reject.responseText);
          $.each(response.errors, function(key, value){
            $("#"+ key +  "_error").text(value[0]);
          });
        }
      });
    });
  </script>
@endsection