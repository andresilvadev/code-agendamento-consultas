@extends('adminlte::page')

@section('title', 'Lista de especialidades médicas')

@section('content_header')

    <h1 >Listagem de especialidades</h1>

    <a href="{{ route('admin.especialidades.create') }}" class="btn btn-primary btn-flat pull-right" style="margin-right: 5px; margin-top: -28px;">
        <i class="fa fa-plus"></i> Cadastrar nova especialidade médico
    </a>

@stop

@section('content')


    @if (session('status'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fa fa-check"></i>
            {{ session('status') }}
        </div>
    @endif


    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Opções de filtro</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="especialidades_table" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th style="width: 30px;">Cód</th>
                  <th>Nome</th>
                  <th>Descrição</th>
                  <th width="160">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($especialidades as $especialidade)
                    <tr>
                        <td style="width: 30px;">{{ $especialidade->id }}</td>
                        <td>{{ $especialidade->nome }}</td>
                        <td>{{ $especialidade->descricao }}</td>
                        <td>
                            <a href="{{  route('admin.especialidades.edit', $especialidade->id) }}" class="btn btn-success btn-sm">Editar</a>
                            <button href="javascript:void(0);" class="btn btn-danger btn-sm delete_especialidade" id="{{ $especialidade->id }}">Deletar</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th style="width: 30px;">Cód</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th width="160">Ações</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
@stop

@section('css')

@stop

@section('js')      
    
    <script>

        $(function (){
            toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-bottom-center",
            "preventDuplicates": true,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
            }  
            //toastr.success('Médico cadastrado com sucesso!');
        });

        // https://datatables.net/manual/i18n  -- DATA TABLE INTERNACIONALIZAÇÃO
        $(function () {
            $('#especialidades_table').DataTable({
                "language": {
                "lengthMenu": "Mostrando _MENU_ por página",
                "zeroRecords": "Nenhum resultado encontrado com os critérios de pesquisa",
                "search": "Pesquisar:",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro encontrado",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "paginate": {
                    "first":      "Primeira",
                    "previous":   "Anterior",
                    "next":       "Próxima",
                    "last":       "Última"
                    },
                },
            });          
        });

        $('.delete_especialidade').click(function(){
            if( confirm('Deseja apagar esta especialidade médica?') ) {

            var id = $(this).attr('id');     

                $.ajax({
                    type:'DELETE',
                    url: 'especialidades/'+id+'/delete',
                    data: { somefield: "Algum valor para o campo", _token: '{{csrf_token()}}' },
                    success: function( response ) {
                        console.log(response);
                        if ( response.status === 'success' ) {                
                            setInterval(function() {
                                window.location.reload();
                            }, 300);
                        }
                    },
                    error: function( data ) {
                        if ( data.status === 422 ) {
                            console.log('Erro ao deletar especialidade médica');
                        }
                    }
                });        
                return false;
            }
        });

    </script>

    <script>
        
    </script>



@stop
