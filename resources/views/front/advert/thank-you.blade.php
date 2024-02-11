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
                                    <li>Thank you!</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="return-and-exchange-pages pt-100 mb-100" id="thanks">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-40">
                    <div class="return-and-exchange" >
                        <h4>Thank you for your application!</h4>
                        <p>Your data has been successfully transmitted to us. We will check your data within the next five working days and contact you if necessary to check and sign the rental agreement or upload further documents.</p>
                        <div class="form-inner">
                            <a href="#" class="primary-btn3" style="color:#FFF!important;">Review your application</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection