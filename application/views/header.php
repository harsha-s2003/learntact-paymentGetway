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
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <title>Leantact</title>
  </head>
  <body><nav class="nav-bar bg-white" onload="document.refresh();">
        <div class="container">
            <div class="headerMain py-3">
                <div class=" ">
                    <a href="<?= site_url();?>">
                        <img src="<?= base_url();?>assets/img/logo-wide.png" alt="" class="logo">
                    </a>
                </div>

                <div class="w-100">
                    <ul class="menus">
               <?php if(empty($_SESSION['adccepay'])) { ?>             
                <li class="menus-list">
                            <a href="<?= site_url('about-us');?>" class="menus-link">
                            
                           
                                <span class="icon-round"><i class="bi bi-person"></i>  </span>                    
                            About Us
                        </a>
                    </li> 
                    <li class="menus-list">
                            <a href="<?= site_url('contact-us');?>" class="menus-link">
                            
                           
                                <span class="icon-round"><i class="bi bi-person"></i>  </span>                    
                            Contact Us 
                        </a>
                    </li> 
                    <?php } ?>
                   <!--  <li class="menus-list">
                            <a href="<?= site_url();?>" class="menus-link">
                            
                           
                                <span class="icon-round"><i class="bi bi-person"></i>  </span>                    
                            Login
                        </a>
                    </li>      -->    
                    <?php if(!empty($_SESSION['adccepay'])) { ?>    
                        <li class="menus-list">
                            <a href="<?= site_url('payment-history');?>" class="menus-link">
                            
                           
                                <span class="icon-round"><i class="bi bi-person"></i>  </span>                    
                            Payment History
                        </a>
                    </li> 
                      <li class="menus-list">
                        <a href="<?= site_url('logout');?>" class="menus-link">     
                       
                            <span class="icon-round"><i class="fa fa-sign-out" aria-hidden="true"></i> </span>                  
                        Logout
                    </a>
                </li>
            <?php } ?>
<!-- 
                        <li class="menus-list">
                            <a href="<?= site_url();?>" class="menus-link">
                            
                           
                                <span class="icon-round"><i class="bi bi-person"></i>  </span>                    
                            Login
                        </a>
                    </li>  -->                     
                       
                    </ul>
                </div>
            </div>
        </div>
    </nav>
 