@extends('adminlte::page')

@section('title', 'Visualizar Projeto - Liquid Fill Gauge')

@section('content_header')
    <section class="content-header">
        <h1>
            <i class="fa fa-file"></i>&nbsp;App de Mobilidade
            <small>visualizar em Liquid Fill Gauge</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Projetos</a></li>
            <li class="active">Visualizar em Liquid Fill Gauge</li>
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
                        <div id="visu" class="col-sm-12 text-center">
                           <h2>Visualização em Liquid Fill Gauge</h2>
                        </div>
                    </div>

                 <svg id="fillgauge1" width="97%" height="250" onclick="gauge1.update(NewValue());"></svg>   
                 
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
    <script src="https://d3js.org/d3.v3.min.js" language="JavaScript"></script>
    <script src="{{ asset('js/liquidFillGauge.js') }}" language="JavaScript"></script>
    <script language="JavaScript">
    var gauge1 = loadLiquidFillGauge("fillgauge1", 55);

    function NewValue(){
        if(Math.random() > .5){
            return Math.round(Math.random()*100);
        } else {
            return (Math.random()*100).toFixed(1);
        }
    }
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
