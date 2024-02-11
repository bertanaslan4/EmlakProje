.@extends('admin.admin')

@section('css')
    <!-- Extra CSS -->
@endsection

@section('content')
    @include('sweetalert::alert')
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Advert Applications</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Advert Applications</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->

            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">
                <!--begin::Products-->
                <div class="card card-flush">
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table">
                            <thead>
                            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-200px">Advert</th>
                                <th class="text-start min-w-100px">User</th>
                                <th class="text-end min-w-70px">Application Date</th>
                                <th class="text-end min-w-100px">Status</th>
                                <th class="text-end min-w-70px">Actions</th>
                            </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">
                            @foreach($adverts as $advert)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="javascript:void(0)" class="symbol symbol-50px">
                                                @if($advert->advert->thumbnail)
                                                <span class="symbol-label" style="background-image:url({{asset('storage/'.$advert->advert->thumbnail)}});"></span>
                                                @else
                                                <span class="symbol-label" style="background-image:url({{asset('front/img/no-image.png') }});"></span>
                                                @endif
                                            </a>
                                            <div class="ms-5">
                                                <a href="{{ route('admin.advert-detail', ['id' => $advert->id]) }}" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">
                                                    @if(isset($advert->advert->descriptions->first()->title))
                                                        {{ $advert->advert->descriptions->first()->title }}
                                                    @endif
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-start pe-0">
                                        {{ $advert->user->name . ' ' . $advert->user->surname }}
                                    </td>
                                    <td class="text-end pe-0">
                                        {{ $advert->created_at->format('d M Y') }}
                                    </td>
                                    <td class="text-end pe-0" data-order="Inactive">
                                        <span data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $advert->rejection_reason }}" class="{{ $advert->status->getBadge() }} fw-bold fs-7">{{ $advert->status->getText() }}</span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-150px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="" class="menu-link edit px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_change_status" data-id="{{$advert->id}}">Change Status</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Products-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
@endsection

@section('modals')
<div class="modal fade" id="kt_modal_change_status" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <form class="form" id="kt_modal_add_customer_form" method="POST" action="{{ route('admin.application-status-update') }}">
                @csrf
                <div class="modal-header" id="kt_modal_add_customer_header">
                    <h2 class="fw-bold">Edit Status</h2>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                </div>
                <div class="modal-body py-10 px-lg-17">

                    <input type="text" class="form-control form-control-solid" name="advert_application_id" id="advert-application-id" hidden=""/>

                    <div class="scroll-y me-n7 pe-7">
                        <div class="fv-row mb-7">
                            <label class="fs-6 fw-semibold mb-2">Status *</label>
                            <select class="form-control form-control-solid" name="status" id="status" required>
                                @foreach(\App\Enums\ApplicationStatus::cases() as $status)
                                    <option value="{{ $status->value }}">{{ $status->getText() }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="scroll-y me-n7 pe-7">
                        <div class="fv-row mb-7">
                            <label class="fs-6 fw-semibold mb-2">Reason</label>
                            <input type="text" class="form-control form-control-solid" placeholder="Reason of rejection" name="rejection_reason" id="rejection_reason" autocomplete="off" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer flex-center">
                    <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="kt_modal_add_customer_submit" class="btn btn-primary">
                        <span class="indicator-label">Submit</span>
                        <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                    </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('.edit').on('click', function () {
                var id = $(this).data('id');
                $('#advert-application-id').val(id);

                $.ajax({
                    url: '../get-application-status/' + id,
                    method: 'GET',
                    success: function (data) {
                        $('#status').val(data.status);
                        $('#rejection_reason').val(data.rejection_reason);
                    },
                    error: function (error) { console.error('Error fetching data:', error); }
                });
            });
        });
    </script>
@endsection
