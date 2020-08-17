@extends('adminlte::page')

@section('title', 'Listagem Projetos de Software')

@section('content_header')
    <section class="content-header">
        <h1>
            <i class="fa fa-file"></i>&nbsp;Projetos
            <small>importar projeto</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Projetos</a></li>
            <li class="active">Importar Projeto</li>
        </ol>
    </section>

@stop

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Importar Projeto</h3>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Sucesso!</h4>
                {{ session()->get('message') }}
            </div>
        @endif

        <form class="form-horizontal" method="post">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="inputFile" class="col-sm-2 control-label">Arquivo</label>

                    <div class="col-sm-10">
                        <input type="file" name="title" class="form-control-file" id="inputFile">
                        <small>O arquivo deve possuir o formato .csv</small>
                    </div>
                </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Salvar</button>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>
    <!-- /.box -->
@stop
