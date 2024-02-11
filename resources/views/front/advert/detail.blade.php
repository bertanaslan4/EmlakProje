@extends('front.app')
@section('content')
    <div class="poperty-details-pages mb-100">
        <div class="poperty-details-top mb-50">
            <div class="poperty-details-tab-content">
                <div class="tab-content" id="nav-tabContent2">
                    <div class="tab-pane fade show active" id="nav-gallery" role="tabpanel" aria-labelledby="nav-gallery-tab">
                        <div class="product-img">
                            <div class="slider-btn-group">
                                <div class="product-stand-next swiper-arrow">
                                    <svg width="11" height="19" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 6.50008L8 0L2.90909 6.50008L8 13L0 6.50008Z" />
                                    </svg>
                                </div>
                                <div class="product-stand-prev swiper-arrow">
                                    <svg width="11" height="19" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 6.50008L0 0L5.09091 6.50008L0 13L8 6.50008Z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="swiper product-img-slider">
                                <div class="swiper-wrapper">
                                    @if( ($advert->advert->thumbnail == '' || $advert->advert->thumbnail == null)  && $advert->advert->gallery->count() == 0)
                                        <div class="swiper-slide"><img src="{{asset('front/img/no-image-wide.png')}}"></div>
                                    @else
                                        @if($advert->advert->thumbnail)
                                        <div class="swiper-slide"><img src="{{asset('storage/'.$advert->advert->thumbnail)}}"></div>
                                        @endif
                                        @foreach($advert->advert->gallery as $images)
                                            <div class="swiper-slide"><img src="{{asset('storage/'.$images->image)}}"></div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tabbtn-and-social-area">
                <div class="container-xl container-fluid">
                    <div class="row">
                        <div class="col-lg-12 d-flex align-items-center flex-wrap justify-content-lg-between justify-content-center gap-3">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab2" role="tablist">
                                    <button class="nav-link active" id="nav-gallery-tab" data-bs-toggle="tab" data-bs-target="#nav-gallery" type="button" role="tab" aria-controls="nav-gallery" aria-selected="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                            <g>
                                                <path
                                                    d="M4.50019 9.14393C4.89806 9.14393 5.27964 8.98587 5.56098 8.70454C5.84232 8.4232 6.00037 8.04162 6.00037 7.64374C6.00037 7.24587 5.84232 6.86429 5.56098 6.58295C5.27964 6.30161 4.89806 6.14355 4.50019 6.14355C4.10231 6.14355 3.72073 6.30161 3.43939 6.58295C3.15805 6.86429 3 7.24587 3 7.64374C3 8.04162 3.15805 8.4232 3.43939 8.70454C3.72073 8.98587 4.10231 9.14393 4.50019 9.14393Z"
                                                />
                                                <path
                                                    d="M14.0018 13.1441C14.0018 13.6746 13.791 14.1833 13.4159 14.5585C13.0408 14.9336 12.532 15.1443 12.0015 15.1443H2.00025C1.46975 15.1443 0.960979 14.9336 0.58586 14.5585C0.21074 14.1833 0 13.6746 0 13.1441V5.14308C-2.65076e-07 4.61293 0.210465 4.10446 0.585152 3.72939C0.95984 3.35433 1.4681 3.14336 1.99825 3.14283C1.99825 2.61233 2.20899 2.10356 2.58411 1.72844C2.95923 1.35332 3.468 1.14258 3.9985 1.14258H13.9998C14.5302 1.14258 15.039 1.35332 15.4141 1.72844C15.7893 2.10356 16 2.61233 16 3.14283V11.1438C16 11.674 15.7895 12.1824 15.4148 12.5575C15.0402 12.9326 14.5319 13.1435 14.0018 13.1441ZM13.9998 2.1427H3.9985C3.73325 2.1427 3.47886 2.24807 3.2913 2.43563C3.10374 2.62319 2.99837 2.87758 2.99837 3.14283H12.0015C12.532 3.14283 13.0408 3.35357 13.4159 3.72869C13.791 4.10381 14.0018 4.61258 14.0018 5.14308V12.144C14.2667 12.1434 14.5205 12.0378 14.7077 11.8503C14.8948 11.6628 14.9999 11.4087 14.9999 11.1438V3.14283C14.9999 2.87758 14.8945 2.62319 14.7069 2.43563C14.5194 2.24807 14.265 2.1427 13.9998 2.1427ZM2.00025 4.14295C1.735 4.14295 1.48061 4.24832 1.29305 4.43588C1.1055 4.62344 1.00013 4.87783 1.00013 5.14308V13.1441L3.64646 10.7898C3.7282 10.7083 3.83559 10.6577 3.95043 10.6464C4.06527 10.6351 4.18048 10.6638 4.27653 10.7278L6.93687 12.501L10.6473 8.79053C10.7215 8.7163 10.8171 8.66727 10.9207 8.6504C11.0243 8.63353 11.1305 8.64967 11.2244 8.69652L13.0016 10.6438V5.14308C13.0016 4.87783 12.8963 4.62344 12.7087 4.43588C12.5211 4.24832 12.2668 4.14295 12.0015 4.14295H2.00025Z"
                                                />
                                            </g>
                                        </svg>
                                        {{ __('site.property.gallery') }}
                                    </button>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">

            @if (Session::has('error'))
            <div class="pricing-checkout-page">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="package-and-login-area">
                            <p>{{ __('site.property.alreadyapplied') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="row g-lg-4 gy-5">
                <div class="col-lg-8">
                    <div class="poperty-details-content">
                        <div class="poperty-info mb-70">
                            <div class="price">
                                <strong>{{$advert->rent_price}} $</strong>
                            </div>
                            <h1>{{ $advert->title }}</h1>
                            <div class="location-and-condition">
                                <div class="location">
                                    <a href="#"><i class="bi bi-geo-alt"></i>{{ $advert->advert->state?->name }} / {{ $advert->advert->city?->name }}</a>
                                </div>
                                <div class="condition">
                                    <a href="javascript:void(0);">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14">
                                            <path
                                                d="M13.7788 0.0655226C13.8464 0.104718 13.9022 0.159451 13.9409 0.224532C13.9796 0.289612 14 0.362884 14 0.4374V13.5625C14 13.6785 13.9508 13.7898 13.8633 13.8719C13.7758 13.9539 13.6571 14 13.5333 14H10.7333C10.6096 14 10.4909 13.9539 10.4033 13.8719C10.3158 13.7898 10.2667 13.6785 10.2667 13.5625V12.25H9.33333V13.5625C9.33333 13.6785 9.28417 13.7898 9.19665 13.8719C9.10913 13.9539 8.99043 14 8.86667 14H0.466667C0.342899 14 0.2242 13.9539 0.136684 13.8719C0.0491665 13.7898 0 13.6785 0 13.5625V8.74996C7.4337e-05 8.65818 0.0309382 8.56874 0.0882233 8.4943C0.145508 8.41987 0.226313 8.36421 0.3192 8.33521L5.6 6.68495V3.93743C5.6 3.85624 5.6241 3.77666 5.66959 3.70759C5.71509 3.63851 5.78018 3.58267 5.8576 3.5463L13.3243 0.0462725C13.3955 0.0128523 13.4746 -0.00292375 13.5542 0.000445798C13.6338 0.00381535 13.7111 0.0262184 13.7788 0.0655226ZM5.6 7.6072L0.933333 9.06496V13.125H5.6V7.6072ZM6.53333 13.125H8.4V11.8125C8.4 11.6965 8.44917 11.5852 8.53668 11.5031C8.6242 11.4211 8.7429 11.375 8.86667 11.375H10.7333C10.8571 11.375 10.9758 11.4211 11.0633 11.5031C11.1508 11.5852 11.2 11.6965 11.2 11.8125V13.125H13.0667V1.14528L6.53333 4.2078V13.125Z"
                                            />
                                            <path
                                                d="M1.86523 9.62505H2.79857V10.5001H1.86523V9.62505ZM3.7319 9.62505H4.66523V10.5001H3.7319V9.62505ZM1.86523 11.3751H2.79857V12.2501H1.86523V11.3751ZM3.7319 11.3751H4.66523V12.2501H3.7319V11.3751ZM7.46523 7.87504H8.39857V8.75004H7.46523V7.87504ZM9.3319 7.87504H10.2652V8.75004H9.3319V7.87504ZM7.46523 9.62505H8.39857V10.5001H7.46523V9.62505ZM9.3319 9.62505H10.2652V10.5001H9.3319V9.62505ZM11.1986 7.87504H12.1319V8.75004H11.1986V7.87504ZM11.1986 9.62505H12.1319V10.5001H11.1986V9.62505ZM7.46523 6.12503H8.39857V7.00003H7.46523V6.12503ZM9.3319 6.12503H10.2652V7.00003H9.3319V6.12503ZM11.1986 6.12503H12.1319V7.00003H11.1986V6.12503ZM7.46523 4.37501H8.39857V5.25002H7.46523V4.37501ZM9.3319 4.37501H10.2652V5.25002H9.3319V4.37501ZM11.1986 4.37501H12.1319V5.25002H11.1986V4.37501ZM11.1986 2.625H12.1319V3.50001H11.1986V2.625Z"
                                            />
                                        </svg>
                                        @if ($advert->category_id == 1)
                                            {{ __('site.property.forlive') }}
                                        @else
                                            {{ __('site.property.forbusiness') }}
                                        @endif
                                    </a>
                                </div>
                            </div>
                            <div class="apt-type-and-feature">
                                <div class="apt-type">
                                    <h6>{{ $advert->advert->type->descriptions->first()->title }}</h6>
                                </div>
                                <ul class="features">
                                    @foreach($advert->advert->propertyDetails as $propertyDetails)
                                        <li>
                                            <img src="{{ URL::to('/front/img/inner-page/icon/'. $propertyDetails->icon ) }}">{{ $propertyDetails->pivot->value }} {{ $propertyDetails->descriptions->first()->name }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="single-item mb-50">
                            <div class="title mb-15">
                                <h5>{{ __('site.property.description') }}</h5>
                            </div>
                            <p>
                                {!! $advert->description !!}
                            </p>

                        </div>

                        <div class="single-item mb-50">
                            <div class="title mb-20">
                                <h5>{{ __('site.property.propertydetails') }}</h5>
                            </div>
                            <div class="poperty-feature-wrap  row" style="justify-content: normal; margin: 0;">

                                {{-- <ul class="poperty-feature"> --}}
                                @foreach($advert->advert->propertyDetails as $propertyDetails)
                                <div class="col-lg-3 col-xs-6 poperty-feature">

                                        <li>
                                            <div class="icon">
                                                <img src="{{asset('front/img/inner-page/icon/'.$propertyDetails->icon)}}" alt />
                                            </div>
                                            <div class="content">
                                                <h6>{{ $propertyDetails->pivot->value}}</h6>
                                                <span>{{ $propertyDetails->descriptions->first()->name }}</span>
                                            </div>
                                        </li>
                                    </div>

                                @endforeach
                                {{-- </ul> --}}

                            </div>
                        </div>
                        <div class="single-item mb-30">
                            <div class="kye-feature row">
                                <div class="title mb-20">
                                    <h5>{{ __('site.property.keyfeatures') }}</h5>
                                </div>
                                @foreach($advert->advert->features as $feature)
                                    <div class="col-lg-6 col-xs-12">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                                                    <path
                                                        d="M6 11.25C4.60761 11.25 3.27226 10.6969 2.28769 9.71231C1.30312 8.72774 0.75 7.39239 0.75 6C0.75 4.60761 1.30312 3.27226 2.28769 2.28769C3.27226 1.30312 4.60761 0.75 6 0.75C7.39239 0.75 8.72774 1.30312 9.71231 2.28769C10.6969 3.27226 11.25 4.60761 11.25 6C11.25 7.39239 10.6969 8.72774 9.71231 9.71231C8.72774 10.6969 7.39239 11.25 6 11.25ZM6 12C7.5913 12 9.11742 11.3679 10.2426 10.2426C11.3679 9.11742 12 7.5913 12 6C12 4.4087 11.3679 2.88258 10.2426 1.75736C9.11742 0.632141 7.5913 0 6 0C4.4087 0 2.88258 0.632141 1.75736 1.75736C0.632141 2.88258 0 4.4087 0 6C0 7.5913 0.632141 9.11742 1.75736 10.2426C2.88258 11.3679 4.4087 12 6 12Z"
                                                    ></path>
                                                    <path
                                                        d="M8.22751 3.72747C8.22217 3.73264 8.21716 3.73816 8.21251 3.74397L5.60776 7.06272L4.03801 5.49222C3.93138 5.39286 3.79034 5.33876 3.64462 5.34134C3.49889 5.34391 3.35985 5.40294 3.25679 5.506C3.15373 5.60906 3.0947 5.7481 3.09213 5.89382C3.08956 6.03955 3.14365 6.18059 3.24301 6.28722L5.22751 8.27247C5.28097 8.32583 5.34463 8.36788 5.4147 8.39611C5.48476 8.42433 5.5598 8.43816 5.63532 8.43676C5.71084 8.43536 5.78531 8.41876 5.85428 8.38796C5.92325 8.35716 5.98531 8.31278 6.03676 8.25747L9.03076 4.51497C9.13271 4.40796 9.18845 4.26514 9.18593 4.11737C9.18341 3.9696 9.12284 3.82875 9.0173 3.72529C8.91177 3.62182 8.76975 3.56405 8.62196 3.56446C8.47417 3.56486 8.33247 3.62342 8.22751 3.72747Z"
                                                    ></path>
                                                </svg>
                                                {{ $feature->descriptions->first()->name }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="single-item mb-50">
                            <div class="title-and-tab mb-30">
                                <div class="title">
                                    <h5>{{ __('site.property.facilities') }}</h5>
                                </div>
                            </div>
                            <div class="overview-content row">
                                @foreach($advert->advert->facilities as $facility)
                                    <div class="col-lg-6 col-xs-6 space-facility">
                                        <span>{{ $facility->descriptions->first()->name }}</span>{{ $facility->pivot->value}}
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="poperty-details-sb">
                        <div class="booking-form mb-50">
                            <div class="title">
                                <h5>{{ __('site.property.apply') }}</h5>
                                <p>{{ __('site.property.applydescription') }}</p>
                            </div>
                            <div class="button-group">
                                @guest
                                <a href="{{ route('apply.index', $advert->advert->uuid) }}" style="width: 100%; display: flex; justify-content: center;" class="primary-btn3 modal-btn header-cart-btn d-lg-flex d-none" data-bs-toggle="modal" data-bs-target="#logInModal01">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10"> <path d="M8.33624 2.84003L1.17627 10L0 8.82373L7.15914 1.66376H0.849347V0H10V9.15065H8.33624V2.84003Z"> </path> </svg> {{ __('site.property.registertoapply') }}
                                </a>
                                @endguest
                                @auth
                                    <a href="{{ route('apply.index', $advert->advert->uuid) }}"  class="primary-btn3" style="width: 100%; display: flex; justify-content: center;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10"> <path d="M8.33624 2.84003L1.17627 10L0 8.82373L7.15914 1.66376H0.849347V0H10V9.15065H8.33624V2.84003Z"> </path> </svg> {{ __('site.property.apply') }}
                                    </a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection