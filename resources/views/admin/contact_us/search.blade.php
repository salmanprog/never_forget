@if($models->count() === 0)
    <tr>
        <td colspan="11" class="text-center">No records found.</td>
    </tr>
@else
@foreach($models as $key=>$model)
    @php
        $services = $model->selected_services_list;
        $isCustomSolution = $model->type === 'customize_solution';
        $typeLabel = [
            'custom_quote' => 'Custom Quote',
            'request_a_quote' => 'Request a Quote',
            'customize_solution' => 'Customize Your Solution',
        ][$model->type] ?? ($model->type ?: '—');
        $fullName = trim(($model->first_name ?? '') . ' ' . ($model->last_name ?? ''));

        $detailHtml = '<table class="table table-bordered">'
            . '<tr><th>Type</th><td>' . e($typeLabel) . '</td></tr>'
            . '<tr><th>Name</th><td>' . e($fullName) . '</td></tr>'
            . '<tr><th>Email</th><td>' . e($model->email) . '</td></tr>'
            . '<tr><th>Phone</th><td>' . e($model->phone) . '</td></tr>'
            . '<tr><th>Company</th><td>' . e($model->company) . '</td></tr>'
            . '<tr><th>Plan</th><td>' . e($model->plans) . '</td></tr>';

        if ($isCustomSolution) {
            $detailHtml .= '<tr><th>Job Title</th><td>' . e($model->job_title) . '</td></tr>'
                . '<tr><th>Website</th><td>' . e($model->website) . '</td></tr>'
                . '<tr><th>Industry</th><td>' . e($model->industry) . '</td></tr>'
                . '<tr><th>Employees</th><td>' . e($model->number_of_employees) . '</td></tr>'
                . '<tr><th>Approx. Customers</th><td>' . e($model->approximate_customers) . '</td></tr>'
                . '<tr><th>Estimated Budget</th><td>' . e($model->estimated_budget ?: 'N/A') . '</td></tr>'
                . '<tr><th>Business Goals</th><td>' . nl2br(e($model->business_goals)) . '</td></tr>'
                . '<tr><th>Selected Services</th><td><ul>' . collect($services)->map(function ($s) { return '<li>' . e($s) . '</li>'; })->implode('') . '</ul></td></tr>';
            if ($model->other_services_text) {
                $detailHtml .= '<tr><th>Other Services</th><td>' . nl2br(e($model->other_services_text)) . '</td></tr>';
            }
        } else {
            $detailHtml .= '<tr><th>Quantity / Options</th><td>' . e($model->quantity) . '</td></tr>';
        }

        $detailHtml .= '<tr><th>Message / Notes</th><td>' . nl2br(e($model->message)) . '</td></tr></table>';
    @endphp
    <tr id="id-{{ $model->id }}">
        <td>{{ $models->firstItem()+$key }}.</td>
        <td>{{ $typeLabel }}</td>
        <td>{{ $fullName }}</td>
        <td>{{ $model->email }}</td>
        <td>{{ $model->phone ?: 'No Phone' }}</td>
        <td>{{ $model->company }}</td>
        <td>{{ $model->plans }}</td>
        <td>
            @if($isCustomSolution)
                <small>{{ count($services) }} service(s) selected</small><br>
            @endif
            <button type="button" class="btn btn-info btn-xs view-contact-detail" data-detail-b64="{{ base64_encode($detailHtml) }}">View</button>
        </td>
        <td>
            @if($model->status)
                <span class="badge label-success">Active</span>
            @else
                <span class="badge label-danger">In-Active</span>
            @endif
        </td>
        <td>
            <div class="btn-group mts-contacts-btn-group" role="group">
                @if($model->phone)
                    <button type="button" class="btn btn-success btn-xs btn-open-message-modal" title="Send Text"
                        data-name="{{ $model->first_name }}"
                        data-last-name="{{ $model->last_name }}"
                        data-phone="{{ $model->phone }}">
                        <i class="fa fa-comment"></i>
                    </button>
                    <button type="button" class="btn btn-primary btn-xs btn-initiate-call" title="Make Call (Twilio)"
                        data-phone="{{ $model->phone }}"
                        data-name="{{ $fullName }}">
                        <i class="fa fa-phone"></i>
                    </button>
                @endif
                @if($model->email)
                    <button type="button" class="btn btn-info btn-xs btn-open-email-modal" title="Send Email"
                        data-email="{{ $model->email }}"
                        data-name="{{ $fullName }}">
                        <i class="fa fa-envelope"></i>
                    </button>
                @endif
            </div>
        </td>
        <td>
            <button class="btn btn-danger btn-xs delete" data-slug="{{ $model->id }}" data-del-url="{{ url('contactus', $model->id) }}"><i class="fa fa-trash"></i></button>
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="11">
        Displaying {{ $models->firstItem() }} to {{ $models->lastItem() }} of {{ $models->total() }} records
        <div class="d-flex justify-content-center">
            {!! $models->links('pagination::bootstrap-4') !!}
        </div>
    </td>
</tr>
@endif
