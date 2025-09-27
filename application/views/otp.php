<section>
  <div class="container">
    <div class="row">

      <div class="col-lg-7 order-2 order-md-1">
        <figure class="login-img">
          <img src="<?= base_url();?>assets/img/Login-rafiki.svg" alt="" >
        </figure>
      </div>
      <div class="col-lg-5 order-1 order-md-2">

        <h3 class="text-center mb-5"><i class="bi bi-person-circle fs-4"></i> OTP </h3>
        <form class="form" method="POST" action="<?= site_url('otp-verification');?>">
        <div class="mb-3">            
            <input type="number" class="form-control" id="contact" placeholder="Enter otp" required name="otp">            
          </div>
          <button type="submit" class="btn btn-primary w-100">OTP VERIFY</button>
          
        </form>
    
      </div>
    </div>
  </div>
</section>
     