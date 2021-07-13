@extends('layouts.admin.app')
@section('content')
    <h2>categories</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.welcome.index')}}">Home</a></li>
            <li class="breadcrumb-item "><a href="{{route('admin.categories.index')}}">Categories</a></li>
            <li class="breadcrumb-item active">Add</li>
        </ol>
    </nav>
    <div class="tile mb-2">

        <form action="{{route('admin.categories.store')}}" method="POST">
            @csrf
            @method('post')
            @include('admin.partials.error')
            @include('admin.partials.noty')
            <div class="form-group">
                <label for="">Name</label>
                 <input type="text" class="form-control" name="name" placeholder="name">
            </div>
            <div class="form-group">

                <button type="submit" class="btn btn-primary" ><i class="fa fa-add"></i>Add</button>
            </div>

        </form>
    </div>
@endsection
