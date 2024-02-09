 {{-- <th scope="row"></th>
    <td></td>
    <td>  </td>
    <td>
 <button type="button"  value="'+v.id+'" class="btn btn-success edite update-catagory"    >edite </button>
 <td><button type="button" value="' +v.id + '" class="btn btn-danger deletebtn btn-sm">Delete</button></td>
         data-bs-toggle="modal"  data-bs-target="#editModal" <a href=""   class= "delete_btn btn btn-danger"> </a> 
    </td>
</tr> --}}
{{-- @if($addPost)
@include('livewire.admin.create')
@endif --}}
{{-- @livewire('admin.create') --}}
<table class="table">
    <thead>
        <tr>
            
            <th width="45%">name</th>
            <th width="45%">guest_number</th>
            <th width="45%">location</th>
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
@if (count($table) > 0)
@foreach ($table as $item)
    <tr>
          
        <td>
            
            {{$item->name}}
        </td>
        <td>
            {{$item->guest_number}}
        </td>
        <td>
            {{$item->location }}
        </td>
        <td>
            <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                    data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#"    
                 
                        wire:click.prevent="$dispatch('servicUpdate', { id: {{ $item->id }} })">
                        <i class="bx bx-edit-alt me-1"></i>
                        Edit
                    </a>
                    <a class="dropdown-item" href="#"
                        wire:click.prevent="$dispatch('serviceDelete', { id: {{ $item->id }} })">
                        <i class="bx bx-trash me-1"></i>
                        Delete
                    </a>
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

