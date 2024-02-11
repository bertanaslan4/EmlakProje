@extends('admin.admin')

@section('css')

    <link href="{{ asset('admin/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />

@endsection

@section('content')
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Orka Group</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="index.html" class="text-muted text-hover-primary">Dashboard</a>
                        </li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Primary button-->
                    <a href="{{ route('admin.advert-create') }}" class="btn btn-sm fw-bold btn-primary">Add New Advert</a>
                    <!--end::Primary button-->
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
@endsection

@section('modals')
    <!--begin::Drawers-->
    @include('admin.layout.partials.activities')
    <!--begin::Chat drawer-->
    @include('admin.layout.partials.chat')
    <!--end::Chat drawer-->
    <!--begin::Cart drawer-->
    @include('admin.layout.partials.cart')
    <!--end::Cart drawer-->
    <!--end::Drawers-->

    <!--begin::Scrolltop-->
    @include('admin.layout.partials.scrooltop')
    <!--end::Scrolltop-->
    <!--begin::Modals-->
    <!--begin::Modal - Upgrade plan-->
    @include('admin.layout.modals.upgrade')
    <!--end::Modal - Upgrade plan-->
    <!--begin::Modal - Create App-->
    @include('admin.layout.modals.create_app')
    <!--end::Modal - Create App-->
    <!--begin::Modal - New Target-->
    @include('admin.layout.modals.target')
    <!--end::Modal - New Target-->
    <!--begin::Modal - View Users-->
    @include('admin.layout.modals.view_users')
    <!--end::Modal - View Users-->
    <!--begin::Modal - Users Search-->
    @include('admin.layout.modals.user_search')
    <!--end::Modal - Users Search-->
    <!--begin::Modal - Invite Friends-->
    @include('admin.layout.modals.invite_friends')
    <!--end::Modal - Invite Friend-->
    <!--end::Modals-->
@endsection

@section('js')
    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="{{asset('admin/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
    <script src="{{asset('admin/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{asset('admin/js/widgets.bundle.js')}}"></script>
    <script src="{{asset('admin/js/custom/widgets.js')}}"></script>
    <script src="{{asset('admin/js/custom/apps/chat/chat.js')}}"></script>
    <script src="{{asset('admin/js/custom/utilities/modals/upgrade-plan.js')}}"></script>
    <script src="{{asset('admin/js/custom/utilities/modals/create-app.js')}}"></script>
    <script src="{{asset('admin/js/custom/utilities/modals/new-target.js')}}"></script>
    <script src="{{asset('admin/js/custom/utilities/modals/users-search.js')}}"></script>
    <!--end::Custom Javascript-->
@endsection
