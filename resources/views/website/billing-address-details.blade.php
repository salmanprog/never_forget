<input type="hidden" name="billing_address_id" value="{{ $billing_address->id }}">
<div class="row">
    <table class="table">
        <tbody>
            <tr>
                <th>Name</th>
                <td>{{ $billing_address->first_name }} {{ $billing_address->last_name }}</td>
            </tr>
            <tr>
                <th>Company</th>
                <td>{{ $billing_address->company }}</td>
            </tr>
            <tr>
                <th>Country / Region</th>
                <td>{{ $billing_address->country }}</td>
            </tr>
            <tr>
                <th>Street address</th>
                <td>{{ $billing_address->street }}</td>
            </tr>
            <tr>
                <th>Town / City</th>
                <td>{{ $billing_address->town }}</td>
            </tr>
            <tr>
                <th>Postcode / ZIP</th>
                <td>{{ $billing_address->postcode }}</td>
            </tr>
            <tr>
                <th>Phone</th>
                <td>{{ $billing_address->phone }}</td>
            </tr>
            <tr>
                <th>Email address</th>
                <td>{{ $billing_address->email  }}</td>
            </tr>
        </tbody>
    </table>
</div>
