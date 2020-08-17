@extends('adminlte::page')

@section('title', 'Dashboard do Projeto de Software')

@section('content_header')
<section class="content-header">
    <h1>
        <i class="fa fa-file"></i>&nbsp;{{ $project->title }}
        <small>dashboard</small>
        <a href="/projects/import/{{ $project->id }}" class="btn btn-primary"><i class="fa fa-upload"></i>&nbsp;Importar Dados</a>&nbsp;
        @if($project->imported == 2)
        <a href="/view/{{ $project->id }}" class="btn btn-success"><i class="fa fa-pie-chart"></i>&nbsp;Visualizar</a>
        @endif
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Projetos</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
@stop

@section('content')
    @if($project->imported == 1)
    <div class="box-body">
        <div class="col-md-12">

            <p>Os dados do projeto ainda não foram importados.</p>

        </div>
    </div>
    @else
    <div class="box box-default">
        <div class="box-header with-border">
            <i class="fa fa-dollar"></i>

            <h3 class="box-title">Indicadores Financeiros</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="col-md-6">
                <canvas id="doughnut-chart" height="250"></canvas>
            </div>
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Distribuição Financeira</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Descrição</th>
                                <th>Progress</th>
                                <th style="width: 40px">Label</th>
                            </tr>
                            @foreach($budget_items as $item)
                            <tr>
                                <td>{{ $item->id }}.</td>
                                <td>{{ $item->description }}</td>
                                {{ getPorcentBudgetItem($item->id) }}
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Projeção Financeira</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Descrição</th>
                                <th>Progress</th>
                                <th style="width: 40px">Label</th>
                            </tr>
                            <tr>
                                <td>1.</td>
                                <td>Equipe de Desenvolvimento</td>
                                <td>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-danger" style="width: 20%"></div>
                                    </div>
                                </td>
                                <td><span class="badge bg-red">20%</span></td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>Equipe de UI</td>
                                <td>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-yellow" style="width: 10%"></div>
                                    </div>
                                </td>
                                <td><span class="badge bg-yellow">10%</span></td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>Gerência</td>
                                <td>
                                    <div class="progress progress-xs progress-striped active">
                                        <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
                                    </div>
                                </td>
                                <td><span class="badge bg-light-blue">30%</span></td>
                            </tr>
                            <tr>
                                <td>4.</td>
                                <td>Infra Estrutura</td>
                                <td>
                                    <div class="progress progress-xs progress-striped active">
                                        <div class="progress-bar progress-bar-success" style="width: 40%"></div>
                                    </div>
                                </td>
                                <td><span class="badge bg-green">40%</span></td>
                            </tr>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

    <div class="box box-default">
        <div class="box-header with-border">
            <i class="fa fa-tasks"></i>

            <h3 class="box-title">Tarefas</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="col-md-6">
                <canvas id="pie-chart" height="250"></canvas>
            </div>
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Por Setor</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Descrição</th>
                                <th>Progress</th>
                                <th style="width: 40px">Label</th>
                            </tr>
                            <tr>
                                <td>1.</td>
                                <td>Desenvolvimento</td>
                                <td>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-danger" style="width: 25%"></div>
                                    </div>
                                </td>
                                <td><span class="badge bg-red">25%</span></td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>UX/UI</td>
                                <td>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-yellow" style="width: 25%"></div>
                                    </div>
                                </td>
                                <td><span class="badge bg-yellow">25%</span></td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>Testes</td>
                                <td>
                                    <div class="progress progress-xs progress-striped active">
                                        <div class="progress-bar progress-bar-primary" style="width: 20%"></div>
                                    </div>
                                </td>
                                <td><span class="badge bg-light-blue">20%</span></td>
                            </tr>
                            <tr>
                                <td>4.</td>
                                <td>Requisitos</td>
                                <td>
                                    <div class="progress progress-xs progress-striped active">
                                        <div class="progress-bar progress-bar-success" style="width: 30%"></div>
                                    </div>
                                </td>
                                <td><span class="badge bg-green">30%</span></td>
                            </tr>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Tarefas Atrasadas</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Descrição</th>
                                <th>Progress</th>
                                <th style="width: 40px">Label</th>
                            </tr>
                            <tr>
                                <td>1.</td>
                                <td>Desenvolvimento</td>
                                <td>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                    </div>
                                </td>
                                <td><span class="badge bg-red">55%</span></td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>UX/UI</td>
                                <td>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-danger" style="width: 45%"></div>
                                    </div>
                                </td>
                                <td><span class="badge bg-red">45%</span></td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>Testes</td>
                                <td>
                                    <div class="progress progress-xs progress-striped active">
                                        <div class="progress-bar progress-bar-success" style="width: 0%"></div>
                                    </div>
                                </td>
                                <td><span class="badge bg-green">0%</span></td>
                            </tr>
                            <tr>
                                <td>4.</td>
                                <td>Requisitos</td>
                                <td>
                                    <div class="progress progress-xs progress-striped active">
                                        <div class="progress-bar progress-bar-success" style="width: 00%"></div>
                                    </div>
                                </td>
                                <td><span class="badge bg-green">0%</span></td>
                            </tr>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    @endif
@stop

@section('js')
    <script>
        new Chart(document.getElementById("doughnut-chart"), {
            type: 'doughnut',
            data: {
                labels: ["Usado", "Livre"],
                datasets: [
                    {
                        label: "Orçamento",
                        backgroundColor: ["#c45850", "#3e95cd"],
                        data: {{ calculateDoughnut($project->id) }}
                    }
                ]
            },
            options: {
                title: {
                    display: true,
                    text: 'Utilização do orçamento'
                }
            }
        });

        new Chart(document.getElementById("pie-chart"), {
            type: 'pie',
            data: {
                labels: ["Completas", "Em andamento","Restantes", "Atrasadas", "Bloqueadas"],
                datasets: [{
                    label: "Tarefas",
                    backgroundColor: ["#3cba9f","#3e95cd", "#8e5ea2","#c45850","#333333",],
                    data: [2478,5267,734,784,433]
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Tarefas do projeto'
                }
            }
        });
    </script>
@stop
