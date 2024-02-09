
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

<div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
   
      <form enctype="multipart/form-data" id="createrevform"  >
           <div class="modal-content">
           
          <div class="modal-header">
            <div class="alert alert-danger print-error-msg" style="display:none"><ul></ul></div>
            {{-- <h5 class="modal-title" id="exampleModalLabel1">Modal title</h5> --}}
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
                <label for="nameBasic" class="form-label">first name</label>
                <input type="text" name='first_name' id="first_name" class="form-control" placeholder="Enter th first name" />
                @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
              </div>
              <div class="col mb-3">
              
                <label for="nameBasic" class="form-label">last name</label>
                <input type="text" name='last_name' id="last_name" class="form-control" placeholder="Enter th last name" />
                @error('last_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
              </div>
            </div>
            <div class="row g-2">
              <div class="col mb-0">
                <label for="emailBasic" class="form-label">Email</label>
                <input type="email" id="email"  name='email' class="form-control"  />
                  @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
              </div>
              
              <div class="col mb-0">
                  <label for="emailBasic" class="form-label">data</label>
                  <input type="datetime-local" id="res_data"  name='res_data' class="form-control" />
                    @error('res_data')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
                </div>
                <div class="col mb-0">
                  <label for="emailBasic" class="form-label">telephone</label>
                  <input type="text" id="tel_number"  name='tel_number' class="form-control" />
                    @error('tel_number')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
                </div>

                <div class="col mb-0">
                  <label for="emailBasic" class="form-label">guest</label>
                  <input type="number" id="guet_number"  name='guet_number' class="form-control" placeholder="xxxx@xxx.xx" />
                    @error('guet_number')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
                </div>


                <div class="col mb-0">
                  <label for="emailBasic" class="form-label">Table</label>
                 <select  name="table_id" id="table">
                  @foreach ( App\Models\Table::all() as $item)
                  <option value="{{  $item->id }}">{{  $item->name }}</option>
                  @endforeach
                
                 </select>
                    @error('table')
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
      <form  enctype="multipart/form-data" id="updaterevform" >
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
                <meta name="csrf-token" content="{{ csrf_token() }}" />
                <label for="nameBasic" class="form-label">first name</label>
                <input type="text" name='first_name' id="first_named" class="form-control" placeholder="Enter th first name" />
                @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
              </div>
              <div class="col mb-3">
              
                <label for="nameBasic" class="form-label">last name</label>
                <input type="text" name='last_name' id="last_named" class="form-control" placeholder="Enter th last name" />
                @error('last_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
              </div>
              <input type="hidden" name='id' id="idd"  >
            </div>
            <div class="row g-2">
              <div class="col mb-0">
                <label for="emailBasic" class="form-label">Email</label>
                <input type="email" id="emaild"  name='email' class="form-control"  />
                  @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
              </div>
              
              <div class="col mb-0">
                  <label for="emailBasic" class="form-label">data</label>
                  <input type="text" id="res_datad"  name='res_data' class="form-control" />
                    @error('res_data')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
                </div>
                <div class="col mb-0">
                  <label for="emailBasic" class="form-label">telephone</label>
                  <input type="text" id="tel_numberd"  name='tel_number' class="form-control" />
                    @error('tel_number')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
                </div>

                <div class="col mb-0">
                  <label for="emailBasic" class="form-label">guest</label>
                  <input type="number" id="guet_numberd"  name='guet_number' class="form-control" placeholder="xxxx@xxx.xx" />
                    @error('guet_number')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
                </div>


                <div class="col mb-0">
                  <label for="emailBasic" class="form-label">Table</label>
                 <select  name="table_id" id="tabled">
                  @foreach ( App\Models\Table::all() as $item)
                  <option value="{{ $item->id }}">{{  $item->name }}</option>
                  @endforeach
                
                 </select>
                    @error('table')
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
              update
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
        <th width="45%">first name</th>
        <th width="45%"> last name</th>
        <th width="45%"> email</th>
         
        
          <th width="45%">telephone number</th>
          <th width="45%">table</th>
          <th width="45%">guest number</th>
         
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
@if (count($rev) > 0)
@foreach ($rev as $item)
  <tr>
    {{-- <td>
          
      {{$item->catagory}}
  </td>   --}}
      <td>
          
          {{$item->first_name}}
      </td>
      <td>
          {{$item->last_name}}
      </td>
      <td>
        {{$item->email}}
    </td>
    <td>
      {{$item->tel_number}}
  </td>
  <td>
    {{$item->res_data}}
</td>
     
<td>
  {{$item->table->name??null}}
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
        var dataa= new FormData( $('#createrevform')[0]);
       //  console.log(dataa);
   
  $.ajax({
    processData: false,
contentType: false,
    data: dataa,
    type: "POST",
    url: "/admin/reservationscreate",
    success: function(data){
      location.reload();
      // if(data.status==400){
      //   $(".print-error-msg").find("ul").html('');$(".print-error-msg").css('display','block');$.each( msg, function( key, value ) {$(".print-error-msg").find("ul").append('<li>'+value+'</li>');});
      // }else{
      //   
      // }
   
     
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
       url:"/admin/reservationsedite"+id,
       
      
       // enctype="multipart/form-data"  ,
             
                 success: function (data) {
                  //console.log(data.menue.name);
                    $("#first_named").val(data.rev.first_name);
                    $("#last_named").val(data.rev.last_name);
                  // //  $("#image").val(data.image.id);
                  $("#emaild").val(data.rev.email);
                  $("#tel_numberd").val(data.rev.tel_number);
                  $("#res_datad").val(data.rev.res_data);
                  $("#idd").val(data.rev.id);
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
           
            var dataa= new FormData( $('#updaterevform')[0]);
           
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
                url:"/admin/reupdate",
                 data:dataa,
                //  dataType: "json",
                // processData: false,
                // contentType: false,
                // cache: false,
                success: function (data) {
               
                    
                    // fetchc();
                    // $("#"+id).html('')
                    // $("#"+id).html(data)
                   


                  

               









                   
                 
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