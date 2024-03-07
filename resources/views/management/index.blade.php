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
            <div class="col-md-4">Content</div>
        </div>
    </div>
@endsection