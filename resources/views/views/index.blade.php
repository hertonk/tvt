@extends('adminlte::page')

@section('title', 'Visualizar Projeto')

@section('content_header')
    <section class="content-header">
        <h1>
            <i class="fa fa-file"></i>&nbsp;App de Mobilidade
            <small>visualizar</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Projetos</a></li>
            <li class="active">Visualizar</li>
        </ol>
    </section>
    @if ($errors->any())
            <br>
            <br>
            <div class="alert alert-danger">
                <p><strong>ATENÇÃO!</strong></p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
@stop

@section('content')
    <div class="box">
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <form class="form-horizontal" method="post" action="{{ route('view.process') }}">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">O que você deseja?</label>

                        <div class="col-sm-10">
                            <select name="question" class="form-control" id="pergunta">
                                @foreach($questions as $question)
                                <option value="{{ $question->id }}">{{ $question->description }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Qual requisito?</label>

                        <div class="col-sm-10">
                            <select name="requeriment" class="form-control" id="pergunta">
                                @foreach($requeriments as $requeriment)
                                <option value="{{ $requeriment->id }}">{{ $requeriment->code }} - {{ $requeriment->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    

                    @foreach($visus as $item)
                        <input type="hidden" name="visu" value="{{ getVisu(1) }}">
                    @endforeach
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <input type="hidden" name="project" id="project" value="{{ request()->route('id') }}" />
                    <input type="submit" name="enviar" id="enviar" class="btn btn-info pull-right" value="Visualizar" />
                </div>
                <!-- /.box-footer -->
            </form>
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
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

    <script type="text/javascript">
        $('select[name=state_id]').change(function () {
            var idEstado = $(this).val();
            $.get('/get-cidades/' + idEstado, function (cidades) {
                $('select[name=city_id]').empty();
                $.each(cidades, function (key, value) {
                    $('select[name=city_id]').append('<option value=' + value.id + '>' + value.title + '</option>');
                });
            });
        });

        $('#email').change(function () {
            var email = $(this).val();
            $.get('/verify/' + email, function (res) {
                $('#res').html(res);
            });
        });

        $('#email').change(function () {
            var email = $(this).val();
            $.get('/getButton/' + email, function (res) {

                if(res == 1){
                    $('#box-btn').html(res);
                } else {
                    $('#box-btn').html(res);
                }
            });
        });

        $("#cep").mask("00000-000");
        $("#cnpj").mask("99.999.999/9999-99");
    </script>
@stop
