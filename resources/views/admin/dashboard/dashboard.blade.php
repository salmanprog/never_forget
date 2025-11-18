@extends('layouts.admin.app')

@section('title', $page_title)
{{-- @push('css')
@endpush --}}
@section('content')
  <section class="content-header">
    <h1>Dashboard</h1>
  </section>

    <section class="content">
         <div class="row">
            <a href="{{ route('category.index') }}" style="pointer:cursor;">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                    <span class="info-box-icon bg-blue"><i class="fa fa-hand-o-right"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Categories</span>
                        <span class="info-box-number" style="color: #081e37 !important">{{$total_category}}</span>
                    </div>
                    </div>
                </div>
            </a> 
            <a href="{{ route('variations.index') }}" style="pointer:cursor;">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                    <span class="info-box-icon bg-blue"><i class="fa fa-hand-o-right"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Variations</span>
                        <span class="info-box-number" style="color: #081e37 !important">{{$total_variations}}</span>
                    </div>
                    </div>
                </div>
            </a> 
            <a href="{{ route('product.index') }}" style="pointer:cursor;">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                    <span class="info-box-icon bg-blue"><i class="fa fa-hand-o-right"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Products</span>
                        <span class="info-box-number" style="color: #081e37 !important">{{$total_products}}</span>
                    </div>
                    </div>
                </div>
            </a> 
            <a href="{{ route('order.index') }}" style="pointer:cursor;">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                    <span class="info-box-icon bg-blue"><i class="fa fa-hand-o-right"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Orders</span>
                        <span class="info-box-number" style="color: #081e37 !important">{{$total_order}}</span>
                    </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('newsletter.index') }}" style="pointer:cursor;">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                    <span class="info-box-icon bg-blue"><i class="fa fa-hand-o-right"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Subscribers</span>
                        <span class="info-box-number" style="color: #081e37 !important">{{$total_subscribers}}</span>
                    </div>
                    </div>
                </div>
            </a> 
			 <a href="{{ route('contactus.index') }}" style="pointer:cursor;">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                    <span class="info-box-icon bg-blue"><i class="fa fa-hand-o-right"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Contact Us</span>
                        <span class="info-box-number" style="color: #081e37 !important">{{$total_contactus}}</span>
                    </div>
                    </div>
                </div>
            </a>
            
        </div>
    </section>
@endsection
