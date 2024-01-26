{{-- Se incluye la plantilla ya predefinida del menu --}}
@extends('admin.layouts.app')

{{-- Se le da el nombre a la sección segun el sitio que se este consultando --}}
@section('breadcrumb')
    <span class="font-weight-bold mr-4">Lista de pacientes</span>
@endsection

{{-- Apartir de esta sección se comienza a estructurar el contenido de este modulo der pacientes --}}
@section('content')
    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">
                    Lista de pacientes
                </h3>
            </div>

            @can('system.paciente.create')
            


                <div class="card-toolbar">
                    <!--begin::Button-->
                    <a href="/paciente " class="btn btn-primary font-weight-bolder" data-toggle="modal"
                    data-target="#pacienteNewModal">
                        <span class="svg-icon svg-icon-md">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <circle fill="#000000" cx="9" cy="15" r="6" />
                                    <path
                                        d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                        fill="#000000" opacity="0.3" />
                                </g>
                            </svg><!--end::Svg Icon-->
                        </span>
                        Nuevo paciente
                    </a>
                    <!--end::Button-->
                </div>
            @endcan
        </div>



        <div class="card-body">

            <!--begin: Datatable-->
            <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div>
            <!--end: Datatable-->
        </div>
    </div>
    <!--end::Card-->
@endsection

@section('modals')
    @include('admin.forms.paciente.create')
    @include('admin.forms.sintomas.create')
@endsection


@section('scripts')
    <script>
        var HOST_URL = "{{ env('APP_HOST', 'http://127.0.0.1:8000') }}";
        var sintomasPaciente = false;

        @can('system.sintomas.create')
            sintomasPaciente = true;
        @endcan
    </script>

    <!--begin::Page Scripts(used by this page)-->
    <script src="js/admin/pacientes.js?v=1.0.7"></script>

    <!--end::Page Scripts-->

    <script>
        @if (Session::has('status'))

            toastr.success("{{ Session::get('status') }}");
        @endif


        @if (Session::has('errorsDB'))

            toastr.error("{{ Session::get('errorsDB') }}");
        @endif
    </script>
@endsection
