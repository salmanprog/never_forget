@php
    if (Auth::user()->hasRole('Admin')) {
        $layout = 'layouts.admin.app';
    } elseif (Auth::user()->hasRole('Individual')) {
        $layout = 'layouts.individual.app';
    } else {
        $layout = 'layouts.individual.app';
    }
@endphp
@extends($layout)
@section('title', $page_title ?? 'Add Friends/Family')
@section('content')
<section class="content-header">
    <div class="content-header-left">
        <h1>Add Friends/Family</h1>
    </div>
    <div class="content-header-right">
        @include('includes.buttons.back')
        <a href="{{ route('member.friends_family.index') }}" class="btn btn-primary btn-sm">View All</a>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            @if ($errors->any())
                <div class="callout callout-danger">
                    <ul style="margin-bottom: 0;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('member.friends_family.store') }}" id="friends-family-form" class="form-horizontal" method="post" accept-charset="utf-8">
                @csrf

                <div class="box box-info">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="recipient_first_name" class="col-sm-2 control-label">Recipient First Name <span style="color: red">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="{{ old('recipient_first_name') }}" name="recipient_first_name" id="recipient_first_name" placeholder="Recipient First Name">
                                <span style="color: red">{{ $errors->first('recipient_first_name') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="recipient_last_name" class="col-sm-2 control-label">Recipient Last Name <span style="color: red">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="{{ old('recipient_last_name') }}" name="recipient_last_name" id="recipient_last_name" placeholder="Recipient Last Name">
                                <span style="color: red">{{ $errors->first('recipient_last_name') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="relationship_with_client" class="col-sm-2 control-label">Relationship with Client</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="{{ old('relationship_with_client') }}" name="relationship_with_client" id="relationship_with_client" placeholder="Relationship with Client">
                                <span style="color: red">{{ $errors->first('relationship_with_client') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email <span style="color: red">*</span></label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" value="{{ old('email') }}" name="email" id="email" placeholder="Email">
                                <span style="color: red">{{ $errors->first('email') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-sm-2 control-label">Phone</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="{{ old('phone') }}" name="phone" id="phone" placeholder="Phone">
                                <span style="color: red">{{ $errors->first('phone') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="occasion" class="col-sm-2 control-label">Occasion</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="{{ old('occasion') }}" name="occasion" id="occasion" placeholder="Occasion">
                                <span style="color: red">{{ $errors->first('occasion') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="occasion_date" class="col-sm-2 control-label">Occasion Date</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" value="{{ old('occasion_date') }}" name="occasion_date" id="occasion_date">
                                <span style="color: red">{{ $errors->first('occasion_date') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gift_preferences" class="col-sm-2 control-label">Gift Preferences</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="{{ old('gift_preferences') }}" name="gift_preferences" id="gift_preferences" placeholder="Gift Preferences">
                                <span style="color: red">{{ $errors->first('gift_preferences') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="favorite_color" class="col-sm-2 control-label">Favorite Color</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="{{ old('favorite_color') }}" name="favorite_color" id="favorite_color" placeholder="Favorite Color">
                                <span style="color: red">{{ $errors->first('favorite_color') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="dietry_restrictions" class="col-sm-2 control-label">Dietry Restrictions</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="{{ old('dietry_restrictions') }}" name="dietry_restrictions" id="dietry_restrictions" placeholder="Dietry Restrictions">
                                <span style="color: red">{{ $errors->first('dietry_restrictions') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="budget" class="col-sm-2 control-label">Budget</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="{{ old('budget') }}" name="budget" id="budget" placeholder="Budget">
                                <span style="color: red">{{ $errors->first('budget') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="{{ old('address') }}" name="address" id="address" placeholder="Address">
                                <span style="color: red">{{ $errors->first('address') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="city" class="col-sm-2 control-label">City</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="{{ old('city') }}" name="city" id="city" placeholder="City">
                                <span style="color: red">{{ $errors->first('city') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="state" class="col-sm-2 control-label">State</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="{{ old('state') }}" name="state" id="state" placeholder="State">
                                <span style="color: red">{{ $errors->first('state') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="zip" class="col-sm-2 control-label">ZIP</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="{{ old('zip') }}" name="zip" id="zip" placeholder="ZIP">
                                <span style="color: red">{{ $errors->first('zip') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="delivery_date" class="col-sm-2 control-label">Delivery Date</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" value="{{ old('delivery_date') }}" name="delivery_date" id="delivery_date">
                                <span style="color: red">{{ $errors->first('delivery_date') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="delivery_note" class="col-sm-2 control-label">Delivery Note</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="delivery_note" id="delivery_note" rows="2" placeholder="Delivery Note">{{ old('delivery_note') }}</textarea>
                                <span style="color: red">{{ $errors->first('delivery_note') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message_with_gift" class="col-sm-2 control-label">Message with gift</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="message_with_gift" id="message_with_gift" rows="2" placeholder="Message with gift">{{ old('message_with_gift') }}</textarea>
                                <span style="color: red">{{ $errors->first('message_with_gift') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="payment_method" class="col-sm-2 control-label">Payment Method</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="{{ old('payment_method') }}" name="payment_method" id="payment_method" placeholder="Payment Method">
                                <span style="color: red">{{ $errors->first('payment_method') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tracking_number" class="col-sm-2 control-label">Tracking Number</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="{{ old('tracking_number') }}" name="tracking_number" id="tracking_number" placeholder="Tracking Number">
                                <span style="color: red">{{ $errors->first('tracking_number') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="notes" class="col-sm-2 control-label">Notes</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="notes" id="notes" rows="2" placeholder="Notes">{{ old('notes') }}</textarea>
                                <span style="color: red">{{ $errors->first('notes') }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label"></label>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-success pull-left" name="form1">Add Friends/Family</button>
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
<script>
$(document).ready(function() {
    $("#friends-family-form").validate({
        rules: {
            recipient_first_name: "required",
            recipient_last_name: "required",
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            recipient_first_name: "Please enter recipient first name",
            recipient_last_name: "Please enter recipient last name",
            email: {
                required: "Please enter email",
                email: "Please enter a valid email address"
            }
        }
    });
});
</script>
@endpush
