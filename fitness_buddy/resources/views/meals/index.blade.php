@extends('layouts.app')

@section('content')
	<div class="panel panel-default">
		<div class="panel-body">
		@include('common.errors')

			
			<form action="{{ url('meal') }}" method="post" class="form-horizontal">
				<div class="form-group">
					<label for="name" class="col-sm-3 control-label">Meal</label>
					<div class="col-sm-6">
						<input type="text" name="name" id="name" class="form-control">
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-6">
						<button type="submit" class="btn btn-default">Add Meal</button>
					</div>
				</div>
				{{ csrf_field() }}
			</form>

		</div>
	</div>

	@if ($meals->count())
		<div class="panel panel-default">
			<div class="panel-heading">
			Current Meals
			</div>
			<div class="panel-body">
				<table class="table table-striped">
					<thead>
						<th>Meal</th>
						<th>&nbsp;</th>
					</thead>
					<tbody>
						@foreach ($meals as $meal)
							<tr>
								<td>{{ $meal->name }}</td>
								<td>
									<form action="{{ url('meal/'. $meal->id) }}" method="post">
									<button type="submit" class="btn btn-danger">Delete</button>
									{{ method_field('DELETE') }}
									{{ csrf_field() }}
									</form>
								</td>
							</tr>
						@endforeach
			</div>
		</div>
	@endif


@endsection