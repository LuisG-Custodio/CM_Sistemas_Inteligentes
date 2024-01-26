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

                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>Diagnostico</b> </label>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <select class="form-control" id="id_diagnostico " name="id_diagnostico">
                            <option value="">Selecciona un diagnostico</option>
                            @foreach ($diagnosticos as $diagnostico)
                                <option value="{{ $diagnostico->id }}">
                                    {{ $diagnostico->nombre }}
                                </option>
                            @endforeach
                        </select>
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
        // Evento change para el campo de selección de pacientes
        $('#id_paciente').change(function() {
            var selectedPatientId = parseInt($(this).val());
            if (selectedPatientId !== '') {
                var selectedPatient = {!! json_encode($pacientes) !!}.find(paciente => paciente.id ==
                    selectedPatientId);
                var birthDate = new Date(parseInt(selectedPatient.fecha_nac));

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
            }
        });
    });
</script>