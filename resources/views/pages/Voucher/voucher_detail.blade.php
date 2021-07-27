@extends('secondary')
@section('title','Haagen Dazs Voucher Detail')
@section('pageTitle','Detail')
@section('content')
@push('styles')
@endpush

  	<div class="card border-0 mb-3">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-auto pr-0">
                    <div class="avatar avatar-40 border-0 bg-danger-light rounded-circle text-danger">
                        <i class="material-icons vm text-template">card_giftcard</i>
                    </div>
                </div>
                <div class="col align-self-center pr-0">
                    <h6 class="mb-0">{{$detail->nameVoucher}}</h6>
                    <p class="text-secondary">{{$detail->voucherUnique}}</p>
                </div>

                @if(($detail->voucherStatus == 1) && ($detail->voucherTransactionAt !== NULL) && ($detail->voucherTransactionDate !== NULL))
                <div class="col-auto align-self-center  pl-0">
                    <button class="btn btn-sm btn-default rounded">Redeem</button>
                </div>
                @endif
            </div>
        </div>
        <div class="card-body">
            <h4 class="text-default text-center mb-0 display-6">Rp. {{$detail->voucherValue}}</h4>
        </div>
        <div class="card-footer">
            <div class="row align-items-center">
                <div class="col">
                	<p class="small text-secondary mb-0">Expired Date</p>
                    <p>{{$detail->voucherExpired}}</p>
                    
                </div>
                <div class="col">
                	@if(($detail->voucherStatus == 1) && ($detail->voucherTransactionAt !== NULL) && ($detail->voucherTransactionDate !== NULL))
                    <p class="small text-secondary mb-0">Redeem At</p>
                    <p>{{$detail->voucherTransactionAt}}</p>
                    @endif
                </div>
                @if(($detail->voucherStatus == 1) && ($detail->voucherTransactionAt !== NULL) && ($detail->voucherTransactionDate !== NULL))
                <div class="col">
                	<p class="small text-secondary mb-0">Redeem Date</p>
                    <p>{{$detail->voucherTransactionDate}}</p>
                    
                </div>
                @endif


            </div>
        </div>


    </div>
    @if(($detail->voucherStatus !== 1) && ($detail->voucherTransactionAt == NULL) && ($detail->voucherTransactionDate == NULL))
    <div class="container">
    	<form method="post" action="{{route('voucher.redeem')}}">
    		{{ csrf_field() }}
    		<input type="hidden" name="voucherCode" value="{{$detail->voucherCode}}" required>
    		<button type="submit" class="btn btn-lg btn-block btn-success rounded">Redeem</button>
    	</form>
    </div>
    @endif
    

@endsection

@push('scripts')
<script type="text/javascript">

</script>
@endpush