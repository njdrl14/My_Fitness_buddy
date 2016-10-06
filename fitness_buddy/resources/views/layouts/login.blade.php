@extends('layouts.app')

@section('content')
	{{ Form:: open()}}

		<input type="text">
		<input type="text">
		<input type="text">
	{{ Form::close() }}
@stop

