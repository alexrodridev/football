@extends('layouts.template')

@section('css')
@endsection

@section('content')
	<div class="row clearfix">
		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
			@if (session('msg_success'))
			  <div class="alert alert-success">
			    {{ session('msg_success') }}
			  </div>
			@endif
			@if (session('msg_danger'))
			  <div class="alert alert-danger">
			    {{ session('msg_danger') }}
			  </div>
			@endif
			<div class="card">
				<div class="header">
					<h2>
						NOVA POSTAGEM
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
						<form autocomplete="off" class="col-sm-12" method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
							@csrf
							<div class="form-group form-float">
								<div class="form-line">
									<input type="text" name="text_post" id="text_post" class="form-control">
									<label class="form-label">Digite aqui</label>
								</div>
							</div>
							<input name="fv_post" type="radio" id="OFF" onclick="javascript:check(null,null)" class="with-gap radio-col-red" checked="">
							<label for="OFF">OFF</label>
							<input name="fv_post" type="radio" id="FOTO" onclick="javascript:check('f', 'v')" class="with-gap radio-col-red" value="f">
							<label for="FOTO">FOTO</label>
							<input name="fv_post" type="radio" id="VIDEO" onclick="javascript:check('v', 'f')" class="with-gap radio-col-red" value="v">
							<label for="VIDEO">VIDEO</label>
							<div class="form-group form-float" id="f" style="display: none;">
								<div class="form-line">
									<input type="file" name="image_post" class="form-control">
								</div>
							</div>
							<div class="form-group form-float" id="v" style="display: none;">
								<div class="form-line">
									<input type="text" name="video_post" class="form-control">
									<label class="form-label">Ex: https://www.youtube.com/watch?v=UFunKXJKwaE</label>
								</div>
							</div>
							<br>
							<button type="submit" class="btn btn-danger waves-effect">
								<i class="material-icons">send</i>
								<span>ENVIAR</span>
							</button>
							<button type="reset" class="btn btn-danger waves-effect">
								<i class="material-icons">restore</i>
								<span>LIMPAR CAMPOS</span>
							</button>
						</form>
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