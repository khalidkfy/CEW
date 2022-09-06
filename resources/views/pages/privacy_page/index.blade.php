@extends('layouts.master')

@section('page_title', 'Privacy')

@section('css')
    {{--    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"/>--}}
@endsection

@section('nav_title', 'Privacy')

@section('content')
    <div class="card card-p-0 card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                <!--begin::Search-->
                <div class="row">
                    <h4 class="d-block col-md-12">
                        Privacy
                    </h4>
                    <div class="col-md-12 mt-4 d-flex align-items-center position-relative my-1">
                        <input type="text" data-kt-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Report" />
                    </div>
                </div>
                <!--end::Search-->
                <!--begin::Export buttons-->
                <div id="kt_datatable_example_1_export" class="d-none"></div>
                <!--end::Export buttons-->
            </div>
            <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                <a href="{{ route('privacy.create') }}" class="btn btn-success">Add Privacy</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table align-middle border rounded table-row-dashed fs-6 g-5" id="kt_datatable_example_1">
                <thead>
                <!--begin::Table row-->
                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase">
                    <th class="min-w-100px">Title</th>
                    <th class="min-w-100px">Description</th>
                    <th class="text-end min-w-100px pe-5">Operations</th>
                </tr>
                <!--end::Table row-->
                </thead>
                <tbody class="fw-bold text-gray-600">
                @foreach($privacies as $privacy)
                    <tr class="odd">
                        <td>
                            {{ $privacy->title }}
                        </td>
                        <td>
                            {{ $privacy->description }}
                        </td>

                        <td class="text-end d-flex justify-content-center">
                            <a href="{{ route('privacy.edit', ['id' => $privacy->id]) }}" class="btn btn-primary mx-3" style="width: 90px;">
                                <i class="fa-solid fa-pen-to-square" style="margin-top: -2px"></i>
                                <span>
                                    Edit
                                </span>
                            </a>

                            <form action="{{ route('privacy.delete', ['id' => $privacy->id]) }}" method="POST">
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
@endsection
