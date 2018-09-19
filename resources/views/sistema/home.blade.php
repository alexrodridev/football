@extends('layouts.template')
@section('content')
    <div class="block-header">
        <h2>HOME</h2>
    </div>
    <section class="row clearfix">
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <article class="card">
                <div class="header">
                    <h2>Usuario <small>Data</small></h2>
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
                    <p>Você está logado!</p>
                    <p></p>
                </div>
            </article>
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