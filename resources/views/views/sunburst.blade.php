@extends('adminlte::page')

@section('title', 'Visualizar Projeto - Sunburst')

@section('content_header')
    <section class="content-header">
        <h1>
            <i class="fa fa-file"></i>&nbsp;App de Mobilidade
            <small>visualizar em Sunburst</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Projetos</a></li>
            <li class="active">Visualizar em Sunburst</li>
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
                          Quais os relacionamentos deste requisito?
                        </div>
                    </div>


                    <div class="form-group">
                        <div id="visu" class="col-sm-12 text-center">
                           <h2>Visualização em Sunburst</h2>
                        </div>
                    </div>

                    <div class="viz" id="vis" style="width:850px; margin: 0 auto;">
                 
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
<script src="http://d3js.org/d3.v3.min.js" language="JavaScript"></script>
	<script language="JavaScript">
		! function() {
			function t(n, e) {
				return n === e ? !0 : n.children ? n.children.some(function(n) {
					return t(n, e)
				}) : !1
			}

			function n(t) {
				if(t.children) {
					var e = t.children.map(n),
						r = d3.hsl(e[0]),
						a = d3.hsl(e[1]);
					return d3.hsl((r.h + a.h) / 2, 1.2 * r.s, r.l / 1.2)
				}
				return t.colour || "#fff"
			}

			function e(t) {
				var n = r(t),
					e = d3.interpolate(d.domain(), [t.x, t.x + t.dx]),
					a = d3.interpolate(u.domain(), [t.y, n]),
					i = d3.interpolate(u.range(), [t.y ? 20 : 0, o]);
				return function(t) {
					return function(n) {
						return d.domain(e(n)), u.domain(a(n)).range(i(n)), x(t)
					}
				}
			}

			function r(t) {
				return t.children ? Math.max.apply(Math, t.children.map(r)) : t.y + t.dy
			}

			function a(t) {
				return .299 * t.r + .587 * t.g + .114 * t.b
			}
			var i = 840,
				l = i,
				o = i / 2,
				d = d3.scale.linear().range([0, 2 * Math.PI]),
				u = d3.scale.pow().exponent(1.3).domain([0, 1]).range([0, o]),
				c = 5,
				s = 1e3,
				h = d3.select("#vis");
			h.select("img").remove();
			var f = h.append("svg").attr("width", i + 2 * c).attr("height", l + 2 * c).append("g").attr("transform", "translate(" + [o + c, o + c] + ")");
			h.append("p").attr("id", "intro");
			var p = d3.layout.partition().sort(null).value(function(t) {
					return 5.8 - t.depth
				}),
				x = d3.svg.arc().startAngle(function(t) {
					return Math.max(0, Math.min(2 * Math.PI, d(t.x)))
				}).endAngle(function(t) {
					return Math.max(0, Math.min(2 * Math.PI, d(t.x + t.dx)))
				}).innerRadius(function(t) {
					return Math.max(0, t.y ? u(t.y) : t.y)
				}).outerRadius(function(t) {
					return Math.max(0, u(t.y + t.dy))
				});
			d3.json("{{ asset('json/flare.json') }}", function(r, i) {
				function l(n) {
					h.transition().duration(s).attrTween("d", e(n)), m.style("visibility", function(e) {
						return t(n, e) ? null : d3.select(this).style("visibility")
					}).transition().duration(s).attrTween("text-anchor", function(t) {
						return function() {
							return d(t.x + t.dx / 2) > Math.PI ? "end" : "start"
						}
					}).attrTween("transform", function(t) {
						var n = (t.name || "").split(" ").length > 1;
						return function() {
							var e = 180 * d(t.x + t.dx / 2) / Math.PI - 90,
								r = e + (n ? -.5 : 0);
							return "rotate(" + r + ")translate(" + (u(t.y) + c) + ")rotate(" + (e > 90 ? -180 : 0) + ")"
						}
					}).style("fill-opacity", function(e) {
						return t(n, e) ? 1 : 1e-6
					}).each("end", function(e) {
						d3.select(this).style("visibility", t(n, e) ? null : "hidden")
					})
				}
				var o = p.nodes({
						children: i
					}),
					h = f.selectAll("path").data(o);
				h.enter().append("path").attr("id", function(t, n) {
					return "path-" + n
				}).attr("d", x).attr("fill-rule", "evenodd").style("fill", n).on("click", l);
				var m = f.selectAll("text").data(o),
					y = m.enter().append("text").style("fill-opacity", 1).style("fill", function(t) {
						return a(d3.rgb(n(t))) < 125 ? "#eee" : "#000"
					}).attr("text-anchor", function(t) {
						return d(t.x + t.dx / 2) > Math.PI ? "end" : "start"
					}).attr("dy", ".2em").attr("transform", function(t) {
						var n = (t.name || "").split(" ").length > 1,
							e = 180 * d(t.x + t.dx / 2) / Math.PI - 90,
							r = e + (n ? -.5 : 0);
						return "rotate(" + r + ")translate(" + (u(t.y) + c) + ")rotate(" + (e > 90 ? -180 : 0) + ")"
					}).on("click", l);
				y.append("tspan").attr("x", 0).text(function(t) {
					return t.depth ? t.name.split(" ")[0] : ""
				}), y.append("tspan").attr("x", 0).attr("dy", "1em").text(function(t) {
					return t.depth ? t.name.split(" ")[1] || "" : ""
				})
			})
		}();

	</script>
@stop

@section('css')

@stop
