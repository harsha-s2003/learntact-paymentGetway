<section>
  <div class="container">
    <div class="row">

      <div class="col-lg-7 order-2 order-md-1">
        <figure class="login-img">
          <img src="<?= base_url();?>assets/img/Login-rafiki.svg" alt="" >
        </figure>
      </div>
      <div class="col-lg-5 order-1 order-md-2">

        <h3 class="text-center mb-5"><i class="bi bi-person-circle fs-4"></i> Login </h3>
        <form class="form" method="POST" action="<?= site_url('student-login');?>">
        <div class="mb-3">            
            <input type="number" class="form-control" id="contact" placeholder="Mobile Number" required name="mobile">            
          </div>
          <button type="submit" class="btn btn-primary w-100">Login</button>
          
        </form>
    
      </div>
    </div>
  </div>
</section>
     