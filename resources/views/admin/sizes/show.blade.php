@extends('layouts.admin.app')
<title> All Data Paragon Logistic</title>
@section('content')
    <style>
        .form-control[readonly] {
            background-color: #ffffff;
            opacity: 1;
            border-radius: 5px;
        }

        .container {
            margin-bottom: 50px;
        }
    </style>
    <section class="content-header">
        <div class="content-header-left">
            <h1>View All Data Paragon Logistic</h1>
        </div>
        <div class="content-header-right">
            <a href="{{ route('paragon.index') }}" class="btn btn-primary btn-sm">View All</a>
            <a href="javascript:;" onclick="window.print()" style="color:#ffffff" class="btn btn-sm btn-white mb-10px"><i
                    class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
        </div>
    </section>

    <section class="content">
        <div class="container" id="divToPrint">
            <div class="img text-center p-3 mb-5">
                <img src="{{ asset('public/assets/website/images/paragon.jpg') }}" alt="Image" style="margin-bottom: 30px" />
            </div>
            <div class="row">
                <table width="100%">
                    <tr>
                        <td>
                            <div class="col-md-12">
                                <label for="">Shipper</label>
                                <div class="form-group">
                                    <textarea readonly class="form-control" rows="3">{!! $paragons->shipper !!}</textarea>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="col-md-12">
                                <label for="">Consignee</label>
                                <div class="form-group">
                                    <textarea readonly class="form-control" rows="3">{!! $paragons->consignee !!}</textarea>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="col-md-12">
                                <label for="">Notify Party</label>
                                <div class="form-group">
                                    <textarea readonly class="form-control" rows="3">{!! $paragons->notify_party !!}</textarea>
                                </div>
                            </div>
                        </td>
                    </tr>
                     <tr>
                        <td colspan="3">
                            <div class="col-md-12">
                                <label for="">Notify Party 2</label>
                                <div class="form-group">
                                    <textarea readonly class="form-control">{!! $paragons->notify_party_2 !!}</textarea>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="col-md-12">
                                <label for="">Pre Carriage by</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" readonly value="{{ $paragons->pre_carriage_by }}">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="col-md-12">
                                <label for="">Place of receipt</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" readonly value="{{ $paragons->place_of_recpt }}">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="col-md-12">
                                <label for="">Vessel</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" readonly value="{{ $paragons->vessel }}">
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="3">
                            <div class="col-md-6">
                                <label for="">Voy No.</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" readonly value="{{ $paragons->voy_no }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="">B/L No.</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" readonly value="{{ $paragons->B_L_no }}">
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="col-md-12">
                                <label for="">Port of Loading</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" readonly
                                        value="{{ $paragons->port_of_loading }}">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="col-md-12">
                                <label for="">Port of Discharge</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" readonly
                                        value="{{ $paragons->port_of_discharge }}">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="col-md-12">
                                <label for="">Place of Delievery</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" readonly
                                        value="{{ $paragons->place_of_delivery }}">
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="col-md-12">
                                <label for="">Final Destination</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" readonly
                                        value="{{ $paragons->final_destination }}">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="col-md-12">
                                <label for="">Container No</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" readonly
                                        value="{{ $paragons->container_no }}">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="col-md-12">
                                <label for="">Seal No.</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" readonly
                                        value="{{ $paragons->seal_no }}">
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="col-md-12">
                                <label for="">Marks</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" readonly
                                        value="{{ $paragons->marks }}">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="col-md-12">
                                <label for="">Numbers</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" readonly
                                        value="{{ $paragons->numbers }}">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="col-md-12">
                                <label for="">No. of Container or Pkgs</label>
                                <div class="form-group">
                                    <textarea type="text" class="form-control form-control-sm" readonly> {!! $paragons->container_or_pkg !!}</textarea>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="col-md-12">
                                <label for="">Gross Weight</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" readonly
                                        value="{{ $paragons->gross_weight }}">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="col-md-12">
                                <label for="">Measurments</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" readonly
                                        value="{{ $paragons->measurments }}">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="col-md-12">
                                <label for="">Kind of Packages</label>
                                <div class="form-group">
                                    <textarea type="text" class="form-control form-control-sm" readonly> {!! $paragons->kind_of_pkg !!}</textarea>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="3">
                            <div class="col-md-12">
                                <label for="">Description of Goods</label>
                                <div class="form-group">
                                    <textarea class="form-control" readonly rows="3"> {!! $paragons->desc_of_good !!} </textarea>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="col-md-12">
                                <label for="">Total Containers or packages (in Word)</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" readonly
                                        value="{{ $paragons->total_container_or_pkg }}">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="col-md-12">
                                <label for="">Merchant's Value (See Clauses 18 & 23)</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" readonly
                                        value="{{ $paragons->merchant_declared_value }}">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="col-md-12">
                                <label for="">Freight and Charges</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" readonly
                                        value="{{ $paragons->freight_charges }}">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="col-md-12">
                                <label for="">Revenue Tons</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" readonly
                                        value="{{ $paragons->revenue_tons }}">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="col-md-12">
                                <label for="">Rate</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" readonly
                                        value="{{ $paragons->rate }}">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="col-md-12">
                                <label for="">Per</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" readonly
                                        value="{{ $paragons->per }}">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="col-md-12">
                                <label for="">Prepaid</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" readonly
                                        value="{{ $paragons->prepaid }}">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="col-md-12">
                                <label for="">Collect</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" readonly
                                        value="{{ $paragons->collect }}">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="col-md-12">
                                <label for="">Exchange Rate</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" readonly
                                        value="{{ $paragons->exchange_rate }}">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="col-md-12">
                                <label for="">Prepaid</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" readonly
                                        value="{{ $paragons->prepaid_2 }}">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="col-md-12">
                                <label for="">Payable at</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" readonly
                                        value="{{ $paragons->payable_at }}">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="col-md-12">
                                <label for="">Total Prepaid in local Currency</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" readonly
                                        value="{{ $paragons->total_prepaid_local_currency }}">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="col-md-12">
                                <label for="">No. of Original B(s)/L</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" readonly
                                        value="{{ $paragons->no_of_orignal_B_L }}">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="col-md-12">
                                <label for="">Place of issue</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" readonly
                                        value="{{ $paragons->place_of_issue }}">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="col-md-12">
                                <label for="">Date of issue</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" readonly
                                        value="{{ $paragons->date_of_issue }}">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div class="col-md-6">
                                <label for="">As Carrier</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" readonly
                                        value="{{ $paragons->as_carrier }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="">Freight Prepaid</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" readonly
                                        value="{{ $paragons->freight_prepaid }}">
                                </div>
                            </div>
                        </td>
                    </tr>

                </table>
            </div>

        </div>
    </section>

    <script>
        $(document).ready(function() {
            $('.editor_short').summernote({
                height: 150
            });
        });
    </script>
@endsection
