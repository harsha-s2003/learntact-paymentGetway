<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="img/icon.png">
    <link
      rel="stylesheet"
      href="<?= base_url();?>assets/node_modules/bootstrap/dist/css/bootstrap.css"
    />
    
    <link rel="stylesheet" href="<?= base_url();?>assets/node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url();?>assets/css/style.css" />
    <title>Learntact Education Pvt Ltd.</title>
  </head>
  <body>

    <nav class="nav-bar bg-white">
        <div class="container">
            <div class="headerMain py-3">
                <div class=" ">
                    <a href="index.html">
                        <img src="<?= base_url();?>assets/img/logo-wide.png" alt="" class="logo">
                    </a>
                </div>
                  
                <div class="w-100">
                    <ul class="menus">
                        <li class="menus-list">
                        <a href="<?= site_url('about-us');?>" class="menus-link">
                        
                       
                            <span class="icon-round">
  
                                
                                <i class="bi bi-card-list"></i> 
                                
                            </span>
  
  
                        
                        About Us
                    </a>
                </li>
                        <li class="menus-list">
                        <a href="<?= site_url('contact-us');?>" class="menus-link">
                        
                       
                            <span class="icon-round">
  
                                
                                <i class="bi bi-card-list"></i> 
                                
                            </span>
  
  
                        
                        Contact Us
                    </a>
                </li>
                      <li class="menus-list">
                        <a href="<?= site_url('register');?>" class="menus-link">
                        
                       
                            <span class="icon-round">
  
                                
                                <i class="bi bi-card-list"></i> 
                                
                            </span>
  
  
                        
                        Register
                    </a>
                </li>

                        <li class="menus-list">
                            <a href="<?= site_url('login');?>" class="menus-link">
                            
                           
                                <span class="icon-round">

                                    
                                    <i class="bi bi-person"></i> 
                                    
                                </span>


                            
                            Login
                        </a>
                    </li>


             

<!-- 
                    <li class="menus-list">
                        <a href="registration.html" class="menus-link">
                        
                       
                            <span class="icon-round">

                                
                                <i class="bi bi-card-list"></i> 
                                
                            </span>


                        
                            Registration
                    </a>
                </li> -->
                        <!-- <li class="menus-list">
                            <a href="registration.html" >
                                <i class="bi bi-card-list"></i>    
                                Registration
                            </a>
                        </li> -->

                      
                       
                    </ul>
                </div>
            </div>
        </div>
    </nav>



      <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="<?= base_url();?>assets/img/new-banner-1.jpg" class="d-block w-100" alt="...">
            <!-- <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div> -->
          </div>
          <div class="carousel-item">
            <img src="<?= base_url();?>assets/img/new-banner-2.jpg" class="d-block w-100" alt="...">
           
          </div>
          <div class="carousel-item">
            <img src="<?= base_url();?>assets/img/new-banner-3.jpg" class="d-block w-100" alt="...">
           
          </div>
        </div>
        <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button> -->
      </div>






      <footer class="footer py-5 text-center text-white">
        <div class="container">
          <p class="">Learntact</p>
          <p class="fs-7">“Nagpur, Maharashtra 440025</p>
          <a href="mailto:info@learntact.in" class="fs-7 link-offset-3 text-underline-none">Email: info@learntact.in</a>
          
        </div>
      </footer>







    <script src="<?= base_url();?>assets/node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script src="<?= base_url();?>assets/js/script.js"></script>
  </body>
</html>
