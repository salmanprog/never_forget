<!DOCTYPE html>
<html>
<head>
    <title>Order Invoice || Never Forget</title>
</head>
<style type="text/css">
    body{
        font-family: 'Roboto Condensed', sans-serif;
    }
    .m-0{
        margin: 0px;
    }
    .p-0{
        padding: 0px;
    }
    .pt-5{
        padding-top:5px;
    }
    .mt-10{
        margin-top:10px;
    }
    .text-center{
        text-align:center !important;
    }
    .w-100{
        width: 100%;
    }
    .w-50{
        width:50%;
    }
    .w-85{
        width:85%;
    }
    .w-15{
        width:15%;
    }
    .logo img{
        width:45px;
        height:45px;
        padding-top:30px;
    }
    .logo h1{
        margin-left:8px;
        top:65px;
        position: absolute;
        font-weight: bold;
        font-size:25px;
    }
    .gray-color{
        color:#5D5D5D;
    }
    .bg-gray-color{
        color:#5D5D5D;
    }
    .text-bold{
        font-weight: bold;
    }
    .border{
        border:1px solid black;
    }
    table tr,th,td{
        border: 1px solid #d2d2d2;
        border-collapse:collapse;
        padding:7px 8px;
    }
    table tr th{
        background: #F4F4F4;
        font-size:15px;
    }
    table tr td{
        font-size:13px;
    }
    table{
        border-collapse:collapse;
    }
    .box-text p{
        line-height:10px;
    }
    .float-left{
        float:left;
    }
    .total-part{
        font-size:16px;
        line-height:12px;
    }
    .total-right p{
        padding-right:20px;
    }

</style>
<body>
<div class="head-title bg-gray-color">
   <h1 class="text-center m-0 p-0"><img src="{{ asset('public/assets/website/images') }}/logo.png" alt="logo" class="bg-gray-color"></h1>
   <h1 class="text-center m-0 p-0">Order Invoice</h1>
</div>
<div class="add-detail mt-10 ">
    <div class="w-50 float-left mt-10">
        <p class="m-0 pt-5 text-bold w-100">Invoice Id - <span class="gray-color">{{ $orders->count() }}</span></p>
        <p class="m-0 pt-5 text-bold w-100">Order Id - <span class="gray-color">{{$orders->order_number}}</span></p>
        <p class="m-0 pt-5 text-bold w-100">Order Date - <span class="gray-color">{{ date('d-F-Y', strtotime($orders->order_date)) }}</span></p>
    </div> 
    <div style="clear: both;"></div>
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">From</th>
            <th class="w-50">To</th>
        </tr>
        <tr>
            <td>
                <div class="box-text">
                    <p>First Name : {{ $orders->hasBillingAddress->first_name }}</p>
                    <p>Last Name : {{ $orders->hasBillingAddress->last_name }}</p>
                    <p>Email : {{ $orders->hasBillingAddress->email }}</p>
                    <p>Country : {{ $orders->hasBillingAddress->country }}</p>
                    <p>Company : {{ $orders->hasBillingAddress->company }}</p>
                    <p>Street : {{ $orders->hasBillingAddress->street }}</p>
                    <p>Town : {{ $orders->hasBillingAddress->town }}</p>
                    <p>Postcode : {{ $orders->hasBillingAddress->postcode }}</p>
                    <p>Phone : {{ $orders->hasBillingAddress->phone }}</p>
                </div>
            </td>
            <td>
                <div class="box-text">
                    <p>First Name : {{ $orders->hasShippingAddress->first_name??'' }}</p>
                    <p>Last Name : {{ $orders->hasShippingAddress->last_name??'' }}</p>
                    <p>Country : {{ $orders->hasShippingAddress->country??'' }}</p>
                    <p>Company : {{ $orders->hasShippingAddress->company??'' }}</p>
                    <p>Street : {{ $orders->hasShippingAddress->street??'' }}</p>
                    <p>Town : {{ $orders->hasShippingAddress->town??'' }}</p>
                    <p>Postcode : {{ $orders->hasShippingAddress->postcode??'' }}</p>
                </div>
            </td>
        </tr>
    </table>
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">Payment Method</th>
            <th class="w-50">Shipping Method</th>
        </tr>
        <tr>
            <td>None</td>
            <td>Free Shipping</td>
        </tr>
    </table>
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">Product Name</th>
            <th class="w-50">Product Image</th>
            <th class="w-50">Price</th>
            <th class="w-50">Option</th>
            <th class="w-50">Qty</th>
            <th class="w-50">Sub Total</th>
            
            
        </tr>
        @foreach($order_details as $order_detail)
            <tr align="center">
				<td>
					<p style="color: #7f032f">
						{{ $order_detail->hasProduct->name??'N/A' }}
					</p>
				</td>
				<td>
					@if($order_detail->hasProduct->image)
						<img  src="{{ asset('public/admin/assets/images/product') }}/{{ $order_detail->hasProduct->image }}" alt="Preview" style="height:70px; width:70px">
					@else
						<img src="{{ asset('public/admin/assets/images/product/no-photo1.jpg') }}" alt="Preview" style="height:70px; width:70px">
					@endif
				</td>
				<td>${{number_format ($order_detail->price??'00', 2) }}</td>
                <td>
                    @if($order_detail->variation_id != null)
                    <?php $Size = App\Models\Variations::where('id',$order_detail->variation_id)->first(); ?>
                        {{ $Size->hasSizes->sizes}}
                    @else
                        <span class="badge badge-danger">No Option</span>
                    @endif
                </td>
                <td>{{ $order_detail->quantity??'N/A' }}</td>
				<td>${{number_format ($order_detail->sub_total??'00', 2) }}</td> 
            </tr>
        @endforeach
        <tr>
            <td colspan="6">
                <div class="total-part">
                    <div class="total-left w-85 float-left" align="right">
                        <p>Sub Total</p>
                        <p>Discount</p>
                        <p>Total Amount</p>
                    </div>
                    <div class="total-right w-15 float-left text-bold" align="right">
                        <p>${{number_format ($orders->total_amount??'00', 2)}}</p>
                        <p>${{number_format ($orders->discount_amount??'00', 2) }}</p>
                        <p>${{number_format ($orders->net_amount??'00', 2) }}</p>
                    </div>
                    <div style="clear: both;"></div>
                </div>
            </td>
        </tr>
    </table>
</div>
</html>
