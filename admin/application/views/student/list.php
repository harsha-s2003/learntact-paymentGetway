
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Student</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= site_url('Dashboard')?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Manage Student</li>
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
                <h3 class="card-title">Manage Student List(<?php if($_SESSION['Adcc_Pay']['type']!='Admin') { echo $_SESSION['Adcc_Pay']['location']; } ?>)</h3>
                <!-- <a class="btn btn-primary btn-sm" href="<?= site_url('Notifications/addNotification');?>" style="float: right;"><i class="fas fa-plus"></i>&nbsp;Add</a>  
                <?php if($this->session->flashdata('message')) { $message = $this->session->flashdata('message'); ?>
                    <center><span class="green"><?php echo $message; ?></span></center>
                <?php } ?> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr. No.</th>
                    <th>Name</th>
                    <th>Mobile Number</th>
                    <th>Class</th>
                    <th>Program Name</th>
                    <?php if($_SESSION['Adcc_Pay']['type']=='Admin') { ?>
                    <th>School</th>
                  <?php } ?>
                    <th>Status</th>                 
                    <th>Date</th>                
                  </tr>
                  </thead>
                  <tbody>
                    <?php $sr=1;
                      foreach ($studentData as $studentDataR) { 

if($studentDataR->school==$_SESSION['Adcc_Pay']['location']) {
                        ?>
                  <tr>
                    <td><?= $sr;?></td>
                    <td><?= $studentDataR->name;?></td>
                    <td><?= $studentDataR->mobile;?></td>
                    <td><?= $studentDataR->class;?></td>
                    <td><?= $studentDataR->program;?></td>
                    <?php if($_SESSION['Adcc_Pay']['type']=='Admin') { ?>
                    <td><?= $studentDataR->school;?></td>
                    <?php } ?>
                    <td><?php if($studentDataR->status=='I') { ?>
                      <button class="btn-danger">Inactive</button>
                      <?php } else { ?>
                      <button class="btn-success">Active</button>
                      <?php } ?>                        
                      </td>
                    <td><?= date('d-m-Y',strtotime($studentDataR->created));?></td>                 
                  </tr>
                  <?php $sr++; 
                        } } ?>
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