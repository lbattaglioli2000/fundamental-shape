@extends('admin.layouts.master')

@section('title')
Admin Home
@endsection

@section('content')
<div class="row">
	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

		<h2>Accounts</h2>
		<div class="table-responsive">
			<table class="table table-striped table-sm">
				<thead>
					<tr>
						<th>ID #</th>
						<th>Company</th>
						<th>Account Balance</th>
						<th></th>
					</tr>
				</thead>
				<tbody>

					@foreach($users as $user)

					<tr>

						<td>
							{{ $user->id }}
						</td>

						<td>
							{{ $user->company }} (<b>{{ $user->domain }}</b>)
						</td>

						<td>
							${{ number_format(($user->balance /100), 2, '.', ' ') }}
						</td>

						<td>
							<button type="button" class="btn btn-sm btn-block btn-outline-primary" data-toggle="modal" data-target="#exampleModal{{ $user->id }}">
							  View customer information
							</button>
						</td>

					</tr>

					<div class="modal fade" id="exampleModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">{{ $user->company }} (<b>{{ $user->domain }}</b>)</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					      	<h3><i class="far fa-user"></i> {{ $user->name }} <span class="badge badge-pill badge-primary">{{ $user->plan }}</span></h3>

					      	<hr>

		                    <p><i class="far fa-building"></i>  {{ $user->company }}</p>

		                    <p><i class="fas fa-link"></i>  {{ $user->domain }}</p>

		                    <p><i class="fas fa-envelope"></i>  {{ $user->email }}</p>

		                    <p><i class="fas fa-phone"></i>  {{ $user->phone }}</p>

		                    <p><i class="fab fa-slack"></i>  {{ $user->slackURL }}</p>

		                    <p><a class="btn btn-lg btn-block btn-outline-primary" target="_blank" href="https://{{ $user->slackURL }}"><i class="fab fa-slack"></i> Visit The Slack Workspace</a></p>
					      </div>
					    </div>
					  </div>
					</div>

					@endforeach

				</tbody>
			</table>
		</div>
	</main>
</div>
@endsection