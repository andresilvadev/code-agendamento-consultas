@extends('adminlte::page')

@section('title', 'Edição de especialidade médica')

@section('content_header')
    <h1>Editando especialidade médica de código:  {{ $especialidade->id }}</h1>
    <a href="{{ route('admin.especialidades') }}" class="btn btn-primary btn-flat pull-right" style="margin-right: 5px; margin-top: -28px;">
        <i class="fa fa-list"></i> Listagem de especialidades médicas
    </a>
@stop

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<section>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">

                <div class="box-header with-border">
                    <h3 class="box-title">Informações principais</h3>
                </div>

                <form role="form" action="{{ route('admin.especialidades.update', $especialidade->id) }}" method="POST">
                    {!! csrf_field() !!}
                    <div class="box-body">

                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                                    <label>Nome</label>
                                    <input type="text" name="nome" class="form-control" placeholder="Nome" value="{{ $especialidade->nome ? : old('nome')}}" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group {{ $errors->has('descricao') ? 'has-error' : '' }}">
                                    <label>Descrição</label>
                                    <input type="text" name="descricao" class="form-control" placeholder="Descrição" value="{{ $especialidade->descricao ? : old('descricao') }}" autocomplete="off">
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="box-footer">
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary btn-lg btn-flat btn-block">Salvar</button>
                        </div>
                        <div class="col-md-2">
                            <a href="{{route('admin.especialidades')}}" class="btn btn-default btn-lg btn-flat btn-block">Cancelar</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>

@stop

@section('css')

@stop

@section('js')
<script>

</script>
@stop
