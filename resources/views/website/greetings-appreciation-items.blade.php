@extends('layouts.website.master')
@section('content')
@section('title', $page_title)
<style>
    .cart-main {
        background: #298dff38;
        padding: 30px 0;
    }

    .cart-table table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
    }

    .cart-table th,
    .cart-table td {
        padding: 16px 12px;
        text-align: left;
        border-bottom: 1px solid #f0f0f0;
        vertical-align: middle;
    }

    .cart-table th {
        background: #0a2749;
        font-weight: 700;
        color: #ffffff;
    }

    .cart-table tr:last-child td {
        border-bottom: none;
    }

    .cart-table tbody tr:hover {
        background: #f9f9f9;
    }

    .remove-btn {
        border-radius: 50%;
        width: 32px;
        height: 32px;
        background: #f8d7da;
        color: #721c24;
        border: none;
        font-size: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .remove-btn:hover {
        background: #dc3545;
        color: #fff;
    }

    .golbal-btn-submit {
        background: #cfa40c;
        color: #fff;
        border: none;
        padding: 12px 32px;
        font-size: 17px;
        border-radius: 6px;
        margin-top: 10px;
        display: inline-block;
    }

    .golbal-btn-submit:hover {
        background: #0a2749;
        color: #fff;
    }

    input[type='number'] {
        width: 60px;
        padding: 6px 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        text-align: center;
    }

    .quantity_goods {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .quantity-btn {
        background: #cfa40c;
        border: none;
        border-radius: 4px;
        width: 28px;
        height: 28px;
        font-size: 18px;
        cursor: pointer;
    }

    .quantity-btn:hover {
        background: #0a2749;
        color: #fff;
    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=number] {
        -moz-appearance: textfield;
    }
</style>
<main class="inner-bg">
    <section class="inner-banner">
        <div class="container">
            <h1 class="heading fs-74" data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                Greetings &amp; Appreciation
            </h1>
        </div>
    </section>
</main>
<section class="cart-main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="cart-of-table cart-table">
                    <table class="table-responsive table table-striped dt-responsive nowrap">
                        @if (count($enquiries) > 0)
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Quantity</th>
                                </tr>
                            </thead>
                        @else
                            <div class="text-center">
                                <h4>No items in your enquiry list</h4>
                            </div>
                        @endif

                        <tbody>
                            @php
                                $item_category_ids = [];
                            @endphp
                            @foreach ($enquiries as $enquiry)
                                @php
                                    array_push($item_category_ids, $enquiry->greetings_appreciation_category_id);
                                @endphp
                                <tr>
                                    <td><button data-id="{{ $enquiry->id }}" type="button" scope="row"
                                            class="remove-btn delete"><span><i class="fa fa-trash"></i></span></button>
                                    </td>
                                    <td>
                                        @if ($enquiry->category && $enquiry->category->image)
                                            <img src="{{ asset('/public/' . $enquiry->category->image) }}"
                                                alt="{{ $enquiry->category->title }}"
                                                style="width: 100px; height: 100px; object-fit: cover;">
                                        @endif
                                    </td>
                                    <td>
                                        {{ $enquiry->category->title ?? '' }}
                                    </td>
                                    <td>
                                        <div class="quantity_goods">
                                            <button type="button" class="quantity-btn minus"
                                                data-id="{{ $enquiry->id }}">-</button>
                                            <input type="number" class="update_quantity" data-id="{{ $enquiry->id }}"
                                                min="1" value="{{ $enquiry->quantity }}">
                                            <button type="button" class="quantity-btn plus"
                                                data-id="{{ $enquiry->id }}">+</button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if (count($enquiries) > 0)
                        @php
                            $user = auth()->user();
                        @endphp

                        <form action="{{ route('greetings-appreciation.enquiry') }}" class="field-wrapper enquiry-form">
                            @csrf
                            <div class="row row-gap-20">
                                <input type="hidden" name="greetings_category_ids"
                                    value="{{ implode(',', $item_category_ids) }}">
                                @if (!$user)
                                    <div class="col-lg-6">
                                        <input type="text" id="user_name" class="input-field" name="user_name"
                                            placeholder="Enter Your Name" value="{{ old('user_name') }}" />
                                        @error('user_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" id="email" class="input-field" name="email"
                                            placeholder="Enter Your Email" value="{{ old('email') }}" />
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <input type="text" id="phone" class="input-field" name="phone"
                                            placeholder="Enter Your Phone" value="{{ old('phone') }}" />
                                        @error('phone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                @endif
                                @if (!empty($showSpecifyType))
                                    <div class="col-12">
                                        <input type="text" id="specify_type" class="input-field" name="specify_type"
                                            placeholder="Specify type" value="{{ old('specify_type') }}" />
                                        @error('specify_type')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                @endif
                                <div class="col-12">
                                    <textarea name="message" id="message" placeholder="Message"
                                        class="input-field"></textarea>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex gap-20 justify-content-end flex-wrap">
                                        <a href="{{ route('shop', ['category' => 'greetings-appreciation']) }}"
                                            class="golbal-btn-submit" id="greetings-add-more-btn">
                                            Add More
                                        </a>
                                        <button type="submit" class="golbal-btn-submit btn-submit">Submit Enquiry</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('js')
<script>
    $(document).ready(function() {
        var formStorageKey = 'greetings_appreciation_enquiry_form';
        var $form = $('.enquiry-form');
        if ($form.length) {
            try {
                var saved = sessionStorage.getItem(formStorageKey);
                if (saved) {
                    var data = JSON.parse(saved);
                    if (data.user_name !== undefined && $('#user_name').length) $('#user_name').val(data.user_name);
                    if (data.email !== undefined && $('#email').length) $('#email').val(data.email);
                    if (data.phone !== undefined && $('#phone').length) $('#phone').val(data.phone);
                    if (data.message !== undefined && $('#message').length) $('#message').val(data.message);
                    if (data.specify_type !== undefined && $('#specify_type').length) $('#specify_type').val(data.specify_type);
                }
            } catch (e) {}
            $('#greetings-add-more-btn').on('click', function(e) {
                e.preventDefault();
                var href = $(this).attr('href');
                var payload = {};
                if ($('#user_name').length) payload.user_name = $('#user_name').val();
                if ($('#email').length) payload.email = $('#email').val();
                if ($('#phone').length) payload.phone = $('#phone').val();
                if ($('#message').length) payload.message = $('#message').val();
                if ($('#specify_type').length) payload.specify_type = $('#specify_type').val();
                sessionStorage.setItem(formStorageKey, JSON.stringify(payload));
                window.location.href = href;
            });
        }

        $('.delete').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var row = $(this).closest('tr');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((response) => {
                if (response.isConfirmed) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'POST',
                        url: '{{ url('/greetings-appreciation-items') }}/' + id,
                        success: function(response) {
                            if (response) {
                                row.fadeOut(300, function() {
                                    $(this).remove();
                                    if ($('tbody tr').length === 0) {
                                        window.location.href =
                                            "{{ route('shop', ['category' => 'greetings-appreciation']) }}";
                                    }
                                });
                                Swal.fire('Deleted!', 'Your item has been deleted.', 'success');
                            }
                        }
                    });
                }
            });
        });

        $(document).on('click', '.plus, .minus', function() {
            let btn = $(this);
            let id = btn.data('id');
            let input = btn.siblings('.update_quantity');
            let qty = parseInt(input.val(), 10);
            if (btn.hasClass('plus')) {
                qty++;
            } else {
                qty = qty > 1 ? qty - 1 : 1;
            }
            input.val(qty);
            $.ajax({
                type: 'POST',
                url: "{{ route('greetings-appreciation-items.update-quantity') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    quantity: qty
                },
                success: function() {},
                error: function() {}
            });
        });

        $('.enquiry-form').on('submit', function(e) {
            e.preventDefault();
            let form = $(this);
            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: form.serialize(),
                beforeSend: function() {
                    $('.btn-submit').prop('disabled', true).text('Submitting...');
                },
                success: function() {
                    try {
                        sessionStorage.removeItem('greetings_appreciation_enquiry_form');
                    } catch (e) {}
                    Swal.fire({
                        icon: 'success',
                        title: 'Thank You!',
                        text: 'Your enquiry has been submitted successfully.',
                        showConfirmButton: true,
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#0B1B48'
                    }).then(() => {
                        window.location.href = "{{ route('shop') }}";
                    });
                },
                complete: function() {
                    $('.btn-submit').prop('disabled', false).text('Submit Enquiry');
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Please fill required fields correctly.'
                    });
                }
            });
        });
    });
</script>
@endpush
