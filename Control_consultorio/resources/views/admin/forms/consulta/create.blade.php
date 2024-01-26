<!--begin::EditModal-->
<div class="modal fade" id="consultaModal" tabindex="-1" role="dialog" aria-labelledby="consultaModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo consulta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="la la-remove"></span>
                </button>
            </div>

            <div class="modal-body">
                <div class="alert alert-custom alert-default" role="alert">
                    <div class="alert-icon">
                        <span class="svg-icon svg-icon-info svg-icon-2x">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
                                    <rect fill="#000000" x="11" y="10" width="2" height="7" rx="1" />
                                    <rect fill="#000000" x="11" y="7" width="2" height="2" rx="1" />
                                </g>
                            </svg><!--end::Svg Icon-->
                        </span>
                    </div>
                    <div class="alert-text">
                        Los campos marcados con <code>*</code> son obligatorios<br />
                    </div>
                </div>
            </div>

            <form class="form" method="post" id="newFormConsulta" action="/consulta">
                {{ csrf_field() }}
                <div class="modal-body">

                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>Paciente</b> </label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <select class="form-control" id="id_paciente" name="id_paciente">
                                <option value="">Selecciona un paciente</option>
                                @foreach ($pacientes as $paciente)
                                    <option value="{{ $paciente->id }}">
                                        {{ $paciente->Nombre }} {{ $paciente->AP }} {{ $paciente->AM }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>Médico</b> </label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <span class="form-control-static">{{ Auth::user()->name }}</span>
                            <input type="hidden" name="id_medico" value="{{ Auth::user()->id }}" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>Consultorio</b> </label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <input type="text" class="form-control" id="consultorio" name="consultorio" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>peso *</b> </label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <input type="numeric" class="form-control" required name="peso"
                                placeholder="Ingresa el peso del paciente" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>estatura *</b> </label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <input type="numeric" class="form-control" required name="estatura"
                                placeholder="Ingresa la estatura del paciente" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>temperatura *</b> </label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <input type="text" class="form-control" required name="temperatura"
                                placeholder="Ingresa la temperatura del paciente" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>Presión *</b> </label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <input type="text" class="form-control" required name="presion"
                                placeholder="Ingresa la presion del paciente" />
                        </div>
                    </div>
                </div>

                <div class="form-group row" id="pregunta1">
                    <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>¿Precentas molestias estomacales?
                        </b> </label>
                    <div class="radio-inline" id="respuesta1">
                        <label class="radio">
                            <input type="radio" id="answer" name="answer1" value="Si">
                            <span></span>
                            Si
                        </label>
                        <label class="radio">
                            <input type="radio" id="answer" checked name="answer1" value="No">
                            <span></span>
                            No
                        </label>
                    </div>
                </div>

                <div class="form-group row" id="pregunta2">
                    <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>¿El dolor es intenso y repentino o
                            ligero? </b> </label>
                    <div class="radio-inline" id="respuesta2">
                        <label class="radio">
                            <input type="radio" id="answer" name="answer2" value="Si">
                            <span></span>
                            Intenso
                        </label>
                        <label class="radio">
                            <input type="radio" id="answer" checked name="answer2" value="No">
                            <span></span>
                            Ligero
                        </label>
                    </div>
                </div>
                <div class="form-group row" id="pregunta3">
                    <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>¿Presenta nauseas y vómitos?
                        </b> </label>
                    <div class="radio-inline" id="respuesta3">
                        <label class="radio">
                            <input type="radio" id="answer" name="answer3" value="Si">
                            <span></span>
                            Si
                        </label>
                        <label class="radio">
                            <input type="radio" id="answer" checked name="answer3" value="No">
                            <span></span>
                            No
                        </label>
                    </div>
                </div>
                <div class="form-group row" id="pregunta4">
                    <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>¿Los vómitos son explosivos y
                            repetitivos?
                        </b> </label>
                    <div class="radio-inline" id="respuesta4">
                        <label class="radio">
                            <input type="radio" id="answer" name="answer4" value="Si">
                            <span></span>
                            Si
                        </label>
                        <label class="radio">
                            <input type="radio" id="answer" checked name="answer4" value="No">
                            <span></span>
                            No
                        </label>
                    </div>
                </div>

                <div class="form-group row" id="pregunta5">
                    <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>¿El dolor empeora al consumir
                            aliemntos, café o medicamentos?
                        </b> </label>
                    <div class="radio-inline" id="respuesta5">
                        <label class="radio">
                            <input type="radio" id="answer" name="answer5" value="Si">
                            <span></span>
                            Si
                        </label>
                        <label class="radio">
                            <input type="radio" id="answer" checked name="answer5" value="No">
                            <span></span>
                            No
                        </label>
                    </div>
                </div>

                <div class="form-group row" id="pregunta6">
                    <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>¿Apareció en las últimas 6-8 horas
                            después de comer?
                        </b> </label>
                    <div class="radio-inline" id="respuesta6">
                        <label class="radio">
                            <input type="radio" id="answer" name="answer6" value="Si">
                            <span></span>
                            Si
                        </label>
                        <label class="radio">
                            <input type="radio" id="answer" checked name="answer6" value="No">
                            <span></span>
                            No
                        </label>
                    </div>
                </div>

                <div class="form-group row" id="pregunta7">
                    <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>¿Comió alimentos de alto riesgo?
                        </b> </label>
                    <div class="radio-inline" id="respuesta7">
                        <label class="radio">
                            <input type="radio" id="answer" name="answer7" value="Si">
                            <span></span>
                            Si
                        </label>
                        <label class="radio">
                            <input type="radio" id="answer" checked name="answer7" value="No">
                            <span></span>
                            No
                        </label>
                    </div>
                </div>

                <div class="form-group row" id="pregunta8">
                    <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>¿Presenta diarrea?</b> </label>
                    <div class="radio-inline" id="respuesta8">
                        <label class="radio">
                            <input type="radio" id="answer" name="answer8" value="Si">
                            <span></span>
                            Si
                        </label>
                        <label class="radio">
                            <input type="radio" id="answer" checked name="answer8" value="No">
                            <span></span>
                            No
                        </label>
                    </div>
                </div>



                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>Diagnostico</b> </label>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <input type="hidden" name="id_diagnostico" value="5"> Pendiente
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold"
                        data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        // Función para habilitar la siguiente pregunta según las respuestas
        function habilitarSiguientePregunta(preguntaActual, siguientePregunta, condicion) {
            $(preguntaActual).find('input[type="radio"]').on('change', function() {
                if ($(this).val() === condicion) {
                    $(siguientePregunta).show();
                } else {
                    $(siguientePregunta).hide();
                }
            });
        }

        // Lógica de habilitar y deshabilitar preguntas
        habilitarSiguientePregunta('#pregunta1', '#pregunta2', 'Si');
        habilitarSiguientePregunta('#pregunta2', '#pregunta3', 'No');
        habilitarSiguientePregunta('#pregunta3', '#pregunta4', 'Si');
        habilitarSiguientePregunta('#pregunta4', '#pregunta5', 'No');
        habilitarSiguientePregunta('#pregunta2', '#pregunta6', 'Si');
        habilitarSiguientePregunta('#pregunta6', '#pregunta7', 'Si');
        habilitarSiguientePregunta('#pregunta7', '#pregunta8', 'No');


        // Ocultar preguntas al cargar la página
        $('#pregunta2, #pregunta3, #pregunta4, #pregunta5, #pregunta6, #pregunta7, #pregunta8, #pregunta9, #pregunta10')
            .hide();

        // Restaurar respuestas seleccionadas después de enviar el formulario
        var storedAnswers = localStorage.getItem('storedAnswers');
        if (storedAnswers) {
            var answers = JSON.parse(storedAnswers);
            $.each(answers, function(questionId, answer) {
                $('#' + questionId).find('input[value="' + answer + '"]').prop('checked', true);
            });
        }

        // Guardar respuestas seleccionadas al cambiar
        $('input[type="radio"]').on('change', function() {
            var answers = {};
            $('input[type="radio"]:checked').each(function() {
                var questionId = $(this).closest('.form-group').attr('id');
                answers[questionId] = $(this).val();
            });
            localStorage.setItem('storedAnswers', JSON.stringify(answers));
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Evento change para el campo de selección de pacientes
        $('#id_paciente').change(function() {
            var selectedPatientId = parseInt($(this).val());

            // Verificar si se seleccionó un paciente
            if (!isNaN(selectedPatientId)) {
                var selectedPatient = {!! json_encode($pacientes) !!}.find(paciente => paciente.id ===
                    selectedPatientId);

                // Verificar si se encontró al paciente y si tiene fecha de nacimiento
                if (selectedPatient && selectedPatient.fecha_nac) {
                    var birthDate = new Date(selectedPatient.fecha_nac);
                    var today = new Date();
                    var age = today.getFullYear() - birthDate.getFullYear();

                    var consultorio;
                    if (age < 18) {
                        consultorio = 1;
                    } else if (age >= 18 && age <= 45) {
                        consultorio = 2;
                    } else {
                        consultorio = 3;
                    }

                    $('#consultorio').val(consultorio);
                } else {
                    // Manejar el caso en el que no se pueda obtener la fecha de nacimiento
                    console.error(
                        'Error: No se pudo obtener la fecha de nacimiento del paciente seleccionado.'
                        );
                }
            } else {
                // Manejar el caso en el que no se seleccionó ningún paciente
                console.error('Error: No se seleccionó ningún paciente.');
            }
        });
    });
</script>
