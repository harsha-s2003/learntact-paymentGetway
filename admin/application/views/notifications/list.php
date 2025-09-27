
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Notifications</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= site_url('Dashboard')?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Notifications</li>
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
                <h3 class="card-title">Notifications List</h3>
                <a class="btn btn-primary btn-sm" href="<?= site_url('Notifications/addNotification');?>" style="float: right;"><i class="fas fa-plus"></i>&nbsp;Add</a>  
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
                    <th>Title</th>
                    <th>Description</th>
                    <th>Attachment</th>
                   <!--  <th>Date</th>
                    <th>Author</th>
                    <th>Author designation</th> -->
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $sr=1;
                      foreach ($notificationsData as $notification) { 
                        //$getGallery = $this->Common_model->get_multiple_record("gallery","category_id='".$category->id."'");
                        ?>
                  <tr>
                    <td><?= $sr;?></td>
                    <td><?= $notification->title;?></td>
                    <td><?= $notification->description;?></td>
                    
                    <td>
                      <a href="<?= base_url('assets/uploads/notifications/'.$notification->attachment);?>" target="_blank">View</a>
                    </td>
                    <!-- <td><?= $notification->date;?></td>
                    <td><?= $notification->author;?></td>
                    <td><?= $notification->author_designation;?></td> -->
                    <td><?= $notification->status;?></td>
                    <td class="project-actions text-right">
                      
                        <a class="btn btn-info btn-sm" href="<?= site_url('Notifications/editNotification/'.$notification->id);?>">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <a class="btn btn-danger btn-sm" href="<?= site_url("Notifications/delNotification/".$notification->id);?>" onclick="return confirm('Are you sure you want to delete this record?');">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </a>
                    </td> 
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