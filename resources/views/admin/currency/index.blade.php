@extends('admin.admin')

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
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Currency</h1>
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
                        <li class="breadcrumb-item text-muted">Currency</li>
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
                <!--begin::Card-->
                @if ($errors->any())
                    <div class="alert alert-dismissible bg-danger d-flex flex-column flex-sm-row p-5 mb-10">
                        <i class="ki-duotone ki-notification-bing fs-2hx text-light me-4 mb-5 mb-sm-0"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                        <!--end::Icon-->

                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column text-light pe-0 pe-sm-10">
                            <!--begin::Title-->
                            <h4 class="mb-2 light">Error</h4>
                            <!--end::Title-->
                            @foreach ($errors->all() as $error)
                                <div class="mb-1 text-gray-900">
                                    <span>{{ $error }}</span>
                                </div>

                            @endforeach
                            <!--begin::Content-->

                            <!--end::Content-->
                        </div>
                        <!--end::Wrapper-->

                        <!--begin::Close-->
                        <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                            <i class="ki-duotone ki-cross fs-1 text-light"><span class="path1"></span><span class="path2"></span></i>
                        </button>
                        <!--end::Close-->
                    </div>
                    <!--end::Alert-->

                @endif
                <div class="card">

                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-6">
                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_currency">Add Currency</button>
                        </div>
                    </div>
                    <!--end::Card header-->

                    <!--begin::Card body-->
                    <div class="card-body pt-0">

                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                            <thead>
                            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-125px">Currency Name</th>
                                <th class="text-end min-w-70px">Actions</th>
                            </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">
                            @foreach($currencies as $currency)
                                <tr>
                                    <td>
                                        {{$currency->name}}
                                    </td>

                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="" class="menu-link edit px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_currency" data-id="{{$currency->id}}">Edit</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->

            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
@endsection

@section('modals')
<div class="modal fade" id="kt_modal_add_currency" tabindex="-1" aria-hidden="true">
    <!-- Modal içeriği -->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <form class="form" id="kt_modal_add_currency_form" method="POST" action="{{ route('admin.currency-store') }}">
                @csrf
                <div class="modal-header" id="kt_modal_add_currency_header">
                    <h2 class="fw-bold">Add Currency</h2>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                </div>
                <div class="modal-body py-10 px-lg-17">

                    <div class="scroll-y me-n7 pe-7">
                        <div class="fv-row mb-7">
                            <label class="fs-6 fw-semibold mb-2">Currency Name</label>
                            <input type="text" class="form-control form-control-solid" placeholder="Enter currency name" name="name" autocomplete="off" />
                        </div>
                    </div>

                    <div class="scroll-y me-n7 pe-7">
                        <div class="fv-row mb-7">
                            <label class="fs-6 fw-semibold mb-2">Currency Code</label>
                            <input type="text" class="form-control form-control-solid" placeholder="Enter code" name="code" autocomplete="off" />
                        </div>
                    </div>

                    <div class="scroll-y me-n7 pe-7">
                        <div class="fv-row mb-7">
                            <label class="fs-6 fw-semibold mb-2">Symbol</label>
                            <input type="text" class="form-control form-control-solid" placeholder="Enter symbol" name="symbol" autocomplete="off" />
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
<div class="modal fade" id="kt_modal_edit_currency" tabindex="-1" aria-hidden="true">
    <!-- Modal içeriği -->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <form class="form" id="kt_modal_add_currency_form" method="POST" action="{{ route('admin.currency-update') }}">
                @csrf
                <div class="modal-header" id="kt_modal_add_currency_header">
                    <h2 class="fw-bold">Edit Currency</h2>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                </div>
                <div class="modal-body py-10 px-lg-17">

                    <input type="text" class="form-control form-control-solid" name="currency_id" id="currency-id" hidden=""/>

                    <div class="scroll-y me-n7 pe-7">
                        <div class="fv-row mb-7">
                            <label class="fs-6 fw-semibold mb-2">Currency Name</label>
                            <input type="text" class="form-control form-control-solid" placeholder="Enter currency name" name="name" id="currency_name" autocomplete="off" />
                        </div>
                    </div>

                    <div class="scroll-y me-n7 pe-7">
                        <div class="fv-row mb-7">
                            <label class="fs-6 fw-semibold mb-2">Currency Code</label>
                            <input type="text" class="form-control form-control-solid" placeholder="Enter currency code" name="code" id="currency_code" autocomplete="off" />
                        </div>
                    </div>

                    <div class="scroll-y me-n7 pe-7">
                        <div class="fv-row mb-7">
                            <label class="fs-6 fw-semibold mb-2">Symbol</label>
                            <input type="text" class="form-control form-control-solid" placeholder="Enter symbol" name="symbol" id="currency_symbol" autocomplete="off" />
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
                $('#currency-id').val(id);

                $.ajax({
                    url: '../get-currency/' + id,
                    method: 'GET',
                    success: function (data) {
                        $('#currency_name').val(data.name);
                        $('#currency_code').val(data.code);
                        $('#currency_symbol').val(data.symbol);
                    },
                    error: function (error) { console.error('Error fetching data:', error); }
                });
            });
        });
    </script>
@endsection
