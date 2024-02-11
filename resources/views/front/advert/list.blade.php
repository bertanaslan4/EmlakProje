@extends('front.app')
@section('content')

<div class="inner-page-banner">
    <div class="banner-wrapper">
        <div class="container-fluid">
            <div class="banner-main-content-wrap">
                <div class="row">
                    <div class="col-xl-6 col-lg-7 d-flex align-items-center">
                        <div class="banner-content">
                            <h1>{{ __('site.nav.adverts') }}</h1>
                            <ul class="breadcrumb-list">
                                <li><a href="{{ route('home') }}">{{ __('site.nav.home') }}</a></li>
                                <li>{{ __('site.nav.adverts') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="home6-search-area two mb-100">
    <div class="container">
        <form>
            <div class="row row-cols-xl-5 row-cols-md-3 row-cols-sm-2 row-cols-1 g-4 justify-content-center">
                <div class="col">
                    <div class="form-inner">
                        <label>Property Type*</label>
                        <select style="display: none;">
                            <option>For Sale</option>
                            <option>For Rent</option>
                            <option>Devlopment</option>
                        </select>
                        <div class="nice-select" tabindex="0"><span class="current">For Sale</span>
                            <ul class="list">
                                <li data-value="For Sale" class="option selected">For Sale</li>
                                <li data-value="For Rent" class="option">For Rent</li>
                                <li data-value="Devlopment" class="option">Devlopment</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-inner">
                        <label>Location*</label>
                        <select style="display: none;">
                            <option>Panama City</option>
                            <option>Chicago City</option>
                            <option>New Delhi</option>
                            <option>Sydne City</option>
                        </select>
                        <div class="nice-select" tabindex="0"><span class="current">Panama City</span>
                            <ul class="list">
                                <li data-value="Panama City" class="option selected">Panama City</li>
                                <li data-value="Chicago City" class="option">Chicago City</li>
                                <li data-value="New Delhi" class="option">New Delhi</li>
                                <li data-value="Sydne City" class="option">Sydne City</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-inner">
                        <label>Min. Bed*</label>
                        <select style="display: none;">
                            <option>03 Beds</option>
                            <option>05 Beds</option>
                        </select>
                        <div class="nice-select" tabindex="0"><span class="current">03 Beds</span>
                            <ul class="list">
                                <li data-value="03 Beds" class="option selected">03 Beds</li>
                                <li data-value="05 Beds" class="option">05 Beds</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-inner">
                        <label>Price*</label>
                        <select style="display: none;">
                            <option>$4,345 - $12,456</option>
                            <option>$7,345 - $17,456</option>
                            <option>$9,345 - $19,456</option>
                        </select>
                        <div class="nice-select" tabindex="0"><span class="current">$4,345 - $12,456</span>
                            <ul class="list">
                                <li data-value="$4,345 - $12,456" class="option selected">$4,345 - $12,456</li>
                                <li data-value="$7,345 - $17,456" class="option">$7,345 - $17,456</li>
                                <li data-value="$9,345 - $19,456" class="option">$9,345 - $19,456</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col d-flex align-items-end">
                    <div class="form-inner d-flex align-items-center justify-content-md-between">
                        <button class="primary-btn3" type="submit">
                            Sale
                        </button>
                        <button class="primary-btn6" type="submit">
                            Rent
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div> --}}

<div class="product-page no-sidebar mb-100 mt-50">
    <div class="container">
        <div class="row g-xl-4 gy-5">
            <div class="col-xl-12">
                <div class="row mb-40">
                    <div class="col-lg-12">
                        <div class="show-item-and-filte">
                            <p>{{ __('site.property.counter') }} : <strong>{{ $adverts->total() }}</strong></p>
                        </div>
                    </div>
                </div>
                <div class="list-grid-main">
                    <div class="list-grid-product-wrap grid-group-wrapper">
                        <div class="row g-4 mb-40">
                            @foreach($adverts as $advert)
                            <div class="col-lg-4 col-md-6 col-sm-12 wow fadeInUp item" data-wow-delay="200ms">
                                <div class="product-card">
                                    <div class="product-img">
                                        <div class="slider-btn-group">
                                            <div class="product-stand-next swiper-arrow"><svg width="8" height="13" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M0 6.50008L8 0L2.90909 6.50008L8 13L0 6.50008Z" />
                                                </svg></div>
                                            <div class="product-stand-prev swiper-arrow"><svg width="8" height="13" viewBox="0 0 8 13" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 6.50008L0 0L5.09091 6.50008L0 13L8 6.50008Z" />
                                                </svg></div>
                                        </div>
                                        <div class="swiper product-img-slider">
                                            <div class="swiper-wrapper">
                                                @if( ($advert->thumbnail == '' || $advert->thumbnail == null)  && $advert->gallery->count() == 0)
                                                    <div class="swiper-slide"><img src="{{asset('front/img/no-image.png')}}"></div>
                                                @else
                                                    @if($advert->thumbnail)
                                                    <div class="swiper-slide"><img src="{{asset('storage/'.$advert->thumbnail)}}"></div>
                                                    @endif
                                                    @foreach($advert->gallery as $images)
                                                        <div class="swiper-slide"><img src="{{asset('storage/'.$images->image)}}"></div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="location"><a href="#"><i class="bi bi-geo-alt"></i> {{ $advert->state?->name }} / {{ $advert->city?->name }}</a></div>
                                        <h5><a href="{{route('detail', ['advert' => $advert->descriptions?->first()?->sef_link])}}">{{ $advert->descriptions?->first()?->title }}</a></h5>
                                        <ul class="features">
                                            @foreach($advert->propertyDetails as $propertyDetails)
                                            <li>
                                                <img src="{{ URL::to('/front/img/inner-page/icon/'. $propertyDetails->icon ) }}">{{ $propertyDetails->pivot->value }} {{ $propertyDetails->descriptions->first()->name }}
                                            </li>
                                            @endforeach
                                        </ul>
                                        <div class="content-btm"><a class="view-btn2" href="{{route('detail', ['advert' => $advert->descriptions?->first()?->sef_link ])}}">
                                            <img src="{{asset('front/img/home1/icon/house.svg')}}" alt> {{ __('site.property.viewdetails') }} </a>
                                            <div class="price"><strong>{{$advert->rent_price}} {{ $advert->currency->symbol }}</strong></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{ $adverts->links() }}
    </div>
</div>

@endsection
