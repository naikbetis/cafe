@extends('secondary')
@section('title','Haagen Dazs Voucher Information')
@section('pageTitle','Voucher Info')
@section('content')
@push('styles')
@endpush

<div class="container-fluid px-0">
    <div class="card overflow-hidden">
        <div class="card-body p-0 h-150">
            <div class="background" style="background-image: url('https://res.cloudinary.com/dfuux8evw/image/upload/v1627395997/haagendazs/belgian_pattern.png');">
                <img src="https://res.cloudinary.com/dfuux8evw/image/upload/v1627395997/haagendazs/belgian_pattern.png" alt="" style="display: none;">
            </div>
        </div>
    </div>
</div>

<div class="container-fluid top-70 text-center mb-4">
    <div class="avatar avatar-140 rounded-circle mx-auto shadow">
        <div class="background" style="background-image: url(&quot;img/user1.png&quot;);">
            <img class="p-2" src="{{$voucher->iconVoucher}}">
        </div>
    </div>
</div>

<div class="container mb-4 text-center text-white">
    <h6 class="mb-1">{{$voucher->nameVoucher}}</h6>
    <p>{{$voucher->patnerVoucher}}</p>
    <p>{{$voucher->validVoucher}}</p>
    <a  target="_blank" href="{{$voucher->tncVoucher}}"><button class="btn btn-outline-default px-2 p-2 mb-3 rounded"><span class="material-icons mr-1">receipt_long</span> Term & Condition</button></a>
</div>


<div class="main-container">
    <div class="container">
        <div class="card">
            <div class="card-body px-0">
                <ul class="list-group list-group-flush">
                	@if($transaction->count() > 0)
                	@foreach($transaction as $x)
                	<a href="{{url('/')}}/voucher/detail/{{$x->idVoucherTransaction}}">
                    <li class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col-auto pr-0">
                                <div class="avatar avatar-40 rounded">
                                    <div class="background" style="background-image: url(&quot;img/user2.png&quot;);">
                                        <img src="{{$voucher->iconVoucher}}" alt="" style="display: none;">
                                    </div>
                                </div>
                            </div>
                            <div class="col align-self-center pr-0">
                                <h6 class="font-weight-normal mb-1">{{$x->voucherUnique}}</h6>
                                <p class="small text-secondary">{{ \Carbon\Carbon::parse($x->voucherTransactionDate)->format('d-m-Y')}}</p>
                      

                            </div>
                            <div class="col-auto">
                                <h6 class="text-success">Rp.{{number_format($x->voucherValue)}}</h6>
                            </div>
                        </div>
                    </li>
                    </a>
                    @endforeach
                    @else
                    	<h6 class="text-center">No Transaction</h6>
                    @endif
                   

                </ul>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script type="text/javascript">
</script>
@endpush