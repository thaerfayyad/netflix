@extends('layouts.admin.app')
@section('content')
    <h2>Roles</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.welcome.index')}}">Home</a></li>
            <li class="breadcrumb-item "><a href="{{route('admin.roles.index')}}">Role</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
    <div class="tile mb-2">

        <form action="{{route('admin.roles.update',$role->id)}}" method="POST">
            @csrf
            @method('put')
            @include('admin.partials.error')
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" value="{{$role->name}}">
            </div>
            <div class="form-group">
                <h4>Permissions</h4>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Model</th>
                        <th>Permissions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $models = ['categories','users'];
                    @endphp
                    @foreach($models as $model)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$model}}</td>
                            <td>
                                @php
                                    $permissions_maps  = ['create','read','update','delete'];
                                @endphp
                                <select name="permissions[]" class="form-control  select2" multiple>
                                    @foreach($permissions_maps as $permission_map)

                                        <option value= {{$model.'_'.$permission_map}}
                                            {{$role->hasPermission($model .'_'. $permission_map) ? 'selected' :'' }}>
                                            {{$permission_map}}
                                        </option>

                                    @endforeach

                                </select>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="form-group">

                <button type="submit" class="btn btn-info" ><i class="fa fa-edit"></i>Update</button>
            </div>

        </form>
    </div>
@endsection
