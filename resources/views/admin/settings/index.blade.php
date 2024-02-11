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
                <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                    Settings</h1>
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
                    <li class="breadcrumb-item text-muted">Settings</li>
                    <!--end::Item-->
                    <!--begin::Item-->

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
            <!--begin::Basic info-->
            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                    data-bs-target="#kt_account_profile_details" aria-expanded="true"
                    aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">General Settings</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <form id="kt_account_profile_details_form" class="form" action="{{ route('admin.settings-update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Logo</label>
                                <div class="col-lg-6">
                                    <div class="image-input image-input-outline" data-kt-image-input="true"
                                        style="background-image: url('{{ asset('admin/media/svg/files/blank-image.svg') }}')">
                                        <div class="image-input-wrapper w-125px h-125px"
                                            style="background-image: url('{{ $settingsData->logo ? asset('storage/'. $settingsData->logo) : asset('admin/media/svg/files/blank-image.svg') }}'); background-size: contain;
                                            background-position: center;"></div>
                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                            title="Change avatar">
                                            <i class="ki-duotone ki-pencil fs-7">  <span class="path1"></span> <span class="path2"></span>
                                            </i>
                                            <input type="file" name="avatar" accept=".png, .jpg, .jpeg, .svg" />
                                            <input type="hidden" name="avatar_remove" />
                                        </label>
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                            title="Cancel avatar">
                                            <i class="ki-duotone ki-cross fs-2"> <span class="path1"></span> <span class="path2"></span> </i>
                                        </span>
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                            title="Remove avatar">
                                            <i class="ki-duotone ki-cross fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </span>
                                    </div>
                                    <div class="form-text">Allowed file types: png, jpg, jpeg, svg.</div>
                                </div>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Favicon</label>
                                <div class="col-lg-6">
                                    <div class="image-input image-input-outline" data-kt-image-input="true"
                                        style="background-image: url('{{ asset('admin/media/svg/files/blank-image.svg') }}')">
                                        <div class="image-input-wrapper w-125px h-125px"
                                            style="background-image: url('{{ $settingsData->favicon ? asset('storage/'. $settingsData->favicon) : asset('admin/media/svg/files/blank-image.svg') }}'); background-size: contain;
                                            background-position: center;"></div>
                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                            title="Change avatar">
                                            <i class="ki-duotone ki-pencil fs-7">  <span class="path1"></span> <span class="path2"></span>
                                            </i>
                                            <input type="file" name="avatar2" accept=".png, .jpg, .jpeg, .svg" />
                                            <input type="hidden" name="avatar2_remove" />
                                        </label>
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                            title="Cancel avatar">
                                            <i class="ki-duotone ki-cross fs-2"> <span class="path1"></span> <span class="path2"></span> </i>
                                        </span>
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                            title="Remove avatar">
                                            <i class="ki-duotone ki-cross fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </span>
                                    </div>
                                    <div class="form-text">Allowed file types: png, jpg, jpeg, svg.</div>
                                </div>
                            </div>
                            <!--end::Input group-->

                            <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">
                                @foreach($languages->sortByDesc('is_default') as $language)
                                <li class="nav-item">
                                    <a class="nav-link {{ $language->is_default == 1 ? 'active' : '' }}" data-bs-toggle="tab" href="#facility_language_{{$language->s_code}}">{{ $language->name }}</a>
                                </li>
                                @endforeach
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                @foreach($languages->sortByDesc('is_default') as $key => $tabLanguage)
                                <div class="tab-pane fade {{ $tabLanguage->is_default == 1 ? 'show active' : '' }}" id="facility_language_{{$tabLanguage->s_code}}" role="tabpanel">
                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Title ({{ $tabLanguage->name }})</label>
                                        <div class="col-lg-8 fv-row">
                                            <input type="text" name="title_{{ $tabLanguage->s_code }}" id="title_{{ $tabLanguage->id }}" class="form-control form-control-lg form-control-solid" placeholder="Meta title" required autocomplete="off" />
                                        </div>
                                    </div>

                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Keywords ({{ $tabLanguage->name }})</label>
                                        <div class="col-lg-8 fv-row">
                                            <input type="text" name="keywords_{{ $tabLanguage->s_code }}" id="keywords_{{ $tabLanguage->id }}" class="form-control form-control-lg form-control-solid" placeholder="Meta keywords" autocomplete="off" />
                                        </div>
                                    </div>

                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Description ({{ $tabLanguage->name }})</label>
                                        <div class="col-lg-8 fv-row">
                                            <input type="text" name="description_{{ $tabLanguage->s_code }}" id="description_{{ $tabLanguage->id }}" class="form-control form-control-lg form-control-solid" placeholder="Meta description" autocomplete="off" />
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>
                        <!--end::Card body-->
                        <!--begin::Actions-->
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                            <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save
                                Changes</button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Basic info-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
</div>
<!--end::Content wrapper-->


@endsection


@section('modals')
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $.ajax({
                url: '../get-settings/',
                method: 'GET',
                success: function (data) {
                    $.each(data.descriptions, function (index, description) {
                        $('#title_' + description.lang_id).val(description.title);
                        $('#keywords_' + description.lang_id).val(description.keywords);
                        $('#description_' + description.lang_id).val(description.description);
                    });
                },
                error: function (error) { console.error('Error fetching data:', error); }
            });
        });
    </script>
@endsection
