@extends('adminlte::page')

@section('title', 'Lista de especialidades médicas')

@section('content_header')

    <h1>Painel de informações</h1>

@stop

@section('content')

    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{ $usuarios }}</h3>

                    <p>Usuários cadastrados</p>
                </div>
                <div class="icon">
                    <i class="fa fa-user"></i>
                </div>
                <a href="{{ route('admin.users') }}" class="small-box-footer">
                    Mais informações <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{ $medicos }}</h3>

                    <p>Médicos cadastrados</p>
                </div>
                <div class="icon">
                    <i class="fa fa-medkit"></i>
                </div>
                <a href="{{ route('admin.medicos') }}" class="small-box-footer">
                    Mais informações <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ $especialidades }}</h3>

                    <p>Especialidades disponíveis</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-list"></i>
                </div>
                <a href="{{ route('admin.especialidades') }}" class="small-box-footer">
                    Mais informações <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{ $pacientes }}</h3>

                    <p>Pacientes atendidos</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-contacts"></i>
                </div>
                <a href="{{ route('admin.pacientes') }}" class="small-box-footer">
                    Mais informações <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
    </div>

@stop

@section('css')

@stop

@section('js')      
    


@stop
