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
                      <label for="inputName">Student Name<span class="red">*</span></label>
                      <select name="student_name" class="form-control" required>
                        <option value="">Select Student</option>
<?php foreach ($student as $key => $studentR) { ?>
          <option value="<?= $studentR->name;?>" <?php if($studentR->name==$student_name) { echo 'selected'; } ?>><?= $studentR->name;?></option>
        <?php } ?>
                      </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="inputName">Program<span class="red">*</span></label>
                      <select name="program" class="form-control" required>
                        <option value="">Select Program</option>
<?php foreach ($p_list as $key => $pR) { ?>
          <option value="<?= $pR->program_name;?>" <?php if($pR->program_name==$program) { echo 'selected'; } ?>><?= $pR->program_name;?></option>
        <?php } ?>
                      </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="inputName">Program Fees<span class="red">*</span></label>
                      <input type="text" id="title" name="program_fee" class="form-control" value="<?= $program_fee;?>" required>
                    </div>
                </div>
               
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="inputName">Installment-1<span class="red">*</span></label>
                      <input type="text" id="title" name="install_1" class="form-control" value="<?= $install_1;?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="inputName">Installment-2<span class="red">*</span></label>
                      <input type="text" id="title" name="install_2" class="form-control" value="<?= $install_2;?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="inputName">Installment-3<span class="red">*</span></label>
                      <input type="text" id="title" name="install_3" class="form-control" value="<?= $install_3;?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="inputName">Installment-4<span class="red">*</span></label>
                      <input type="text" id="title" name="install_4" class="form-control" value="<?= $install_4;?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="inputStatus">Status<span class="red">*</span></label>
                      <select id="status" class="form-control" name="status" required>
                        <option value="">--Select--</option>
                        <option value="A" <?php if($status=='A'){echo 'selected';}?>>Active</option>
                        <option value="I" <?php if($status=='I'){echo 'selected';}?>>Inactive</option>
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