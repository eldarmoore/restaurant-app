@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="list-group">
                    <a class="list-group-item list-group-item-action" href="/management/category"><i class="fas fa-align-justify"></i> Category</a>
                    <a class="list-group-item list-group-item-action" href="/management/menu"><i class="fas fa-hamburger"></i> Menu</a>
                    <a class="list-group-item list-group-item-action" href="/management/table"><i class="fas fa-chair"></i> Table</a>
                    <a class="list-group-item list-group-item-action" href="/management/user"><i class="fas fa-users-cog"></i> User</a>
                </div>
            </div>
            <div class="col-md-8">
                <i class="fas fa-align-justify"></i> Edit a Menu
                <hr>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="/management/menu/{{$menu->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="menuName">Menu Name</label>
                        <input type="text" name="name" value="{{$menu->name}}" class="form-control" placeholder="Menu...">
                    </div>
                    <labe for="menuPrice">Price</labe>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="text" name="price" value="{{$menu->price}}" class="form-control" aria-label="Amount (to the nearest dollar">
                    </div>
                    <label for="MenuImage">Image</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="inputGroupFile01">
                            <label class="custom-file-label" for="inputGroupFile-1">Choose File</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Description">Description</label>
                        <input type="text" value="{{$menu->description}}" name="description" class="form-control" placeholder="Description...">
                    </div>
                    <div class="form-group">
                        <label for="Category">Category</label>
                        <select name="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{$menu->category_id === $category->id ? 'selected': ''}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
