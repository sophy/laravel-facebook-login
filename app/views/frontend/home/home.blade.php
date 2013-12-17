@extends('frontend.layouts.home')
@section('title')
	Oh Khmer
@stop
@section('content')
<div class="main-site">
	<div class="row">
		<div class="col-md-8">
		<div class="main">
			<div class="photo">
				<div class="action-bar">
					@include('frontend.elements.actionbar')
				</div>
				<div class="content-img">
					<div class="title-img">
						<h2><a href="#">Lorem is sume image</a></h2>
					</div>
					<div class="img">
						<img src="{{asset('uploads/funny/551401_667722579928108_810506891_n.jpg')}}">
					</div>
				</div>
			</div>
			<div class="photo">
				<div class="action-bar">
					@include('frontend.elements.actionbar')
				</div>
				<div class="content-img">
					<div class="title-img">
						<h2><a href="#">Lorem is sume image</a></h2>
					</div>
					<div class="img">
						<img src="{{asset('uploads/funny/1450913_271623916324943_89742070_n.jpg')}}">
					</div>
				</div>
			</div>
			<div class="photo">
				<div class="action-bar">
					@include('frontend.elements.actionbar')
				</div>
				<div class="content-img">
					<div class="title-img">
						<h2><a href="#">Lorem is sume image</a></h2>
					</div>
					<div class="img">
						<img src="{{asset('uploads/funny/1450048_10202451970041267_60408951_n.jpg')}}">
					</div>
				</div>
			</div>
		</div> {{-- .main --}}
		</div>{{-- .col-md-8 --}}
		<div class="col-md-4">
			Sidebar
		</div>
	</div>
</div>
@stop