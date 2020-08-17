@extends('adminlte::page')

@section('title', 'Listagem Projetos de Software')

@section('content_header')
    <section class="content-header">
        <h1>
            <i class="fa fa-file"></i>&nbsp;Projetos
            <small>novo projeto</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Projetos</a></li>
            <li class="active">Novo Projeto</li>
        </ol>
    </section>

@stop

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Novo Projeto</h3>
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

        <form class="form-horizontal" method="post" action="{{ route('project.store') }}">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="inputTitle" class="col-sm-2 control-label">Título</label>

                    <div class="col-sm-10">
                        <input type="text" name="title" class="form-control" id="inputTitle" placeholder="Título do Projeto">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputMethod" class="col-sm-2 control-label">Metodologia</label>

                    <div class="col-sm-10">
                        <select name="methodology_id" id="methodologyID" class="form-control">
                        @foreach($methods as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputDateInit" class="col-sm-2 control-label">Data de Início</label>

                    <div class="col-sm-10">
                        <input type="date" name="date_init" class="form-control" id="inputDateInit" placeholder="Data de Início">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputDateEnd" class="col-sm-2 control-label">Data de Fim</label>

                    <div class="col-sm-10">
                        <input type="date" name="date_end" class="form-control" id="inputDateEnd" placeholder="Data de Fim">
                    </div>
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
