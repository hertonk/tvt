@extends('adminlte::page')

@section('title', 'Visualizar Projeto - Matriz')

@section('content_header')
    <section class="content-header">
        <h1>
            <i class="fa fa-file"></i>&nbsp;App de Mobilidade
            <small>visualizar em matriz</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Projetos</a></li>
            <li class="active">Visualizar em Matriz</li>
        </ol>
    </section>
@stop

@section('content')
    <div class="box">
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <div class="col-md-12">
                <div class="col-md-12">
                <form class="form-horizontal">
                @csrf
                <div class="box-body">
                    <br>
                    <br>
                    <div class="form-group">
                        <div class="col-sm-2 text-right"><strong>O que você deseja?</strong></div>

                        <div class="col-sm-10">
                            {{ getDescriptionQuestion($question) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 text-right"><strong>Qual requisito?</strong></div>

                        <div class="col-sm-10">
                            {{ $requeriment->code }}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2 text-right"><strong>Com quais artefatos?</strong></div>

                        <div class="col-sm-10">
                            @foreach($artifacts as $item)
                                @if($item == 'requeriment')
                                    {{ 'Requisitos, ' }}
                                @elseif($item == 'tests')
                                    {{ 'Testes, ' }}
                                @elseif($item == 'stories')
                                    {{ 'Histórias de Usuário, ' }}
                                @elseif($item == 'models')
                                    {{ 'Modelos, ' }}
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group">
                        <div id="visu" class="col-sm-12 text-center">
                           <h2>Visualização em Matriz de Rastreabilidade</h2>
                        </div>
                    </div>
                </div>
            </form>
                    <p><span><i class="fa fa-file-o"></i>&nbsp;Requisitos</span>&nbsp;&nbsp;&nbsp;&nbsp;<span><i class="fa fa-gear"></i>&nbsp;Testes</span>&nbsp;&nbsp;&nbsp;&nbsp;<span><i class="fa fa-commenting-o"></i>&nbsp;Histórias de Usuários</span>&nbsp;&nbsp;&nbsp;&nbsp;<span><i class="fa fa-sticky-note-o"></i>&nbsp;Modelos</span>&nbsp;&nbsp;&nbsp;&nbsp;</p>
                </div>
                <table class="tg" width="100%">
                    <tr>
                        <th class="tg-s6z2"></th>
                        <?php $f = 0; ?>
                        <?php $pos = 0; ?>
                        @foreach($reqs as $item)
                        <?php 
                            if($item->id == $requeriment->id){
                                $pos = $f;
                            }
                         ?>
                        <th class="tg-s268"><i class="fa fa-file-o"></i>&nbsp;<a title="{{ $item->name }}" class="tooltip1" href="#">{{ $item->code }}</a></th>
                        <?php $f++; ?>
                        @endforeach


                        @if($tsts != 0)
                        @foreach($tsts as $item)
                        <th class="tg-s268"><i class="fa fa-gear"></i>&nbsp;<a title="{{ $item->name }}" class="tooltip1" href="#">{{ $item->code }}</a></th>
                        @endforeach
                        @endif

                        @if($sts != 0)
                        @foreach($sts as $item)
                        <th class="tg-s268"><i class="fa fa-commenting-o"></i>&nbsp;<a title="{{ $item->title }}" class="tooltip1" href="#">{{ $item->code }}</a></th>
                        @endforeach
                        @endif

                        @if($mls != 0)
                        @foreach($mls as $item)
                        <th class="tg-s268"><i class="fa fa-sticky-note-o"></i>&nbsp;<a title="{{ $item->name }}" class="tooltip1" href="#">{{ $item->code }}</a></th>
                        @endforeach
                        @endif
                    </tr>
                    <?php $j = 0; ?>
                    @foreach($reqs as $item)
                    <?php $result = print_requeriment($requeriment->id, $item->id); ?>
                    <tr>
                        <td class="tg-s268"><i class="fa fa-file-o"></i>&nbsp;<a title="{{ $item->name }}" class="tooltip1" href="#">{{ $item->code }}</a></td>
                        <?php 

                        for($i = 0; $i < $totalitems; $i++){
                            if($result == 1 && $i == $pos ){
                            ?>
                         <td class="mark"></td>
                            <?php
                            } else{
                                ?>
                             <td></td>
                                <?php
                            }

                        }

                        ?>
                    </tr>
                    <?php $j++; ?>
                    @endforeach
                    <?php $j = 0; ?>
                    @if($tsts != 0)
                    @foreach($tsts as $item)
                    <?php $result = print_test($requeriment->id, $item->id); ?>
                    <tr>
                        <td class="tg-s268"><i class="fa fa-gear"></i>&nbsp;<a title="{{ $item->name }}" class="tooltip1" href="#">{{ $item->code }}</a></td>
                        <?php 

                        for($i = 0; $i < $totalitems; $i++){
                            if($result == 1 && $i == $pos ){
                            ?>
                         <td class="marktest"></td>
                            <?php
                            } else{
                                ?>
                             <td></td>
                                <?php
                            }

                        }

                        ?>
                    </tr>
                    <?php $j++; ?>
                    @endforeach
                    @endif
                    <?php $j = 0; ?>
                    @if($sts != 0)
                    @foreach($sts as $item)
                    <?php $result = print_st($requeriment->id, $item->id); ?>
                    <tr>
                        <td class="tg-s268"><i class="fa fa-commenting-o"></i>&nbsp;<a title="{{ $item->title }}" class="tooltip1" href="#">{{ $item->code }}</a></td>
                        <?php 

                        for($i = 0; $i < $totalitems; $i++){
                            if($result == 1 && $i == $pos ){
                            ?>
                         <td class="markst"></td>
                            <?php
                            } else{
                                ?>
                             <td></td>
                                <?php
                            }

                        }

                        ?>
                    </tr>
                    <?php $j++; ?>
                    @endforeach
                    @endif
                    <?php $j = 0; ?>
                    @if($mls != 0)
                    @foreach($mls as $item)
                    <?php $result = print_mdls($requeriment->id, $item->id); ?>
                    <tr>
                        <td class="tg-s268"><i class="fa fa-sticky-note-o"></i>&nbsp;<a title="{{ $item->name }}" class="tooltip1" href="#">{{ $item->code }}</a></td>
                        <?php 

                        for($i = 0; $i < $totalitems; $i++){
                            if($result == 1 && $i == $pos ){
                            ?>
                         <td class="marktmdl"></td>
                            <?php
                            } else{
                                ?>
                             <td></td>
                                <?php
                            }

                        }
                        ?>
                    </tr>
                    <?php $j++; ?>
                    @endforeach
                    @endif
                </table>
            </div>
        </div>
        <div class="box-footer">
            <div class="box-tools">

            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@stop

@section('js')
    <script>
        $(document).ready(function($){
            $("a.tooltip1").hover(function () {
                var titleText=$(this).attr("title");
                $(this).append("<div id='tooltip-box'>" +titleText+ "</div>");
            }, function () {
                $("div#tooltip-box").remove();
            });
            $("a.tooltip1").on("click", function(event){
                event.preventDefault();
            });
        });
    </script>
@stop

@section('css')
    <style>
        .texto_vertical{
            -ms-writing-mode: tb-rl;
            -webkit-writing-mode: vertical-rl;
            -moz-writing-mode: vertical-rl;
            -ms-writing-mode: vertical-rl;
            writing-mode: vertical-rl;
        }

        .mark{
            background: #1ab7ea;
        }

        .marktest{
            background: #f94877;
        }

        .markst{
            background: orange;
        }

        .marktmdl{
            background: purple;
        }

        #tooltip-box{
            background: white;
            padding:10px;
            border: 1px solid black;
            z-index: 10;
            position: absolute;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
        }

        .tg  {border-collapse:collapse;border-spacing:0;}
        .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
        .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
        .tg .tg-s268{border-color:inherit;text-align:center;vertical-align:top; font-weight: bold; background: #F5F5F5;}
        .tg .tg-s6z2{border-color:inherit;text-align:left;vertical-align:top;}
    </style>
@stop
