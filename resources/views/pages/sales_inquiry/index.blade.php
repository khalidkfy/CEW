@extends('layouts.master')

@section('page_title', 'Sales Inquiry')

@section('css')
    {{--    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"/>--}}
@endsection

@section('nav_title', 'Sales Inquiry')

@section('content')
    <div class="card card-p-0 card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                <!--begin::Search-->
                <div class="row">
                    <h4 class="d-block col-md-12">
                        Sales Inquiry
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
        </div>
        <div class="card-body">
            <table class="table align-middle border rounded table-row-dashed fs-6 g-5" id="kt_datatable_example_1">
                <thead>
                <!--begin::Table row-->
                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase">
                    <th class="min-w-100px">Full Name</th>
                    <th class="min-w-100px">Email</th>
                    <th class="text-end min-w-100px pe-5">Phone Number</th>
                    <th class=" min-w-100px pe-5 d-flex justify-content-center">Operations</th>
                </tr>
                <!--end::Table row-->
                </thead>
                <tbody class="fw-bold text-gray-600">
                @foreach($sales as $sale)
                    <tr class="odd">
                        <td>
                            {{ $sale->full_name }}
                        </td>
                        <td>
                            {{ $sale->email }}
                        </td>
                        <td>
                            {{ $sale->phone_number }}
                        </td>
                        <td class="d-flex justify-content-center">
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#kt_modal-{{ $sale->id }}" style="height: 40px">
                                <i class="fa-regular fa-eye"></i>
                                Show
                            </button>
                            <form action="{{ route('sales.delete', ['id' => $sale->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button href="{{ route('contact_us.delete', ['id' => $sale->id]) }}" class="btn btn-danger mx-3" style="width: 110px; height: 40px">
                                    <i class="fa-solid fa-trash"></i>
                                    <span>
                                        Delete
                                    </span>
                                </button>
                            </form>
                        </td>
                    </tr>

                    {{-- Message Modal --}}
                    <div class="modal fade" tabindex="-1" id="kt_modal-{{ $sale->id }}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Message</h5>

                                    <!--begin::Close-->
                                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                        <span class="svg-icon svg-icon-2x"></span>
                                    </div>
                                    <!--end::Close-->
                                </div>

                                <div class="modal-body">
                                    <p>
                                        {{ $sale->message }}
                                    </p>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>



@endsection

@section('js')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
@endsection
