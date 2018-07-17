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
						<th>Contact</th>
						<th>Balance</th>
						<th>Customer Since</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
					<tr>
						<td>{{ $user->id }}</td>
						<td>{{ $user->company }} (<b>{{ $user->domain }}</b>)</td>
						<td>{{ $user->name }}</td>
						<td>{{ $user->balance }}</td>
						<td>{{ $user->created_at->diffForHumans() }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</main>
</div>
@endsection