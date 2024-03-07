@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <div class="row text-center">
                       <div class="col-sm-4">
                           <a href="/management">
                               <h4>Management</h4>
                               <img src="{{ asset('images/data-management.png') }}" alt="" width="50px">
                           </a>
                       </div>
                       <div class="col-sm-4">
                           <a href="/cashier">
                               <h4>Cashier</h4>
                               <img src="{{ asset('images/cash-machine.png') }}" alt="" width="50px">
                           </a>
                       </div>
                       <div class="col-sm-4">
                           <a href="/report">
                               <h4>Report</h4>
                               <img src="{{ asset('images/report.png') }}" alt="" width="50px">
                           </a>
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
