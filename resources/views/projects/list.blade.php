@extends('adminlte::page')

@section('title', 'Listagem Projetos de Software')

@section('content_header')
<section class="content-header">
    <h1>
        <i class="fa fa-file"></i>&nbsp;Projetos
        <small>lista de projetos de software</small>
        @hasrole('manager')
        <a href="/projects/create" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Novo Projeto</a>
        @endhasrole
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Projetos</a></li>
        <li class="active">Listagem de Projetos</li>
    </ol>
</section>
@stop

@section('content')
    <div class="box">
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <table class="table">
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Nome do Projeto</th>
                    <th>Progresso Geral</th>
                    <th style="width: 40px; text-align: center">%</th>
                </tr>
                @foreach($projects as $project)
                <tr>
                    <td>{{ $project->id }}.</td>
                    <td><a href="/projects/dashboard/{{ $project->id }}">{{ $project->title  }}</a></td>
                    @if($project->imported == 2)
                    <td>
                        <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                        </div>
                    </td>
                    <td><span class="badge bg-red">55%</span></td>
                    @else
                    <td>
                        @hasrole('manager')
                        <a href="#" class="btn btn-primary"><i class="fa fa-upload"></i>&nbsp;Importar Dados</a>
                        @else
                        <p>Os dados do projeto ainda não foram importados.</p>
                        @endhasrole
                    </td>
                    <td><span class="badge bg-info">0%</span></td>
                    @endif
                </tr>
                @endforeach
            </table>
        </div>
        <div class="box-footer">
            <div class="box-tools">
                <ul class="pagination pagination-sm no-margin pull-right">
                    {{ $projects->links() }}
                </ul>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@stop
