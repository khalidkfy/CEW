@extends('layouts.master')

@section('page_title', 'Footer Certification')

@section('css')
    {{--    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"/>--}}
@endsection

@section('nav_title', 'Footer Certification')

@section('content')
    <div class="card card-p-0 card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <div class="row">
                        <h4 class="col-md-12 mb-4">
                            Footer Certification
                        </h4>
                        <div class="col-m-12">
                            <i class="far fa-lightbulb fs-2 mt-3" style="position: absolute; left: 15px;"></i>
                            <input type="text" data-kt-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Report" />
                        </div>
                    </div>

                </div>
                <!--end::Search-->
                <!--begin::Export buttons-->
                <div id="kt_datatable_example_1_export" class="d-none"></div>
                <!--end::Export buttons-->
            </div>
            <div class="card-toolbar flex-row-fluid justify-content-end gap-5" style="margin-top: 40px !important;">
                <a href="{{ route('certification.footerCreateCertification') }}" class="btn btn-success">Add Footer Certification</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table align-middle border rounded table-row-dashed fs-6 g-5" id="kt_datatable_example_1">
                <thead>
                <!--begin::Table row-->
                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase">
                    <th class="min-w-100px">Certification Title</th>
                    <th class="min-w-100px">Certification Description</th>
                    <th class="text-center min-w-100px pe-5">Operations</th>
                </tr>
                <!--end::Table row-->
                </thead>
                <tbody class="fw-bold text-gray-600">
                @foreach($certifications as $certification)
                    <tr class="odd">
                        <td>
                            {{ $certification->title }}
                        </td>
                        <td>
                            {{ Str::limit($certification->description, 30) }}
                        </td>

                        <td class="text-end d-flex justify-content-center">
                            <a href="{{ route('certification.footerEditCertification', ['id' => $certification->id]) }}" class="btn btn-primary mx-3" style="width: 90px;">
                                <i class="fa-solid fa-pen-to-square" style="margin-top: -2px"></i>
                                <span>
                                Edit
                            </span>
                            </a>

                            <form action="{{ route('certification.footerDeleteCertification', ['id' => $certification->id] )}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" style="display: inline-flex;">
                                    <i class="fa-solid fa-trash" style="margin-top: 10px"></i>
                                    <span>
                                        Delete
                                    </span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>

    <script>
        "use strict";

        // Class definition
        var KTDatatablesButtons = function () {
            // Shared variables
            var table;
            var datatable;

            // Private functions
            var initDatatable = function () {
                // Set date data order
                const tableRows = table.querySelectorAll('tbody tr');

                tableRows.forEach(row => {
                    const dateRow = row.querySelectorAll('td');
                    const realDate = moment(dateRow[3].innerHTML, "DD MMM YYYY, LT").format(); // select date from 4th column in table
                    dateRow[3].setAttribute('data-order', realDate);
                });

                // Init datatable --- more info on datatables: https://datatables.net/manual/
                datatable = $(table).DataTable({
                    "info": false,
                    'order': [],
                    'pageLength': 10,
                });
            }

            // Hook export buttons
            var exportButtons = () => {
                const documentTitle = 'Customer Orders Report';
                var buttons = new $.fn.dataTable.Buttons(table, {
                    buttons: [
                        {
                            extend: 'copyHtml5',
                            title: documentTitle
                        },
                        {
                            extend: 'excelHtml5',
                            title: documentTitle
                        },
                        {
                            extend: 'csvHtml5',
                            title: documentTitle
                        },
                        {
                            extend: 'pdfHtml5',
                            title: documentTitle
                        }
                    ]
                }).container().appendTo($('#kt_datatable_example_1_export'));

                // Hook dropdown menu click event to datatable export buttons
                const exportButtons = document.querySelectorAll('#kt_datatable_example_1_export_menu [data-kt-export]');
                exportButtons.forEach(exportButton => {
                    exportButton.addEventListener('click', e => {
                        e.preventDefault();

                        // Get clicked export value
                        const exportValue = e.target.getAttribute('data-kt-export');
                        const target = document.querySelector('.dt-buttons .buttons-' + exportValue);

                        // Trigger click event on hidden datatable export buttons
                        target.click();
                    });
                });
            }

            // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
            var handleSearchDatatable = () => {
                const filterSearch = document.querySelector('[data-kt-filter="search"]');
                filterSearch.addEventListener('keyup', function (e) {
                    datatable.search(e.target.value).draw();
                });
            }

            // Public methods
            return {
                init: function () {
                    table = document.querySelector('#kt_datatable_example_1');

                    if ( !table ) {
                        return;
                    }

                    initDatatable();
                    exportButtons();
                    handleSearchDatatable();
                }
            };
        }();

        // On document ready
        KTUtil.onDOMContentLoaded(function () {
            KTDatatablesButtons.init();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#MPheader_button_action').change(function() {
                if ($(this).val() == 1) {

                    $.ajax({
                        type: 'put',
                        url: 'box_header/updateButtonActive',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                        data:{
                            action: 0,
                        },
                        dataType: 'json',
                        success: function(data) {
                            console.log(data.action)
                        },
                        error: function(data) {
                            console.log(data)
                        },
                    })

                }else if ($(this).val() == 0){

                    $.ajax({
                        type: 'put',
                        url: 'box_header/updateButtonActive',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                        data:{
                            action: 1,
                        },
                        dataType: 'json',
                        success: function(data) {
                            console.log(data.action)
                        },
                        error: function(data) {
                            console.log(data)
                        },
                    })
                };
            })
        })

    </script>

@endsection
