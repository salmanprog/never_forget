@extends('layouts.website.master')
@section('content')
@section('title', $page_title)

<style>
    .contact-form-wrapper {
        background: #fff;
        padding: 50px;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    
    .career-info-card {
        background: #f8f9fa;
        padding: 30px;
        border-radius: 15px;
        border-left: 5px solid #0B1B48;
    }
    
    .career-title {
        color: #0B1B48;
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 10px;
    }
    
    .category-badge {
        background: #F5A623;
        color: white;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 500;
    }
    
    .career-description {
        color: #666;
        line-height: 1.6;
    }
    
    .form-label {
        font-weight: 600;
        color: #0B1B48;
        margin-bottom: 8px;
    }
    
    .form-control {
        border: 2px solid #e9ecef;
        border-radius: 10px;
        padding: 12px 15px;
        font-size: 16px;
        transition: all 0.3s ease;
    }
    
    .form-control:focus {
        border-color: #0B1B48;
        box-shadow: 0 0 0 0.2rem rgba(11, 27, 72, 0.25);
    }
    
    .btn-primary {
        background: #0B1B48;
        border: none;
        padding: 15px 40px;
        border-radius: 25px;
        font-weight: 600;
        color: #fff;
        transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
        background: #cfa40c;
        color: #0B1B48;
        transform: translateY(-2px);
    }
    
    .text-danger {
        font-size: 14px;
        margin-top: 5px;
    }
    
    .form-text {
        font-size: 12px;
        margin-top: 5px;
    }
    
    /* Custom SweetAlert Styling */
    .swal2-popup {
        border-radius: 20px !important;
        font-family: inherit !important;
    }
    
    .swal2-title {
        color: #0B1B48 !important;
        font-weight: 600 !important;
    }
    
    .swal2-confirm {
        background-color: #0B1B48 !important;
        border-radius: 25px !important;
        padding: 10px 30px !important;
        font-weight: 600 !important;
    }
    
    .swal2-confirm:hover {
        background-color: #cfa40c !important;
        color: #0B1B48 !important;
    }
    
    .swal2-success {
        border-color: #0B1B48 !important;
    }
    
    .swal2-success-ring {
        border-color: #0B1B48 !important;
    }
    
    .swal2-success-line-tip,
    .swal2-success-line-long {
        background-color: #0B1B48 !important;
    }
    </style>
<!-- Inner Page Banner  -->
<main class="inner-bg">
    <section class="inner-banner">
        <div class="container">
            <h1 class="heading fs-74" data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000">Career Application</h1>
        </div>
    </section>
</main>

<section class="contact-sec py-150">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="contact-form-wrapper">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-8">
                            <span class="btn des-wrapper mb-30" data-aos="flip-up" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                                Join Our Team
                            </span>
                            <h2 class="heading fs-74 mb-30" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                                Apply for <span>Position</span>
                            </h2>
                        </div>
                    </div>

                    @if($career)
                    <div class="career-info-card mb-50" data-aos="fade-up" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                        <div class="row">
                            <div class="col-lg-8">
                                <h3 class="career-title">{{ $career->title }}</h3>
                                @if($career->hasCategory)
                                <span class="category-badge">{{ $career->hasCategory->title }}</span>
                                @endif
                                @if($career->description)
                                <p class="career-description mt-3">{!! $career->description !!}</p>
                                @endif
                            </div>
                            <div class="col-lg-4 text-end">
                                @if($career->image)
                                <img src="{{ asset('public/admin/assets/images/careers') }}/{{ $career->image }}" alt="{{ $career->title }}" class="career-image" style="border-radius: 10px;">
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif

                    <form action="{{ route('careers.apply') }}" method="POST" enctype="multipart/form-data" data-aos="fade-up" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                        @csrf 
                        @if($career)
                        <input type="hidden" name="career_id" value="{{ $career->id }}">
                        @else
                        <div class="form-group mb-30">
                            <label for="career_id" class="form-label">Select Position *</label>
                            <select name="career_id" id="career_id" class="form-control" required>
                                <option value="">Choose a position</option>
                                @foreach(\App\Models\Career::where('status', 1)->with('hasCategory')->get() as $careerOption)
                                <option value="{{ $careerOption->id }}">{{ $careerOption->title }} 
                                    @if($careerOption->hasCategory) - {{ $careerOption->hasCategory->title }} @endif
                                </option>
                                @endforeach
                            </select>
                            @error('career_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @endif

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-30">
                                    <label for="name" class="form-label">Full Name *</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter your full name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-30">
                                    <label for="email" class="form-label">Email Address *</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-30">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" name="phone" id="phone" class="form-control" placeholder="Enter your phone number" value="{{ old('phone') }}">
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-30">
                            <label for="resume" class="form-label">Resume/CV</label>
                            <input type="file" name="resume" id="resume" class="form-control" accept=".pdf,.doc,.docx">
                            <small class="form-text text-muted">Accepted formats: PDF, DOC, DOCX (Max size: 2MB)</small>
                            @error('resume')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-30">
                            <label for="cover_letter" class="form-label">Cover Letter</label>
                            <textarea name="cover_letter" id="cover_letter" class="form-control" rows="6" placeholder="Tell us why you're interested in this position...">{{ old('cover_letter') }}</textarea>
                            @error('cover_letter')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary btn-lg"> Submit Application <i class="fas fa-paper-plane ms-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>



@if(session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'success',
            title: 'Application Submitted!',
            text: '{{ session("success") }}',
            timer: 5000,
            showConfirmButton: true,
            confirmButtonText: 'OK',
            confirmButtonColor: '#0B1B48'
        });
    });
</script>
@endif

@if(session('error'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: '{{ session("error") }}',
            timer: 5000,
            showConfirmButton: true,
            confirmButtonText: 'OK',
            confirmButtonColor: '#d33'
        });
    });
</script>
@endif

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form[action="{{ route("careers.apply") }}"]');
    const submitBtn = form.querySelector('button[type="submit"]');
    
    if (form && submitBtn) {
        // Form validation
        form.addEventListener('submit', function(e) {
            const name = form.querySelector('input[name="name"]').value.trim();
            const email = form.querySelector('input[name="email"]').value.trim();
            const careerId = form.querySelector('select[name="career_id"]') ? form.querySelector('select[name="career_id"]').value : form.querySelector('input[name="career_id"]').value;
            
            // Basic validation
            if (!name || !email || !careerId) {
                e.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Missing Information',
                    text: 'Please fill in all required fields.',
                    confirmButtonColor: '#0B1B48'
                });
                return;
            }
            
            // Email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                e.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Invalid Email',
                    text: 'Please enter a valid email address.',
                    confirmButtonColor: '#0B1B48'
                });
                return;
            }
            
            // Show loading state
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Submitting...';
            submitBtn.disabled = true;
            
            // Optional: Add a small delay to show the loading state
            setTimeout(() => {
                // The form will submit normally
            }, 100);
        });
        
        // File upload validation
        const resumeInput = form.querySelector('input[name="resume"]');
        if (resumeInput) {
            resumeInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const maxSize = 2 * 1024 * 1024; // 2MB
                    const allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
                    
                    if (file.size > maxSize) {
                        Swal.fire({
                            icon: 'error',
                            title: 'File Too Large',
                            text: 'Please select a file smaller than 2MB.',
                            confirmButtonColor: '#0B1B48'
                        });
                        e.target.value = '';
                        return;
                    }
                    
                    if (!allowedTypes.includes(file.type)) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Invalid File Type',
                            text: 'Please select a PDF, DOC, or DOCX file.',
                            confirmButtonColor: '#0B1B48'
                        });
                        e.target.value = '';
                        return;
                    }
                }
            });
        }
    }
});
</script>

@endsection
