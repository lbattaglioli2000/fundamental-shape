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

                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                Your payment has been recieved!
                            </div>
                        @endif

                        @if(session()->has('error'))
                            <div class="alert alert-success">
                                Your payment was not recieved, an error occured. Please try again or contact us for help.
                            </div>
                        @endif

                        Your current bill is
                        <h2>${{ number_format((Auth::user()->balance /100), 2, '.', ' ') }}</h2>
                        @if(Auth::user()->balance > 0)
                            <h4>Here's what was done:</h4>

                            <table class="table">
                              <thead>
                                <tr>
                                  <th scope="col">Job ID #</th>
                                  <th scope="col">Amount</th>
                                  <th scope="col">Description</th>
                                </tr>
                              </thead>
                              <tbody>

                                @foreach(Auth::user()->jobs as $job)

                                    <tr>
                                      <th scope="row">{{ $job->id }}</th>
                                      <td>${{ number_format(($job->charge /100), 2, '.', ' ') }}</td>
                                      <td>{{ $job->description }}</td>
                                    </tr>

                                @endforeach

                              </tbody>
                            </table>

                            <form action="/charge" method="POST">
                                @csrf
                              <script
                                src="https://checkout.stripe.com/checkout.js" 
                                class="stripe-button"
                                data-key="{{ env('STRIPE_KEY') }}"
                                data-amount="{{ Auth::user()->balance }}"
                                data-name="The Fundamental Shape"
                                data-description="Securely pay for our work."
                                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                data-locale="auto">
                              </script>
                              <input type="hidden" value="{{ Auth::user()->balance }}" name="amount">
                            </form>

                            
                        @endif
                    </div>
                </div>
        </div>

        <div class="col-md-4">
            <br>
            <div class="card">
                <div class="card-body">
                    <h3><i class="far fa-user"></i> {{ Auth::user()->name }} <span class="badge badge-pill badge-primary">{{ Auth::user()->plan }}</span></h3>
                    <hr>

                    <p><i class="far fa-building"></i>  {{ Auth::user()->company }}</p>

                    <p><i class="fas fa-link"></i>  {{ Auth::user()->domain }}</p>

                    <p><i class="fas fa-envelope"></i>  {{ Auth::user()->email }}</p>

                    <p><i class="fas fa-phone"></i>  {{ Auth::user()->phone }}</p>

                    <p><i class="fab fa-slack"></i>  {{ Auth::user()->slackURL }}</p>

                </div>
            </div>
            <hr>
            <a class="btn btn-lg btn-block btn-outline-primary" target="_blank" href="https://{{ Auth::user()->slackURL }}"><i class="fab fa-slack"></i> Visit Your Slack Workspace</a>
            
        </div>
    </div>

</div>
@endsection