@extends('layouts.admin.app')
@section('content')
    <h2>Roles</h2>

        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.welcome.index')}}">Home</a></li>
            <li class="breadcrumb-item "><a href="{{route('admin.roles.index')}}">Role</a></li>
            <li class="breadcrumb-item active">Add</li>
        </ul>

    <div class="row">
        <div class="col-md-12">
            <div class="tile mb-2">

                <form action="{{route('admin.roles.store')}}" method="POST">
                    @csrf
                    @method('post')
                    @include('admin.partials.error')
                    @include('admin.partials.noty')
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="name">
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
                                $models = ['categories','users','roles'];
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

                                                <option value="{{$model .'_'.$permission_map }}" >{{$permission_map}}</option>

                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" ><i class="fa fa-add"></i>Add</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
