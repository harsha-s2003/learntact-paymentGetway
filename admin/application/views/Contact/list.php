
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Contact</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= site_url('Dashboard')?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Contact</li>
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
                <h3 class="card-title">Contact List</h3>
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
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Mobile Number</th>
                    <th>Email</th>
                    <th>Message</th>
                    <!-- <th>Age</th>           
                    <th>Preferred Date</th>-->                 
                    <th>Date</th>                
                  </tr>
                  </thead>
                  <tbody>
                    <?php $sr=1;
                      foreach ($ContactData as $notification) { 
                        //$getGallery = $this->Common_model->get_multiple_record("gallery","category_id='".$category->id."'");
                        ?>
                  <tr>
                    <td><?= $sr;?></td>
                    <td><?= $notification->first_name;?></td>
                    <td><?= $notification->last_name;?></td>
                    <td><?= $notification->mobile_no;?></td>
                    <td><?= $notification->email;?></td>
                    <td><?= $notification->message;?></td>
                   <!--  <td><?= $notification->age;?></td>
                    <td><?= $notification->preferred_date;?></td> -->
                    <td><?= date('d-m-Y',strtotime($notification->created));?></td>
                  
                  </tr>
                  <?php $sr++; 
                        } ?>
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