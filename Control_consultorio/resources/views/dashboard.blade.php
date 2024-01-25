@extends('admin.layouts.app')

@section('breadcrumb')
    <span class="text-muted font-weight-bold mr-4">Clínica San Angel</span>
@endsection

@section('content')
    <!--begin::Dashboard-->
    <!--begin::Row-->
    <div class="row">

        <div class="col-lg-6 col-xxl-4">
            <!--begin::Mixed Widget 1-->
            <div class="card card-custom bg-gray-100 card-stretch gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0 bg-danger py-5">
                    <h3 class="card-title font-weight-bolder text-white">Dashboard</h3>
                </div>
                <!--end::Header-->

                <!--begin::Body-->
                <div class="card-body p-0 position-relative overflow-hidden">
                    <!--begin::Chart-->
                    <div class="card-rounded-bottom bg-danger" style="height: 80px"></div>
                    <!--end::Chart-->

                    <div class="card-spacer mt-n25">
                        <!--begin::Row-->
                        <div class="row m-0">
                            @can('system.users.list')
                                <div class="col bg-light-primary px-6 py-8 rounded-xl mr-7 mb-7">
                                    <span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M6,2 L18,2 C19.6568542,2 21,3.34314575 21,5 L21,19 C21,20.6568542 19.6568542,22 18,22 L6,22 C4.34314575,22 3,20.6568542 3,19 L3,5 C3,3.34314575 4.34314575,2 6,2 Z M12,11 C13.1045695,11 14,10.1045695 14,9 C14,7.8954305 13.1045695,7 12,7 C10.8954305,7 10,7.8954305 10,9 C10,10.1045695 10.8954305,11 12,11 Z M7.00036205,16.4995035 C6.98863236,16.6619875 7.26484009,17 7.4041679,17 C11.463736,17 14.5228466,17 16.5815,17 C16.9988413,17 17.0053266,16.6221713 16.9988413,16.5 C16.8360465,13.4332455 14.6506758,12 11.9907452,12 C9.36772908,12 7.21569918,13.5165724 7.00036205,16.4995035 Z"
                                                    fill="#000000" />
                                            </g>
                                        </svg><!--end::Svg Icon-->
                                    </span>
                                    <a href="/users" class="text-primary font-weight-bold font-size-h6 mt-2">
                                        Usuarios
                                    </a>
                                </div>
                            @endcan

                            @can('system.groups.list')
                                <div class="col bg-light-info  px-6 py-8 rounded-xl mb-7">
                                    <span class="svg-icon svg-icon-3x svg-icon-info d-block my-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path
                                                    d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                    fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path
                                                    d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                    fill="#000000" fill-rule="nonzero" />
                                            </g>
                                        </svg><!--end::Svg Icon-->
                                    </span>
                                    <a href="/groups" class="text-info font-weight-bold font-size-h6">
                                        Grupos y permisos
                                    </a>
                                </div>
                            @endcan
                        </div>
                        <!--end::Row-->

                        <!--begin::Row-->
                        <div class="row m-0">
                            @can('system.paciente.list')
                                <div class="col bg-light-success px-6 py-8 rounded-xl mr-7">
                                    <span
                                        class="svg-icon svg-icon-success svg-icon-4x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Add-user.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path
                                                    d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                    fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path
                                                    d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                    fill="#000000" fill-rule="nonzero" />
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                    <br>

                                    <a href="/shops" class="text-success font-weight-bold font-size-h6 mt-2">
                                        Pacientes
                                    </a>
                                </div>
                            @endcan

                            @can('system.consulta.list')
                                <div class="col bg-light-warning px-6 py-8 rounded-xl">
                                    <span
                                        class="svg-icon svg-icon-warning svg-icon-4x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Devices\Diagnostics.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <rect fill="#000000" opacity="0.3" x="2" y="3" width="20" height="18"
                                                    rx="2" />
                                                <path
                                                    d="M9.9486833,13.3162278 C9.81256925,13.7245699 9.43043041,14 9,14 L5,14 C4.44771525,14 4,13.5522847 4,13 C4,12.4477153 4.44771525,12 5,12 L8.27924078,12 L10.0513167,6.68377223 C10.367686,5.73466443 11.7274983,5.78688777 11.9701425,6.75746437 L13.8145063,14.1349195 L14.6055728,12.5527864 C14.7749648,12.2140024 15.1212279,12 15.5,12 L19,12 C19.5522847,12 20,12.4477153 20,13 C20,13.5522847 19.5522847,14 19,14 L16.118034,14 L14.3944272,17.4472136 C13.9792313,18.2776054 12.7550291,18.143222 12.5298575,17.2425356 L10.8627389,10.5740611 L9.9486833,13.3162278 Z"
                                                    fill="#000000" fill-rule="nonzero" />
                                                <circle fill="#000000" opacity="0.3" cx="19" cy="6" r="1" />
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                    <a href="/seller" class="text-warning font-weight-bold font-size-h6 mt-2">
                                        Consultas
                                    </a>
                                </div>
                            @endcan
                        </div>
                        <!--end::Row-->

                    </div>
                    <!--end::Row-->
                </div>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Mixed Widget 1-->
    </div>
    <!--end::Row-->
    <!--end::Dashboard-->
@endsection
