@extends('admin.layout.master')
@section('Content')

<div class="container">

    <div class="alert alert-success" id="success_msg" style="display: none;">
        تم الحفظ بنجاح
    </div>

    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                {{__('messages.Add your offer')}}

            </div>
            '
            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif

            <br>
            <form id="offerForm"  class="col-lg-6 offset-lg-3" action="" enctype="multipart/form-data">
                @csrf
                {{-- <input name="_token" value="{{csrf_token()}}"> --}}
                <div class=" ">

                <div class="form-group">
                    <label for="exampleInputEmail1">أختر صوره العرض</label>
                    <input type="file" id="file"  class="form-control" name="image">

                    <small id="photo_error" class="form-text text-danger"></small>
                </div>
            </div>

            


                <div class="form-group">
                    <label for="exampleInputEmail1">{{__('messages.Offer Name en')}}</label>
                    <input type="text" class="form-control me-1" name="name"
                           placeholder="{{__('messages.Offer Name')}}">
                    <small id="name" class="form-text text-danger"></small>
                </div>
               
                <div class="form-group">
                    <label for="exampleInputPassword1">{{__('messages.Offer Price')}}</label>
                    <input type="text" class="form-control me-1" name="descreption"
                           placeholder="{{__('messages.Offer Price')}}">
                    <small id="descreption" class="form-text text-danger"></small>
                </div>
              

                {{-- <div class="form-group">
                    <label for="exampleInputPassword1">{{__('messages.Offer details ar')}}</label>
                    <input type="text" class="form-control" name="details_ar"
                           placeholder="{{__('messages.Offer details')}}">
                    <small id="details_ar_error" class="form-text text-danger"></small>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">{{__('messages.Offer details en')}}</label>
                    <input type="text" class="form-control" name="details_en"
                           placeholder="{{__('messages.Offer details')}}">
                    <small id="details_en_error" class="form-text text-danger"></small>
                </div> --}}

                <button id="save_offer"  class="btn btn-primary m-1" style="width: 100%" >save</button>
            </form>


        </div>
    </div>
</div>

@section('scriptt')
<script>

  $(document).on('click', '#save_offer', function (e) {
      e.preventDefault();

      $('#descreption').text('');
      $('#name').text('');
    
      
      var formData = new FormData($('#offerForm')[0]);

      $.ajax({
          type: 'post',
          enctype: 'multipart/form-data',
          url: "{{route('admin.category.store')}}",
          data: formData,
        
          processData: false,
          contentType: false,
          cache: false,
          success: function (data) {

              if (data.status == true) {
                  $('#success_msg').show();
              }


          }, error: function (reject) {
              var response = $.parseJSON(reject.responseText);
              $.each(response.errors, function (key, val) {
                  $("#" + key + "_error").text(val[0]);
              });
          }
      });
  });


</script>
@endsection