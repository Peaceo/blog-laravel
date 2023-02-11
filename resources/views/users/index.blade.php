@extends('layouts.app2')
@section('content')
<div class="addUser">
  <a class="btn btn-primary user" href="{{ route('customUser.create') }}" role="button"> ADD USER </a>
</div>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($users as $key => $user)    
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->roles[0]->name ?? null }}</td>
      <td>
        <a type="submit" class="btn btn-secondary" href="{{ route('customUser.edit', $user->id) }}" role="button">Update</a>
        <form action="{{ route('customUser.destroy', $user->id) }}" method="post" class="d-inline">
          @csrf
          @method('DELETE')
        <button type="submit" class=" btn btn-xs btn-danger btn-flat show_confirm">Delete</button>
        </form>
      </td>
    </tr>

    @endforeach  

  </tbody>
</table>
@endsection

@section('offbody')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script type="text/javascript"> 

     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });  

</script>
@endsection
