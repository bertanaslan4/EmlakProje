@extends('front.app')
@section('content')

    <div class="inner-page-banner">
        <div class="banner-wrapper">
            <div class="container-fluid">
                <div class="banner-main-content-wrap">
                    <div class="row">
                        <div class="col-xl-6 col-lg-7 d-flex align-items-center">
                            <div class="banner-content">
                                <h1>Advert Application</h1>
                                <ul class="breadcrumb-list">
                                    <li><a href="{{ route('home') }}">Home</a></li>
                                    <li>Advert Application </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pricing-checkout-page pt-100 mb-100">
        <div class="container">
            @if (Session::has('error'))
                <div class="row">
                    <div class="col-lg-12">
                        <div class="package-and-login-area">
                            <p>Application failed. Fields marked with * are required. Please make sure you have filled in all required fields before applying again.</p>
                        </div>
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="col-lg-4 p-0">
                    <div class="package-pricing-area">
                        <div class="package-pricing-content" style="position: sticky; top: 0; display: flex; flex-direction: column; gap: 20px;">
                            <div class="package-title">
                                <h6 style="color: var(--black-color);
                                font-family: var(--font-montserrat);
                                font-size: 20px;
                                font-weight: 600;
                                line-height: 1;
                                margin-bottom: 0;">Personal data</h6>
                            </div>
                            <span style="display: flex;justify-content: space-between;"><b>Name:</b> {{ $user->salutation == 1 ? 'Mr.' : 'Ms.' }} {{ $user->name }} {{ $user->surname }}</span>

                            <span style="display: flex;justify-content: space-between; text-align: end;">
                                <b>Address:</b>
                                @if($user->street)
                                {{ $user->street }} {{ $user->street_number }} {{ $user->address_suffix }} {{ $user->country->name ?? '' }} / {{ $user->state->name ?? '' }} / {{ $user->city->name ?? '' }}
                                @else
                                -
                                @endif
                            </span>

                            <span style="display: flex;justify-content: space-between;">
                                <b>Postal Code:</b>
                                @if($user->postal_code)
                                {{ $user->postal_code }}
                                @else
                                -
                                @endif
                            </span>

                            <span style="display: flex;justify-content: space-between;">
                                <b>Phone:</b>
                                @if($user->phone)
                                {{ $user->phone }}
                                @else
                                -
                                @endif
                            </span>

                            <span style="display: flex;justify-content: space-between;">
                                <b>Date of birth:</b>
                                @if($user->dob)
                                {{ Date::parse($user->dob)->format('d M Y') }}
                                @else
                                -
                                @endif
                            </span>

                            <span style="display: flex;justify-content: space-between;">
                                <b>Proffession:</b>
                                @if($user->proffession)
                                {{ $user->proffession?->getText() }}
                                @else
                                -
                                @endif
                            </span>

                            <span style="display: flex;justify-content: space-between;">
                                <b>EU Citizen:</b>
                                @if($user->eu_citizen)
                                {{ $user->eu_citizen == 1 ? 'Yes' : 'No' }}
                                @else
                                -
                                @endif
                            </span>

                            <div class="back-btn">
                                <a href="{{ route('user.dashboard') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12">
                                        <path d="M0 6.00006L7 0L2.08264 6.00006L7 12L0 6.00006Z" />
                                    </svg>
                                    Go to Dashboard
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 p-0">
                    <div class="details-form">
                        <div class="details-form-title" style="padding-bottom: 20px;border-bottom: 1px solid rgba(22, 25, 30, .1);margin-bottom: 60px;">
                            <h4>Documents</h4>
                        </div>

                        @php
                            $fieldLabels = [
                                'salutation' => 'Salutation',
                                'name' => 'Name',
                                'surname' => 'Surname',
                                'street' => 'Street',
                                'street_number' => 'Street Number',
                                'postal_code' => 'Postal Code',
                                'country_id' => 'Country',
                                'dob' => 'Date of Birth',
                                'proffession' => 'Profession',
                                'eu_citizen' => 'EU Citizen',
                            ];

                            $requiredFields = array_keys($fieldLabels);
                            $missingFields = [];

                            foreach ($requiredFields as $field) {
                                if (empty($user->$field)) {
                                    $missingFields[] = $field;
                                }
                            }
                        @endphp

                        @if (!empty($missingFields))
                            You need to fill in the following fields to continue with the application: 
                            @php
                                $errorMessages = [];
                                foreach ($missingFields as $field) {
                                    $errorMessages[] = "<strong>{$fieldLabels[$field]}</strong>";
                                }
                                $errorMessage = implode(', ', $errorMessages);
                            @endphp
                            {!! $errorMessage !!}. <br><a href="{{ route('user.profile') }}">Profile</a>
                        @else
                        <form method="POST" action="{{ route('apply.store', $advert->uuid) }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="user_id" value="{{ $user->id }}">


                            <div class="details-form-title" style="margin-bottom: 0px;"><h5>Proof of identity *</h5></div>
                            <div class="file-upload-container">
                                <div class="dropzone file-upload" id="dropzone"><span class="icon icon--plus file-upload__icon"></span></div>
                                <ul class="form__file-uploaded file-uploaded"></ul>
                            </div>

                            <div class="details-form-title" style="margin-top:30px; margin-bottom: 0px;"><h5>Proof of income</h5></div>
                            <div class="file-upload-container">
                                <div class="dropzone file-upload" id="dropzone2"><span class="icon icon--plus file-upload__icon fuicon"></span></div>
                                <ul class="form__file-uploaded2 file-uploaded"></ul>
                            </div>

                            <div class="details-form-title" style="margin-top:30px; margin-bottom: 0px;"><h5>Rental debt-free confirmation</h5></div>
                            <div class="file-upload-container">
                                <div class="dropzone file-upload" id="dropzone3"><span class="icon icon--plus file-upload__icon fuicon"></span></div>
                                <ul class="form__file-uploaded3 file-uploaded"></ul>
                            </div>

                            <div class="details-form-title" style="margin-top:30px; margin-bottom: 0px;"><h5>Financial selfdisclosure *</h5></div>
                            <div class="file-upload-container">
                                <div class="dropzone file-upload" id="dropzone4"><span class="icon icon--plus file-upload__icon fuicon"></span></div>
                                <ul class="form__file-uploaded4 file-uploaded"></ul>
                            </div>

                            <div class="details-form-title" style="margin-top:30px; margin-bottom: 0px;"><h5>Proof of reason for stay *</h5></div>
                            <div class="file-upload-container">
                                <div class="dropzone file-upload" id="dropzone5"><span class="icon icon--plus file-upload__icon fuicon"></span></div>
                                <ul class="form__file-uploaded5 file-uploaded"></ul>
                            </div>

                            <div class="details-form-title" style="margin-top:30px; margin-bottom: 0px;"><h5>Residence permit *</h5></div>
                            <div class="file-upload-container">
                                <div class="dropzone file-upload" id="dropzone6"><span class="icon icon--plus file-upload__icon fuicon"></span></div>
                                <ul class="form__file-uploaded6 file-uploaded"></ul>
                            </div>

                            <div class="details-form-title" style="margin-top:30px; margin-bottom: 0px;"><h5>Schufa credit report</h5></div>
                            <div class="file-upload-container">
                                <div class="dropzone file-upload" id="dropzone7"><span class="icon icon--plus file-upload__icon fuicon"></span></div>
                                <ul class="form__file-uploaded7 file-uploaded"></ul>
                            </div>

                            <div class="details-form-title" style="margin-top:30px; margin-bottom: 0px;"><h5>Your last three payslips</h5></div>
                            <div class="file-upload-container">
                                <div class="dropzone file-upload" id="dropzone8"><span class="icon icon--plus file-upload__icon fuicon"></span></div>
                                <ul class="form__file-uploaded8 file-uploaded"></ul>
                            </div>

                            <div class="details-form-title" style="margin-top:30px; margin-bottom: 0px;"><h5>Registration card university / Working contract *</h5></div>
                            <div class="file-upload-container">
                                <div class="dropzone file-upload" id="dropzone9"><span class="icon icon--plus file-upload__icon fuicon"></span></div>
                                <ul class="form__file-uploaded9 file-uploaded"></ul>
                            </div>

                            <div class="row" style="margin-top:30px;">
                                <div class="col-lg-12">
                                    <div class="form-inner mb-30">
                                        <label>Please use this field if you want to leave additional comments on your documents.</label>
                                        <textarea name="document_comments" placeholder="Your comment"></textarea>
                                    </div>
                                </div>
                            </div>

                        <hr>

                        <div class="form-inner mb-50">
                            <label class="containerss">
                                <input type="checkbox" name="correct_check" required>
                                <span class="checkmark"></span>
                                <span class="text">I hereby confirm that the information I have provided is correct.</span>
                            </label>
                        </div>
                        <div class="form-inner">
                            <button type="submit" class="primary-btn3" style="color:#FFF!important;">Submit your request</button>
                        </div>
                    </form>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <style>
        .file-upload{
            display: flex; align-items: center; justify-content: center; flex-direction: column; flex-shrink: 0; width: 120px; height: 120px; margin-right: 20px; background-color: #fbfbfb; border: 2px dashed #dfdfdf; border-radius: 10px; min-height: 0;
        }
        .fuicon{
            width: 30px; height: 30px; line-height: 30px; font-size: 30px; text-align: center;
        }
        ol:not([class]),ul:not([class]) {
            margin-top: 0;
            margin-bottom: 10px;
            padding-left: 20px
        }

        ul:not([class]) {
            list-style-type: none
        }

        ol:not([class]) li,ul:not([class]) li {
            position: relative;
            margin-bottom: 4px
        }

        ol:not([class]) li:last-child,ul:not([class]) li:last-child {
            margin-bottom: 0
        }

        ul:not([class]) li:before {
            position: absolute;
            top: 0;
            left: -18px;
            content: "\2014"
        }

        ol:not([class]) ol:not([class]),ol:not([class]) ul:not([class]),ul:not([class]) ol:not([class]),ul:not([class]) ul:not([class]) {
            margin-top: 4px
        }

        ol:not([class]) ol:not([class]) li,ol:not([class]) ul:not([class]) li,ul:not([class]) ol:not([class]) li,ul:not([class]) ul:not([class]) li {
            color: #5c5d66
        }
    </style>
@endsection

@section('js')
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

    <script>
        Dropzone.autoDiscover = false;

        function initializeDropzone(containerId, uploadUrl, maxFiles, maxFilesize, formSelector, documentInputName, previewsContainerSelector, documentType) {
            var uploadedDocumentMap = {};
            var dropzoneParent = document.getElementById(containerId).parentElement;

            var myDropzone = new Dropzone("#" + containerId, {
                url: uploadUrl,
                paramName: "file",
                maxFiles: maxFiles,
                maxFilesize: maxFilesize,
                addRemoveLinks: true,
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function (file, response) {
                    console.log(documentType)
                    $(formSelector).append('<input type="hidden" name="' + documentInputName + '[]" value="' + response.name + '">');
                    $(formSelector).append('<input type="hidden" name="document_types[]" value="' + documentType + '">');
                    uploadedDocumentMap[file.name] = response.name;
                    // var count = myDropzone.files.length;
                    // console.log(count);
                },
                removedFile: function (file) {
                    file.previewElement.remove();
                    var name = typeof file.file_name !== 'undefined' ? file.file_name : uploadedDocumentMap[file.name];
                    $(formSelector).find('input[name="' + documentInputName + '[]"][value="' + name + '"]').remove();
                },
                previewsContainer: dropzoneParent.querySelector(previewsContainerSelector),
                previewTemplate: '<li class="file file-uploaded__file">\n<img src="http://localhost:8888/orkagroupportal/public/front/img/document.svg" alt="File Icon">\n<div class="dz-filename file-uploaded__file-name file-name"><span data-dz-name></span></div>\n<div class="dz-progress-wrapper">\n<span class="dz-upload-text"></span>\n<div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>\n</div>\n<div class="form__error"></div>\n</li>',
            });
        }

        initializeDropzone("dropzone", "{{ route('advert-storeMedia') }}", 5, 10, 'form', 'document', '.form__file-uploaded',1);
        initializeDropzone("dropzone2", "{{ route('advert-storeMedia') }}", 5, 10, 'form', 'document', '.form__file-uploaded2',2);
        initializeDropzone("dropzone3", "{{ route('advert-storeMedia') }}", 5, 10, 'form', 'document', '.form__file-uploaded3',3);
        initializeDropzone("dropzone4", "{{ route('advert-storeMedia') }}", 5, 10, 'form', 'document', '.form__file-uploaded4',4);
        initializeDropzone("dropzone5", "{{ route('advert-storeMedia') }}", 5, 10, 'form', 'document', '.form__file-uploaded5',5);
        initializeDropzone("dropzone6", "{{ route('advert-storeMedia') }}", 5, 10, 'form', 'document', '.form__file-uploaded6',6);
        initializeDropzone("dropzone7", "{{ route('advert-storeMedia') }}", 5, 10, 'form', 'document', '.form__file-uploaded7',7);
        initializeDropzone("dropzone8", "{{ route('advert-storeMedia') }}", 5, 10, 'form', 'document', '.form__file-uploaded8',8);
        initializeDropzone("dropzone9", "{{ route('advert-storeMedia') }}", 5, 10, 'form', 'document', '.form__file-uploaded9',9);
    </script>

@endsection

@endsection