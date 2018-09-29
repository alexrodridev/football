@extends('layouts.template')

@section('content')
	<div class="row clearfix">
		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
			@if (session('msg_danger'))
			  <div class="alert alert-danger">
			    {{ session('msg_danger') }}
			  </div>
			@endif
			@foreach($post as $p)
				<div class="card">
					<div class="header">
						<h2>
							{{ Auth::user()->name.' '.Auth::user()->lname }}
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
									<li>
										<a href="{{ route('posts.edit',$p->id) }}" class=" waves-effect waves-block">Editar</a>
									</li>
									<li>
										<a href="{{ route('posts.destroy',$p->id) }}" class=" waves-effect waves-block" onclick="event.preventDefault(); document.getElementById('form-delete{{ $p->id }}').submit();">Excluir</a>
										<form id="form-delete{{ $p->id }}" action="{{ route('posts.destroy',$p->id) }}" method="post" style="display: none;">
											@method('delete')
											@csrf
										</form>
									</li>
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
					</div>
				</div>
			@endforeach
		</div>
	</div>
@endsection