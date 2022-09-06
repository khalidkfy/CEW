@extends('layouts.master')

@section('page_title', 'Product Images')

@section('css')
    {{--    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"/>--}}
@endsection

@section('nav_title', 'Product | Album Images')

@section('content')
    <div class="card card-p-0 card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    {{--                    <i class="far fa-lightbulb fs-2" style="position: absolute; left: 15px;"></i>--}}
                    {{--                    <input type="text" data-kt-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Report" />--}}
                    <h4>
                        Product Images
                    </h4>
                </div>
                <!--end::Search-->
                <!--begin::Export buttons-->
                <div id="kt_datatable_example_1_export" class="d-none"></div>
                <!--end::Export buttons-->
            </div>
            <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                <button href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add_partners_image">Add Image</button>
                <div class="modal fade" tabindex="-1" id="add_partners_image">
                    <div class="modal-dialog">
                        <form action="{{ route('product.productStore') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Image From This Product</h5>

                                    <!--begin::Close-->
                                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                        <span class="svg-icon svg-icon-2x"></span>
                                    </div>
                                    <!--end::Close-->
                                </div>

                                <div class="modal-body text-center">

                                    <!--begin::Image input-->
                                    <label class="d-flex mb-4">
                                        Product Image
                                    </label>
                                    <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url(/assets/media/svg/avatars/blank.svg)">
                                        <!--begin::Image preview wrapper-->
                                        <div class="image-input-wrapper w-125px h-125px" style=""></div>
                                        <!--end::Image preview wrapper-->

                                        <!--begin::Edit button-->
                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                               data-kt-image-input-action="change"
                                               data-bs-toggle="tooltip"
                                               data-bs-dismiss="click"
                                               title="Change avatar">
                                            <i class="bi bi-pencil-fill fs-7"></i>

                                            <!--begin::Inputs-->
                                            <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="avatar_remove" />
                                            <!--end::Inputs-->
                                        </label>
                                        <!--end::Edit button-->

                                        <!--begin::Cancel button-->
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                              data-kt-image-input-action="cancel"
                                              data-bs-toggle="tooltip"
                                              data-bs-dismiss="click"
                                              title="Cancel avatar">
                                                 <i class="bi bi-x fs-2"></i>
                                             </span>
                                        <!--end::Cancel button-->

                                        <!--begin::Remove button-->
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                              data-kt-image-input-action="remove"
                                              data-bs-toggle="tooltip"
                                              data-bs-dismiss="click"
                                              title="Remove avatar">
                                                 <i class="bi bi-x fs-2"></i>
                                             </span>
                                        <!--end::Remove button-->
                                    </div>
                                    <!--end::Image input-->

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table align-middle border rounded table-row-dashed fs-6 g-5" id="kt_datatable_example_1">
                <thead>
                <!--begin::Table row-->
                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase">
                    <th class="min-w-100px">#</th>
                    <th class="min-w-100px">Image</th>
                    <th class="min-w-100px">For</th>
                    <th class="text-end min-w-100px pe-5">Operations</th>
                </tr>
                <!--end::Table row-->
                </thead>
                <tbody class="fw-bold text-gray-600">
                @foreach($product_images as $image)
                    <tr class="odd">
                        <td>
                            {{ $image->id }}
                        </td>
                        <td>
                            <img src="{{ asset('storage') . '/' . $image->image }}" width="200" height="100" alt="{{ $image->id }}" style="background-color: #DDD">
                        </td>
                        <td style="width: 320px;">
                            {{ $product->product_name }}
                        </td>
                        <td class="text-end">
                            <form action="{{ route('product.productDelete', ['id' => $image->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="width: 110px;">
                                    <i class="fa-solid fa-trash"></i>
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

@endsection
