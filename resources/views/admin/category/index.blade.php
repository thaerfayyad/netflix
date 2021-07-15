@extends('layouts.admin.app')
@section('content')
    <h2>categories</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.welcome.index')}}">Home</a></li>
            <li class="breadcrumb-item active">Categories</li>
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
                            @if(auth()->user()->hasPermission('categories_create'))
                                <a href="{{route('admin.categories.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Add</a>
                            @else
                                <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus "></i>Add</a>
                            @endif

                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br><br>

        <div class="row">
            @if($categories->count() > 0)
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
                        @foreach($categories as $category)
                           <tr>
                               <td>{{$loop->iteration}}</td>
                               <td>{{$category->name}}</td>
                               <td>
                                   @if(auth()->user()->hasPermission('categories_update'))
                                       <a href="{{route('admin.categories.edit',$category->id)}}" class="btn btn-warning btn-sm"> <i class="fa fa-edit"></i>Edit</a>
                                   @else
                                       <a href="#" disabled class="btn btn-warning btn-sm"> <i class="fa fa-edit"></i>Edit</a>
                                   @endif
                                       @if(auth()->user()->hasPermission('categories_delete'))
                                           <form method="POST" action="{{route('admin.categories.destroy', $category->id)}}" style="display: inline-block;">
                                               @csrf
                                               @method('delete')
                                               <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i>Delete</button>
                                           </form>
                                       @else
                                           <a href="#" disabled class="btn btn-danger btn-sm "><i  class="fa fa-trash"></i>Delete</a>
                                       @endif

                               </td>
                           </tr>
                        @endforeach
                     </tboody>
             </table>

{{--                    {{ $categories->appends(request()->query())->links() }}--}}

                        {!!  $categories->appends(request()->query())->onEachSide(5)->links() !!}


            @else
            <h3 style="font-weight: 400;">Sorry Data No Found</h3>
                @endif
        </div>
    </div>

@endsection
