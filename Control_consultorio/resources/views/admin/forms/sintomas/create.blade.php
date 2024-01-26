<!--begin::NewModal-->
<div class="modal fade" id="sintomaNewModal" tabindex="-1" role="dialog" aria-labelledby="sintomaNewModal"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo sintomas</h5>
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

            <form class="form" method="post" id="newFormSintoma" action="/sintoma">
                {{ csrf_field() }}
                <div class="modal-body">

                    
                    <div class="form-group row" id="pregunta1">
                        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>¿Precentas molestias estomacales? </b> </label>
                        <div class="radio-inline" id="respuesta1">
                            <label class="radio">
                                <input type="radio" id="answer" name="answer" value="Si">
                                <span></span>
                                Si
                            </label>
                            <label class="radio">
                                <input type="radio" id="answer" checked name="answer" value="No">
                                <span></span>
                                No
                            </label>
                        </div>
                    </div>

                    <div class="form-group row" id="pregunta2">
                        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>¿Experimenta dolor a arco en la parte superior del abdomen? </b> </label>
                        <div class="radio-inline" id="respuesta2">
                            <label class="radio">
                                <input type="radio" id="answer" name="answer" value="Si">
                                <span></span>
                                Si
                            </label>
                            <label class="radio">
                                <input type="radio" id="answer" checked name="answer" value="No">
                                <span></span>
                                No
                            </label>
                        </div>
                    </div>
                    <div class="form-group row" id="pregunta3">
                        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>¿Presencia de diarrea, fiebre, nauseas y vómitos?
                        </b> </label>
                        <div class="radio-inline" id="respuesta3">
                            <label class="radio">
                                <input type="radio" id="answer" name="answer" value="Si">
                                <span></span>
                                Si
                            </label>
                            <label class="radio">
                                <input type="radio" id="answer" checked name="answer" value="No">
                                <span></span>
                                No
                            </label>
                        </div>
                    </div>
                    <div class="form-group row"  id="pregunta4">
                        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>¿Hay escalofríos y dolor de cabeza?
                        </b> </label>
                        <div class="radio-inline" id="respuesta4">
                            <label class="radio">
                                <input type="radio" id="answer" name="answer" value="Si">
                                <span></span>
                                Si
                            </label>
                            <label class="radio">
                                <input type="radio" id="answer" checked name="answer" value="No">
                                <span></span>
                                No
                            </label>
                        </div>
                    </div>
                   
                    <div class="form-group row"  id="pregunta5">
                        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>¿Hay también síntomas como deshidratación o pérdida de apetito?
                        </b> </label>
                        <div class="radio-inline" id="respuesta5">
                            <label class="radio">
                                <input type="radio" id="answer" name="answer" value="Si">
                                <span></span>
                                Si
                            </label>
                            <label class="radio">
                                <input type="radio" id="answer" checked name="answer" value="No">
                                <span></span>
                                No
                            </label>
                        </div>
                    </div>
                   
                    <div class="form-group row"  id="pregunta6">
                        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>¿Presencia de sangre en heces o vómito?
                        </b> </label>
                        <div class="radio-inline" id="respuesta6">
                            <label class="radio">
                                <input type="radio" id="answer" name="answer" value="Si">
                                <span></span>
                                Si
                            </label>
                            <label class="radio">
                                <input type="radio" id="answer" checked name="answer" value="No">
                                <span></span>
                                No
                            </label>
                        </div>
                    </div>
                   
                    <div class="form-group row"  id="pregunta7">
                        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>¿Hay indigestión?</b> </label>
                        <div class="radio-inline" id="respuesta7">
                            <label class="radio">
                                <input type="radio" id="answer" name="answer" value="Si">
                                <span></span>
                                Si
                            </label>
                            <label class="radio">
                                <input type="radio" id="answer" checked name="answer" value="No">
                                <span></span>
                                No
                            </label>
                        </div>
                    </div>
                   
                    <div class="form-group row"  id="pregunta8">
                        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>¿Náuseas y vómitos presentes?</b> </label>
                        <div class="radio-inline" id="respuesta8">
                            <label class="radio">
                                <input type="radio" id="answer" name="answer" value="Si">
                                <span></span>
                                Si
                            </label>
                            <label class="radio">
                                <input type="radio" id="answer" checked name="answer" value="No">
                                <span></span>
                                No
                            </label>
                        </div>
                    </div>
                   
                    <div class="form-group row"  id="pregunta9">
                        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>¿Sensación de plenitud después de comer?</b> </label>
                        <div class="radio-inline" id="respuesta9">
                            <label class="radio">
                                <input type="radio" id="answer" name="answer" value="Si">
                                <span></span>
                                Si
                            </label>
                            <label class="radio">
                                <input type="radio" id="answer" checked name="answer" value="No">
                                <span></span>
                                No
                            </label>
                        </div>
                    </div>
                   
                    <div class="form-group row"  id="pregunta10">
                        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>¿Presencia de sangre en heces o vómito?</b> </label>
                        <div class="radio-inline" id="respuesta10">
                            <label class="radio">
                                <input type="radio" id="answer" name="answer" value="Si">
                                <span></span>
                                Si
                            </label>
                            <label class="radio">
                                <input type="radio" id="answer" checked name="answer" value="No">
                                <span></span>
                                No
                            </label>
                        </div>
                    </div>
                   
                   
                    
                  

                <div class="modal-footer">
                            <button type="button" class="btn btn-light-primary font-weight-bold"
                                data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary font-weight-bold">
                                Guardar
                            </button>
                    </div>
            </form>
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
        habilitarSiguientePregunta('#pregunta5', '#pregunta6', 'Si');
        habilitarSiguientePregunta('#pregunta2', '#pregunta7', 'Si');
        habilitarSiguientePregunta('#pregunta7', '#pregunta8', 'No');
        habilitarSiguientePregunta('#pregunta8', '#pregunta9', 'No');
        habilitarSiguientePregunta('#pregunta9', '#pregunta10', 'No');

        // Ocultar preguntas al cargar la página
        $('#pregunta2, #pregunta3, #pregunta4, #pregunta5, #pregunta6, #pregunta7, #pregunta8, #pregunta9, #pregunta10').hide();

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
