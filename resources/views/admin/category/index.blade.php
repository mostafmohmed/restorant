
@extends('admin.layout.master')
@section('nav')
<nav
class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
id="layout-navbar"
>
<div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
  <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
    <i class="bx bx-menu bx-sm"></i>
  </a>
</div>

<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
  <!-- Search -->
  <div class="navbar-nav align-items-center">
    <div class="nav-item d-flex align-items-center">
      <i class="bx bx-search fs-4 lh-0"></i>
      <input
        type="text"
        class="form-control border-0 shadow-none"
        placeholder="Search..."
        aria-label="Search..."
      />
    </div>
  </div>
  <!-- /Search -->

  <ul class="navbar-nav flex-row align-items-center ms-auto">
    <!-- Place this tag where you want the button to render. -->
    <li class="nav-item lh-1 me-3">
      <a
        class="github-button"
        href="https://github.com/themeselection/sneat-html-admin-template-free"
        data-icon="octicon-star"
        data-size="large"
        data-show-count="true"
        aria-label="Star themeselection/sneat-html-admin-template-free on GitHub"
        >Star</a
      >
    </li>

    <!-- User -->
    <li class="nav-item navbar-dropdown dropdown-user dropdown">
      <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
        <div class="avatar avatar-online">
          <img src="{{ asset('asset-admin') }}/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
        </div>
      </a>
      <ul class="dropdown-menu dropdown-menu-end">
        <li>
          <a class="dropdown-item" href="#">
            <div class="d-flex">
              <div class="flex-shrink-0 me-3">
                <div class="avatar avatar-online">
                  <img src="{{ asset('asset-admin') }}/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                </div>
              </div>
              <div class="flex-grow-1">
                <span class="fw-semibold d-block"> {{    Auth::guard('admin')->user()->name??null }}</span>
                <small class="text-muted">Admin</small>
              </div>
            </div>
          </a>
        </li>
        <li>
          <div class="dropdown-divider"></div>
        </li>
        <li>
          <a class="dropdown-item" href="#">
            <i class="bx bx-user me-2"></i>
            <span class="align-middle">My Profile</span>
          </a>
        </li>
        <li>
          <a class="dropdown-item" href="#">
            <i class="bx bx-cog me-2"></i>
            <span class="align-middle">Settings</span>
          </a>
        </li>
        <li>
          <a class="dropdown-item" href="#">
            <span class="d-flex align-items-center align-middle">
              <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
              <span class="flex-grow-1 align-middle">Billing</span>
              <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
            </span>
          </a>
        </li>
        <li>
          <div class="dropdown-divider"></div>
        </li>
        <li>
            <form action="{{ route('admin.logout') }}"  method="POST" >
                @csrf

          <a class="dropdown-item" href="javascript:{}" onclick="this.closest('form').submit();return false;">
            <i class="bx bx-power-off me-2"></i>
           
          <span class="alin-middle" >  Log Out </span> 
            
          </a>
        </form>
        </li>
      </ul>
    </li>
    <!--/ User -->
  </ul>
</div>
</nav>
@endsection
@section('Content')
<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete Student Data</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <h4>Confirm to Delete Data ?</h4>
              <input type="hidden" id="deleteing_id">
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary delete_catagory">Yes Delete</button>
          </div>
      </div>
  </div>
</div>
{{-- <div class="py-12">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="flex justify-end m-2 p-2">
          <a href="{{ route('admin.category.create') }}"
              class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">New Category</a>
      </div>
      <div class="flex flex-col">
          <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                  <div class="overflow-hidden shadow-md sm:rounded-lg">
                      <table class="min-w-full">
                          <thead class="bg-gray-50 dark:bg-gray-700">
                              <tr>
                                  <th scope="col"
                                      class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                      Name
                                  </th>
                                  <th scope="col"
                                      class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                      Image
                                  </th>
                                  <th scope="col"
                                      class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                      Description
                                  </th>
                                  <th scope="col" class="relative py-3 px-6">
                                      <span class="sr-only">Edit</span>
                                  </th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($categories as $category)
                                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                      <td
                                          class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                          {{ $category->name }}
                                      </td>
                                      <td
                                          class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                          <img src=""
                                              class="w-16 h-16 rounded">
                                      </td>
                                      <td
                                          class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                          {{ $category->description }}
                                      </td>
                                      <td
                                          class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                          <div class="flex space-x-2">
                                              <a href="{{ route('admin.category.edit', $category->id) }}"
                                                  class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg  text-white">Edit</a>
                                              <form
                                                  class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white"
                                                  method="POST"
                                                  action="{{ route('admin.category.destroy', $category->id) }}"
                                                  onsubmit="return confirm('Are you sure?');">
                                                  @csrf
                                                  @method('DELETE')
                                                  <button type="submit">Delete</button>
                                              </form>
                                          </div>
                                      </td>
                                  </tr>
                              @endforeach

                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>

  </div>

</div> --}}
<div class="alert alert-success" id="success_msg" style="display: none;">
  تم الحفظ بنجاح
</div>
<button  data-bs-toggle="modal"  data-bs-target="#CreateModal"   class="btn btn-primary m-1" style="width: 100%" >save</button>
<table class="table">
  <thead>
  <tr>
      <th scope="col">#</th>
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">description</th>
    

      <th scope="col"></th>
  </tr>
  </thead>
  <tbody>



 

  </tbody>



</table>





<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit & Update Student Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <ul id="update_msgList"></ul>
                <meta name="csrf-token" content="{{ csrf_token() }}" />
                <input type="hidden" id="stud_id" />

                <div class="form-group mb-3">
                    <label for="">Full Name</label>
                    <input type="text" id="name" required class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">descreption</label>
                    <input type="text" id="descreption" required class="form-control">
                </div>
                {{-- <div class="form-group mb-3">
                    <label for="">Email</label>
                    <input type="text" id="email" required class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Phone No</label>
                    <input type="text" id="phone" required class="form-control">
                </div> --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary update_student">Update</button>
            </div>

        </div>
    </div>
</div>























<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <form     id="update-catagory"  action="" enctype="multipart/form-data"  >
        @csrf




       
         
         
         
      


        <
        <ul class="d-none"  id="saveerrors" ></ul>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <input type="hi">
           <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel1">update</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col mb-3">
                <label for="nameBasic" class="form-label">Name</label>
                <input type="text" id="name"  name="name"  class="form-control" placeholder="Enter Name" />
                {{-- @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror --}}
              </div>

              <div class="col mb-3">
                <label for="nameBasic" class="form-label">id</label>
                <input type="text" id="id"  name="id"  class="form-control" placeholder="Enter Name" />
                {{-- @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror --}}
              </div>

              <div class="col mb-3">
                <label for="nameBasic" class="form-label">image</label>
                <input type="file" id="image"  class="form-control" name="image">
                {{-- <img  style="width: 90px; height: 90px;" id="image" src=""> --}}
                {{-- @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror --}}
              </div>



              <div class="col mb-0">
                <label for="emailBasic" class="form-label">id</label>
                <input type="hidden" name='id'  id='id' class="form-control" placeholder="xxxx@xxx.xx" />
                  {{-- @error('descreption')
                <span class="text-danger">{{ $message }}</span>
            @enderror --}}
              </div>

            </div>
            <div class="row g-2">
              <div class="col mb-0">
                <label for="emailBasic" class="form-label">count</label>
                <input type="text" name='descreption'  id='descreption' class="form-control" placeholder="xxxx@xxx.xx" />
                  {{-- @error('descreption')
                <span class="text-danger">{{ $message }}</span>
            @enderror --}}
              </div>
             
             
            </div>
          </div>
          <div class="modal-footer">
            <button   type="submit"  id="update_Catagory"   class="btn btn-outline-secondary" data-bs-dismiss="modal">
              Close
            </button>
            {{-- <button type="submit"  class="btn btn-primary">
              
            @livewire('admin.loaging', ['buttunName' =>'update'])
            </button> --}}
          </div>
        </div>
      </form>
   
  </div>
</div>




<div class="modal fade" id="CreateModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    
      <form     id="catagoryForm"  action="" enctype="multipart/form-data"  >
        @csrf




       
         
         
         
      


        <
          <meta name="csrf-token" content="{{ csrf_token() }}" />
        <input type="hi">
           <div class="modal-content">
            <ul class="d-none"  id="saveerrors" ></ul>
          <div class="modal-header">
            <ul class=" alert alert-warning  d-none"  id="saveerrors" >  </ul>
            {{-- <h5 class="modal-title" id="exampleModalLabel1">counter title</h5> --}}
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col mb-3">
                <label for="nameBasic" class="form-label">Name</label>
                <input type="text" id="name"  name="name"  class="form-control" placeholder="Enter Name" />
                {{-- @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror --}}
              </div>

              <div class="col mb-3">
                <label for="nameBasic" class="form-label">image</label>
                <input type="file" id="image"  class="form-control" name="image">
                {{-- <img  style="width: 90px; height: 90px;" id="image" src=""> --}}
                {{-- @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror --}}
              </div>



              <div class="col mb-0">
                <label for="emailBasic" class="form-label">id</label>
                <input type="hidden" name='id'  id='id' class="form-control" placeholder="xxxx@xxx.xx" />
                  {{-- @error('descreption')
                <span class="text-danger">{{ $message }}</span>
            @enderror --}}
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">{{__('messages.Offer Price')}}</label>
                <select name="menues[]" id="menues[]">
                    @foreach ( App\Models\Menue::all() as $item)
              <option value="{{  $item->id }}">{{  $item->name }}</option>
              @endforeach
                </select>
                
                <small id="descreption" class="form-text text-danger"></small>
            </div>

            </div>
            <div class="row g-2">
              <div class="col mb-0">
                <label for="emailBasic" class="form-label">descreption</label>
                <input type="text" name='descreption'  id='descreption' class="form-control" placeholder="xxxx@xxx.xx" />
                  {{-- @error('descreption')
                <span class="text-danger">{{ $message }}</span>
            @enderror --}}
              </div>
             
             
            </div>
          </div>
          <div class="modal-footer">
            <button  type="submit"   class="btn btn-outline-secondary" data-bs-dismiss="modal">
              create
            </button>
            {{-- <button type="submit"  class="btn btn-primary">
              
            @livewire('admin.loaging', ['buttunName' =>'update'])
            </button> --}}
          </div>
        </div>
      </form>
   
  </div>
</div>
@endsection
@section('scriptt')
    <script>
      $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
       fetchc();
      function fetchc(){
        $.ajax({
                type: 'GET',
                 url:"{{ route('admin.f')  }}",
              
                success: function (response) {
//  console.log(response.catagory);
$('tbody').html();
// console.log(response.catagory);
$.each(response.catagory,function(i,v){
  // console.log(v);
$('tbody').append('<tr>\
    <th scope="row">'+v.id+'</th>\
    <td>'+v.name+'</td>\
    <td> '+v.description+' </td>\
    <td>\
 <button type="button"  value="'+v.id+'" class="btn btn-success edite update-catagory"    >edite </button>\
 <td><button type="button" value="' +v.id + '" class="btn btn-danger deletebtn btn-sm">Delete</button></td>\
        {{--  data-bs-toggle="modal"  data-bs-target="#editModal" <a href=""   class= "delete_btn btn btn-danger"> </a> --}}\
    </td>\
</tr>');


                 });

                    // if(response.catagory == true){
                    //     $('#success_msg').show();
                    // }
                   
                }
            });
        }
      

        // $(document).on('click', '.delete_btn', function (e) {
        //     e.preventDefault();

        //       var category_id =  $(this).attr('category_id');

        //     $.ajax({
        //         type: 'post',
        //          url: "",
        //         data: {
        //             '_token': "{{csrf_token()}}",
        //             'id' :category_id
        //         },
        //         success: function (data) {

        //             if(data.status == true){
        //                 $('#success_msg').show();
        //             }
        //             $('.offerRow'+data.id).remove();
        //         }, error: function (reject) {

        //         }
        //     });
        // });

// $(".edite").click(function(){
 
//   var route =  $(this).attr("route");
  

//   $.ajax({
   
//     type:"GET",
//     url:route,
//     contentType: false,
//                         cache: false,
//                         processData: false,
//     // enctype="multipart/form-data"  ,
          
//               success: function (data) {
//                 $("#name").val(data.name)
//                 $("#descreption").val(data.descreption)
//                 $("#id").val(data.id)
//                 // $("#image").val(data.image)
//                 // $('#image').attr('src', data.image).show();
// //             if(data.status == true){
// //                 $('#success_msg').show();
// //             }
// //             $('.offerRow'+data.id).remove();
// //         }
//               }
//   })

// //   var route =  $(this).attr('route');

// //   $.ajax({
// //   type: 'GET',
// //                  url:route ,
             
// //               success: function (data) {
// // console.log($data);
// // //             if(data.status == true){
// // //                 $('#success_msg').show();
// // //             }
// // //             $('.offerRow'+data.id).remove();
// // //         }
// //               }
// //   })
// })
      
        $(document).on('click', '.edite', function (e) {
          
          e.preventDefault();

            
              var id =  $(this).val();







              
              // $("#editModal").model('show');
              
// alert(id);
$('#editModal').modal('show');

              $.ajax({
   
       type:"GET",
       url:"categorypost/"+id,
       
      
       // enctype="multipart/form-data"  ,
             
                 success: function (data) {
                   $("#name").val(data.catagory.name);
                   $("#descreption").val(data.catagory.descreption);
                   $("#id").val(data.catagory.id);
                  //  alert(catagory.name);
                  //  $("#id").val(data.id)
                  //  $("#image").val(data.image)
                   // $('#image').attr('src', data.image).show();
   //             if(data.status == true){
   //                 $('#success_msg').show();
   //             }
   //             $('.offerRow'+data.id).remove();
   //         }
                 }
     })




              // alert(id);
            // $.ajax({
            //   method: 'GET',
            //      url:route ,
            //   dataType:"JSON"
              
            //     success: function (data) {

            //         if(data.status == true){
            //             $('#success_msg').show();
            //         }
            //         $('.offerRow'+data.id).remove();
            //     }, error: function (reject) {

            //     }
            // });
        });

        $(document).on('click', '.update-catagory', function (e) {
            e.preventDefault();

            // var formData = new FormData($('#update-catagory')[0]);
            // var route =  $(this).attr("routte");



            $(this).text('Updating..');
            var id =  $("#id").val();
          

            var data = {
                'name': $('#name').val(),
                'descreption': $('#descreption').val(),
               
                
            }
          

            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });









              
           
            $.ajax({
                type: 'POST',
                // enctype: 'multipart/form-data',
                url:"catagoryupdate/"+id,
                 data:data,
                //  dataType: "json",
                // processData: false,
                // contentType: false,
                // cache: false,
                success: function (data) {

                    // if(data.status == true){
                    //     $('#success_msg').show();
                    // }
                    // fetchc();
                    // $("#"+id).html('')
                    // $("#"+id).html(data)
                    // $("#editModal").model('hide')


                 
                    if (data.status == 400) {

                     

                      $('#update_msgList').html("");
                        $('#update_msgList').addClass('alert alert-danger');
                        $.each(data.errors, function (key, err_value) {
                            $('#update_msgList').append('<li>' + err_value +
                                '</li>');
                        });
                        $('.update-catagory').text('Update');






                
// $('#saveerrors').html("");
// $('#saveerrors').removeClass("d-none");
//  $.each(data.errors,function(i,v){
// $('#saveerrors').append('<li>'+v+'</li>');
//  })
}else if(data.status == 200) {

 
// console.log("iiii");


  $('#update_msgList').html("");

$('#success_message').addClass('alert alert-success');
$('#success_message').text("sucess");
$('#editModal').find('input').val('');
$('.update-catagory').text('Update');
$('#editModal').modal('hide');


// $('#saveerrors').html("");
// $('#saveerrors').addClass("d-none");

// $('#catagoryForm').find('input').val('');

   fetchc();
 

}










                   
                 
                }, error: function (reject) {
                }
            });
        });


        $(document).on('submit', '#catagoryForm', function (e) {
      e.preventDefault();
      //CreateModal
      // $('#descreption').text('');
      // $('#name').text('');
    
      
      var formData = new FormData($('#catagoryForm')[0]);

      $.ajax({
          type: 'post',
          // enctype: 'multipart/form-data',
          url: "{{route('admin.category.store')}}",
          data: formData,
        
          processData: false,
          contentType: false,
          cache: false,
          success: function (response) {

              if (response.status == 400) {



                
                $('#saveerrors').html("");
                $('#saveerrors').removeClass("d-none");
                 $.each(response.errors,function(i,v){
$('#saveerrors').append('<li>'+v+'</li>');
                 })
              }else {
                
                $('#saveerrors').html("");
                $('#saveerrors').addClass("d-none");
                
                $('#catagoryForm').find('input').val('');
                
                   fetchc();
                 
              
              }


          }, error: function () {
              // var response = $.parseJSON(reject.responseText);
              // $.each(response.errors, function (key, val) {
              //     $("#" + key + "_error").text(val[0]);
              // });
          }
      });
  });
  $(document).on('click', '.deletebtn', function () {
            var stud_id = $(this).val();
            $('#DeleteModal').modal('show');
            $('#deleteing_id').val(stud_id);
        });

  $(document).on('click', '.delete_catagory', function (e) {
            e.preventDefault();

            $(this).text('Deleting..');
            var id = $('#deleteing_id').val();
// alert($id);
// console.log($id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "delete-catagory/"+ id,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 404) {
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('.delete_student').text('Yes Delete');
                    } else {
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('.delete_catagory').text('Yes Delete');
                        $('#DeleteModal').modal('hide');
                        fetchc();
                    }
                }
            });
        });

    // });

    </script>
@endsection
