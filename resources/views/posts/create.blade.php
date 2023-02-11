@extends('layouts.app2')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1> Create new post</h1></div>

                <div class="card-body">
                    
                    <form action="/posts" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Post Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="">Post Body</label>
                            <textarea name="body" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>  
                        
                        <div class="form-group mt-4">
                            <label for="">File upload</label>
                            <input type="file" name="file" class="form-control" accept=".jpg,.jpeg,.bmp,.png,.gif,.doc,.docx,.csv,.rtf,.xlsx,.xls,.txt,.pdf,.zip">
                        </div>
                        
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>

                    </form>
                    
                </div>
            </div>
        </div>
    </div>
@endsection