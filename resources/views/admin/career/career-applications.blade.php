@extends('layouts.admin.app')
@section('title', $page_title)
@section('content')

<style>
.modern-card {
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    border: none;
    margin-bottom: 25px;
    overflow: hidden;
    transition: all 0.3s ease;
}

.modern-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 30px rgba(0,0,0,0.12);
}

.card-header-modern {
    background: linear-gradient(135deg, #0B1B48 0%, #1a2a5e 100%);
    color: white;
    padding: 20px 25px;
    border: none;
    position: relative;
}

.card-header-modern::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, #F5A623, #cfa40c);
}

.card-body-modern {
    padding: 25px;
}

.application-card {
    background: #fff;
    border-radius: 12px;
    border: 1px solid #e8ecf0;
    margin-bottom: 20px;
    overflow: hidden;
    transition: all 0.3s ease;
}

.application-card:hover {
    border-color: #0B1B48;
    box-shadow: 0 4px 15px rgba(11, 27, 72, 0.1);
}

.application-header {
    background: #f8f9fa;
    padding: 20px;
    border-bottom: 1px solid #e8ecf0;
    cursor: pointer;
    transition: all 0.3s ease;
}

.application-header:hover {
    background: #f0f2f5;
}

.application-header.active {
    background:#cfa40c;
    color: white;
}

.application-content {
    padding: 0;
    max-height: 0;
    overflow: hidden;
    transition: all 0.3s ease;
}

.application-content.show {
    padding: 25px;
    max-height: 2000px;
}

.status-badge {
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.status-accepted {
    background: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.status-rejected {
    background: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

.status-pending {
    background: #ffc200;
    color: #081e37;
    border: 1px solid #ffeaa7;
}

.info-section {
    background: #f8f9fa;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
}

.info-section h6 {
    color: #0B1B48;
    font-weight: 600;
    margin-bottom: 15px;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.info-item {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
    font-size: 14px;
}

.info-item i {
    width: 20px;
    color: #F5A623;
    margin-right: 10px;
}

.cover-letter-box {
    background: #fff;
    border: 1px solid #e8ecf0;
    border-radius: 10px;
    padding: 20px;
    margin: 20px 0;
}

.response-form {
    background: #f8f9fa;
    border-radius: 10px;
    padding: 25px;
    margin-top: 20px;
}

.form-control-modern {
    border: 2px solid #e8ecf0;
    border-radius: 8px;
    padding: 12px 15px;
    font-size: 14px;
    transition: all 0.3s ease;
}

.form-control-modern:focus {
    border-color: #0B1B48;
    box-shadow: 0 0 0 0.2rem rgba(11, 27, 72, 0.15);
}

.btn-modern {
    background: linear-gradient(135deg, #0B1B48 0%, #1a2a5e 100%);
    border: none;
    border-radius: 8px;
    padding: 12px 25px;
    font-weight: 600;
    transition: all 0.3s ease;
	color: #fff;
}

.btn-modern:hover {
    background: linear-gradient(135deg, #F5A623 0%, #cfa40c 100%);
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(245, 166, 35, 0.3);
}

.btn-download {
    background: #28a745;
    border: none;
    border-radius: 6px;
    padding: 8px 15px;
    color: white;
    font-size: 12px;
    transition: all 0.3s ease;
}

.btn-download:hover {
    background: #218838;
    transform: translateY(-1px);
}

.alert-modern {
    border: none;
    border-radius: 10px;
    padding: 15px 20px;
    margin-bottom: 20px;
}

.alert-success-modern {
    background: #d4edda;
    color: #155724;
    border-left: 4px solid #28a745;
}

.alert-danger-modern {
    background: #f8d7da;
    color: #721c24;
    border-left: 4px solid #dc3545;
}

.career-info-card {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-radius: 15px;
    padding: 25px;
    margin-bottom: 30px;
    border: 1px solid #e8ecf0;
}

.career-image {
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.pagination-modern .page-link {
    border: none;
    color: #0B1B48;
    padding: 10px 15px;
    margin: 0 2px;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.pagination-modern .page-link:hover {
    background: #0B1B48;
    color: white;
}

.pagination-modern .page-item.active .page-link {
    background: #0B1B48;
    border-color: #0B1B48;
}
</style>

<section class="content-header">
	<div class="content-header-left">
		<h1 style="color: #0B1B48; font-weight: 600;">{{ $page_title }}</h1>
	</div> 
    <div class="content-header-right">
		<a href="{{ route('careers.index') }}" class="btn btn-modern">
			<i class="fa fa-arrow-left"></i> Back to Careers
		</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			@if (session('success'))
				<div class="alert alert-success-modern alert-modern">
					<i class="fa fa-check-circle"></i> {{ session('success') }}
				</div>
			@endif

			@if (session('error'))
				<div class="alert alert-danger-modern alert-modern">
					<i class="fa fa-exclamation-circle"></i> {{ session('error') }}
				</div>
			@endif

			<!-- Career Info Card -->
			<div class="career-info-card">
				<div class="row">
					<div class="col-md-3">
						@if($career->image)
							<img src="{{ asset('public/admin/assets/images/careers/'.$career->image) }}" 
								 alt="{{ $career->title }}" class="career-image img-responsive" style="border-radius: 10px;">
						@endif
					</div>
					<div class="col-md-9">
						<h3 style="color: #0B1B48; margin-bottom: 15px;">{{ $career->title }}</h3>
						@if($career->hasCategory)
							<span class="status-badge status-pending" style="margin-bottom: 15px; display: inline-block;">
								{{ $career->hasCategory->title }}
							</span>
						@endif
						@if($career->description)
							<p style="color: #666; line-height: 1.6; margin-top: 15px;">{!! $career->description !!}</p>
						@endif
					</div>
				</div>
			</div>

			<!-- Applications List -->
			<div class="modern-card">
				<div class="card-header-modern">
					<h3 style="margin: 0; font-weight: 600;">
						<i class="fa fa-users"></i> Applications ({{ $applications->total() }})
					</h3>
				</div>
				<div class="card-body-modern">
					@if($applications->count() > 0)
						@foreach($applications as $key => $application)
						<div class="application-card">
							<div class="application-header" onclick="toggleApplication({{ $application->id }})">
								<div class="row align-items-center">
									<div class="col-md-8">
										<div class="d-flex align-items-center">
											<div class="mr-3">
												<div style="width: 50px; height: 50px; background: #0B1B48; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600;">
													{{ substr($application->name, 0, 1) }}
												</div>
											</div>
											<div>
												<h5 style="margin: 0; color: #0B1B48; font-weight: 600;">{{ $application->name }}</h5>
												<p style="margin: 0; color: #0B1B48; font-size: 14px;">{{ $application->email }}</p>
												<small style="color: #0B1B48;">Applied {{ $application->created_at->format('M d, Y') }}</small>
											</div>
										</div>
									</div>
									<div class="col-md-4 text-right">
										@if($application->status === 1)
											<span class="status-badge status-accepted">Accepted</span>
										@elseif($application->status === 0)
											<span class="status-badge status-rejected">Rejected</span>
										@else
											<span class="status-badge status-pending">Pending</span>
										@endif 
									</div>
								</div>
							</div>
							<div id="application-{{ $application->id }}" class="application-content">
								<div class="row">
									<div class="col-md-6">
										<div class="info-section">
											<h6><i class="fa fa-user"></i> Contact Information</h6>
											<div class="info-item">
												<i class="fa fa-user"></i>
												<span><strong>Name:</strong> {{ $application->name }}</span>
											</div>
											<div class="info-item">
												<i class="fa fa-envelope"></i>
												<span><strong>Email:</strong> {{ $application->email }}</span>
											</div>
											@if($application->phone)
											<div class="info-item">
												<i class="fa fa-phone"></i>
												<span><strong>Phone:</strong> {{ $application->phone }}</span>
											</div>
											@endif
											<div class="info-item">
												<i class="fa fa-calendar"></i>
												<span><strong>Applied:</strong> {{ $application->created_at->format('M d, Y H:i') }}</span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="info-section">
											<h6><i class="fa fa-file"></i> Documents</h6>
											@if($application->resume)
												<a href="{{ asset('public/admin/assets/images/career_application/'.$application->resume) }}" 
												   target="_blank" class="btn-download">
													<i class="fa fa-download"></i> Download Resume
												</a>
											@else
												<p style="color: #999; margin: 0;">No resume uploaded</p>
											@endif
										</div>
									</div>
								</div>
								
								@if($application->cover_letter)
								<div class="cover-letter-box">
									<h6 style="color: #0B1B48; margin-bottom: 15px;">
										<i class="fa fa-file-text"></i> Cover Letter
									</h6>
									<div style="line-height: 1.6; color: #555;">
										{!! nl2br(e($application->cover_letter)) !!}
									</div>
								</div>
								@endif

								<!-- Response Form -->
								<div class="response-form">
									<h6 style="color: #0B1B48; margin-bottom: 20px;">
										<i class="fa fa-envelope"></i> Send Response
									</h6>
									<form action="{{ route('careers.applications.respond', $application->id) }}" method="POST">
										@csrf
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label style="font-weight: 600; color: #0B1B48;">Subject *</label>
													<input type="text" name="subject" class="form-control form-control-modern" required 
														   value="{{ old('subject', 'Re: Application for ' . $career->title) }}">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label style="font-weight: 600; color: #0B1B48;">Status *</label>
													<select name="status" class="form-control form-control-modern" required>
														<option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
														<option value="accepted" {{ old('status') == 'accepted' ? 'selected' : '' }}>Accepted</option>
														<option value="rejected" {{ old('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
													</select>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label style="font-weight: 600; color: #0B1B48;">Message *</label>
											<textarea name="message" class="form-control form-control-modern" rows="5" required 
													  placeholder="Enter your response message...">{{ old('message') }}</textarea>
										</div>
										<button type="submit" class="btn btn-modern">
											<i class="fa fa-paper-plane"></i> Send Response
										</button>
									</form>
								</div>
							</div>
						</div>
						@endforeach

						<!-- Pagination -->
						<div class="text-center">
							{!! $applications->links('pagination::bootstrap-4') !!}
						</div>
					@else
						<div class="text-center" style="padding: 60px 20px;">
							<i class="fa fa-users" style="font-size: 60px; color: #ddd; margin-bottom: 20px;"></i>
							<h4 style="color: #666; margin-bottom: 10px;">No Applications Found</h4>
							<p style="color: #999;">No applications have been submitted for this career position yet.</p>
						</div>
					@endif
				</div>
			</div>
		</div>
	</div>
</section>

<script>
function toggleApplication(id) {
    const content = document.getElementById('application-' + id);
    const header = content.previousElementSibling;
    
    if (content.classList.contains('show')) {
        content.classList.remove('show');
        header.classList.remove('active');
    } else {
        // Close all other applications
        document.querySelectorAll('.application-content.show').forEach(el => {
            el.classList.remove('show');
            el.previousElementSibling.classList.remove('active');
        });
        
        // Open this one
        content.classList.add('show');
        header.classList.add('active');
    }
}
</script>

<style>
.panel-heading a {
	text-decoration: none;
	color: #333;
}

.panel-heading a:hover {
	text-decoration: none;
	color: #0B1B48;
}

.badge {
	margin-left: 10px;
}

.well {
	background-color: #f5f5f5;
	border: 1px solid #e3e3e3;
	border-radius: 4px;
	padding: 15px;
}

.callout-success {
	background-color: #d4edda;
	border-color: #c3e6cb;
	color: #155724;
}

.callout-danger {
	background-color: #f8d7da;
	border-color: #f5c6cb;
	color: #721c24;
}
</style>

@endsection
