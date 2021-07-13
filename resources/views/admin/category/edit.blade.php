@extends('layouts.admin.app')
@section('content')
    <h2>categories</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.welcome.index')}}">Home</a></li>
            <li class="breadcrumb-item "><a href="{{route('admin.categories.index')}}">Categories</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
    <div class="tile mb-2">

        <form action="{{route('admin.categories.update',$category->id)}}" method="POST">
            @csrf
            @method('put')
            @include('admin.partials.error')
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" value=" {{old('name',$category->name)}}">
            </div>
            <div class="form-group">

                <button type="submit" class="btn btn-info" ><i class="fa fa-edit"></i>Update</button>
            </div>

        </form>
    </div>
@endsection
