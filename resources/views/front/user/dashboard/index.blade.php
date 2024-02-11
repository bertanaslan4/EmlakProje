@extends('front.app-dashboard')
@section('content')

@include('front.layout.userdashboard.header')
<div class="dashboard-wrapper">
@include('front.layout.userdashboard.sidebar')
    <div class="main-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="main-content-title-profile mb-50">
                    <div class="main-content-title">
                        <h3>{{ __('dashboard.dashboard.hi') }}, {{ Auth::user()->name }}! </h3>
                    </div>
                </div>
                <div class="counter-area">
                    <div class="row g-3">
                        <div class="col-xl-3 col-md-6">
                            <div class="counter-single">
                                <div class="counter-content">
                                    <p>Active Applications</p>
                                    <div class="number">
                                        <h3 class="counter">{{ $appliedAdverts->count() }}</h3>
                                        <span>+</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="recent-listing-area">
                    <h6>My Recent Applications</h6>
                    <div class="recent-listing-table">
                        <table class="eg-table2">
                            <thead>
                                <tr>
                                    <th>Property Info</th>
                                    <th>Applied At</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($appliedAdverts as $appliedAdvert)
                                    <tr>
                                        <td data-label="Property Info">
                                            <div class="property-info-wrapper">
                                                <div class="property-info-img">
                                                    @if($appliedAdvert->advert->thumbnail)
                                                        <img src="{{asset('storage/'.$appliedAdvert->advert->thumbnail)}}">
                                                    @else
                                                        <img src="{{asset('front/img/no-image-wide.png')}}">
                                                    @endif
                                                </div>
                                                <div class="property-info-content">
                                                    <div class="location"> <a href="#"><i class="bi bi-geo-alt"></i> {{ $appliedAdvert->advert->city->name }}</a> </div>
                                                    <h6><a href="{{route('detail', ['advert' => $appliedAdvert->advert->descriptions?->first()?->sef_link])}}" target="_blank">{{ $appliedAdvert->advert->descriptions?->first()?->title }}</a></h6>
                                                    <a href="{{route('detail', ['advert' => $appliedAdvert->advert->descriptions?->first()?->sef_link])}}" target="_blank" class="view-details">
                                                        <img src="{{ asset('front/img/dashboard/icon/view-details-icon.svg') }}"> View Details
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-label="When Added" class="table-product"> <span>{{ Date::parse($appliedAdvert->advert->created_at)->format('d M Y') }}</span> </td>
                                        <td>
                                            <button class="primary-btn1" style="color:#FFF!important;" data-toggle="tooltip" data-placement="top" title="{{ $appliedAdvert->rejection_reason }}" >{{ $appliedAdvert->status->getText() }}</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('front.layout.userdashboard.footer')
</div>
@section('js')
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endsection
@endsection