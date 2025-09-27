<?php //print_r($school);exit;?>
<div class="content-wrapper">
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User</h1>
          </div>
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Project Add</li>
            </ol> -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"><?= $heading;?></h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <form method="post" action="<?= $action;?>" enctype='multipart/form-data'>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="inputName">Name<span class="red">*</span></label>
                      <input type="text" id="title" name="fullname" class="form-control" value="<?= $fullname;?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="inputName">Email<span class="red">*</span></label>
                      <input type="text" id="title" name="email" class="form-control" value="<?= $email;?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="inputName">Contact<span class="red">*</span></label>
                      <input type="text" id="title" name="mobile" class="form-control" value="<?= $mobile;?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="inputName">School<span class="red">*</span></label>
                      <select name="school" class="form-control">
                        <option value="">Select School</option>
<?php foreach ($school_list as $key => $schoolR) { ?>
          <option value="<?= $schoolR->school_name;?>" <?php if($schoolR->school_name==$school) { echo 'selected'; } ?>><?= $schoolR->school_name;?></option>
        <?php } ?>
                      </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="inputName">Password<span class="red">*</span></label>
                      <input type="text" id="title" name="password" class="form-control" value="<?= $show_password;?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="inputStatus">Status<span class="red">*</span></label>
                      <select id="status" class="form-control" name="status" required>
                        <option value="">--Select--</option>
                        <option value="Active" <?php if($status=='Active'){echo 'selected';}?>>Active</option>
                        <option value="Inactive" <?php if($status=='Inactive'){echo 'selected';}?>>Inactive</option>
                      </select>
                    </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="submit" value="<?= $btn;?>" class="btn btn-success">
                        <input type="hidden" name="id" id="id" value="<?= $id?>">
                        <a href="<?= site_url('Gallery');?>" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
                
              </div>
              
            </div>
          </form>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>        
      </div>
      </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 </div>