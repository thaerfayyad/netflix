@extends('layouts.admin.app')
@section('content')
    <h2>Roles</h2>

        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.welcome.index')}}">Home</a></li>
            <li class="breadcrumb-item "><a href="{{route('admin.roles.index')}}">Role</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ul>

    <div class="row">
        <div class="col-md-12">
            <div class="tile mb-2">

                <form action="{{route('admin.users.update',$user->id)}}" method="POST">
                    @csrf
                    @method('put')
                    @include('admin.partials.error')
                    {{-- name--}}
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="name" value="{{old('name',$user->name)}}">
                    </div>
                    {{-- email--}}
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="email" value="{{old('email',$user->email)}}">
                    </div>
                    {{--Roles--}}
                    <div class="form-group">
                        <label for="">Roles</label>
                        <select name="role_id"  class="form-control">
                            @foreach($roles as $role)
                                <option value="{{$role->id}}" {{$user->hasRole($role->name) ?'selected':' '}}>{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info" ><i class="fa fa-edit"></i>Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
