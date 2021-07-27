<div class="container mb-4">
    <div class="row">
        <div class="col">
            <h6 class="subtitle mb-3">Voucher's </h6>
        </div>
        <div class="col-auto"><a href="#" class="text-default"></a></div>
    </div>
    <div id="voucherActive" class="row"></div>
</div>

@push('scripts')
<script type="text/javascript">

$( document ).ready(function() {
    voucherActive();
});    
  

function voucherActive(){

    $.ajax({
    type      : "post", 
    url       : "{{route('voucher.active')}}",
    async     : true,
    cache     : true,
    dataType  : "json",
    // data      : {recID:id},
    headers   : {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    success   : function(data){
         
                $.each(data, function( index, value ) {
                    $('#voucherActive').append(`
                        
                        <div class="col-12">
                        <a href="{{url('/')}}/voucher/info/${value.idVoucher}">  
                            <div class="card border-0 mb-2">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-2 pr-3">
                                            <div class="icon icon-50 rounded-circle mb-1 bg-default-light text-default"><span class="material-icons">receipt</span></div>
                                            </div>
                                        <div class="col-5 align-self-center">
                                            <p class="small text-primary mb-1 ml-2">${value.nameVoucher}</p>
                                            <p class="small text-secondary ml-2">${value.patnerVoucher}</p>
                                        </div>
                                        <div class="col-5 align-self-center border-left">
                                            <p class="small text-primary mb-1">${value.total} Voucher</p>
                                            <p class="small text-secondary">${value.validVoucher}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        
                    `);
                });

    },
    error       : function (data) {alert('Error:', data);}
    });
    return false;
}

    
</script>
@endpush