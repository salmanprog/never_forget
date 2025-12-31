@extends('layouts.website.master')
@section('content')
@section('title', $page_title)
<style>
    .cart-main {
        background: #298dff38;
        /* box-shadow: 0 2px 16px rgb(0 0 0); */
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

    .product_name {
        font-size: 18px;
        color: #081e37;
        font-family: 'Lato', sans-serif;
        font-weight: 600;
        margin-bottom: 0;
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
        transition: background 0.2s;
    }

    .remove-btn:hover {
        background: #dc3545;
        color: #fff;
    }

    .edit-btn {
        border-radius: 50%;
        width: 32px;
        height: 32px;
        background: #f8d7da;
        color: #9fdba5ff;
        border: none;
        font-size: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.2s;
    }

    .edit-btn:hover {
        background: #034211ff;
        color: #fff;
    }

    .coupon_code,
    .apply_coupon {
        padding: 8px 16px;
        border-radius: 4px;
        border: 1px solid #ccc;
        margin-right: 8px;
    }

    .apply_coupon {
        background: #0a2749;
        color: #fff;
        border: none;
        transition: background 0.2s;
    }

    .apply_coupon:hover {
        background: #cfa40c;
        color: #fff;
    }

    .golbal-btn-submit,
    .proceesd {
        background: #cfa40c;
        color: #fff;
        border: none;
        padding: 12px 32px;
        font-size: 17px;
        border-radius: 6px;
        transition: background 0.2s;
        margin-top: 10px;
        display: inline-block;
    }

    .golbal-btn-submit:hover,
    .proceesd:hover {
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
        color: #333;
        cursor: pointer;
        transition: background 0.2s;
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

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>
<main class="inner-bg">
    <section class="inner-banner">
        <div class="container">
            <h1 class="heading fs-74" data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                Balloons
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
                                <h4>No balloon enquiry items found</h4>
                            </div>
                        @endif

                        <tbody>
                            @php
                                $item_ids = [];
                            @endphp
                            @foreach ($enquiries as $enquiry)
                                @php
                                    array_push($item_ids, $enquiry->balloon_id);
                                @endphp
                                <tr id="">
                                    <td><button data-id="{{ $enquiry->id }}" type="button" scope="row"
                                            class="remove-btn delete"><span class="croos"><i
                                                    class="fa fa-trash"></i></span></button></td>
                                    <td>
                                        @if ($enquiry->balloon->images)
                                            <img src="{{ asset('/public/' . $enquiry->balloon->images) }}"
                                                alt="{{ $enquiry->balloon->title }}"
                                                style="width: 100px; height: 100px;">
                                        @endif
                                    </td>
                                    <td>
                                        {{ $enquiry->balloon->title }}
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

                        <form action="{{ route('balloon.enquiry') }}" class="field-wrapper enquiry-form">
                            @csrf
                            <div class="row row-gap-20">
                                <input type="hidden" name="balloon_ids" value="{{ implode(',', $item_ids) }}">
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
                                <div class="col-12">
                                    <textarea name="message" id="message" placeholder="Message" class="input-field"></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="golbal-btn-submit"
                                        style="display: flex; margin-left: auto;">Submit Balloon Enquiry</button>
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
        $('.delete').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var row = $(this).closest('tr');
            console.log(row);
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
                        url: '{{ url('/balloon-items') }}/' + id,
                        success: function(response) {
                            if (response) {
                                row.fadeOut(300, function() {
                                    $(this).remove();
                                    if ($('tbody tr').length === 0) {
                                        window.location.href =
                                            "shop?category=balloons";
                                    }
                                })
                                Swal.fire(
                                    'Deleted!',
                                    'Your item has been deleted.',
                                    'success'
                                );
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Something went wrong!',
                                })
                            }
                        }
                    })
                };
            })


        })

        $(document).on('click', '.plus, .minus', function() {

            let btn = $(this);
            let id = btn.data('id');
            let input = btn.siblings('.update_quantity');
            let qty = parseInt(input.val());

            // plus / minus logic
            if (btn.hasClass('plus')) {
                qty++;
            } else {
                qty = qty > 1 ? qty - 1 : 1;
            }

            input.val(qty); // UI update first (smooth UX)

            // AJAX call
            $.ajax({
                type: 'POST',
                url: '{{ url('/balloon-items/update-quantity') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    quantity: qty
                },
                success: function(response) {
                    console.log('Quantity updated', response);
                },
                error: function() {
                    console.log('Failed to update quantity');
                }
            });
        });

        $('.enquiry-form').on('submit', function(e) {
            e.preventDefault();
            let form = $(this);
            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: form.serialize(),
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Thank You!',
                        text: 'Your balloon enquiry has been submitted successfully.',
                        confirmButtonColor: '#cfa40c'
                    }).then(() => {
                        window.location.href = "{{ route('shop') }}";
                    });
                },
                error: function(xhr) {
                    console.log(xhr.responseText);

                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Please fill required fields correctly.'
                    });
                }
            });
        });

    })
</script>
@endpush
