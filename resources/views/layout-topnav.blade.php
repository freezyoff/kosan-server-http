@extends('layout-root')

@section('body.attr')
	class="bg-light pb-3" style="color:#1e1e1e"
@endsection

@section('body')
	
	<div id="topnav" class="card pt-1 pb-1 position-fixed d-flex">
		<div class="container-fluid">
			@include("layout.topnav")
		</div>
	</div>
	
	<div class="container mt-5 mb-5">
		@yield("body.content")
		@stack("body.content")
	</div>
	
	<div id="bottomnav" class="card pt-1 pb-1 position-fixed d-flex">
		<div class="container-fluid">
			@stack("body.bottomnav")
		</div>
	</div>
@endsection