@extends('adminlte::page')

@section('title', 'Visualizar Projeto - Simple Bar')

@section('content_header')
    <section class="content-header">
        <h1>
            <i class="fa fa-file"></i>&nbsp;App de Mobilidade
            <small>visualizar em Simple Bar</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Projetos</a></li>
            <li class="active">Visualizar em Simple Bar</li>
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
                           <h2>Visualização em Simple Bar</h2>
                        </div>
                    </div>

                    <div id="graphic"></div>
                 
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
    <script>
        var data = [{
                "name": "Usuários",
                "value": 50,
        },
            {
                "name": "Motoristas",
                "value": 32,
        },
            {
                "name": "Corridas",
                "value": 19,
        }];

        //sort bars based on value
        data = data.sort(function (a, b) {
            return d3.ascending(a.value, b.value);
        })

        //set up svg using margin conventions - we'll need plenty of room on the left for labels
        var margin = {
            top: 15,
            right: 25,
            bottom: 15,
            left: 60
        };

        var width = 300 - margin.left - margin.right,
            height = 500 - margin.top - margin.bottom;

        var svg = d3.select("#graphic").append("svg")
            .attr("width", width + margin.left + margin.right)
            .attr("height", height + margin.top + margin.bottom)
            .append("g")
            .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

        var x = d3.scale.linear()
            .range([0, width])
            .domain([0, d3.max(data, function (d) {
                return d.value;
            })]);

        var y = d3.scale.ordinal()
            .rangeRoundBands([height, 0], .1)
            .domain(data.map(function (d) {
                return d.name;
            }));

        //make y axis to show bar names
        var yAxis = d3.svg.axis()
            .scale(y)
            //no tick marks
            .tickSize(0)
            .orient("left");

        var gy = svg.append("g")
            .attr("class", "y axis")
            .call(yAxis)

        var bars = svg.selectAll(".bar")
            .data(data)
            .enter()
            .append("g")

        //append rects
        bars.append("rect")
            .attr("class", "bar")
            .attr("y", function (d) {
                return y(d.name);
            })
            .attr("height", y.rangeBand())
            .attr("x", 0)
            .attr("width", function (d) {
                return x(d.value);
            });

        //add a value label to the right of each bar
        bars.append("text")
            .attr("class", "label")
            //y position of the label is halfway down the bar
            .attr("y", function (d) {
                return y(d.name) + y.rangeBand() / 2 + 4;
            })
            //x position is 3 pixels to the right of the bar
            .attr("x", function (d) {
                return x(d.value) + 3;
            })
            .text(function (d) {
                return d.value;
            });
        
    </script>
@stop

@section('css')
  <style>
        body {
            font-family: "Arial", sans-serif;
        }
        
        .bar {
            fill: #5f89ad;
        }
        
        .axis {
            font-size: 13px;
        }
        
        .axis path,
        .axis line {
            fill: none;
            display: none;
        }
        
        .label {
            font-size: 13px;
        }
    </style>
@stop
