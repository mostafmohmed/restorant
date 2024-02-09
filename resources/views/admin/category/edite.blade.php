<tr id="{{$catagory ->id}}">
    <th scope="row">{{$catagory ->id}}</th>
    <td>{{$catagory ->name}}</td>
    <td>   {{ $catagory->description }}</td>
  
    <td><img  style="width: 90px; height: 90px;" src="{{asset('images/'.$catagory->image)}}"></td>

    <td>
 <button type="button" class="btn btn-success edite" data-bs-toggle="modal"  data-bs-target="#editModal"  route="{{url('/admin/category/'.$catagory->id.'/edit')}}" > {{__('messages.update')}}</button>
        {{--  data-bs-toggle="modal"  data-bs-target="#editModal" <a href=""  category_id="{{$category ->id}}" class= "delete_btn btn btn-danger"> {{__('messages.delete')}}</a> --}}

      


       












    </td>
