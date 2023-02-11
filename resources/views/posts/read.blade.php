@extends('layouts.app2')

@section('content')

@if (Session::has('success'))
    {{ Session::get('success') }}
@endif

<div class="row">
@foreach ($posts as $post)
    <div class="col-sm-6">
    
        <div class="card" style="width: 18rem;">            
            <img class="card-img-top" src="{{ asset('storage/pictures/'.$post->image) }}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{$post->title}}</h5> 
                <p class="card-text">{{$post->body}}</p>
                <a class="btn btn-primary" href="posts/{{$post->id}}/edit" role="button">Edit</a>
                @can(['create-user', 'edit-user', 'delete-user', 'view-users', 'create-post', 'edit-post', 'delete-post'])
                <form action="{{ route('posts.destroy', $post->id) }}" method="post" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
                @endcan
            </div>
        </div>
    </div>
@endforeach
</div>

@endsection
