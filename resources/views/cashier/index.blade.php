@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" id="table-detail"></div>
        <div class="row justify-content-center">
            <div class="col-md-5">
                <button class="btn btn-primary btn-block" id="btn-show-tables">View All Tables</button>
                <div id="selected-table"></div>
                <div id="order-detail"></div>
            </div>
            <div class="col-md-7">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        @foreach($categories as $category)
                            <a class="nav-item nav-link" data-id="{{$category->id}}" data-toggle="tab">{{$category->name}}</a>
                        @endforeach
                    </div>
                </nav>
                <div id="list-menu" class="row mt-2"></div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            // Make table-detail hidden
            $('#table-detail').hide();

            // show all tables when click on the button
            $("#btn-show-tables").click(function () {
                if ($('#table-detail').is(":hidden")) {
                    $.get("/cashier/getTable", function (data) {
                        $("#table-detail").html(data);
                        $("#table-detail").slideDown('fast');
                        $("#btn-show-tables").html('Hide Tables').removeClass('btn-primary').addClass('btn-danger');
                    });
                } else {
                    $("#table-detail").slideUp('fast');
                    $("#btn-show-tables").html('Vide All Tables').removeClass('btn-danger').addClass('btn-primary');
                }
            });

            // Load menus by category
            $(".nav-link").click(function () {
                $.get("/cashier/getMenuByCategory/" + $(this).data("id"), function (data) {
                    $("#list-menu").hide();
                    $("#list-menu").html(data);
                    $("#list-menu").fadeIn('fast');
                });
            });

            var SELECTED_TABLE_ID = "";
            var SELECTED_TABLE_NAME = "";

            // Detect button table on click to show table data
            $("#table-detail").on("click", ".btn-table", function () {
                SELECTED_TABLE_ID = $(this).data("id");
                SELECTED_TABLE_NAME = $(this).data("name");

                $("#selected-table").html('<br><h3>Table: ' + SELECTED_TABLE_NAME + '</h3><hr>');
            });

            $("#list-menu").on("click", ".btn-menu", function () {
                console.log(SELECTED_TABLE_ID);
                if (SELECTED_TABLE_ID === "") {
                    alert("you need to select table first");
                } else {
                    var menu_id = $(this).data("id");
                    $.ajax({
                        type: "POST",
                        data: {
                            "_token": $('meta[name="csrf-token"]').attr('content'),
                            "menu_id": menu_id,
                            "table_id": SELECTED_TABLE_ID,
                            "table_name": SELECTED_TABLE_NAME,
                            "quantity" : 1
                        },
                        url: "/cashier/orderFood",
                        success: function (data) {
                            $("#order-detail").html(data);
                        },
                    });
                }
            });

        });
    </script>
@endsection
