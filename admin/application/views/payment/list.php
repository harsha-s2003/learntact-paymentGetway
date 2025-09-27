
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Student Program Fees</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= site_url('Dashboard')?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Manage Student Program Fees</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Manage Student Program Fees List</h3>
               <!--  <a class="btn btn-primary btn-sm" href="<?= site_url('Payments/addUser');?>" style="float: right;"><i class="fas fa-plus"></i>&nbsp;Add</a> -->  
                <?php if($this->session->flashdata('message')) { $message = $this->session->flashdata('message'); ?>
                    <center><span class="green"><?php echo $message; ?></span></center>
                <?php } ?>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr. No.</th>
                    <th>Student Name</th>
                    <th>Student Mobile</th>
                    <th>Program</th>
                    <th>Program Fees</th>
                    <th>Invoice No</th>
                    <th>Transation No</th>
                    <th>Status</th>
                    <th>PDate</th>
                    <th>Cdate</th>
                     <!-- <th>Action</th> -->
                  </tr>
                  </thead>
                  <tbody>
                    <?php $sr=1;
                      foreach ($studentData as $studentDataR) { 
                   $pdate = date('d-m-Y', strtotime($studentDataR->payment_date));
                   $cdate = date('d-m-Y', strtotime($studentDataR->created));
            if($pdate== $cdate) {             
$row = $this->Common_model->get_single_record("student_reg","id='".$studentDataR->student_id."'");
                        ?>
                  <tr>
                    <td><?= $sr;?></td>
                    <td><?= $row->name;?></td>
                    <td><?= $row->mobile;?></td>
                    <td><?= $studentDataR->program;?></td>
                    <td><?= $studentDataR->fee_amt;?></td>
                    <td><?= $studentDataR->transation_id;?></td>
                    <td><?= $studentDataR->bank_trans_id;?></td>
                    <td><?= $studentDataR->bank_remark;?></td>
                    <td><?= $pdate;?></td>
                    <td><?= $cdate;?></td>
                    <!-- <td><?php if($studentDataR->status=='A') { ?>
                      <a href="<?= site_url('Payments/status/A/'.$studentDataR->id);?>"><button class="btn-success">Active</button></a>
                      <?php } else { ?>
                      <a href="<?= site_url('Payments/status/I/'.$studentDataR->id);?>"><button class="btn-danger">Iactive</button></a>
                      <?php } ?>                        
                      </td>   -->
                   <!--  <td class="project-actions text-right">
                      <a class="btn btn-info btn-sm" href="<?= site_url('Payments/edit/'.$studentDataR->id);?>">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                      </td>    -->                    
                  </tr>
                  <?php $sr++; 
                        } }?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper