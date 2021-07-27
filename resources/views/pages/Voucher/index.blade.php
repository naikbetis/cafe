@extends('secondary')
@section('title','Haagen Dazs Voucher Redeem')
@section('pageTitle','Voucher')
@section('content')
@push('styles')
@endpush
<div class="main-container">
    <div class="container text-center"> 
        <div class="card" id="redeemCode">
            <div class="card-body" >
                <form method="post" action="{{route('voucher.checking')}}">
                    @csrf
                <div class="form-group float-label mb-0">
                    <input type="text" style="font-size:35px; background: none;" class="form-control text-center text-uppercase" autofocus="true" name="voucherCode" required>
                    <label class="form-control-label">Voucher Code</label>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-block rounded" onclick=" navigator.vibrate(200);">Redem Now</button>
            </div>
            </form>
        </div>
        {{-- Scanner Hide / Show --}}
        <div class="card" id="redeemScan" style="display:none;">
        	<video  style="width:90%; height: 400px;" id="preview"></video>
        </div>	

    </div>

    
        <div class="container mt-4">
        	<div class="row mb-4">
                <div class="col-12">
                    <button onclick="showScanner()" class="btn btn-outline-default px-2 btn-block rounded" id="btnScanner">
                    	<span class="material-icons mr-1">qr_code_scanner</span> Scanner
                    </button>
                </div>
            </div>
        </div>	
    </div>    


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-body" id="voucherDetail"></div>
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<script type="text/javascript">
    
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview'), mirror: false});
      scanner.addListener('scan', function (content) {
        // Start Here for Scan
        // alert(content);
        $.ajax({
            type      : "post",
            url       : "{{route('voucher.scanner.checking')}}",
            async     : true,
            cache     : true,
            data      : {voucherCode:content},
            dataType  : "json",
            headers   : {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success   : function(data){
                        beep();
                        navigator.vibrate(200);
                        $('#voucherDetail').empty();
                        $('#exampleModal').modal('show');

                        if(data.voucherStatus == 1)
                        {
                            $('#voucherDetail').append(`

                             
                            <div class="card border-0 mb-3">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col-auto pr-0">
                                            <div class="avatar avatar-40 border-0 bg-danger-light rounded-circle text-danger">
                                                <i class="material-icons vm text-template">card_giftcard</i>
                                            </div>
                                        </div>
                                        <div class="col align-self-center pr-0">
                                            <h6 class="mb-0">${data.nameVoucher}</h6>
                                            <p class="text-secondary">${data.voucherUnique}</p>
                                        </div>
                                      
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h4 class="text-default text-center mb-0 display-6">Rp. ${data.voucherValue}</h4>
                                </div>

                                <div class="card-footer">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <p class="small text-secondary mb-0">Expired Date</p>
                                            <p>${data.voucherExpired}</p>
                                        </div>

                                        <div class="col">
                                            <p class="small text-secondary mb-0">Redeem At</p>
                                            <p>${data.voucherTransactionAt}</p>
                                        </div>
                                        
                                        <div class="col">
                                            <p class="small text-secondary mb-0">Redeem Date</p>
                                            <p>${data.voucherTransactionDate}</p>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>   

                            <div class="container">
                                <button type="button" class="btn btn-lg btn-block btn-secondary rounded" data-dismiss="modal">Close</button>
                            </div> 

                            
                        `);
                        }
                        else
                        {
                            $('#voucherDetail').append(`


                                <div class="card border-0 mb-3">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col-auto pr-0">
                                                <div class="avatar avatar-40 border-0 bg-danger-light rounded-circle text-danger">
                                                    <i class="material-icons vm text-template">card_giftcard</i>
                                                </div>
                                            </div>
                                            <div class="col align-self-center pr-0">
                                                <h6 class="mb-0">${data.nameVoucher}</h6>
                                                <p class="text-secondary">${data.voucherUnique}</p>
                                            </div>
                                          
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="text-default text-center mb-0 display-6">Rp. ${data.voucherValue}</h4>
                                    </div>

                                    <div class="card-footer">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <p class="small text-secondary mb-0">Expired Date</p>
                                                <p>${data.voucherExpired}</p>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>    

                                <div class="container">
                                    <form method="post" action="{{route('voucher.redeem')}}">
                                        @csrf
                                        <input type="hidden" name="voucherCode" value="${data.voucherCode}" required>
                                        <button type="submit" class="btn btn-lg btn-block btn-success rounded">Redeem</button>
                                        <button type="button" class="btn btn-lg btn-block btn-secondary rounded" data-dismiss="modal">Close</button>
                                    </form>
                                    
                                </div>
                            `);
                        }




                        
                   
                        
            },
            error       : function (data) {alert('Error:', data);}
        });
        return false;


      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[1]);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });
</script>

{{-- Show Hide Scanner --}}
<script type="text/javascript">
	
	function showScanner(){
		var x = document.getElementById("redeemScan");
		var y = document.getElementById("redeemCode");
		  if (x.style.display === "none") {
		    x.style.display = "block";
		    y.style.display = "none";
		  } else {
		    x.style.display = "none";
		    y.style.display = "block";
		  }
	}

    function beep() {
    var snd = new  Audio("data:audio/wav;base64,//uQRAAAAWMSLwUIYAAsYkXgoQwAEaYLWfkWgAI0wWs/ItAAAGDgYtAgAyN+QWaAAihwMWm4G8QQRDiMcCBcH3Cc+CDv/7xA4Tvh9Rz/y8QADBwMWgQAZG/ILNAARQ4GLTcDeIIIhxGOBAuD7hOfBB3/94gcJ3w+o5/5eIAIAAAVwWgQAVQ2ORaIQwEMAJiDg95G4nQL7mQVWI6GwRcfsZAcsKkJvxgxEjzFUgfHoSQ9Qq7KNwqHwuB13MA4a1q/DmBrHgPcmjiGoh//EwC5nGPEmS4RcfkVKOhJf+WOgoxJclFz3kgn//dBA+ya1GhurNn8zb//9NNutNuhz31f////9vt///z+IdAEAAAK4LQIAKobHItEIYCGAExBwe8jcToF9zIKrEdDYIuP2MgOWFSE34wYiR5iqQPj0JIeoVdlG4VD4XA67mAcNa1fhzA1jwHuTRxDUQ//iYBczjHiTJcIuPyKlHQkv/LHQUYkuSi57yQT//uggfZNajQ3Vmz+Zt//+mm3Wm3Q576v////+32///5/EOgAAADVghQAAAAA//uQZAUAB1WI0PZugAAAAAoQwAAAEk3nRd2qAAAAACiDgAAAAAAABCqEEQRLCgwpBGMlJkIz8jKhGvj4k6jzRnqasNKIeoh5gI7BJaC1A1AoNBjJgbyApVS4IDlZgDU5WUAxEKDNmmALHzZp0Fkz1FMTmGFl1FMEyodIavcCAUHDWrKAIA4aa2oCgILEBupZgHvAhEBcZ6joQBxS76AgccrFlczBvKLC0QI2cBoCFvfTDAo7eoOQInqDPBtvrDEZBNYN5xwNwxQRfw8ZQ5wQVLvO8OYU+mHvFLlDh05Mdg7BT6YrRPpCBznMB2r//xKJjyyOh+cImr2/4doscwD6neZjuZR4AgAABYAAAABy1xcdQtxYBYYZdifkUDgzzXaXn98Z0oi9ILU5mBjFANmRwlVJ3/6jYDAmxaiDG3/6xjQQCCKkRb/6kg/wW+kSJ5//rLobkLSiKmqP/0ikJuDaSaSf/6JiLYLEYnW/+kXg1WRVJL/9EmQ1YZIsv/6Qzwy5qk7/+tEU0nkls3/zIUMPKNX/6yZLf+kFgAfgGyLFAUwY//uQZAUABcd5UiNPVXAAAApAAAAAE0VZQKw9ISAAACgAAAAAVQIygIElVrFkBS+Jhi+EAuu+lKAkYUEIsmEAEoMeDmCETMvfSHTGkF5RWH7kz/ESHWPAq/kcCRhqBtMdokPdM7vil7RG98A2sc7zO6ZvTdM7pmOUAZTnJW+NXxqmd41dqJ6mLTXxrPpnV8avaIf5SvL7pndPvPpndJR9Kuu8fePvuiuhorgWjp7Mf/PRjxcFCPDkW31srioCExivv9lcwKEaHsf/7ow2Fl1T/9RkXgEhYElAoCLFtMArxwivDJJ+bR1HTKJdlEoTELCIqgEwVGSQ+hIm0NbK8WXcTEI0UPoa2NbG4y2K00JEWbZavJXkYaqo9CRHS55FcZTjKEk3NKoCYUnSQ0rWxrZbFKbKIhOKPZe1cJKzZSaQrIyULHDZmV5K4xySsDRKWOruanGtjLJXFEmwaIbDLX0hIPBUQPVFVkQkDoUNfSoDgQGKPekoxeGzA4DUvnn4bxzcZrtJyipKfPNy5w+9lnXwgqsiyHNeSVpemw4bWb9psYeq//uQZBoABQt4yMVxYAIAAAkQoAAAHvYpL5m6AAgAACXDAAAAD59jblTirQe9upFsmZbpMudy7Lz1X1DYsxOOSWpfPqNX2WqktK0DMvuGwlbNj44TleLPQ+Gsfb+GOWOKJoIrWb3cIMeeON6lz2umTqMXV8Mj30yWPpjoSa9ujK8SyeJP5y5mOW1D6hvLepeveEAEDo0mgCRClOEgANv3B9a6fikgUSu/DmAMATrGx7nng5p5iimPNZsfQLYB2sDLIkzRKZOHGAaUyDcpFBSLG9MCQALgAIgQs2YunOszLSAyQYPVC2YdGGeHD2dTdJk1pAHGAWDjnkcLKFymS3RQZTInzySoBwMG0QueC3gMsCEYxUqlrcxK6k1LQQcsmyYeQPdC2YfuGPASCBkcVMQQqpVJshui1tkXQJQV0OXGAZMXSOEEBRirXbVRQW7ugq7IM7rPWSZyDlM3IuNEkxzCOJ0ny2ThNkyRai1b6ev//3dzNGzNb//4uAvHT5sURcZCFcuKLhOFs8mLAAEAt4UWAAIABAAAAAB4qbHo0tIjVkUU//uQZAwABfSFz3ZqQAAAAAngwAAAE1HjMp2qAAAAACZDgAAAD5UkTE1UgZEUExqYynN1qZvqIOREEFmBcJQkwdxiFtw0qEOkGYfRDifBui9MQg4QAHAqWtAWHoCxu1Yf4VfWLPIM2mHDFsbQEVGwyqQoQcwnfHeIkNt9YnkiaS1oizycqJrx4KOQjahZxWbcZgztj2c49nKmkId44S71j0c8eV9yDK6uPRzx5X18eDvjvQ6yKo9ZSS6l//8elePK/Lf//IInrOF/FvDoADYAGBMGb7FtErm5MXMlmPAJQVgWta7Zx2go+8xJ0UiCb8LHHdftWyLJE0QIAIsI+UbXu67dZMjmgDGCGl1H+vpF4NSDckSIkk7Vd+sxEhBQMRU8j/12UIRhzSaUdQ+rQU5kGeFxm+hb1oh6pWWmv3uvmReDl0UnvtapVaIzo1jZbf/pD6ElLqSX+rUmOQNpJFa/r+sa4e/pBlAABoAAAAA3CUgShLdGIxsY7AUABPRrgCABdDuQ5GC7DqPQCgbbJUAoRSUj+NIEig0YfyWUho1VBBBA//uQZB4ABZx5zfMakeAAAAmwAAAAF5F3P0w9GtAAACfAAAAAwLhMDmAYWMgVEG1U0FIGCBgXBXAtfMH10000EEEEEECUBYln03TTTdNBDZopopYvrTTdNa325mImNg3TTPV9q3pmY0xoO6bv3r00y+IDGid/9aaaZTGMuj9mpu9Mpio1dXrr5HERTZSmqU36A3CumzN/9Robv/Xx4v9ijkSRSNLQhAWumap82WRSBUqXStV/YcS+XVLnSS+WLDroqArFkMEsAS+eWmrUzrO0oEmE40RlMZ5+ODIkAyKAGUwZ3mVKmcamcJnMW26MRPgUw6j+LkhyHGVGYjSUUKNpuJUQoOIAyDvEyG8S5yfK6dhZc0Tx1KI/gviKL6qvvFs1+bWtaz58uUNnryq6kt5RzOCkPWlVqVX2a/EEBUdU1KrXLf40GoiiFXK///qpoiDXrOgqDR38JB0bw7SoL+ZB9o1RCkQjQ2CBYZKd/+VJxZRRZlqSkKiws0WFxUyCwsKiMy7hUVFhIaCrNQsKkTIsLivwKKigsj8XYlwt/WKi2N4d//uQRCSAAjURNIHpMZBGYiaQPSYyAAABLAAAAAAAACWAAAAApUF/Mg+0aohSIRobBAsMlO//Kk4soosy1JSFRYWaLC4qZBYWFRGZdwqKiwkNBVmoWFSJkWFxX4FFRQWR+LsS4W/rFRb/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////VEFHAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAU291bmRib3kuZGUAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAMjAwNGh0dHA6Ly93d3cuc291bmRib3kuZGUAAAAAAAAAACU=");  
    snd.play();
}


</script>

@endpush