@extends('layouts.master')

@section('page_title', 'Terms')

@section('css')
    {{--    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"/>--}}
@endsection

@section('nav_title', 'Terms')

@section('content')
    <div class="card card-p-0 card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                <!--begin::Search-->
                <div class="row">
                    <h4 class="d-block col-md-12">
                        Terms
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
                <a href="{{ route('term.create') }}" class="btn btn-success">Add Term</a>
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
                @foreach($terms as $term)
                    <tr class="odd">
                        <td>
                            {{ $term->title }}
                        </td>
                        <td>
                            {{ $term->description }}
                        </td>

                        <td class="text-end d-flex justify-content-center">
                            <a href="{{ route('term.edit', ['id' => $term->id]) }}" class="btn btn-primary mx-3" style="width: 90px;">
                                <i class="fa-solid fa-pen-to-square" style="margin-top: -2px"></i>
                                <span>
                                    Edit
                                </span>
                            </a>

                            <form action="{{ route('term.delete', ['id' => $term->id]) }}" method="POST">
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
@endsection
