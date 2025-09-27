<?php if(!empty($checksum)){
    $data_array=array("title"=>"ADCC Academy| Admission","description"=>"","keyword"=>"");
    $this->load->view('header',$data_array);
?>
<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="Other fees">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>ADCC | Other Fees Module</title>

<style type="text/css">
	.button_cont { width:100%; }
	#submitBtn {
		font-family:Arial;
		color: white;
		background:#153d77;
		text-transform: uppercase;
		text-decoration: none;
		padding: 10px;
		border: 2px solid white;
		display: inline-block;
		transition: all 0.4s ease 0s;
		cursor:pointer;
	}
	#submitBtn.disabled { 
		background:#153d77;
		border-color:white;
		color:white !important;
	}

	#submitBtn:hover {
		color: #ffffff !important;
		background: #fe7865;
		border-color: #fe7865 !important;
		transition: all 0.4s ease 0s;
	}
	.center { position:absolute; top:50%; left:50%; -webkit-transform:translate(-50%,-50%); -moz-transform:translate(-50%,-50%); transform:translate(-50%,-50%); }
</style>

        <!-- check out page code -->
        	<main class="content">
				<div class="container-fluid">

					<div class="header mt-30">
						<h1 class="header-title">
							Other Fees Installment Payment Module 
						</h1>
						
						 <!-- <nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item"><a href="#">Admission</a></li>
								<li class="breadcrumb-item active" aria-current="page">Admission Form</li>
							</ol>
						</nav> --> 
					</div>
					
					<div class="row mt-20">
						<div class="col-8">
						
							<div class="card">
								<div class="card-header">
								
									<h6 class="card-title"><b class="main-heading ml-20"> <u>Preview Payment </u>: </b></h6>
									
								</div>
								
								<div class="card-body">
									<div class="row">
									    <table class="table table-bordered table-striped table-hover">
									        
									            <tr>
									                <td><b>Student Name - </b></td>
									                <td><?= $student->name;?></td>
									            </tr>
									            
									            <tr>
									                <td>School - </td>
									                <td><?= $student->school;?></td>
									            </tr>
									            
									            <tr>
									                <td>Board - </td>
									                <td>NA</td>
									            </tr>
									            
									            <tr>
									                <td>Stream - </td>
									                <td>NA</td>
									               
									            </tr>
									            
									            
									            
									            <tr>
									                <td><b>Installment I (Rs.)- </b></td>
									                 <td><?php if($payments->inst1=='0'){echo '-';}else{echo $payments->inst1;}?></td>
									            </tr>
									            
									            <tr>
									                <td><b>Installment II (Rs.)- </b></td>
									                <td><?php if($payments->inst2=='0'){echo '-';}else{echo $payments->inst2;}?></td>
									            </tr>
									            
									            <tr>
									                <td><b>Total Installment Amount (Rs.)- </b></td>
									                <td><?= $payments->totalPayment;?></td>
									            </tr>
									            <tr>
									                <td colspan="2"> 
									                    <center><div id="" class="center1">
		                                                    <input type="button" id="submitBtn" class="disabled"  value="Pay Now" id="pay" disabled onclick="SubmitPay();"  />	
                                                        </div>
                                                            <input type='hidden' name='msg' id="msg" value='<?php if(!empty($checksum)){ echo $checksum; } ?>'>
                                                        </center>
									                </td>
									            </tr>
									        
									    </table>
									</div>
								</div>
								</div>
								</div>
								</div>
        <!-- check out page code -->
        
        
        
        <!--<script src="https://services.billdesk.com/checkout-widget/src/app.bundle.js"></script>-->
        <script src=" https://pgi.billdesk.com/payments-checkout-widget/src/app.bundle.js"></script>
        <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
        
        <script type="text/javascript">

	var x, t, y = "";
	var str = $('#msg').val();
	 function SubmitPay() { 
		
	
		 bdPayment.initialize({
			 msg :str,			
			 callbackUrl: 'http://localhost/Adcc_Pay/payment-response',
			 options : {
				enableChildWindowPosting : true,
				enablePaymentRetry : true,
				retry_attempt_count: 2
			 }
		 }); 

	 }


document.addEventListener('readystatechange', function(event) {

    if (event.target.readyState === "interactive") {
        //alert("All HTML DOM elements are accessible");
    }

    if (event.target.readyState === "complete") {
        //alert("Now external resources are loaded too, like css,src etc... ");
		var button = document.getElementById('submitBtn');
		    button.disabled = false;
			button.classList.remove("disabled")
    }
});

</script>

</div>
</main>
<?php $this->load->view('footer');?>
   
<?php }else{
echo "Something went wrong...";
die;
} ?>