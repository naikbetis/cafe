@extends('secondary')
@section('title','Haagen Dazs Voucher Success')
@section('pageTitle','Notificaton')
@section('content')
@push('styles')
@endpush
<!-- page content start -->
        <div class="main-container h-100">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-12 col-md-6 col-lg-4 align-self-center text-center my-3 mx-auto">
                        <div class="icon icon-120 bg-success-light text-success rounded-circle mb-3">
                            <i class="material-icons display-4">redeem</i>
                        </div>
                        <h2>Congratulation!</h2>
                        <h6 class="text-secondary mb-3">Your voucher has been Redeem </h6>
                        <p class="text-secondary">Thank you for buying products your order will be delivered soon and we will notify you soon via your registered email address or phone number.</p>
                    </div>
                </div>
            </div>
        </div> 
@endsection

@push('scripts')
<script type="text/javascript">
</script>
@endpush