@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')
<input type="hidden" id="page_url" value="{{ route('email-templates.index') }}">
<section class="content-header">
    <div class="content-header-left">
        <h1>{{ $page_title }}</h1>
    </div>
    <div class="content-header-right">
        @include('includes.buttons.back')
        <a href="{{ route('templates.index') }}" class="btn btn-primary btn-sm" style="color: white;"><i class="fa fa-arrow-left"></i> <span class="ml-2">Back to Templates</span></a>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            @if (session('success'))
                <div class="callout callout-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">NEVER FORGET – 30-Day Follow-Up Emails</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        @foreach($templates as $template)
                            <div class="col-md-3 col-sm-6 col-xs-12" style="margin-bottom: 20px;">
                                <a href="{{ route('email-templates.show', $template['day']) }}" class="email-template-card" style="text-decoration: none; color: inherit; display: block;">
                                    <div class="info-box" style="min-height: 140px; border: 1px solid #ddd; border-radius: 4px; background: #fff; box-shadow: 0 1px 3px rgba(0,0,0,0.08); transition: border-color 0.2s, box-shadow 0.2s;">
                                        <span class="info-box-icon" style="background-color: #081e37; color: #cfa40c;"><i class="fa fa-envelope"></i></span>
                                        <div class="info-box-content" style="margin-left: 90px;">
                                            <span class="info-box-text" style="font-size: 11px; color: #6c757d;">Day {{ $template['day'] }}</span>
                                            <span class="info-box-number" style="font-size: 14px; font-weight: 600; color: #081e37; margin: 4px 0;">{{ $template['focus'] }}</span>
                                            <p class="text-muted small" style="margin: 6px 0 0; font-size: 12px; line-height: 1.3; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ \Illuminate\Support\Str::limit($template['subject'], 50) }}</p>
                                            <span class="small" style="color: #cfa40c;"><i class="fa fa-arrow-right"></i> View & copy</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .email-template-card:hover .info-box {
        border-color: #cfa40c !important;
        box-shadow: 0 2px 8px rgba(207, 164, 12, 0.2) !important;
    }
    .email-template-card:hover .info-box-icon {
        background-color: #cfa40c !important;
        color: #081e37 !important;
    }
    .info-box {
        overflow: hidden;
    }
    .info-box-icon {
        height: 138px;
        display: flex;
    align-items: center;
    justify-content: center;
    }
</style>
@endsection

@push('js')
@endpush
