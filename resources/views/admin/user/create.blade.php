@extends('layouts.admin.app')
@section('content')
    <h2>Roles</h2>

        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.welcome.index')}}">Home</a></li>
            <li class="breadcrumb-item "><a href="{{route('admin.users.index')}}">User</a></li>
            <li class="breadcrumb-item active">Add</li>
        </ul>

    <div class="row">
        <div class="col-md-12">
            <div class="tile mb-2">

                <form action="{{route('admin.users.store')}}" method="POST">
                    @csrf
                    @method('post')
                    @include('admin.partials.error')
                    @include('admin.partials.noty')
                    {{-- name--}}
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="name" value="{{old('name')}}">
                    </div>
                    {{-- email--}}
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="email" value="{{old('email')}}">
                    </div>
                    {{-- password--}}
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="password">
                    </div>
                    {{-- password_confirmation--}}
                    <div class="form-group">
                        <label for="">Password Confirmation</label>
                        <input type="password" class="form-control" name="password_confirmation" placeholder="password_confirmation">
                    </div>
                    <div class="form-group">
                        <label for="">Roles</label>
                        <select name="role_id"  class="form-control">
                            @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                        <a href="{{route('admin.roles.create')}}">Create New Role</a>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" ><i class="fa fa-add"></i>Add</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
