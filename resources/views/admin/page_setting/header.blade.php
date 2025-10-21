@extends('layouts.admin.app')
@section('content')
<section class="content-header">
	<div class="content-header-left">
		<h1><strong>{{ $model->title }}</strong></h1>
	</div>
	<div class="content-header-right">
		<a href="{{ route('page.index') }}" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ route('page_setting.store') }}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				@csrf

				<input type="hidden" name="parent_slug" id="" value="{{ $model->slug }}">
				<div class="box box-info">
					<div class="box-body">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Favicon </label>
                            <div class="col-sm-6">
                                <input type="file" name="header_favicon" class="form-control">
                            </div>
                            @if(isset($page_data['header_favicon']))
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <img src="{{ asset('/public/admin/assets/images/page/'.$page_data['header_favicon']) }}" class="existing-photo" style="height:50px;">
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Admin Panel Logo</label>
                            <div class="col-sm-6">
                                <input type="file" name="admin_header_logo" class="form-control">
                            </div>
                            @if(isset($page_data['admin_header_logo']))
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <img src="{{ asset('/public/admin/assets/images/page/'.$page_data['admin_header_logo']) }}" class="existing-photo" style="height:50px;">
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Website Logo</label>
                            <div class="col-sm-6">
                                <input type="file" name="header_logo" class="form-control">
                            </div>
                            @if(isset($page_data['header_logo']))
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <img src="{{ asset('/public/admin/assets/images/page/'.$page_data['header_logo']) }}" class="existing-photo" style="height:50px;">
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Email</label>
							<div class="col-sm-6">
								<input type="email" name="header_email" class="form-control" value="{{ isset($page_data['header_email'])?$page_data['header_email']:'' }}" placeholder="Enter email address">
							</div>
						</div>
                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Phone </label>
							<div class="col-sm-6">
								<input type="tel" name="header_phone" class="form-control" value="{{ isset($page_data['header_phone'])?$page_data['header_phone']:'' }}" placeholder="Enter phone number">
							</div>
						</div> 
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form_blog">Submit</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
@endsection
@push('js')
@endpush
