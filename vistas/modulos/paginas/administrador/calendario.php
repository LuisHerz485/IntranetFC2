
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item h5"><a href="#"><b class="text-red">Calendario</b></a></li>
                        <li class="breadcrumb-item active h5">WEB</li></b>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <style>
        .fc-content{
            color: white;
            text-transform: uppercase;
        }
        .fc th{
            padding: 10px 0px;
            vertical-align:  middle;
            background:  #85C1E9;
        }

        .fc-center h2{
            text-transform: uppercase;
            font-weight: bold;
        }

        .fc-head th{
            text-transform: uppercase;
            font-weight: bold;
        }

        .col-11 {
            background: #75b4cd;
        }

        .fc-day-number{
            font-weight: bold;
        }

        .fc-body span{
            font-weight: bold;
        }

        .col-11 button{
            background: #c8957a;
            font-weight: bold;
            text-transform: uppercase;
        } 
    </style>

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-danger">
                    <div id="barra"class="card-header">
                        <b class="h4">Calendario web</b>
                    </div>
                    <div class="card-body panel-body">
                        <body>
                            <div class=container>
                                    <div class="row">
                                        <div class="col"></div>
                                        <div class="col-12"><div id="Calendarioweb"></div></div>
                                        <div lass="col"></div>
                                    </div>
                            </div>
                            <div id='calendar'></div>

                            

                                <script>
                                    $(document).ready(function() {
                                        $('#Calendarioweb').fullCalendar({
                                            header:{
                                                left: 'today,prev,next',
                                                center: 'title',
                                                right: 'month,agendaWeek,agendaDay'
                                            },
                                            dayClick:function(date, jsEvent, view){
                                                $('#btnAgregar').prop("disabled", false);
                                                $('#btnModificar').prop("disabled", true);
                                                $('#btnEliminar').prop("disabled", true);
                                                limpiarFormulario();
                                                $('#txtFecha').val(date.format());
                                                $("#modaleventos").modal("show"); 
                                                
                                            },
                                                events:'modelos/eventos.modelo.php',


                                            eventClick:function(calEvent, jsEvent, view){
                                                $('#btnAgregar').prop("disabled", true);
                                                $('#btnModificar').prop("disabled", false);
                                                $('#btnEliminar').prop("disabled", false);

                                                // H2
                                                $("#tituloEvento").html(calEvent.title);

                                                // Mostrar la información del evento en los inputs
                                                $("#txtDescripcion").val(calEvent.descripcion);
                                                $("#txtID").val(calEvent.id);
                                                $("#txtTitulo").val(calEvent.title);
                                                $("#txtColor").val(calEvent.color);

                                                FechaHora = calEvent.start._i.split(" ");
                                                $("#txtFecha").val(FechaHora[0]);
                                                $("#txtHora").val(FechaHora[1]);

                                                $("#modaleventos").modal('show');
                                            },
                                            // MOVIMIENTO DE EVENTOS DE UN DÍA A OTRO
                                            editable:true,
                                            eventDrop:function(calEvent){

                                                $("#txtID").val(calEvent.id);
                                                $("#txtTitulo").val(calEvent.title);
                                                $("#txtColor").val(calEvent.color);
                                                $("#txtDescripcion").val(calEvent.descripcion);

                                                // FECHA
                                                var fechaHora = calEvent.start.format().split("T");
                                                $("#txtFecha").val(fechaHora[0]);
                                                $("#txtHora").val(fechaHora[1]);

                                                // Aplicar la siguiente funcion
                                                // Recolectar la informacion que ha depositado calEvent
                                                // Recolectar datos de la GUI
                                                recolectardatosGUI();

                                                // Agregando nuevo evento al día seleccionado
                                                enviarinformacion('modificar', NuevoEvento, true);

                                            }                                           
                                        });
                                    });


                                </script>
                                
                    
                                <!-- Modal Modificar agregar-->
                                <div class="modal fade" id="modaleventos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="tituloevento"></h5>
                                            </div>
                                            <div class="modal-body">
                                                <div id="descripcionEvento"></div>

                                                <input type="hidden" id="txtID" name="txtID">
                                                <input type="hidden" id="txtFecha" name="txtFecha"/>


                                                <div class="form-row">
                                                    <div class="form-group col-md-8">
                                                        <label>Título:</label>
                                                        <input type="text" id="txtTitulo" class="form-control" placeholder="Titulo del evento">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label>Hora del evento:</label>
                                                        <div class="input-group clockpicker" data-autoclose="true">
                                                            <input type="text" id="txtHora" value="08:30" class="form-control"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Descripción:</label>
                                                    <textarea id="txtDescripcion" rows="3" class="form-control"></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label>Color:</label>
                                                    <input type="color" value="#ff0000" id="txtColor" class="form-control" style="height: 36px;">
                                                </div>

                                            </div>


                                            <div class="modal-footer">
                                                <button type="button" id="btnAgregar" class="btn btn-success">Agregar</button>
                                                <button type="button" id="btnModificar" class="btn btn-success">Modificar</button>
                                                <button type="button" id="btnEliminar" class="btn btn-danger">Borrar</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            <script>
                            var NuevoEvento;
                                $('#btnAgregar').click(function(){
                                    recolectardatosGUI();
                                    enviarinformacion('agregar',NuevoEvento);
                                    
                                });
                                $('#btnEliminar').click(function(){
                                    recolectardatosGUI();
                                    enviarinformacion('eliminar',NuevoEvento);
                                    
                                });

                                $('#btnModificar').click(function(){
                                    recolectardatosGUI();
                                    enviarinformacion('modificar',NuevoEvento);
                                    
                                });


                                function recolectardatosGUI(){
                                    NuevoEvento = {
                                        id:$('#txtID').val(),
                                        title:$('#txtTitulo').val(),
                                        start:$('#txtFecha').val()+" "+$('#txtHora').val(),
                                        color:$('#txtColor').val(),
                                        descripcion:$('#txtDescripcion').val(),
                                        textColor:"#FFFFFF",
                                        end:$('#txtFecha').val()+" "+$('#txtHora').val()
                                    };
                                }
                                function enviarinformacion(accion,objEvento,modal){
                                    $.ajax({
                                        type:'POST',
                                        url:'modelos/eventos.modelo.php?accion='+accion,
                                        data:objEvento,
                                        success:function(msg){
                                            if(msg){
                                                $('#Calendarioweb').fullCalendar('refetchEvents');
                                                if (!modal){
                                                    $("#modaleventos").modal("toggle");
                                                }
                                            }
                                        },
                                        error:function(){
                                            alert('Error al enviar los datos');
                                        }
                                    });

                                }
                                $('.clockpicker').clockpicker();
                                // Cuando el usuario invoque la funcion, se tendrá que limpiar la información
                                function limpiarFormulario(){
                                    $("#txtID").val('');
                                    $("#txtTitulo").val('');
                                    $("#txtColor").val('');
                                    $("#txtDescripcion").val('');

                                }
                            </script>
                        </body>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>