@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<section class="content-header">
    <div class="content-header-left">
        <h1>{{ $page_title }}</h1>
    </div>
    <div class="content-header-right">
        @include('includes.buttons.back')
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Choose a template type</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-xs-12" style="margin-bottom: 20px;">
                            <a href="{{ route('email-templates.index') }}" class="template-option-card" style="text-decoration: none; color: inherit; display: block;">
                                <div class="info-box" style="min-height: 160px; border: 1px solid #ddd; border-radius: 4px; background: #fff; box-shadow: 0 1px 3px rgba(0,0,0,0.08); transition: border-color 0.2s, box-shadow 0.2s;">
                                    <span class="info-box-icon" style="background-color: #081e37; color: #cfa40c;"><i class="fa fa-envelope"></i></span>
                                    <div class="info-box-content" style="margin-left: 90px;">
                                        <span class="info-box-number" style="font-size: 16px; font-weight: 600; color: #081e37; margin: 4px 0;">Email</span>
                                        <p class="text-muted small" style="margin: 6px 0 0; font-size: 12px; line-height: 1.4;">30-day follow-up email templates for sales and outreach.</p>
                                        <span class="small" style="color: #cfa40c; margin-top: 8px; display: inline-block;"><i class="fa fa-arrow-right"></i> Open</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12" style="margin-bottom: 20px;">
                            <a href="{{ route('text-message-templates.index') }}" class="template-option-card" style="text-decoration: none; color: inherit; display: block;">
                                <div class="info-box" style="min-height: 160px; border: 1px solid #ddd; border-radius: 4px; background: #fff; box-shadow: 0 1px 3px rgba(0,0,0,0.08); transition: border-color 0.2s, box-shadow 0.2s;">
                                    <span class="info-box-icon" style="background-color: #081e37; color: #cfa40c;"><i class="fa fa-comment"></i></span>
                                    <div class="info-box-content" style="margin-left: 90px;">
                                        <span class="info-box-number" style="font-size: 16px; font-weight: 600; color: #081e37; margin: 4px 0;">Text Messages</span>
                                        <p class="text-muted small" style="margin: 6px 0 0; font-size: 12px; line-height: 1.4;">SMS and text message templates for follow-ups.</p>
                                        <span class="small" style="color: #cfa40c; margin-top: 8px; display: inline-block;"><i class="fa fa-arrow-right"></i> Open</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12" style="margin-bottom: 20px;">
                            <a href="{{ route('phone-script-templates.index') }}" class="template-option-card" style="text-decoration: none; color: inherit; display: block;">
                                <div class="info-box" style="min-height: 160px; border: 1px solid #ddd; border-radius: 4px; background: #fff; box-shadow: 0 1px 3px rgba(0,0,0,0.08); transition: border-color 0.2s, box-shadow 0.2s;">
                                    <span class="info-box-icon" style="background-color: #081e37; color: #cfa40c;"><i class="fa fa-phone"></i></span>
                                    <div class="info-box-content" style="margin-left: 90px;">
                                        <span class="info-box-number" style="font-size: 16px; font-weight: 600; color: #081e37; margin: 4px 0;">Phone Scripts</span>
                                        <p class="text-muted small" style="margin: 6px 0 0; font-size: 12px; line-height: 1.4;">Call scripts and talking points for sales calls.</p>
                                        <span class="small" style="color: #cfa40c; margin-top: 8px; display: inline-block;"><i class="fa fa-arrow-right"></i> Open</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .template-option-card:hover .info-box {
        border-color: #cfa40c !important;
        box-shadow: 0 2px 8px rgba(207, 164, 12, 0.2) !important;
    }
    .template-option-card:hover .info-box-icon {
        background-color: #cfa40c !important;
        color: #081e37 !important;
    }
    .template-option-card .info-box {
        overflow: hidden;
    }
    .template-option-card .info-box-icon {
        height: 158px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
@endsection

@push('js')
@endpush
