@extends('adminlte::page')

@section('title', 'Cadastro de novo paciente')

@section('content_header')
    <h1>Cadastros de pacientes</h1>
    <a href="{{ route('admin.pacientes') }}" class="btn btn-primary btn-flat pull-right" style="margin-right: 5px; margin-top: -28px;" id="novoPacientes">
        <i class="fa fa-list"></i> Listagem de pacientes
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

                <form role="form" action="{{ route('admin.pacientes.store') }}" method="post">
                    {!! csrf_field() !!}
                    <div class="box-body">

                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group {{ $errors->has('nome') ? 'has-error' : '' }}">
                                    <label>Nome completo</label>
                                    <input type="text" name="nome" class="form-control" placeholder="Nome completo" value="{{ old('nome') }}" autocomplete="nop">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group {{ $errors->has('cpf') ? 'has-error' : '' }}">
                                    <label>CPF</label>
                                    <input type="text" name="cpf" class="form-control" placeholder="CPF" value="{{ old('cpf') }}" autocomplete="nop" data-inputmask='"mask": "999.999.999-99"' data-mask>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group {{ $errors->has('rua') ? 'has-error' : '' }}">
                                    <label>Logradouro</label>
                                    <input type="text" name="rua" class="form-control" placeholder="Logradouro" value="{{ old('rua') }}" autocomplete="nop">
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group {{ $errors->has('numero') ? 'has-error' : '' }}">
                                    <label>Número</label>
                                    <input type="text" name="numero" class="form-control" placeholder="Número" value="{{ old('numero') }}" autocomplete="nop">
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group {{ $errors->has('cep') ? 'has-error' : '' }}">
                                    <label>CEP</label>
                                    <input type="text" name="cep" class="form-control" placeholder="Código postal" value="{{ old('cep') }}" autocomplete="nop" data-inputmask='"mask": "99999-999"' data-mask>
                                </div>
                            </div>
                        </div>

                       <div class="row">
                            <div class=" col-md-2">
                                <div class="form-group {{ $errors->has('bairro') ? 'has-error' : '' }}">
                                    <label>Bairro</label>
                                    <input type="text" name="bairro" class="form-control" placeholder="Bairro" value="{{ old('bairro') }}" autocomplete="nop">
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group {{ $errors->has('cidade') ? 'has-error' : '' }}">
                                    <label>Cidade</label>
                                    <input type="text" name="cidade" class="form-control" placeholder="Cidade" value="{{ old('cidade') }}" autocomplete="nop">
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group {{ $errors->has('estado') ? 'has-error' : '' }}">
                                    <label>Estado</label>
                                    <input type="text" name="estado" class="form-control" placeholder="Estado" value="{{ old('estado') }}" autocomplete="nop">
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group {{ $errors->has('pais') ? 'has-error' : '' }}">
                                    <label>Pais</label>
                                    <input type="text" name="pais" class="form-control" placeholder="Pais" value="{{ old('pais') }}" autocomplete="nop">
                                </div>
                            </div>
                        </div>

                       <div class="row">
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('medicos') ? 'has-error' : '' }}">
                                    <label>Quais médicos deseja realizar suas consultas?</label>
                                    <select class="form-control select2" multiple="multiple" style="width: 100%;" name="medicos[]" value="{{ old('medicos') }}" autocomplete="nop">
                                        @foreach ($medicos as $medico)
                                            <option value="{{ $medico->id }}">{{ $medico->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                         <div class="row">
                            <div class=" col-md-2">
                                <div class="form-group {{ $errors->has('telefone_fixo') ? 'has-error' : '' }}">
                                    <label>Telefone fixo</label>
                                    <input type="text" name="telefone_fixo" class="form-control" placeholder="Telefone fixo" value="{{ old('telefone_fixo') }}" autocomplete="nop" data-inputmask='"mask": "(99) 9999-9999"' data-mask>                                    
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group {{ $errors->has('telefone_celular') ? 'has-error' : '' }}">
                                    <label>Telefone celular</label>
                                    <input type="text" name="telefone_celular" class="form-control" placeholder="Telefone celular" value="{{ old('telefone_celular') }}" autocomplete="nop" data-inputmask='"mask": "(99) 99999-9999"' data-mask>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group {{ $errors->has('e_mail') ? 'has-error' : '' }}">
                                    <label>E-mail</label>
                                    <input type="email" name="e_mail" class="form-control" placeholder="E-mail" value="{{ old('e_mail') }}" autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class=" col-md-6">
                                <div class="form-group">
                                    <label>Observações gerais</label>
                                    <textarea class="form-control" name="observacoes" rows="3" placeholder="Observações que achar necessária..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary btn-lg btn-flat btn-block">Salvar</button>
                        </div>
                        <div class="col-md-2">
                            <button type="reset" class="btn btn-default btn-lg btn-flat btn-block">Limpar</button>
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
