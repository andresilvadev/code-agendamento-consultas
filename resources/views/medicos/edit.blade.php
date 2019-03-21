@extends('adminlte::page')

@section('title', 'Edição de médicos')

@section('content_header')
    <h1>Editando médico de código:  {{ $medico->id }}</h1>
    <a href="{{ route('admin.medicos') }}" class="btn btn-primary btn-flat pull-right" style="margin-right: 5px; margin-top: -28px;" id="novoMedico">
        <i class="fa fa-list"></i> Listagem de médicos
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

                <form role="form" action="{{ route('admin.medicos.update', $medico->id) }}" method="POST">
                    {!! csrf_field() !!}
                    <div class="box-body">

                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                                    <label>Nome completo</label>
                                    <input type="text" name="nome" class="form-control" placeholder="Nome completo" value="{{ $medico->nome ? : old('nome')}}" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group {{ $errors->has('crm') ? 'has-error' : '' }}">
                                    <label>CRM</label>
                                    <input type="text" name="crm" class="form-control" placeholder="CRM" value="{{ $medico->crm ? : old('crm') }}" autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group {{ $errors->has('rua') ? 'has-error' : '' }}">
                                    <label>Rua</label>
                                    <input type="text" name="rua" class="form-control" placeholder="Rua" value="{{ $medico->rua ? : old('rua') }}" autocomplete="off">
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group {{ $errors->has('numero') ? 'has-error' : '' }}">
                                    <label>Número</label>
                                    <input type="text" name="numero" class="form-control" placeholder="Número" value="{{ $medico->numero ? : old('numero') }}" autocomplete="off">
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group {{ $errors->has('cep') ? 'has-error' : '' }}">
                                    <label>CEP</label>
                                    <input type="text" name="cep" class="form-control" placeholder="Código postal" value="{{ $medico->cep ? : old('cep') }}" autocomplete="off" data-inputmask='"mask": "99999-999"' data-mask>
                                </div>
                            </div>
                        </div>

                       <div class="row">
                            <div class=" col-md-2">
                                <div class="form-group {{ $errors->has('bairro') ? 'has-error' : '' }}">
                                    <label>Bairro</label>
                                    <input type="text" name="bairro" class="form-control" placeholder="Bairro" value="{{ $medico->bairro ? : old('bairro') }}" autocomplete="off">
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group {{ $errors->has('cidade') ? 'has-error' : '' }}">
                                    <label>Cidade</label>
                                    <input type="text" name="cidade" class="form-control" placeholder="Cidade" value="{{ $medico->cidade ? : old('cidade') }}" autocomplete="off">
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group {{ $errors->has('estado') ? 'has-error' : '' }}">
                                    <label>Estado</label>
                                    <input type="text" name="estado" class="form-control" placeholder="Estado" value="{{ $medico->estado ? : old('estado') }}" autocomplete="off">
                                </div>
                            </div>
                           <div class=" col-md-2">
                               <div class="form-group {{ $errors->has('pais') ? 'has-error' : '' }}">
                                   <label>Pais</label>
                                   <input type="text" name="pais" class="form-control" placeholder="Pais" value="{{ $medico->pais ? : old('pais') }}" autocomplete="off">
                               </div>
                           </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group {{ $errors->has('especialidade_id') ? 'has-error' : '' }}">
                                    <label>Especialidade médica</label>
                                    <select class="form-control" style="width: 100%;" name="especialidade_id" value="{{ old('especialidade_id') }}" autocomplete="off">

                                        <!-- SE MÉDICO->ESPECIALIDADE->ID FOR IGUAL A ESPECIALIDADE->ID ENTÃO MOSTRA SELECIONADO A ESPECIALIDADE CORRESPONDENTE, SENÃO MOSTRA A LISTA DE ESPECIALIDADES -->

                                        @foreach ($especialidades as $especialidade)
                                            @if ($medico->especialidade_id  == $especialidade->id)
                                                <option value="{{ $especialidade->id }}" selected>{{ $especialidade->nome }}</option>
                                            @else
                                                <option value="{{ $especialidade->id }}">{{ $especialidade->nome }}</option>
                                            @endif
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>

                         <div class="row">
                            <div class=" col-md-2">
                                <div class="form-group {{ $errors->has('telefone_fixo') ? 'has-error' : '' }}">
                                    <label>Telefone fixo</label>
                                    <input type="text" name="telefone_fixo" class="form-control" placeholder="Telefone fixo" value="{{ $medico->telefone_fixo ? : old('telefone_fixo') }}" autocomplete="off" data-inputmask='"mask": "(99) 9999-9999"' data-mask>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group {{ $errors->has('telefone_celular') ? 'has-error' : '' }}">
                                    <label>Telefone celular</label>
                                    <input type="text" name="telefone_celular" class="form-control" placeholder="Telefone celular" value="{{ $medico->telefone_celular ? : old('telefone_celular') }}" autocomplete="off" data-inputmask='"mask": "(99) 99999-9999"' data-mask>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group {{ $errors->has('e_mail') ? 'has-error' : '' }}">
                                    <label>E-mail</label>
                                    <input type="email" name="e_mail" class="form-control" placeholder="E-mail" value="{{ $medico->e_mail ? : old('e_mail') }}" autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class=" col-md-6">
                                <div class="form-group">
                                    <label>Observações gerais</label>
                                    <textarea class="form-control" name="observacoes" rows="3" placeholder="Observações que achar necessária...">{{ $medico->observacoes ? : old('observacoes') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary btn-lg btn-flat btn-block">Salvar</button>
                        </div>
                        <div class="col-md-2">
                            <a href="{{route('admin.medicos')}}" class="btn btn-default btn-lg btn-flat btn-block">Cancelar</a>
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
