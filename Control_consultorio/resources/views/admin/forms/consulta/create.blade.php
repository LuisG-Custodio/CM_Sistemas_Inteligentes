<!--begin::EditModal-->
<div class="modal fade" id="userConsultaModal" tabindex="-1" role="dialog" aria-labelledby="userConsultaModal" aria-hidden="true">
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
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                                    <rect fill="#000000" x="11" y="10" width="2" height="7" rx="1"/>
                                    <rect fill="#000000" x="11" y="7" width="2" height="2" rx="1"/>
                                </g>
                            </svg><!--end::Svg Icon-->
                        </span>                        
                    </div>
                    <div class="alert-text">
                        Los campos marcados con <code>*</code> son obligatorios<br />
                    </div>
                </div>
            </div>
                                                
            <form class="form" method="post" id="newFormUser" action="/users">
                {{ csrf_field() }}
                <div class="modal-body">

                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>id paciente</b> </label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <select class="form-control" id="paciente" name="pacientetxt">
                                <option value="">Selecciona un paciente</option>
                                <option value="1">Paciente 1</option>
                                <option value="2">Paciente 2</option>
                                <option value="3">Paciente 3</option>
                                <!-- Añade más opciones según sea necesario -->
                            </select>
                        </div>
                    </div>
                    
                    
                    

                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>id médico</b> </label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <span class="form-control-static">{{ old('last_name') }}</span>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>Consultorio</b> </label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <span class="form-control-static">{{ old('last_name') }}</span>
                        </div>
                    </div>
                    
                    
                    
                    
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>peso *</b> </label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <input type="numeric" class="form-control" required name="password" placeholder="Ingresa tu contraseña"/>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>estatura *</b> </label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <input type="numeric" class="form-control" required name="password_confirmation" placeholder="Confirma tu contraseña"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>temperatura *</b> </label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <input type="text" class="form-control" required name="password_confirmation" placeholder="Confirma tu contraseña"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>Presión *</b> </label>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <input type="text" class="form-control" required name="password_confirmation" placeholder="Confirma tu contraseña"/>
                        </div>
                    </div>
                </div> 

                <div class="form-group row">
                    <label class="col-form-label text-right col-lg-3 col-sm-12"> <b>id diagnostico</b> </label>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <span class="form-control-static">{{ old('last_name') }}</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">Guardar</button>
                </div>                
            </form>
        </div>
    </div>
</div>
<!--end::EditModal-->