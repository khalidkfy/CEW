@extends('layouts.master')

@section('page_title', 'Our Partners')

@section('css')
@endsection

@section('nav_title', 'Our Partners')

@section('content')
    <div class="card card-p-0 card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <h4>
                        Our Partners
                    </h4>
                </div>
                <!--end::Search-->
                <!--begin::Export buttons-->
                <div id="kt_datatable_example_1_export" class="d-none"></div>
                <!--end::Export buttons-->
            </div>
            <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                <a href="{{ route('our_partners.sliderImage') }}" class="btn btn-success">Slider Image</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table align-middle border rounded table-row-dashed fs-6 g-5" id="kt_datatable_example_1">
                <thead>
                <!--begin::Table row-->
                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase">
                    <th class="min-w-100px">Text</th>
                    <th class="min-w-100px">Link Action</th>
                    <th class="min-w-100px">Link Text</th>
                    <th class="min-w-100px">Link Active</th>
                    <th class="text-end min-w-100px pe-5">Operations</th>
                </tr>
                <!--end::Table row-->
                </thead>
                <tbody class="fw-bold text-gray-600">
                        <tr class="odd">
                        <td>
                            {{ $our_partner->text }}
                        </td>
                        <td>
                            <a href="#" class="text-dark text-hover-primary">
                                {{ $our_partner->link_action }}
                            </a>
                        </td>
                        <td>
                            <span>
                                {{ $our_partner->link_text }}
                            </span>
                        </td>
                        <td>
                            <div class="form-check form-switch form-check-custom form-check me-10" style="justify-content: end">
                                <input class="form-check-input h-30px w-50px" type="checkbox" value="@if($our_partner->link_active == 1) 1 @else 0 @endif" id="MPOurPartner_button_action" @if($our_partner->link_active == 1) checked="checked" @endif/>
                            </div>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('our_partners.edit', ['id' => $our_partner->id ]) }}" class="btn btn-primary" style="width: 90px;">
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

@endsection
