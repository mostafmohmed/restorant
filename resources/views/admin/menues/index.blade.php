
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

{{-- @livewire('admin.create') --}}
<div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <form enctype="multipart/form-data" id="createmeanueform"  >
           <div class="modal-content">
          <div class="modal-header">
          
              <div class="me-5">  <ul class=" alert alert-warning  d-none"  id="saveerrors" >  </ul></div>
           
             <h5 class="modal-title" id="exampleModalLabel1">Modal title</h5>
           
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
                <meta name="csrf-token" content="{{ csrf_token() }}" />
                <label for="nameBasic" class="form-label">Name</label>
                <input type="text" name='name' id="name" class="form-control" placeholder="Enter Name" />
                @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
              </div>
            </div>
            <div class="row g-2">
              <div class="col mb-0">
                <label for="emailBasic" class="form-label">process</label>
                <input type="number" id="price"  name='price' class="form-control"  />
                  @error('price')
                <span class="text-danger">{{ $message }}</span>
            @enderror
              </div>
              <div class="col mb-0">
                  <label >image</label>
                  <label class="form-label">Image</label>
                  <input type="file" class="form-control" name='image' />

                  {{-- <input type="file"   wire:model="image"    />
                  <div wire:loading wire:target="image">Uploading...</div> --}}
                  {{-- @if ($image) 
                  <div class="my-4" >
                    <img src="" width="50" height="50" >
                  </div> --}}
                 
          
                    {{-- @error('price')
                  <span class="text-danger">{{ $message }}</span>
              @enderror --}}
                </div>
              {{-- <div class="col mb-0">
                <label for="dobBasic" class="form-label">DOB</label>
                <input type="text" id="dobBasic" class="form-control" placeholder="DD / MM / YY" />
              </div> --}}
              <div class="col mb-0">
                  <label for="emailBasic" class="form-label">descreption</label>
                  <input type="text" id="descreption"  name='descreption' class="form-control" placeholder="xxxx@xxx.xx" />
                    @error('descreption')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
                </div>


                <div class="col mb-0">
                  <label for="emailBasic" class="form-label">catagory</label>
                 <select multiple name="categories[]" id="categories[]">
                  @foreach ( App\Models\Category::all() as $item)
                  <option value="{{  $item->id }}">{{  $item->name }}</option>
                  @endforeach
                
                 </select>
                    @error('descreption')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
                </div>


            </div>
          </div>
          <div class="modal-footer">
            <button type="button"  class="btn btn-outline-secondary" data-bs-dismiss="modal">
              Close
            </button>
            <button  id="btn-add"   class="btn btn-primary">
              <span  >
                submit
              </span>
             
              
            </button>
          </div>
        </div>
      </form>
   
  </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <form  enctype="multipart/form-data" id="updatemeanueform" >
           <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel1">edite</h5>
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
                <input type="text" name="name" id="nameed" class="form-control"  />
                @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
              </div
              >
              <input type="hidden" name="id" id="ided" class="form-control"  />
              <div class="col mb-3">
                <label for="image" class="form-label">image</label>
                <input type="file" name='image' id="imageed" class="form-control"  />
                @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
              </div>
            </div>
            <div class="row g-2">
              <div class="col mb-0">
                <label for="emailBasic" class="form-label">descreption</label>
                <input type="text" id="descreptioned"  name='descreption' class="form-control" placeholder="xxxx@xxx.xx" />
                  @error('descreption')
                <span class="text-danger">{{ $message }}</span>
            @enderror
              </div>
              <div class="col mb-0">
                <label for="emailBasic" class="form-label">categories</label>
                <select name="categories" id="categories">
                  @foreach ( App\Models\Category::all() as $item)
                  <option value="{{  $item->id }}">{{  $item->name }}</option>
                  @endforeach
                </select>
                
              </div>

               <div class="col mb-0">
                <label for="emailBasic" class="form-label">price</label>
                <input type="text" id="priceed" name='price' class="form-control" placeholder="xxxx@xxx.xx" />
                  @error('price')
                <span class="text-danger">{{ $message }}</span>
            @enderror
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
              Close
            </button>
            <button type="button"  class="btn btn-primary update-catagory">
              submit
            {{-- @livewire('admin.loaging', ['buttunName' =>'update']) --}}
            </button>
          </div>
        </div>
      </form>
   
  </div>
</div>
{{-- @livewire('admin.update') --}}
{{-- @livewire('admin.delete') --}}
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <form wire:submit.prevent='submit'>
           <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel1">delet title</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
             Do you wont delet the item
            {{-- <div class="row">
              <div class="col mb-3">
                <label for="nameBasic" class="form-label">Name</label>
                <input type="text" wire:model='name' id="nameBasic" class="form-control" placeholder="Enter Name" />
                @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
              </div>
            </div> --}}
            {{-- <div class="row g-2">
              <div class="col mb-0">
                <label for="emailBasic" class="form-label">process</label>
                <input type="number" id="emailBasic"  wire:model='progress' class="form-control" placeholder="xxxx@xxx.xx" />
                  @error('progress')
                <span class="text-danger">{{ $message }}</span>
            @enderror
              </div>
              <div class="col mb-0">
                <label for="dobBasic" class="form-label">DOB</label>
                <input type="text" id="dobBasic" class="form-control" placeholder="DD / MM / YY" />
              </div>
            </div> --}}
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
              Close
            </button>
            <button type="button"  class="btn btn-primary" id="deleteing_id">submit</button>
          </div>
        </div>
      </form>
   
  </div>
</div>
<button
type="button"
class="btn btn-sm btn-primary mb-2 mx-2"
data-bs-toggle="modal"
data-bs-target="#createModal"
>
create-menue
</button>



<table class="table">
  <thead>
      <tr>
       
        <th width="45%">price</th>
        <th width="45%">description</th>
         
        
          <th width="45%">image</th>
          <th width="45%">name</th>
         
          <th>Actions</th>
      </tr>
  </thead>
  {{-- <thead>
      
  <tr>
     
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">description</th>
    

      <th scope="col"></th>
  </tr>
  </thead> --}}
  <tbody>
@if (count($menue) > 0)
@foreach ($menue as $item)
  <tr>
    {{-- <td>
          
      {{$item->catagory}}
  </td>   --}}
      <td>
          
          {{$item->price}}
      </td>
      <td>
          {{$item->descreption}}
      </td>
      <td>
         <img src="{{ asset('images/'.$item->image) }}"  style="  border: 1px solid #ddd;
         border-radius: 4px;
         padding: 5px;
         width: 150px; "  alt="">
      </td>
      <td>
          {{$item->name }}
      </td>
      <td>
          <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                  data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
              </button>
              <div class="dropdown-menu">
                   
                  <button type="button"  value="{{ $item->id }}" class="btn btn-success edite update-catagory"    >edite </button>
                  
                  <a href="{{ route('admin.menueshow',$item->id)}}" class="btn btn-success  update-catagory">show</a>
                  {{-- <button type="button"  value="{{ $item->id }}" class="btn btn-success show update-catagory"    >show </button> --}}
                  {{-- <a class="dropdown-item" href="#"
                      wire:click.prevent="$dispatch('serviceDelete', { id: {{ $item->id }} })">
                      <i class="bx bx-trash me-1"></i>
                      Delete
                  </a> --}}
                  <button type="button" value="{{ $item->id }}" class="btn btn-danger deletebtn btn-sm">Delete</button>
                  <a class="dropdown-item" href="#"
                      wire:click.prevent="$dispatch('skillShow', { id: {{ $item->id }} })">
                      <i class="bx bx-trash me-1"></i>
                      Show
                  </a>
              </div>
          </div>
      </td>
      {{-- <td>
          <button wire:click="editPost({{$item->id}})" class="btn btn-primary btn-sm">Edit</button>
          <button onclick="deletePost({{$item->id}})" class="btn btn-danger btn-sm">Delete</button>
      </td> --}}
  </tr>
@endforeach
@else
<tr>
  <td colspan="3" align="center">
      No Posts Found.
  </td>
</tr>
@endif
</tbody>



</table>




























@endsection

@section('scriptt')

<script>
      $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  $(document).on('click','#btn-add',function(e) {
  // var data = $("#articleform").serialize();
    //  var file=$("#file").val();
    e.preventDefault();
        var dataa= new FormData( $('#createmeanueform')[0]);
       //  console.log(dataa);
   
  $.ajax({
    processData: false,
contentType: false,
    data: dataa,
    type: "POST",
    url: "/admin/menuecreate",
    success: function(response){

      if(response.status==400){
 
 $('#saveerrors').html("");
               $('#saveerrors').removeClass("d-none");
                $.each(response.errors,function(i,v){
$('#saveerrors').append('<li>'+v+'</li>');
                })
}else{
 location.reload();
}
        // var dataResult = JSON.parse(dataResult);
        // if(dataResult.statusCode==200){
        // 	$('#addEmployeeModal').modal('hide');
          
                  //     location.reload();						
        // }
        // else if(dataResult.statusCode==201){
        //    alert(dataResult);
        // }
    }
  });
});



$(document).on('click', '.edite', function (e) {
          
          e.preventDefault();

            
              var id =  $(this).val();






              
              // $("#editModal").model('show');
              
// alert(id);
$('#editModal').modal('show');

              $.ajax({
   
       type:"GET",
       url:"/admin/menueedite"+id,
       
      
       // enctype="multipart/form-data"  ,
             
                 success: function (data) {
                  //console.log(data.menue.name);
                    $("#nameed").val(data.menue.name);
                    $("#descreptioned").val(data.menue.descreption);
                  // //  $("#image").val(data.image.id);
                  $("#priceed").val(data.menue.price);
                  $("#ided").val(data.menue.id);
                  // location.reload();
                  // $("#imageed").val(data.menue.image);
                  
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




        
        });



   
       






        $(document).on('click', '.update-catagory', function (e) {
            e.preventDefault();

            // var formData = new FormData($('#update-catagory')[0]);
            // var route =  $(this).attr("routte");



            // $(this).text('Updating..');
            var id =  $("#ided").val();
            var data= new FormData( $('#updatemeanueform')[0]);
        // var    dataimage=data['imageed'];

            // var data = {
            //     'name': $('#nameed').val(),
            //     'descreption': $('#descreptioned').val(),
            //    "image":dataimage,
            //     "price":$("#priceed").val(),
            //     "id":id
            // }
        
           
            $.ajax({
                type: 'POST',
                processData: false,
contentType: false,
                // enctype: 'multipart/form-data',
                url:"/admin/menueupdate",
                 data:data,
                //  dataType: "json",
                // processData: false,
                // contentType: false,
                // cache: false,
                success: function (data) {
               
                    
                    // fetchc();
                    // $("#"+id).html('')
                    // $("#"+id).html(data)
                     $("#editModal").model('hide')


                  

               









                   
                 
                }, error: function (reject) {
                }
            });
        });











        $(document).on('click', '.deletebtn', function () {
            var men_id = $(this).val();
            $('#DeleteModal').modal('show');
            $('#deleteing_id').val(men_id);
        });  

  $(document).on('click', '.delete_catagory', function (e) {
            e.preventDefault();

            $(this).text('Deleting..');
            var id = $('#deleteing_id').val();
// alert($id);
// console.log($id);
            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });

            $.ajax({
                type: "DELETE",
                url: "/admin/delete-menue"+ id,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    location.reload();
                 
                    // if (response.status == 404) {
                    //     $('#success_message').addClass('alert alert-success');
                    //     $('#success_message').text(response.message);
                    //     $('.delete_student').text('Yes Delete');
                    // } else {
                    //     $('#success_message').html("");
                    //     $('#success_message').addClass('alert alert-success');
                    //     $('#success_message').text(response.message);
                    //     $('.delete_catagory').text('Yes Delete');
                    //     $('#DeleteModal').modal('hide');
                        
                    // }
                }
            });
        });









</script>

@endsection