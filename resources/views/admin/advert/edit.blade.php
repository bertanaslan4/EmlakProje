@extends('admin.admin')

@section('css')
<link href="{{asset('admin/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet')}}" type="text/css" />
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
                    Advert Form</h1>
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
                    <li class="breadcrumb-item text-muted">Advert</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-500 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Add</li>
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
            <!--begin::Form-->
            <form action="{{ route('admin.advert-update', ['id' => $advert->id]) }}" method="POST"
                id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!--begin::Aside column-->
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                    <!--begin::Thumbnail settings-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Thumbnail</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body text-center pt-0">
                            <!--begin::Image input-->
                            <!--begin::Image input placeholder-->
                            <style>
                                .image-input-placeholder {
                                    background-image: url('{{asset('storage/'.$advert->thumbnail)}}');
                                }

                                [data-bs-theme="dark"] .image-input-placeholder {
                                    background-image: url('{{asset('storage/'.$advert->thumbnail)}}');
                                }

                            </style>
                            <!--end::Image input placeholder-->
                            <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                data-kt-image-input="true">
                                <!--begin::Preview existing avatar-->
                                <div class="image-input-wrapper w-150px h-150px"></div>
                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                    <i class="ki-duotone ki-pencil fs-7">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    <!--begin::Inputs-->
                                    <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="avatar_remove" />
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Label-->
                                <!--begin::Cancel-->
                                <span
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                    <i class="ki-duotone ki-cross fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </span>
                                <!--end::Cancel-->
                                <!--begin::Remove-->
                                <span
                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                    <i class="ki-duotone ki-cross fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </span>
                                <!--end::Remove-->
                            </div>
                            <!--end::Image input-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">Set the product thumbnail image. Only *.png, *.jpg and *.jpeg
                                image files are accepted</div>
                            <!--end::Description-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Thumbnail settings-->
                    <!--begin::Status-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Category</h2>
                            </div>
                            <!--end::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <div class="rounded-circle bg-success w-15px h-15px"
                                    id="kt_ecommerce_add_product_status"></div>
                            </div>
                            <!--begin::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Select2-->
                            <select class="form-select mb-2" name="category" data-control="select2"
                                data-hide-search="true" data-placeholder="Select an option"
                                id="kt_ecommerce_add_product_status_select">
                                <option></option>
                                <option value="1" @if($advert->category_id==1) selected @endif>House</option>
                                <option value="2" @if($advert->category_id==2) selected @endif>Office</option>

                            </select>
                            <!--end::Select2-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">Set the advert category.</div>
                            <!--end::Description-->

                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Status-->
                    <!--begin::Category & tags-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Advert Details</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Input group-->
                            <!--begin::Label-->
                            <label class="form-label">Advert Type</label>
                            <!--end::Label-->
                            <!--begin::Select2-->
                            <select class="form-select mb-2" name="type" data-control="select2"
                                data-placeholder="Select an option">
                                <option></option>
                                @foreach($types as $type)
                                <option value="{{$type->id}}" @if($advert->type_id==$type->id) selected
                                    @endif>{{$type->descriptions->first()->title}}</option>
                                @endforeach


                            </select>
                            <!--end::Select2-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7 mb-7">Select a Advert Type</div>
                            <!--end::Description-->
                            <!--end::Input group-->


                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Category & tags-->


                </div>
                <!--end::Aside column-->
                <!--begin::Main column-->
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2">
                        @foreach($languages->sortByDesc('is_default') as $language)
                        <li class="nav-item">
                            <a class="nav-link {{ $language->is_default == 1 ? 'text-active-primary active' : '' }} pb-4"
                                data-bs-toggle="tab"
                                href="#advert_language_{{$language->s_code}}">{{$language->name}}</a>
                        </li>
                        @endforeach
                    </ul>
                    <div class="tab-content">
                        @foreach($languages->sortByDesc('is_default') as $key => $tabLanguage)
                            @php
                                $description = $advert->descriptions->where('lang_id', $tabLanguage->id)->first();
                            @endphp

                            <div class="tab-pane fade {{ $tabLanguage->is_default == 1 ? 'show active' : '' }}" id="advert_language_{{$tabLanguage->s_code}}" role="tab-panel">
                                <div class="card card-flush py-4">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>General</h2>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="mb-10 fv-row">
                                            <label class="{{ $tabLanguage->is_default == 1 ? 'required' : '' }} form-label">Advert Title</label>
                                            <input type="text" name="title_{{ $tabLanguage->s_code }}"class="form-control mb-2"
                                                placeholder="Product name"
                                                value="{{ $description->title ?? '' }}" {{ $tabLanguage->is_default == 1 ? 'required' : '' }} />
                                            <div class="text-muted fs-7">An advert title is required.</div>
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <label class="form-label">Description</label>
                                            <textarea id="kt_docs_tinymce_basic{{ $key }}" name="description_{{ $tabLanguage->s_code }}" class="tox-target">{{ $description->description ?? '' }}</textarea>
                                            <div class="text-muted fs-7">Set a description to the advert for better visibility.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="mt-10">
                            <div class="d-flex flex-column gap-7 gap-lg-10">

                                <div class="card card-flush py-4">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Price</h2>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label">Rent Price</label>
                                            <input type="number" step="0.01" name="rent_price" class="form-control mb-2"
                                                placeholder="Rent Price" value="{{$advert->rent_price}}" />
                                            <div class="text-muted fs-7">Rent Price is required .</div>
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label">Deposit Price</label>
                                            <input type="number" step="0.01" name="deposit_price"
                                                class="form-control mb-2" placeholder="Deposit Price"
                                                value="{{$advert->deposit_price}}" />
                                            <div class="text-muted fs-7">Deposit Price is required .</div>
                                        </div>
                                        <div class="fv-row w-100 flex-md-root">
                                            <label class="form-label">Currency</label>
                                            <select class="form-select mb-2" name="currency_id" data-control="select2" data-hide-search="false" data-placeholder="Select a Currency" id="currency_id">
                                                @foreach ($currencies as $currency)
                                                    <option value="{{ $currency->id }}" {{ $currency->id == $advert->currency_id ? 'selected' : '' }}>{{ $currency->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="text-muted fs-7">Currency type is required.</div>
                                        </div>
                                    </div>
                                </div>

                                <!--begin::Address-->
                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Address</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-2">
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="form-label">Address</label>
                                                <!--end::Label-->
                                                <!--begin:Editor-->
                                                <textarea id="kt_docs_tinymce_basic_adr" name="address"
                                                    class="tox-target">{{$advert->address}}</textarea>
                                            </div>


                                            <!--begin::Tax-->
                                            <div class="d-flex flex-wrap gap-5">
                                                <!--begin::Input group-->
                                                <div class="fv-row w-100 flex-md-root">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Country</label>
                                                    <!--end::Label-->
                                                    <!--begin::Select2-->
                                                    <select class="form-select mb-2" name="country_id"
                                                        data-control="select2" data-hide-search="false"
                                                        data-placeholder="Select a Country" id="country_id" required>
                                                        @foreach($countries as $country)
                                                        <option value="{{ $country->id }}"
                                                            {{ $country->id == $advert->country_id ? 'selected' : '' }}>
                                                            {{ $country->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <!--end::Select2-->
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Input group-->
                                                <div class="fv-row w-100 flex-md-root">
                                                    <!--begin::Label-->
                                                    <label class="form-label">State</label>
                                                    <!--end::Label-->
                                                    <!--begin::Select2-->
                                                    <select class="form-select mb-2" name="state_id"
                                                        data-control="select2" data-hide-search="false"
                                                        data-placeholder="Select a State" id="state_id">
                                                        @foreach($states as $state)
                                                        <option value="{{ $state->id }}"
                                                            {{ $state->id == $advert->state_id ? 'selected' : '' }}>
                                                            {{ $state->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <!--end::Select2-->
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Input group-->
                                                <div class="fv-row w-100 flex-md-root">
                                                    <!--begin::Label-->
                                                    <label class="form-label">City</label>
                                                    <!--end::Label-->
                                                    <!--begin::Select2-->
                                                    <select class="form-select mb-2" name="city_id"
                                                        data-control="select2" data-hide-search="false"
                                                        data-placeholder="Select a City" id="city_id">
                                                        @foreach($cities as $city)
                                                        <option value="{{ $city->id }}"
                                                            {{ $city->id == $advert->city_id ? 'selected' : '' }}>
                                                            {{ $city->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <!--end::Select2-->
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end:Tax-->

                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Card header-->
                                </div>
                                <!--end::Address-->
                                <!--begin::Media-->
                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Media</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-2">
                                            <!--begin::Dropzone-->
                                            <div class="dropzone" id="dropzone">
                                                <!--begin::Message-->
                                                <div class="dz-message needsclick">
                                                    <!--begin::Icon-->
                                                    <i class="ki-duotone ki-file-up text-primary fs-3x">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    <!--end::Icon-->
                                                    <!--begin::Info-->
                                                    <div class="ms-4">
                                                        <h3 class="fs-5 fw-bold text-gray-900 mb-1">Drop files here or click to upload.</h3>
                                                        <span class="fs-7 fw-semibold text-gray-500">Upload  up to 10 files</span>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                            </div>
                                            <!--end::Dropzone-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">Set the advert media gallery.</div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Card header-->

                                    @if($advert->gallery->count() > 0)
                                    <!--begin::Social widget 2-->
                                    <div class="card card-flush mb-5 mb-xl-8">
                                        <!--begin::Header-->
                                        <div class="card-header pt-5">
                                            <h3 class="card-title align-items-start flex-column">
                                                <span class="card-label fw-bold text-gray-900">Gallery</span>
                                            </h3>
                                        </div>
                                        <!--end::Header-->
                                        <!--begin::Body-->
                                        <div class="card-body">
                                            <!--begin::Row-->
                                            <div class="row g-3 g-lg-6">
                                                @foreach($advert->gallery as $gallery)
                                                <div class="col-md-2">
                                                    <div style="position: relative;">
                                                        <a class="d-block overlay" data-fslightbox="lightbox-basic"
                                                            href="{{asset('storage/'.$gallery->image)}}">
                                                            <img src="{{asset('storage/'.$gallery->image)}}"
                                                                class="rounded w-100" />
                                                            <!--begin::Action-->
                                                            <div
                                                                class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                                                <i class="bi bi-eye-fill text-white fs-3x"></i>
                                                            </div>
                                                            <!--end::Action-->
                                                        </a>
                                                        <a href="{{ route('admin.advert-remove-single-gallery', [$gallery->id, $advert->id]) }}"
                                                            class="btn btn-icon-danger btn-text-danger hover-scale"
                                                            style="position: absolute; top: 0; right: 0; margin-top: -30px; margin-right: -37px;">
                                                            <i class="ki-duotone ki-cross-circle"
                                                                style="font-size:20px!important;">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>
                                                        </a>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Social widget 2-->
                                    @endif

                                </div>
                                <!--end::Media-->

                                <!--begin::Features-->
                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Features</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <select class="form-select form-select-sm form-select-solid" name="features[]"
                                            data-control="select2" data-close-on-select="false"
                                            data-placeholder="Select a feature" data-allow-clear="true"
                                            multiple="multiple">

                                            @foreach($features as $feature)
                                            @foreach($feature->descriptions as $desc)
                                            @php
                                            $selected = in_array($desc->feature_id,
                                            $advert->features->pluck('id')->toArray()) ? 'selected' : '';
                                            @endphp
                                            <option value="{{$desc->feature_id}}" {{$selected}}>{{$desc->name}}</option>
                                            @endforeach
                                            @endforeach

                                        </select>

                                    </div>
                                    <!--end::Card header-->
                                </div>
                                <!--end::Features-->

                                <!--begin::Property Details-->
                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Property Details</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Repeater-->
                                        <div id="kt_docs_repeater_advanced">
                                            <!--begin::Form group-->
                                            <div class="form-group">
                                                <h5>Used Property Details</h5>
                                                <hr>
                                                <div class="table-responsive">
                                                    <!--begin::Table-->
                                                    <table
                                                        class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-250px">
                                                        <tbody class="fw-semibold text-gray-600">
                                                            @foreach($advert->propertyDetails as $props)
                                                            <tr>
                                                                <td class="text-muted">
                                                                    <div class="d-flex align-items-center">
                                                                        <img src="{{asset('front/img/inner-page/icon/'.$props->icon)}}"
                                                                            alt="icon"> &nbsp;
                                                                        {{ $props->descriptions->first()->name}}
                                                                    </div>
                                                                </td>
                                                                <td class="fw-bold text-center">
                                                                    {{ $props->pivot->value}}</td>
                                                                <td class="text-end"
                                                                    onclick="properyDelete({{$advert->id}}, {{$props->id}})">
                                                                    <i class="bi bi-trash3 text-danger fs-2x"></i>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    <!--end::Table-->
                                                </div>

                                                <h5>New Property Details</h5>
                                                <hr>
                                                <div data-repeater-list="property">
                                                    <div data-repeater-item>
                                                        <div class="form-group row mb-5">

                                                            <div class="col-md-3">
                                                                <label class="form-label">Properties:</label>
                                                                <select class="form-select" name="property_detail_id"
                                                                    data-kt-repeater="select22"
                                                                    data-placeholder="Select a property">

                                                                    <option></option>
                                                                    @foreach($prop_details as $props)
                                                                    @foreach($props->descriptions as $desc)
                                                                    <option value="{{$desc->property_detail_id}}">
                                                                        {{$desc->name}}</option>
                                                                    @endforeach
                                                                    @endforeach


                                                                </select>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <label class="form-label">Value:</label>
                                                                <input type="text" class="form-control mb-2"
                                                                    name="value" value="" />
                                                            </div>
                                                            <div class="col-md-2">
                                                                <a href="javascript:;" data-repeater-delete
                                                                    class="btn btn-flex btn-sm btn-light-danger mt-3 mt-md-9">
                                                                    <i class="ki-duotone ki-trash fs-3"><span
                                                                            class="path1"></span><span
                                                                            class="path2"></span><span
                                                                            class="path3"></span><span
                                                                            class="path4"></span><span
                                                                            class="path5"></span></i>
                                                                    Delete
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Form group-->

                                            <!--begin::Form group-->
                                            <div class="form-group">
                                                <a href="javascript:;" data-repeater-create
                                                    class="btn btn-flex btn-light-primary">
                                                    <i class="ki-duotone ki-plus fs-3"></i>
                                                    Add
                                                </a>
                                            </div>
                                            <!--end::Form group-->
                                        </div>
                                        <!--end::Repeater-->
                                    </div>
                                    <!--end::Card header-->
                                </div>
                                <!--end::Property Details-->
                                <!--begin::Facilities-->
                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Facilities</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Repeater-->
                                        <div id="kt_docs_repeater_advanced2">
                                            <div class="form-group">
                                                <h5>Used Facilities</h5>
                                                <hr>
                                                <div class="table-responsive">
                                                    <!--begin::Table-->
                                                    <table
                                                        class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-250px">
                                                        <tbody class="fw-semibold text-gray-600">
                                                            @foreach($advert->facilities as $facility)
                                                            <tr data-facility-id="{{ $facility->id }}">
                                                                <td class="text-muted">
                                                                    <div class="d-flex align-items-center">
                                                                        {{ $facility->descriptions->first()->name}}
                                                                    </div>
                                                                </td>
                                                                <td class="fw-bold text-center">
                                                                    {{ $facility->pivot->value}}</td>
                                                                <td class="text-end"
                                                                    onclick="facilityDelete({{$advert->id}}, {{$facility->id}})">
                                                                    <i class="bi bi-trash3 text-danger fs-2x"></i>
                                                                </td>

                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    <!--end::Table-->
                                                </div>
                                                <!--begin::Form group-->
                                                <div class="form-group">
                                                    <h5>Used Facilities</h5>
                                                    <hr>
                                                    <div data-repeater-list="facility">
                                                        <div data-repeater-item>
                                                            <div class="form-group row mb-5">
                                                                <div class="col-md-5">
                                                                    <label class="form-label">Select Options:</label>
                                                                    <select class="form-select" name="facility_id"
                                                                        data-kt-repeater="select2"
                                                                        data-placeholder="Select an option">
                                                                        <option></option>
                                                                        @foreach($facilities as $facility)

                                                                        <option value="{{$facility->id}}">
                                                                            {{$facility->descriptions?->first()?->name}}
                                                                        </option>

                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div class="col-md-5">
                                                                    <label class="form-label">Value:</label>
                                                                    <input type="text" name="value"
                                                                        class="form-control mb-2" value="" />
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <a href="javascript:;" data-repeater-delete
                                                                        class="btn btn-flex btn-sm btn-light-danger mt-3 mt-md-9">
                                                                        <i class="ki-duotone ki-trash fs-3"><span
                                                                                class="path1"></span><span
                                                                                class="path2"></span><span
                                                                                class="path3"></span><span
                                                                                class="path4"></span><span
                                                                                class="path5"></span></i>
                                                                        Delete
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Form group-->

                                                <!--begin::Form group-->
                                                <div class="form-group">
                                                    <a href="javascript:;" data-repeater-create
                                                        class="btn btn-flex btn-light-primary">
                                                        <i class="ki-duotone ki-plus fs-3"></i>
                                                        Add
                                                    </a>
                                                </div>
                                                <!--end::Form group-->
                                            </div>
                                            <!--end::Repeater-->
                                        </div>
                                        <!--end::Card header-->
                                    </div>
                                    <!--end::Facilities-->
                                </div>
                            </div>
                            <!--end::Tab pane-->

                        </div>
                    </div>
                    <!--end::Tab content-->
                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="{{route('admin.advert-list')}}" id="kt_ecommerce_add_product_cancel"
                            class="btn btn-light me-5">Cancel</a>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                            <span class="indicator-label">Save Changes</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Button-->
                    </div>
                </div>
                <!--end::Main column-->
            </form>
            <!--end::Form-->
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

<!--begin::Vendors Javascript(used for this page only)-->
<script src="{{asset('admin/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script src="{{asset('admin/plugins/custom/formrepeater/formrepeater.bundle.js')}}"></script>

<script>
    $('#kt_docs_repeater_advanced2').repeater({
        initEmpty: false,

        defaultValues: {
            'text-input': 'foo'
        },

        show: function () {
            $(this).slideDown();
            $(this).find('[data-kt-repeater="select2"]').select2();
        },

        hide: function (deleteElement) {
            $(this).slideUp(deleteElement);
        },

        ready: function () {
            $('[data-kt-repeater="select2"]').select2();
        }
    });

    $('#kt_docs_repeater_advanced').repeater({
        initEmpty: false,

        defaultValues: {
            'text-input': 'foo'
        },

        show: function () {
            $(this).slideDown();
            $(this).find('[data-kt-repeater="select22"]').select2();
        },

        hide: function (deleteElement) {
            $(this).slideUp(deleteElement);
        },

        ready: function () {
            $('[data-kt-repeater="select22"]').select2();
        }
    });

</script>

<script>
    $(document).ready(function () {
        function fetchAndPopulate(url, selectElement) {
            selectElement.prop('disabled', true).empty();

            $.getJSON(url, function (data) {
                selectElement.prop('disabled', false);

                $.each(data, function (index, item) {
                    let option = $('<option></option>');
                    option.val(item.id);
                    option.text(item.name);
                    selectElement.append(option);
                });
            }).fail(function (error) {
                console.error('Error fetching data:', error);
            });
        }

        $('#country_id').on('change', function () {
            let selectedCountryId = $(this).val();
            if (selectedCountryId) {
                fetchAndPopulate('../../get-states/' + selectedCountryId, $('#state_id'));
                fetchAndPopulate('../../get-cities-country/' + selectedCountryId, $('#city_id'));
            }
        });

        $('#state_id').on('change', function () {
            let selectedStateId = $(this).val();
            if (selectedStateId) {
                fetchAndPopulate('../../get-cities-state/' + selectedStateId, $('#city_id'));
            }
        });
    });

</script>
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used for this page only)-->
<script src="{{asset('admin/js/custom/apps/ecommerce/catalog/save-product.js')}}"></script>
<script src="{{asset('admin/js/widgets.bundle.js')}}"></script>
<script src="{{asset('admin/js/custom/widgets.js')}}"></script>
<script src="{{asset('admin/js/custom/apps/chat/chat.js')}}"></script>
<script src="{{asset('admin/js/custom/utilities/modals/upgrade-plan.js')}}"></script>
<script src="{{asset('admin/js/custom/utilities/modals/create-app.js')}}"></script>
<script src="{{asset('admin/js/custom/utilities/modals/users-search.js')}}"></script>
<script src="{{ asset('admin/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
<!--end::Custom Javascript-->

<script src="{{asset('admin/plugins/custom/tinymce/tinymce.bundle.js')}}"></script>
<script>
    function initializeTinymce(selector) {
        var options = {
            selector: selector,
            height: "280"
        };
        if (KTThemeMode.getMode() === "dark") {
            options["skin"] = "oxide-dark";
            options["content_css"] = "dark";
        }
        tinymce.init(options);
    }

    initializeTinymce("#kt_docs_tinymce_basic0");
    initializeTinymce("#kt_docs_tinymce_basic1");
    initializeTinymce("#kt_docs_tinymce_basic2");
    initializeTinymce("#kt_docs_tinymce_basic_adr");
</script>


<script>
    // The DOM elements you wish to replace with Tagify

    var input = document.querySelector("#kt_tagify_7");

    new Tagify(input, {
        whitelist: ["Ada", "Adenine", "Agda", "Agilent VEE"],
        maxTags: 10,
        dropdown: {
            maxItems: 20, // <- mixumum allowed rendered suggestions
            classname: "", // <- custom classname for this dropdown, so it could be targeted
            enabled: 0, // <- show suggestions on focus
            closeOnSelect: false // <- do not hide the suggestions dropdown once an item has been selected
        }
    });

</script>
<!-- Extra JS -->

<script>
    var optionFormat = function (item) {
        if (!item.id) {
            return item.text;
        }

        var span = document.createElement('span');
        var imgUrl = item.element.getAttribute('data-kt-select2-country');
        var template = '';

        template += '<img src="' + imgUrl + '" class="rounded-circle h-20px me-2" alt="image"/>';
        template += item.text;

        span.innerHTML = template;

        return $(span);
    }

    // Init Select2 --- more info: https://select2.org/
    $('#kt_docs_select2_country').select2({
        templateSelection: optionFormat,
        templateResult: optionFormat
    });

</script>
<script>
    function facilityDelete(advertId, facilityId) {
        var url = "{{ route('admin.advert-facility-delete', ['id' => ':facilityId', 'ad_id' => ':advertId']) }}";
        url = url.replace(':facilityId', facilityId);
        url = url.replace(':advertId', advertId);

        Swal.fire({
            title: "Emin misiniz?",
            text: " Silmek istediğinize emin misiniz?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Evet, sil",
            cancelButtonText: "İptal"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }

    function properyDelete(advertId, propId) {
        var url = "{{ route('admin.advert-property-delete', ['id' => ':propId', 'ad_id' => ':advertId']) }}";
        url = url.replace(':propId', propId);
        url = url.replace(':advertId', advertId);

        Swal.fire({
            title: "Emin misiniz?",
            text: " Silmek istediğinize emin misiniz?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Evet, sil",
            cancelButtonText: "İptal"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }
</script>

<script>
    var uploadedDocumentMap = {}
    var myDropzone = new Dropzone("#dropzone", {
        url: "{{route('admin.advert-storeMedia')}}", 
        paramName: "file", 
        maxFiles: 10,
        maxFilesize: 10, 
        addRemoveLinks: true,
        headers:{
            'X-CSRF-TOKEN':"{{ csrf_token() }}"
        },
        success:function (file,response){
            $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">' )
            uploadedDocumentMap[file.name]=response.name
        },
        removedFile:function(file){
            file.previewElement.remove()
            var name =''
            if(typeof file.file_name !== 'undefined'){
                name = file.file_name
            }else{
                name = uploadedDocumentMap[file.name]
            }
            $('form').find('input[name="document[]"][value="'+name+'"]').remove()
        },
        init:function (){
            @if(isset($advert)&& $advert->image)
                var files =
                    {!! json_encode($advert->image) !!}
                        for (var i in files){
                            var file = files[i]
                            this.options.addedfile.call(this,file)
                            file.previewElement.classList.add("dz-complete")
                $('form').append('<input type="hidden"  name="document[]" value="' + file.file_name + '">')
            }
            @endif
        }
    });
</script>
@endsection
