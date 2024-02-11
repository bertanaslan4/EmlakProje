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
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Language</h1>
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
                        <li class="breadcrumb-item text-muted">Language</li>
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
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_translation">Add New Translation</button>
                        </div>
                    </div>
                    <!--end::Card header-->

                    <!--begin::Card body-->
                    <div class="card-body pt-0 mt-10">

                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                            <thead>
                            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-125px">#</th>
                                <th>Key</th>
                                <th>Text</th>
                                <th class="text-end min-w-70px">Actions</th>
                            </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">
                            @foreach($translations as $translation)
                                <tr>
                                    <td>
                                        {{$translation->id}}
                                    </td>
                                    <td>
                                        {{$translation->key}}
                                    </td>
                                    <td>
                                        @php
                                            $text = json_decode($translation->text, true);

                                            $default_language = $defaultLanguage->s_code;

                                            $decoded_text = $text[$default_language] ?? reset($text);

                                            echo $decoded_text;
                                        @endphp
                                    </td>

                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="" class="menu-link edit px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_translations" data-id="{{ $translation->id }}">Edit</a>
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
    <!--begin::Modals-->
    <div class="modal fade" id="kt_modal_add_translation" tabindex="-1" aria-hidden="true">
        <!-- Modal içeriği -->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <form class="form" id="kt_modal_add_customer_form" method="POST" action="{{ route('admin.translation-store') }}">
                    @csrf
                    <div class="modal-header" id="kt_modal_add_customer_header">
                        <h2 class="fw-bold">Add Translation</h2>
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                        </div>
                    </div>
                    <div class="modal-body py-10 px-lg-17">

                        <div class="scroll-y me-n7 pe-7">
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold mb-2">Key</label>
                                <input type="text" class="form-control form-control-solid" placeholder="Enter translation key" name="trans_key" autocomplete="off" required/>
                            </div>
                        </div>

                        @foreach($languages->sortByDesc('is_default') as $key => $language)
                            <div class="scroll-y me-n7 pe-7">
                                <div class="fv-row mb-7">
                                    <label class="fs-6 fw-semibold mb-2">{{ $language->name }}</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="Enter {{ $language->name }} text" name="{{ $language->s_code }}" autocomplete="off"/>
                                </div>
                            </div>
                        @endforeach

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

    <div class="modal fade" id="kt_modal_edit_translations" tabindex="-1" aria-hidden="true">
        <!-- Modal içeriği -->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <form class="form" id="kt_modal_add_customer_form" method="POST" action="{{ route('admin.translation-edit') }}">
                    @csrf
                    <div class="modal-header" id="kt_modal_add_customer_header">
                        <h2 class="fw-bold">Edit Translation</h2>
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                        </div>
                    </div>
                    <div class="modal-body py-10 px-lg-17">

                        <input type="text" class="form-control form-control-solid" name="translation_id" id="translation-id" hidden=""/>

                        <div class="scroll-y me-n7 pe-7">
                            <div class="fv-row mb-7">
                                <label class="fs-6 fw-semibold mb-2">Key</label>
                                <input type="text" class="form-control form-control-solid" placeholder="Enter translation key" name="trans_key" id="trans_key" autocomplete="off" required />
                            </div>
                        </div>

                        @foreach($languages->sortByDesc('is_default') as $key => $tabLanguage)
                            <div class="scroll-y me-n7 pe-7">
                                <div class="fv-row mb-7">
                                    <label class="fs-6 fw-semibold mb-2">{{ $tabLanguage->name }}</label>
                                    <input type="text" class="form-control form-control-solid trans-text-input" placeholder="Enter {{ $tabLanguage->name }} text" data-language-code="{{ $tabLanguage->s_code }}" name="{{ $tabLanguage->s_code }}" id="trans_text_{{ $tabLanguage->s_code }}" autocomplete="off" />
                                </div>
                            </div>
                        @endforeach

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
    <!--end::Modals-->
@endsection

@section('js')
    <script>
        $(document).ready(function () {
        $('.edit').on('click', function () {
            var id = $(this).data('id');
            $('#translation-id').val(id);

            $.ajax({
                url: '../get-translation/' + id,
                method: 'GET',
                success: function (data) {
                    $('#trans_key').val(data.key);

                    $('.trans-text-input').each(function () {
                        var languageCode = $(this).data('language-code');
                        var languageText = JSON.parse(data.text)[languageCode];
                        $(this).val(languageText);
                    });
                },
                error: function (error) { console.error('Error fetching data:', error); }
            });
        });
    });
    </script>
@endsection
