@extends('layouts.website.master')
@section('title', $page_title)
@section('meta')
    <meta content="Customize {{ $selectedService->title }} with Never Forget." name="description">
@endsection
@section('content')
    <main class="inner-bg">
        <section class="inner-banner">
            <div class="container">
                <h1 class="heading fs-74" data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                    {{ $selectedService->title }}
                </h1>
            </div>
        </section>
    </main>

    <section class="customize-solution-sec py-100">
        <div class="container">
            <div class="mb-40">
                <a href="{{ route('customize-your-solution') }}" class="btn des-wrapper border-0">← Back to Services</a>
            </div>

            <div class="text-center mb-60">
                <span class="btn des-wrapper mb-20" data-aos="flip-up">Never Forget Showing Appreciation</span>
                <h2 class="heading fs-48 mb-20 mx-auto" style="max-width: 720px;" data-aos="fade-up">
                    Select Your {{ $selectedService->title }} Options
                </h2>
                <p class="mx-auto" style="max-width: 640px;" data-aos="fade-up">
                    Choose the options you need, then share your business details so we can create a customized proposal.
                </p>
            </div>

            <form action="{{ route('customize-your-solution.store') }}" method="POST" id="customizeSolutionForm">
                @csrf
                <input type="hidden" name="type" value="customize_solution">
                <input type="hidden" name="service_key" value="{{ $selectedServiceKey }}">
                <input type="hidden" name="plans" value="Customize Your Solution - {{ $selectedService->title }}">

                <div class="customize-card mb-50" data-aos="fade-up">
                    <h3 class="fs-28 fw-600 light-black mb-20">Select Services</h3>
                    <p class="mb-30 opacity-75">Choose one or more options under {{ $selectedService->title }}.</p>

                    <div class="row row-gap-10">
                        @foreach ($selectedService->activeOptions as $option)
                            @php
                                $optionTitle = $option->title;
                                $optionId = $selectedServiceKey . '_' . \Illuminate\Support\Str::slug($optionTitle);
                                $isOther = $selectedService->has_other_text && $optionTitle === 'Other Services';
                            @endphp
                            <div class="col-md-6 col-lg-4">
                                <label class="service-check" for="{{ $optionId }}">
                                    <input type="checkbox"
                                        class="service-checkbox"
                                        name="services[]"
                                        id="{{ $optionId }}"
                                        value="{{ $optionTitle }}"
                                        @if($isOther) data-other-toggle="1" @endif
                                        {{ is_array(old('services')) && in_array($optionTitle, old('services')) ? 'checked' : '' }}>
                                    <span>{{ $optionTitle }}</span>
                                </label>
                            </div>
                        @endforeach
                    </div>

                    @if ($selectedService->has_other_text)
                        <div id="otherServicesWrapper" class="mt-30" style="{{ is_array(old('services')) && in_array('Other Services', old('services')) ? '' : 'display:none;' }}">
                            <label for="other_services_text" class="label-field">Describe other services you need</label>
                            <textarea class="input-field text-area" name="other_services_text" id="other_services_text"
                                rows="5" placeholder="Tell us about any other services you’re looking for...">{{ old('other_services_text') }}</textarea>
                        </div>
                    @endif
                </div>

                <div class="customize-card mb-40" data-aos="fade-up">
                    <h3 class="fs-28 fw-600 light-black mb-30">Customer Information</h3>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="field-wrapper">
                                <label for="company" class="label-field">Company Name <span class="text-danger">*</span></label>
                                <input class="input-field" type="text" name="company" id="company"
                                    value="{{ old('company') }}" placeholder="Enter company name" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="field-wrapper">
                                <label for="contact_name" class="label-field">Contact Name <span class="text-danger">*</span></label>
                                <input class="input-field" type="text" name="contact_name" id="contact_name"
                                    value="{{ old('contact_name') }}" placeholder="Enter contact name" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="field-wrapper">
                                <label for="job_title" class="label-field">Job Title <span class="text-danger">*</span></label>
                                <input class="input-field" type="text" name="job_title" id="job_title"
                                    value="{{ old('job_title') }}" placeholder="Enter job title" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="field-wrapper">
                                <label for="email" class="label-field">Email Address <span class="text-danger">*</span></label>
                                <input class="input-field" type="email" name="email" id="email"
                                    value="{{ old('email') }}" placeholder="Enter email address" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="field-wrapper">
                                <label for="phone" class="label-field">Phone Number <span class="text-danger">*</span></label>
                                <input class="input-field" type="text" name="phone" id="phone"
                                    value="{{ old('phone') }}" placeholder="Enter phone number" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="field-wrapper">
                                <label for="website" class="label-field">Website <span class="text-danger">*</span></label>
                                <input class="input-field" type="text" name="website" id="website"
                                    value="{{ old('website') }}" placeholder="https://example.com" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="field-wrapper">
                                <label for="industry" class="label-field">Industry <span class="text-danger">*</span></label>
                                <input class="input-field" type="text" name="industry" id="industry"
                                    value="{{ old('industry') }}" placeholder="Enter industry" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="field-wrapper">
                                <label for="number_of_employees" class="label-field">Number of Employees <span class="text-danger">*</span></label>
                                <input class="input-field" type="text" name="number_of_employees" id="number_of_employees"
                                    value="{{ old('number_of_employees') }}" placeholder="e.g. 50" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="field-wrapper">
                                <label for="approximate_customers" class="label-field">Approximate Number of Customers <span class="text-danger">*</span></label>
                                <input class="input-field" type="text" name="approximate_customers" id="approximate_customers"
                                    value="{{ old('approximate_customers') }}" placeholder="e.g. 200" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="field-wrapper">
                                <label for="estimated_budget" class="label-field">Estimated Budget (Optional)</label>
                                <input class="input-field" type="text" name="estimated_budget" id="estimated_budget"
                                    value="{{ old('estimated_budget') }}" placeholder="Optional">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="field-wrapper">
                                <label for="business_goals" class="label-field">Current Business Goals <span class="text-danger">*</span></label>
                                <textarea class="input-field text-area" name="business_goals" id="business_goals" rows="4"
                                    placeholder="What are you looking to achieve?" required>{{ old('business_goals') }}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="field-wrapper">
                                <label for="message" class="label-field">Additional Notes</label>
                                <textarea class="input-field text-area" name="message" id="message" rows="4"
                                    placeholder="Anything else we should know?">{{ old('message') }}</textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex gap-10 mb-20">
                                <div>
                                    <input type="checkbox" id="consent" class="input-field mt-5" required>
                                </div>
                                <div>
                                    <label class="form-check-label text-start" for="consent">
                                        I agree to receive SMS messages from Never Forget showing appreciation at the
                                        number I provided. These messages may include special offers, service updates,
                                        and personalized gift reminders. Frequency may vary. Reply STOP to unsubscribe
                                        at any time, or HELP for assistance. Standard message & data rates may apply. My
                                        consent is not required for purchase.
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button class="btn primary-btn border-0 w-100" type="submit">Submit Custom Solution Request</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <style>
        .customize-solution-sec .customize-card {
            background: #fff;
            border: 1px solid #e8e8e8;
            border-radius: 12px;
            padding: 28px 24px;
            box-shadow: 0 4px 16px rgba(9, 37, 69, 0.06);
        }
        .service-check {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 10px 12px;
            border: 1px solid #ececec;
            border-radius: 8px;
            cursor: pointer;
            height: 100%;
            transition: border-color .2s, background .2s;
        }
        .service-check:hover {
            border-color: #092545;
            background: #fafafa;
        }
        .service-check input {
            margin-top: 3px;
            flex-shrink: 0;
        }
        .service-check span {
            font-size: 15px;
            line-height: 1.35;
            color: #222;
        }
        @media (max-width: 767px) {
            .customize-solution-sec .customize-card {
                padding: 20px 16px;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var form = document.getElementById('customizeSolutionForm');
            var submitBtn = form ? form.querySelector('button[type="submit"]') : null;
            var defaultBtnText = submitBtn ? submitBtn.textContent : 'Submit Custom Solution Request';

            function toggleOtherText() {
                var other = document.querySelector('[data-other-toggle="1"]');
                var wrapper = document.getElementById('otherServicesWrapper');
                var textarea = document.getElementById('other_services_text');
                if (!other || !wrapper || !textarea) return;

                textarea.removeAttribute('required');

                if (other.checked) {
                    wrapper.style.display = 'block';
                    textarea.disabled = false;
                } else {
                    wrapper.style.display = 'none';
                    textarea.value = '';
                    textarea.disabled = true;
                }
            }

            function clearFieldErrors() {
                form.querySelectorAll('.is-invalid').forEach(function (el) {
                    el.classList.remove('is-invalid');
                });
                form.querySelectorAll('.ajax-field-error').forEach(function (el) {
                    el.remove();
                });
            }

            function showFieldErrors(errors) {
                Object.keys(errors || {}).forEach(function (field) {
                    var messages = errors[field];
                    if (!messages || !messages.length) return;

                    var input = form.querySelector('[name="' + field + '"], [name="' + field + '[]"]');
                    if (!input) return;

                    input.classList.add('is-invalid');
                    var errorEl = document.createElement('div');
                    errorEl.className = 'ajax-field-error text-danger mt-1';
                    errorEl.style.fontSize = '14px';
                    errorEl.textContent = messages[0];

                    var wrapper = input.closest('.field-wrapper') || input.closest('.col-lg-12') || input.parentNode;
                    wrapper.appendChild(errorEl);
                });
            }

            function resetFormUi() {
                form.reset();
                document.querySelectorAll('.service-checkbox').forEach(function (cb) {
                    cb.checked = false;
                });
                clearFieldErrors();
                toggleOtherText();
                var consent = document.getElementById('consent');
                if (consent) consent.checked = false;
            }

            function setSubmitting(isSubmitting) {
                if (!submitBtn) return;
                submitBtn.disabled = isSubmitting;
                submitBtn.textContent = isSubmitting ? 'Submitting...' : defaultBtnText;
            }

            document.querySelectorAll('.service-checkbox').forEach(function (cb) {
                cb.addEventListener('change', toggleOtherText);
            });

            form.addEventListener('submit', function (e) {
                e.preventDefault();
                clearFieldErrors();

                var checked = document.querySelectorAll('.service-checkbox:checked').length;
                var other = document.querySelector('[data-other-toggle="1"]');
                var textarea = document.getElementById('other_services_text');

                if (checked === 0) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Select a service',
                        text: 'Please select at least one service option before submitting.'
                    });
                    return;
                }

                if (other && other.checked && textarea && !textarea.value.trim()) {
                    textarea.disabled = false;
                    Swal.fire({
                        icon: 'warning',
                        title: 'Other services required',
                        text: 'Please describe the other services you need.'
                    }).then(function () {
                        textarea.focus();
                    });
                    return;
                }

                if (textarea && textarea.disabled) {
                    textarea.disabled = false;
                    textarea.value = '';
                }

                var formData = new FormData(form);
                setSubmitting(true);

                fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value
                    },
                    body: formData
                })
                .then(function (response) {
                    return response.json().then(function (data) {
                        return { ok: response.ok, status: response.status, data: data };
                    }).catch(function () {
                        return {
                            ok: response.ok,
                            status: response.status,
                            data: { message: 'Something went wrong. Please try again.' }
                        };
                    });
                })
                .then(function (result) {
                    setSubmitting(false);
                    toggleOtherText();

                    if (result.ok && result.data && result.data.success) {
                        resetFormUi();
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: result.data.message || 'Your request has been submitted successfully!',
                            timer: 4000,
                            showConfirmButton: false
                        });
                        window.scrollTo({ top: 0, behavior: 'smooth' });
                        return;
                    }

                    if (result.status === 422) {
                        showFieldErrors(result.data.errors || {});
                        var firstError = result.data.message;
                        if (!firstError && result.data.errors) {
                            var keys = Object.keys(result.data.errors);
                            if (keys.length) firstError = result.data.errors[keys[0]][0];
                        }
                        Swal.fire({
                            icon: 'warning',
                            title: 'Please check the form',
                            text: firstError || 'Please fill in all required fields.'
                        });
                        return;
                    }

                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: (result.data && result.data.message) || 'Failed to submit. Please try again.'
                    });
                })
                .catch(function () {
                    setSubmitting(false);
                    toggleOtherText();
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Network error. Please try again.'
                    });
                });
            });

            toggleOtherText();
        });
    </script>
@endsection
