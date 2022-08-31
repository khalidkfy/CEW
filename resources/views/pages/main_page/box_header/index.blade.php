@extends('layouts.master')

@section('page_title', 'Box Header')

@section('css')
    {{--    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"/>--}}
@endsection

@section('nav_title', 'Box Header')

@section('content')
    <div class="card card-p-0 card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
{{--                    <i class="far fa-lightbulb fs-2" style="position: absolute; left: 15px;"></i>--}}
{{--                    <input type="text" data-kt-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Report" />--}}
                    <h4>
                        Box Header
                    </h4>
                </div>
                <!--end::Search-->
                <!--begin::Export buttons-->
                <div id="kt_datatable_example_1_export" class="d-none"></div>
                <!--end::Export buttons-->
            </div>
{{--            <div class="card-toolbar flex-row-fluid justify-content-end gap-5">--}}
{{--                <a href="#" class="btn btn-success">Add</a>--}}
{{--            </div>--}}
        </div>
        <div class="card-body">
            <table class="table align-middle border rounded table-row-dashed fs-6 g-5" id="kt_datatable_example_1">
                <thead>
                <!--begin::Table row-->
                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase">
                    <th class="min-w-100px">Title</th>
                    <th class="min-w-100px">Sub_Title</th>
                    <th class="min-w-100px">Button Text</th>
                    <th class="min-w-100px">Button Action</th>
                    <th class="text-end min-w-75px">Button Active</th>
                    <th class="text-end min-w-75px">Image</th>
                    <th class="text-end min-w-100px pe-5">Operations</th>
                </tr>
                <!--end::Table row-->
                </thead>
                <tbody class="fw-bold text-gray-600">
                <tr class="odd">
                    <td>
{{--                        <a href="#" class="text-dark text-hover-primary">Emma Smith</a>--}}
                        {{ Str::limit($box_header->title, 30) }}
                    </td>
                    <td>
                        {{ Str::limit($box_header->sub_title, 30) }}
                    </td>
                    <td>
                        {{ $box_header->button_text }}
                    </td>
                    <td class="text-end pe-0 text-center">
                        <a href="#" class="text-dark text-hover-primary">
                            {{ $box_header->button_action }}
                        </a>
                    </td>
                    <td class="">
                        <div class="form-check form-switch form-check-custom form-check me-10" style="justify-content: end">
                            <input class="form-check-input h-30px w-50px" type="checkbox" value="@if($box_header->button_active == 1) 1 @else 0 @endif" id="MPheader_button_action" @if($box_header->button_active == 1) checked="checked" @endif/>
                        </div>
                    </td>

                    <td class="text-end pe-0">
{{--                        @if( $box_header->image )--}}
                            <img src="{{ $box_header->box_header_image }}" width="100" height="100">

                    </td>
                    <td class="text-end">
                        <a href="{{ route('box_header.edit', ['id' => $box_header->id]) }}" class="btn btn-primary" style="width: 90px;">
                            <i class="fa-solid fa-pen-to-square" style="margin-top: -2px"></i>
                            <span>
                                Edit
                            </span>
                        </a>
                    </td>
                </tr>
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
