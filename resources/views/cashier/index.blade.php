@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" id="table-detail"></div>
        <div class="row justify-content-center">
            <div class="col-md-5">
                <button class="btn btn-primary btn-block" id="btn-show-tables">View All Tables</button>
            </div>
            <div class="col-md-7"></div>
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
        });
    </script>
@endsection
