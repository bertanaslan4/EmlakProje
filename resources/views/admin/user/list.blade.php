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
                <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">User
                    Listing</h1>
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
                    <li class="breadcrumb-item text-muted">Users</li>
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
                <i class="ki-duotone ki-notification-bing fs-2hx text-light me-4 mb-5 mb-sm-0"><span
                        class="path1"></span><span class="path2"></span><span class="path3"></span></i>
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
                <button type="button"
                    class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
                    data-bs-dismiss="alert">
                    <i class="ki-duotone ki-cross fs-1 text-light"><span class="path1"></span><span
                            class="path2"></span></i>
                </button>
                <!--end::Close-->
            </div>
            <!--end::Alert-->

            @endif
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <input type="text" data-kt-customer-table-filter="search"
                                class="form-control form-control-solid w-250px ps-13" placeholder="Search" />
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">

                            <!--begin::Add user-->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#kt_modal_add_user">
                                <i class="ki-duotone ki-plus fs-2"></i>Add User</button>
                            <!--end::Add user-->
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                        <thead>
                            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-125px">Name</th>
                                <th class="min-w-125px text-center">Role</th>
                                <th class="text-end min-w-70px">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-600">
                            @foreach($users as $user)
                            <tr>
                                <td> {{ $user->name }} </td>

                                <td class="text-center">
                                    @if($user->is_admin == 0)
                                    <span class="badge badge-light-danger">Administrator</span>
                                    @else
                                    <span class="badge badge-light-primary">User</span>
                                    @endif
                                </td>

                                <td class="text-end">
                                    <a href="#"
                                        class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                        <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                        data-kt-menu="true">
                                        <div class="menu-item px-3">
                                                <a href="" class="menu-link edit px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_update_user" data-id="{{$user->id}}">Edit</a>
                                        </div>
                                        <div class="menu-item px-3">
                                            <a href="javascript:void(0);" class="menu-link px-3" onclick="userDestroy({{$user->id}})"
                                                data-kt-customer-table-filter="delete_row">Delete</a>
                                        </div>
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

            <!--begin::Modal - Add task-->
            <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <div class="modal-content">
                        <div class="modal-header" id="kt_modal_add_user_header">
                            <h2 class="fw-bold">Add User</h2>
                            <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                                <i class="ki-duotone ki-cross fs-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </div>
                        </div>
                        <div class="modal-body px-5 my-7">
                            <form id="kt_modal_add_user_form" class="form" method="post" action="{{ route('admin.user-store') }}">
                                @csrf
                                <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll"
                                    data-kt-scroll="true" data-kt-scroll-activate="true"
                                    data-kt-scroll-max-height="auto"
                                    data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                    data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                                    <div class="fv-row mb-7">
                                        <label class="required fw-semibold fs-6 mb-2">Full Name</label>
                                        <input type="text" name="name"
                                            class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full name" />
                                    </div>
                                    <div class="fv-row mb-7">
                                        <label class="required fw-semibold fs-6 mb-2">Email</label>
                                        <input type="email" name="email"
                                            class="form-control form-control-solid mb-3 mb-lg-0"
                                            placeholder="example@domain.com" v />
                                    </div>
                                    <div class="fv-row mb-7">
                                        <label class="required fw-semibold fs-6 mb-2">Password</label>
                                        <input type="text" name="password"
                                            class="form-control form-control-solid mb-3 mb-lg-0"/>
                                    </div>
                                    <div class="mb-5">
                                        <label class="required fw-semibold fs-6 mb-5">Role</label>
                                        <div class="d-flex fv-row">
                                            <div class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input me-3" name="is_admin" type="radio"
                                                    value="1" id="kt_modal_add_role_option_0" checked='checked' />
                                                <label class="form-check-label" for="kt_modal_add_role_option_0">
                                                    <div class="fw-bold text-gray-800">Administrator</div>
                                                    <div class="text-gray-600">This role type is intended for users with all permissions.</div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class='separator separator-dashed my-5'></div>
                                        <div class="d-flex fv-row">
                                            <div class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input me-3" name="is_admin" type="radio"
                                                    value="0" id="kt_modal_add_role_option_1" />
                                                <label class="form-check-label" for="kt_modal_add_role_option_1">
                                                    <div class="fw-bold text-gray-800">User</div>
                                                    <div class="text-gray-600">This role type is intended for users with no permissions.</div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center pt-10">
                                    <button type="reset" class="btn btn-light me-3"
                                        data-kt-users-modal-action="cancel">Discard</button>
                                    <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                        <span class="indicator-label">Submit</span>
                                        <span class="indicator-progress">Please wait...
                                            <span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Modal - Add task-->

            <!--begin::Modal - Add task-->
            <div class="modal fade" id="kt_modal_update_user" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <div class="modal-content">
                        <div class="modal-header" id="kt_modal_update_user_header">
                            <h2 class="fw-bold">Edit User</h2>
                            <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                                <i class="ki-duotone ki-cross fs-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </div>
                        </div>
                        <div class="modal-body px-5 my-7">
                            <form id="kt_modal_update_user_form" class="form" method="post" action="{{ route('admin.user-update') }}">
                                @csrf
                                <input type="text" class="form-control form-control-solid" name="user_id" id="user-id" hidden=""/>
                                <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_update_user_scroll"
                                    data-kt-scroll="true" data-kt-scroll-activate="true"
                                    data-kt-scroll-max-height="auto"
                                    data-kt-scroll-dependencies="#kt_modal_update_user_header"
                                    data-kt-scroll-wrappers="#kt_modal_update_user_scroll" data-kt-scroll-offset="300px">
                                    <div class="fv-row mb-7">
                                        <label class="required fw-semibold fs-6 mb-2">Full Name</label>
                                        <input type="text" name="name" id="name"
                                            class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full name" />
                                    </div>
                                    <div class="fv-row mb-7">
                                        <label class="required fw-semibold fs-6 mb-2">Email</label>
                                        <input type="email" name="email" id="email"
                                            class="form-control form-control-solid mb-3 mb-lg-0"
                                            placeholder="example@domain.com" v />
                                    </div>
                                    <div class="fv-row mb-7">
                                        <label class="required fw-semibold fs-6 mb-2">Password</label>
                                        <input type="text" name="password" id="password"
                                            class="form-control form-control-solid mb-3 mb-lg-0"/>
                                    </div>
                                    <div class="mb-5">
                                        <label class="required fw-semibold fs-6 mb-5">Role</label>
                                        <div class="d-flex fv-row">
                                            <div class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input me-3" name="is_admin" type="radio"
                                                    value="1" id="kt_modal_update_role_option_0"  />
                                                <label class="form-check-label" for="kt_modal_update_role_option_0">
                                                    <div class="fw-bold text-gray-800">Administrator</div>
                                                    <div class="text-gray-600">This role type is intended for users with all permissions.</div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class='separator separator-dashed my-5'></div>
                                        <div class="d-flex fv-row">
                                            <div class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input me-3" name="is_admin" type="radio"
                                                    value="0" id="kt_modal_update_role_option_1" />
                                                <label class="form-check-label" for="kt_modal_update_role_option_1">
                                                    <div class="fw-bold text-gray-800">User</div>
                                                    <div class="text-gray-600">This role type is intended for users with no permissions.</div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center pt-10">
                                    <button type="reset" class="btn btn-light me-3"
                                        data-kt-users-modal-action="cancel">Discard</button>
                                    <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                        <span class="indicator-label">Submit</span>
                                        <span class="indicator-progress">Please wait...
                                            <span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Modal - Add task-->

        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
</div>
<!--end::Content wrapper-->
@endsection

@section('js')
<script>
    $(document).ready(function () {
        $('.edit').on('click', function () {
            var id = $(this).data('id');
            $('#user-id').val(id);

            $.ajax({
                url: '../get-user/' + id,
                method: 'GET',
                success: function (data) {
                    $.each(data, function () {
                        $('#name').val(data.name);
                        $('#email').val(data.email);
                        console.log(data.is_admin)
                        if(data.is_admin == 0){
                            $('#kt_modal_update_role_option_0').prop('checked', true);
                        }else{
                            $('#kt_modal_update_role_option_1').prop('checked', true);
                        }
                    });
                },
                error: function (error) {
                    console.error('Error fetching data:', error);
                }
            });
        });
    });

    function userDestroy($id)
        {
            var trashIcon = $(this);
            var userId = $id

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
                    var url = "{{ route('admin.user-destroy', ['id' => ':userId'] )}}";
                    window.location.href = url.replace(':userId', userId);
                }
            });
        }
</script>
@endsection
