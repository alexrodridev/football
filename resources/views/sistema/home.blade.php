@extends('layouts.template')
@section('content')
	<section class="row clearfix">
		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
			@foreach($posts as $p)
				<article class="card">
					<div class="header">
						<h2>
							{{ $p->name.' '.$p->lname }}
							<small>
								{{ date("H:i:s | d/m/Y", strtotime($p->created_at)) }}
								@if($p->updated_at != $p->created_at)
									*Editado
								@endif
							</small>
						</h2>
						<ul class="header-dropdown m-r--5">
							<li class="dropdown">
								<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
									<i class="material-icons">more_vert</i>
								</a>
								<ul class="dropdown-menu pull-right">
									<li><a href="javascript:void(0);" class=" waves-effect waves-block">Denunciar</a></li>
								</ul>
							</li>
						</ul>
					</div>
					<div class="body">
						{{ $p->text_post }}
						@if($p->image_post != null)
							<div>
								<img width="100%" src="{{ asset('storage/posts/'.$p->author_post.'/'.$p->image_post) }}" alt="{{ $p->image_post }}">
							</div>
						@endif
						@if($p->video_post != null)
							<iframe width="100%" height="343" src="https://www.youtube.com/embed/{{ $p->video_post }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
						@endif
						<br>
						<button type="button" class="btn btn-primary waves-effect">
														<i class="material-icons">thumb_up</i>
														<span>LIKE</span>
												</button>
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