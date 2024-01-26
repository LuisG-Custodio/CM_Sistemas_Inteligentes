"use strict";
// Class definition

var KTDatatableAutoColumnHideDemo = function () {
    // Private functions

    // basic demo
    var demo = function () {

        var datatable = $('#kt_datatable').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        url: HOST_URL + '/consulta/list-consulta',
                        method: 'GET',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        // sample custom headers
                        map: function (raw) {
                            // sample data mapping
                            var dataSet = raw;
                            if (typeof raw.data !== 'undefined') {
                                dataSet = raw.data;
                            }
                            return dataSet;
                        },
                    },
                },
                pageSize: 10,
            },

            // layout definition
            layout: {
                scroll: false
            },

            // column sorting
            sortable: true,
            pagination: true,
            search: {
                input: $('#kt_datatable_search_query'),
                key: 'nombre'
            },

            // columns definition
            columns: [
              
                {
                    field: 'consultorio',
                    title: 'Consultorio',
                    sortable: 'asc',
                    template: function (row) {

                        return row.consultorio;

                    }
                },

                {
                    field: 'peso',
                    title: 'Peso',
                    sortable: 'asc',
                    template: function (row) {

                        return row.peso;

                    }
                },
                {
                    field: 'estatura',
                    title: 'Estatura ',
                    sortable: 'asc',
                    template: function (row) {

                        return row.estatura;

                    }
                },
                {
                    field: 'temperatura',
                    title: 'Temperatura ',
                    sortable: 'asc',
                    template: function (row) {

                        return row.temperatura;

                    }
                },
                {
                    field: 'presion',
                    title: 'Presion ',
                    sortable: 'asc',
                    template: function (row) {

                        return row.presion;

                    }
                },
               


            ],

        });

        $('#kt_datatable_search_status').on('change', function () {
            datatable.search($(this).val(), 'status');
        });

        $('#kt_datatable_search_authorized').on('change', function () {
            datatable.search($(this).val(), 'authorized');
        });

        $('#kt_datatable_search_status').selectpicker();
        $('#kt_datatable_search_authorized').selectpicker();
    };

    return {
        // public functions
        init: function () {
            demo();
        },
    };
}();

jQuery(document).ready(function () {
    KTDatatableAutoColumnHideDemo.init();
});




// Class Initialization
jQuery(document).ready(function () {
    KTLogin.init();
});
/* Class validations */