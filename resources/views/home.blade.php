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

                    <b>Welcome, {{ Auth::user()->name }}</b>
                    <p>
                        This is your account dashboard. Here, you'll be able to view your account balance, pay your bill, access your Slack information, get help, and much more!
                    </p>
                </div>
            </div>

            <br>

            <div class="card">
                    <div class="card-header">
                        Account Balance
                    </div>
                    <div class="card-body">
                        Your current bill is
                        <h2>${{ Auth::user()->balance }}</h2>
                        @if(Auth::user()->balance > 0)
                            <h4>Here's what was done:</h4>
                            <a href="" class="btn btn-primary">Pay your bill</a>
                        @endif
                    </div>
                </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h3><i class="far fa-user"></i> {{ Auth::user()->name }} <span class="badge badge-pill badge-primary">{{ Auth::user()->plan }}</span></h3>
                    <hr>
                    <p><i class="far fa-building"></i>  {{ Auth::user()->company }}</p>
                    <p><i class="fas fa-link"></i>  {{ Auth::user()->domain }}</p>
                    <p><i class="fas fa-envelope"></i>  {{ Auth::user()->email }}</p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
