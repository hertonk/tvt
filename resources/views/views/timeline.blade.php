@extends('adminlte::page')

@section('title', 'Visualizar Projeto - Grafo')

@section('content_header')
    <section class="content-header">
        <h1>
            <i class="fa fa-file"></i>&nbsp;App de Mobilidade
            <small>visualizar em Timeline</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Projetos</a></li>
            <li class="active">Visualizar em Timeline</li>
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
                            RF01
                        </div>
                    </div>

                    <div class="form-group">
                        <div id="visu" class="col-sm-12 text-center">
                           <h2>Visualização em Timeline</h2>
                        </div>
                    </div>

                    <div id="timeline2_combine"></div>

                    
                 
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
<script src="https://code.jquery.com/jquery-latest.min.js"></script>
<script src="https://d3js.org/d3.v4.min.js" charset="utf-8"></script>
<script src="{{ asset('js/d3-timelines.js') }}" language="JavaScript"></script>
<script type="text/javascript">
    window.onload = function() {

      var rectAndCircleTestData = [
        {label:'HST01', times: [{"starting_time": 1554459010000,
                 "display": "circle"}, {"starting_time": 1554459010000, "ending_time": 1554459010000}]},

        {label:'RF01', times: [{"starting_time": 1554891010000,
                 "display": "circle"}, {"starting_time": 1554891010000, "ending_time": 1554891010000}]},

        {label:'MDL01', times: [{"starting_time": 1555323010000,
                  "display": "circle"}, {"starting_time": 1555323010000, "ending_time": 1555323010000}]},
      ];

     

      var width = 1100;

      function timelineRectAndCircle() {
        var chart = d3.timelines();

        var svg = d3.select("#timeline2_combine").append("svg").attr("width", width)
          .datum(rectAndCircleTestData).call(chart);
      }


      timelineRectAndCircle() ;
    
    }
  </script>
@stop

@section('css')
<style type="text/css">
    .axis path,
    .axis line {
      fill: none;
      stroke: black;
      shape-rendering: crispEdges;
    }

    .axis text {
      font-family: sans-serif;
      font-size: 10px;
      margin-top: 50px !important;
    }

    .timeline-label {
      position: relative;
      font-family: sans-serif;
      font-size: 12px;
      top: 50px !important;
    }

    #timeline2 .axis {
      transform: translate(0px,40px);
      -ms-transform: translate(0px,40px); /* IE 9 */
      -webkit-transform: translate(0px,40px); /* Safari and Chrome */
      -o-transform: translate(0px,40px); /* Opera */
      -moz-transform: translate(0px,40px); /* Firefox */
    }

    .coloredDiv {
      height:20px; width:20px; float:left;
    }
  </style>
@stop
