@extends('layouts.template')
@section('content')
	<section class="row clearfix">
		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
			@foreach($posts as $p)
				<article class="card">
					<div class="header">
						<h2>
							Usuario
							<small>
								{{ date("d-m-Y H:i:s", strtotime($p->created_at)) }}
								@if($p->updated_at != $p->created_at)
									foi editado em {{ date("d-m-Y H:i:s", strtotime($p->updated_at)) }}
								@endif
							</small>
						</h2>
						<ul class="header-dropdown m-r--5">
							<li class="dropdown">
								<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
									<i class="material-icons">more_vert</i>
								</a>
								<ul class="dropdown-menu pull-right">
									<li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
									<li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
									<li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
								</ul>
							</li>
						</ul>
					</div>
					<div class="body">
						<p>{{ $p->text_post }}</p>
					</div>
				</article>
			@endforeach
		</div>
	</section>
	<div class="row clearfix">
		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
			<div class="card">
				<div class="body align-center">
					<p>Carregando mais posts!</p>
					<div class="demo-preloader">
						<div class="preloader pl-size-sm">
							<div class="spinner-layer pl-red">
								<div class="circle-clipper left">
									<div class="circle"></div>
								</div>
								<div class="circle-clipper right">
									<div class="circle"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection