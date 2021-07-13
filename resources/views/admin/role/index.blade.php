@extends('layouts.admin.app')
@section('content')
    <h2>Roles</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.welcome.index')}}">Home</a></li>
            <li class="breadcrumb-item active">Roles</li>
        </ol>
    </nav>
    <div class="tile mb-4">
        <div class="row">
            <div class="col-12">
                <form action="">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text " autofocus class="form-control" name="search" placeholder="search" value="{{request()->search}}">
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary"> <i class="fa fa-search"></i>Search</button>
                            <a href="{{route('admin.roles.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Add</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br><br>

        <div class="row">
            @if($roles->count() > 0)
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                    <tboody>
                        @include('admin.partials.noty')
                        @foreach($roles as $role)
                           <tr>
                               <td>{{$loop->iteration}}</td>
                               <td>{{$role->name}}</td>
                               <td>
                                   <a href="{{route('admin.roles.edit',$role->id)}}" class="btn btn-warning btn-sm"> <i class="fa fa-edit"></i>Edit</a>
                                   <form method="POST" action="{{route('admin.roles.destroy', $role->id)}}" style="display: inline-block;">
                                       @csrf
                                       @method('delete')
                                       <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i>Delete</button>
                                   </form>
                               </td>
                           </tr>
                        @endforeach
                     </tboody>
             </table>
                <div class="d-felx justify-content-center">
                    {{ $roles->appends(request()->query())->links() }}
                </div>

            @else
            <h3 style="font-weight: 400;">Sorry Data No Found</h3>
                @endif
        </div>
    </div>

@endsection
