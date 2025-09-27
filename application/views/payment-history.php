<section>
  <div class="container">
    <div class="row">

      <main class="content">
				<div class="container-fluid">
					
					<div class="row mt-20">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title"><b style="background-color: #ffdc00;padding:3px 20px;color:#153d77;border-radius: 3px 10px;font-size:16px;">Payment History</b></h5><br>
									<div class="col-md-12">
									<div class="row">
									<div class="col-md-6 text-cnter">	
									<h5 class="card-header">Student Name: <?= ucfirst($_SESSION['adccepay']->name);?><b><u></b></u></h5>
									</div>
									<div class="col-md-6 text-cnter">
									<h5 class="card-header" style="float: right;">Mobile No: <?= ucfirst($_SESSION['adccepay']->mobile)?><b><u></b></u></h5>
								</div>
								</div>
								</div>
								</div>
								<div class="card-body">
								    <div class="table-responsive">
							 	<table id="datatables-buttons1" class="table table-striped" > 
									    	 
										<thead>								    
									
											<tr>
												<th>Sr.No.</th>
												<th>Program</th>
												<th>Amount (Rs.)</th>
												<th>Transaction No</th>
												<th>Status</th>
												<th>Date</th>
												<th>Invoice</th>
											</tr>
									</thead>
										<tbody>
											<?php $sr = 1; foreach ($studentfeeD as $key => $studentfeeDR) {	?>	
											<tr>
												<td><?= $sr; ?></td>
												<td><?= $studentfeeDR->program;?></td>
												<td><?= $studentfeeDR->fee_amt;?></td>
												<td><?= $studentfeeDR->bank_trans_id;?></td>
												<td><?= $studentfeeDR->bank_remark;?></td>
												
												<td><?= date('d-m-Y',strtotime($studentfeeDR->created));?></td>
												<?php if($studentfeeDR->bank_remark=='Transaction Successful') { ?>
												<td><a href="<?= site_url('payment-invoice/'.$studentfeeDR->id);?>" target="_blank"><button type="button" class="btn btn-sm btn-success">Download Invoice</button></a>
													
												</td>
											<?php } else { ?>
												<td>NA</td>
											<?php } ?>
											</tr>
											<?php $sr++; } ?>
										</tbody>											
									</table></div>
								</div>
							</div>
						</div>
					</div>
					</form>
					
					
				</div>
			</main>
    </div>
  </div>
</section>
     