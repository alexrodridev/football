@extends('layouts.template')

@section('content')
	<div class="row clearfix">
		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
			@if (session('msg_success'))
			  <div class="alert alert-success">
				{{ session('msg_success') }}
			  </div>
			@endif
			<div class="card">
				<div class="header">
					<h2>
						EDIÇÃO DE POSTAGEM
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
					<div class="row clearfix">
						@foreach($post as $p)
							<form class="col-sm-12" method="POST" action="{{ route('posts.update', $p->id_post) }}" enctype="multipart/form-data">
								@csrf
								@method('put')
								<div class="form-group form-float">
									<div class="form-line">
										<input type="text" name="text_post" value="{{ $p->text_post }}" class="form-control">
										<label class="form-label">Digite aqui</label>
									</div>
								</div>
								<input @if($p->image_post == null && $p->video_post == null) checked @endif onclick="javascript:check(null,null)" name="fv_post" type="radio" id="OFF" class="with-gap radio-col-red">
								<label for="OFF">OFF</label>
								<input @if($p->image_post) checked @endif onclick="javascript:check('f', 'v')" name="fv_post" type="radio" id="FOTO" class="with-gap radio-col-red" value="f">
								<label for="FOTO">FOTO</label>
								<input @if($p->video_post) checked @endif onclick="javascript:check('v', 'f')" name="fv_post" type="radio" id="VIDEO" class="with-gap radio-col-red" value="v">
								<label for="VIDEO">VIDEO</label>
								<div class="form-group form-float" id="f" style="display: none;">
									<div class="form-line">
										<input type="file" name="image_post" class="form-control">
										<input type="hidden" name="image" value="{{ $p->image_post }}">
									</div>
								</div>
								@if($p->video_post)
								<div class="form-group form-float" id="v" style="display: none;">
									<div class="form-line">
										<input type="text" value="https://www.youtube.com/watch?v={{ $p->video_post }}" name="video_post" class="form-control">
										<label class="form-label">Ex: https://www.youtube.com/watch?v=UFunKXJKwaE</label>
									</div>
								</div>
								@else
								<div class="form-group form-float" id="v" style="display: none;">
									<div class="form-line">
										<input type="text" name="video_post" class="form-control">
										<label class="form-label">Ex: https://www.youtube.com/watch?v=UFunKXJKwaE</label>
									</div>
								</div>
								@endif
								@if($p->image_post != null)
									<div>
										<img width="100%" src="{{ asset('storage/posts/'.$p->author_post.'/'.$p->image_post) }}" alt="{{ $p->image_post }}">
									</div>
								@endif
								@if($p->video_post != null)
									<iframe width="100%" height="343" src="https://www.youtube.com/embed/{{ $p->video_post }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
								@endif
								<br>
								<button type="submit" class="btn btn-danger waves-effect">
									<i class="material-icons">edit</i>
									<span>EDITAR</span>
								</button>
							</form>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('js')
<script type="text/javascript">
	function check(s, h) {
		if (s == null && h == null) {
			document.getElementById('f').style.display = 'none'
			document.getElementById('v').style.display = 'none'
		}
		else {
			document.getElementById(h).style.display = 'none'
			document.getElementById(s).style.display = 'block'
		}
	}
</script>
@endsection