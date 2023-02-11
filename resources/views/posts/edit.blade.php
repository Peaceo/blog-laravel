@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('Edit Post')}}</div>                     
                    <form action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data" method="POST" >
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Post Title</label>
                            <input type="text" name="title" class="form-control" value="{{$post->title}}">
                            @error('title')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="">Post Body</label>
                            <textarea name="body" id="" cols="30" rows="10" class="form-control">{{$post->body}}</textarea>
                             @error('body')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                         <div class="form-group mt-4">
                            <label for="">File upload</label>
                            <input type="file" name="file" class="form-control" accept=".jpg,.jpeg,.png,.gif">
                             @error('file')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection