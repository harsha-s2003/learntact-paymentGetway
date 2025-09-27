<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= site_url('Dashboard')?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Manage User</li>
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
                <h3 class="card-title">Manage User List</h3>
                <a class="btn btn-primary btn-sm" href="<?= site_url('Users/addUser');?>" style="float: right;"><i class="fas fa-plus"></i>&nbsp;Add</a>  
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>School</th>
                    <th>Password</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $sr=1;
                      foreach ($user as $category) { ?>
                        
                  <tr>
                    <td><?= $sr;?></td>
                    <td><?= $category->fullname;?></td>
                    <td><?= $category->email;?></td>
                    <td><?= $category->mobile;?></td>
                    <td><?= $category->school;?></td>
                    <td><?= $category->show_password;?></td>
                    <td><?= $category->status;?></td>
                    <td class="project-actions text-right">
                      <a class="btn btn-info btn-sm" href="<?= site_url('Users/edit/'.$category->id);?>">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <a class="btn btn-danger btn-sm" href="<?= site_url("Users/del/".$category->id);?>" onclick="return confirm('Are you sure you want to delete this record?');">
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
  <!-- /.content-wrapper -->