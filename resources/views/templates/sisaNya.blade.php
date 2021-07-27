<div class="container mb-4">
    <div class="row">
        <div class="col">
            <h6 class="subtitle mb-3">Status </h6>
        </div>
        <div class="col-auto"><a href="" class="text-default">View all</a></div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card border-0 mb-4">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto pr-0">
                            <div class="avatar avatar-50 border-0 bg-default-light rounded-circle text-default">
                                <i class="material-icons vm text-template">local_atm</i>
                            </div>
                        </div>
                        <div class="col-4 align-self-center">
                            <h6 class="mb-1">EMI</h6>
                            <p class="small text-secondary">Home Loan</p>
                        </div>
                        <div class="col-auto align-self-center border-left">
                            <h6 class="mb-1">$ 1548.00</h6>
                            <p class="small text-secondary">Due: 15-12-2019</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card border-0">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto pr-0">
                            <div class="avatar avatar-50 border-0 bg-default-light rounded-circle text-default">
                                <i class="material-icons vm text-template">local_atm</i>
                            </div>
                        </div>
                        <div class="col-4 align-self-center">
                            <h6 class="mb-1">EMI</h6>
                            <p class="small text-secondary">Car Loan</p>
                        </div>
                        <div class="col-auto align-self-center border-left">
                            <h6 class="mb-1">$ 658.00</h6>
                            <p class="small text-secondary">Due: 18-12-2019</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- PWA add to home display -->
<div class="container mb-4">
    <div class="card" id="addtodevice">
        <div class="card-body text-center">
            <div class="row mb-3">
                <div class="col-10 col-md-4 mx-auto"><img src="{{asset('/')}}/assets/img/install-app.png" alt="" class="mw-100"></div>
            </div>

            <h5 class="text-dark">Add to <span class="font-weight-bold">Home screen</span></h5>
            <p class="text-secondary">See PWA app as in fullscreen on your device.</p>
            <button class="btn btn-sm btn-default px-4 rounded" id="addtohome">Install</button>
        </div>
    </div>
</div>
<!-- PWA add to home display -->

<div class="container mb-4">
    <div class="card border-0 mb-3">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-auto pr-0">
                    <div class="avatar avatar-50 border-0 bg-danger-light rounded-circle text-danger">
                        <i class="material-icons vm text-template">card_giftcard</i>
                    </div>
                </div>
                <div class="col-auto align-self-center">
                    <h6 class="mb-1">3 Gift Cards</h6>
                    <p class="small text-secondary">Click here to see gift cards</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mb-4">
    <div class="row mb-3">
        <div class="col">
            <h6 class="subtitle mb-0">Upcoming Payments </h6>
        </div>
        <div class="col-auto"><a href="allpayment.html" class="float-right small">View All</a></div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="mb-1">$ 1548.00 </h5>
                            <p class="text-secondary">20d to pay electricity bill</p>

                        </div>
                        <div class="col-auto pl-0">
                            <button class="btn btn-40 bg-default-light text-default rounded-circle">
                                <i class="material-icons">local_atm</i>
                            </button>
                        </div>
                    </div>
                    <div class="progress h-5 mt-3">
                        <div class="progress-bar bg-default" role="progressbar" style="width:35%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card ">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="mb-1">$ 106.00</h5>
                            <p class="text-secondary">33 days to pay gas bill</p>
                        </div>
                        <div class="col-auto pl-0">
                            <button class="btn btn-40 bg-default-light text-default rounded-circle">
                                <i class="material-icons">local_atm</i>
                            </button>
                        </div>
                    </div>
                    <div class="progress h-5 mt-3">
                        <div class="progress-bar bg-default" role="progressbar" style="width: 65%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mb-4">
    <div class="card">
        <div class="card-body">
            <h6 class="mb-1">Select Menu Type</h6>
            <p class="text-secondary small">Open menu after selecting style</p>
            <div class="row">
                <div class="col-6 col-md-auto">
                    <div class="custom-control custom-switch">
                        <input type="radio" name="menustyle" class="custom-control-input" id="menu-overlay" checked="">
                        <label class="custom-control-label" for="menu-overlay">Overlay</label>
                    </div>
                </div>
                <div class="col-6 col-md-auto">
                    <div class="custom-control custom-switch">
                        <input type="radio" name="menustyle" class="custom-control-input" id="menu-pushcontent">
                        <label class="custom-control-label" for="menu-pushcontent">Reveal</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container ">
    <div class="row">
        <div class="col text-center">
            <h5 class="subtitle">Most Exciting Feature</h5>
            <p class="text-secondary">Take a look at our services</p>
        </div>
    </div>
    <div class="row text-center mt-3">
        <div class="col-6 col-md-3">
            <div class="card border-0 mb-4">
                <div class="card-body">
                    <div class="avatar avatar-60 bg-default-light rounded-circle text-default">
                        <i class="material-icons vm md-36 text-template">card_giftcard</i>
                    </div>
                    <h3 class="mt-3 mb-0 font-weight-normal">2546</h3>
                    <p class="text-secondary small">Gift it out</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 mb-4">
                <div class="card-body">
                    <div class="avatar avatar-60 bg-default-light rounded-circle text-default">
                        <i class="material-icons vm md-36 text-template">subscriptions</i>
                    </div>
                    <h3 class="mt-3 mb-0 font-weight-normal">635</h3>
                    <p class="text-secondary small">Monthly Billed</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 mb-4">
                <div class="card-body">
                    <div class="avatar avatar-60 bg-default-light rounded-circle text-default">
                        <i class="material-icons vm md-36 text-template">local_florist</i>
                    </div>
                    <h3 class="mt-3 mb-0 font-weight-normal">1542</h3>
                    <p class="text-secondary small">Eco environment</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 mb-4">
                <div class="card-body">
                    <div class="avatar avatar-60 bg-default-light rounded-circle text-default">
                        <i class="material-icons vm md-36 text-template">location_city</i>
                    </div>
                    <h3 class="mt-3 mb-0 font-weight-normal">154</h3>
                    <p class="text-secondary small">Four Offices</p>
                </div>
            </div>
        </div>
    </div>
</div>