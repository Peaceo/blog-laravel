@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('Edit User')}}</div>                     
                    <form action="{{ route('customUser.update', $user->id) }}" method="POST" >
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                            @error('name')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="username" class="form-control" value="{{ $user->username }}"/>
                             @error('username')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}"/>
                            @error('email')
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