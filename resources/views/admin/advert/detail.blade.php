@extends('admin.admin')

@section('css')

@endsection

@section('content')
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                <!--begin::Page title-->
                <div  class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        Advert Details
                    </h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">
                                Home
                            </a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            Details
                        </li>
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
        <div id="kt_app_content" class="app-content  flex-column-fluid " >
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container  container-xxl ">
                <!--begin::Order details page-->
                <div class="d-flex flex-column gap-7 gap-lg-10">

                    <!--begin::Order summary-->
                    <!--begin::Navbar-->
                    <div class="card mb-5 mb-xl-10">
                        <div class="card-body pt-9 pb-0">
                            <!--begin::Details-->
                            <div class="d-flex flex-wrap flex-sm-nowrap">
                                <!--begin: Pic-->
                                <div class="me-7 mb-4">
                                    <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                        <img src="{{asset('storage/'.$advert->thumbnail)}}" />
                                        <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px"></div>
                                    </div>

                                </div>
                                <!--end::Pic-->

                                <!--begin::Info-->
                                <div class="flex-grow-1">
                                    <!--begin::Title-->
                                    <div class="">
                                        <!--begin::details View-->
                                        <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                                            <!--begin::Card header-->
                                            <div class="card-header cursor-pointer">
                                                <!--begin::Card title-->
                                                <div class="card-title m-0">
                                                    <h3 class="fw-bold m-0">Advert Details</h3>
                                                </div>
                                                <!--end::Card title-->

                                                <!--begin::Action-->
                                                <a href="{{ route('admin.advert-edit', ['id' => $advert->id]) }}"  class="btn btn-sm btn-primary align-self-center">Edit Advert</a>
                                                <!--end::Action-->
                                            </div>
                                            <!--begin::Card header-->

                                            <!--begin::Card body-->
                                            <div class="card-body p-9">
                                                <!--begin::Row-->
                                                <div class="row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-4 fw-semibold text-muted">Title</label>
                                                    <!--end::Label-->

                                                    <!--begin::Col-->
                                                    <div class="col-lg-8">
                                                        <span class="fw-bold fs-6 text-gray-800">{{ $advert->descriptions->first()->title }}</span>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->

                                                <!--begin::Input group-->
                                                <div class="row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-4 fw-semibold text-muted">Category</label>
                                                    <!--end::Label-->

                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row">
                                                        <span class="fw-semibold text-gray-800 fs-6">
                                                            @if($advert->category_id==1)
                                                                <div class="badge badge-light-success">House</div>
                                                            @else
                                                                <div class="badge badge-light-success">Office</div>
                                                            @endif
                                                        </span>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Input group-->
                                                <div class="row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-4 fw-semibold text-muted">
                                                        Type

                                                        <span class="ms-1" data-bs-toggle="tooltip" title="{{$advert->type->descriptions->first()->description}}">
                                                        <i class="ki-duotone ki-information fs-7"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>                </span>
                                                    </label>
                                                    <!--end::Label-->

                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 d-flex align-items-center">
                                                        <span class="fw-bold fs-6 text-gray-800 me-2">{{$advert->type->descriptions->first()->title}}</span>

                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Input group-->
                                                <div class="row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-4 fw-semibold text-muted">Rent Price</label>
                                                    <!--end::Label-->

                                                    <!--begin::Col-->
                                                    <div class="col-lg-8">
                                                        <span class="fw-bold fs-6 text-gray-800">{{$advert->rent_price}} {{ $advert->currency->symbol }} </span>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Input group-->
                                                <div class="row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-4 fw-semibold text-muted">
                                                        Deposit Price
                                                    </label>
                                                    <!--end::Label-->

                                                    <!--begin::Col-->
                                                    <div class="col-lg-8">
                                                        <span class="fw-bold fs-6 text-gray-800">{{$advert->deposit_price}} {{ $advert->currency->symbol }}</span>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Input group-->
                                                <div class="row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-4 fw-semibold text-muted">Location </label>
                                                    <!--end::Label-->

                                                    <!--begin::Col-->
                                                    <div class="col-lg-8">
                                                        <span class="fw-bold fs-6 text-gray-800">{{ $advert->country?->name }} / {{$advert->state?->name}} / {{$advert->city?->name}}</span>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Input group-->
                                                <div class="row mb-10">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-4 fw-semibold text-muted">Address</label>
                                                    <!--begin::Label-->

                                                    <!--begin::Label-->
                                                    <div class="col-lg-8">
                                                        <span class="fw-semibold fs-6 text-gray-800">{!! $advert->address !!}</span>
                                                    </div>
                                                    <!--begin::Label-->
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Input group-->
                                                <div class="row mb-10">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-4 fw-semibold text-muted">Description</label>
                                                    <!--begin::Label-->

                                                    <!--begin::Label-->
                                                    <div class="col-lg-8">
                                                        <div class="col-lg-8">
                                                            <span class="fw-semibold fs-6 text-gray-800"><?php echo $advert->descriptions->first()->description; ?></span>
                                                        </div>
                                                    </div>
                                                    <!--begin::Label-->
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Card body-->
                                        </div>
                                        <!--end::details View-->
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Details-->
                        </div>
                    </div>
                    <!--end::Navbar-->


                    <div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10">

                        <!--begin::Order details-->
                        <div class="card card-flush py-4 flex-row-fluid">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Facilities</h2>
                                </div>
                            </div>
                            <!--end::Card header-->

                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-250px">
                                        <tbody class="fw-semibold text-gray-600">

                                        @foreach($advert->facilities as $facility)

                                            <tr>
                                                <td class="text-muted">
                                                    <div class="d-flex align-items-center">
                                                        {{ $facility->descriptions->first()->name}}
                                                    </div>
                                                </td>
                                                <td class="fw-bold text-end">{{ $facility->pivot->value}}</td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                    <!--end::Table-->
                                </div>
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Order details-->

                        <!--begin::Customer details-->
                        <div class="card card-flush py-4  flex-row-fluid">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Property Details</h2>
                                </div>
                            </div>
                            <!--end::Card header-->

                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-250px">
                                        <tbody class="fw-semibold text-gray-600">
                                        @foreach($advert->propertyDetails as $props)
                                            <tr>
                                                <td class="text-muted">
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{asset('front/img/inner-page/icon/'.$props->icon)}}" alt="icon"> &nbsp; {{ $props->descriptions->first()->name}}
                                                    </div>
                                                </td>
                                                <td class="fw-bold text-end">{{ $props->pivot->value}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <!--end::Table-->
                                </div>
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Customer details-->
                        <!--begin::Documents-->
                        <div class="card card-flush py-4  flex-row-fluid">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Features</h2>
                                </div>
                            </div>
                            <!--end::Card header-->

                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-250px">
                                        <tbody class="fw-semibold text-gray-600">
                                        @foreach($advert->features as $feature)
                                            <tr>
                                                <td class="text-muted">
                                                    <div class="d-flex align-items-center">
                                                        <i class="bi bi-check-square-fill"></i> &nbsp; {{ $feature->descriptions->first()->name}}
                                                    </div>
                                                </td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <!--end::Table-->
                                </div>
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Documents-->
                    </div>
                    <!--end::Order summary-->

                    <!--begin::Tab content-->
                    <div class="tab-content">
                        <!--begin::Tab pane-->
                        <div class="tab-pane fade show active" id="kt_ecommerce_sales_order_summary" >
                            <!--begin::Orders-->
                            <div class="d-flex flex-column gap-7 gap-lg-10">

                                <!--begin::Images-->
                                <div class="card card-flush py-4 flex-row-fluid overflow-hidden">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Gallery</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->

                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <div class="tns" style="direction: ltr">
                                            <div data-tns="true" data-tns-nav-position="bottom" data-tns-mouse-drag="true" data-tns-controls="false">
                                                <!--begin::Item-->
                                                @foreach($advert->gallery as $images)
                                                    <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
                                                        <img src="{{asset('storage/'.$images->image)}}" class="card-rounded shadow mw-100" alt="" />
                                                    </div>
                                                @endforeach
                                                <!--end::Item-->

                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Product List-->
                            </div>
                            <!--end::Orders-->
                        </div>
                        <!--end::Tab pane-->
                    </div>
                    <!--end::Tab content-->
                </div>
                <!--end::Order details page-->
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
    <!-- Extra JS -->
@endsection
