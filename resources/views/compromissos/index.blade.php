@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Agendamentos</div>

                <div class="card-body">
                    <div id="agenda">
                    
                    
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script type="text/javascript">
    
        $(document).ready(function() {
            $("#agenda").fullCalendar(
                {
                    themeSystem: 'bootstrap4',
                    locale: 'pt-br',
                    header: {
                        left:   'prev,today,next', 
                        center: 'title',
                        right:  'month,agendaWeek,agendaDay,listMonth',
                    },
                    footer: true,     
                    events: "http://127.0.0.1:8000/api/compromissos", // Retorno da lista de compromissos
                    buttonText: {                                                
                        today: "Hoje",
                        month: "Mês",
                        week: "Semana",
                        day: "Dia",
                        list: "Listagem",
                        prev: " < ",
                        next: " > ",
                    },      
                    defaultView: 'agendaWeek',
                    selectable: true,
                    selectHelper: true,
                    editable: true,
                    eventLimit: true, 

                    select: function(start, end) {
                        // alert(start);
                        // alert(end);
                        
                        var hora_inicio = moment(start).format("YYYY-MM-DD HH:mm");
                        var hora_fim = moment(end).format("YYYY-MM-DD HH:mm");

                        // alert(inicio);
                        // alert(fim);

                        var nome_paciente = window.prompt("Informe o nome do paciente:")
                        // console.log(nome);

                        var dados = {
                            title: nome_paciente,
                            start: hora_inicio,
                            end: hora_fim
                        }

                        console.log(dados); 

                        $.post("http://127.0.0.1:8000/api/compromissos", dados, function(response){
                            if (response.status == 'success') {

                                var agendamento = {
                                    title: response.title,
                                    start: response.start,
                                    end: response.end
                                }

                                $("#agenda").fullCalendar('renderEvent', agendamento, true);
                                alert(response.mensagem);
                            } else {
                                alert(response.mensagem);
                            }
                        }, 'json');
                    }
                }
            );
        });
    </script>
@stop