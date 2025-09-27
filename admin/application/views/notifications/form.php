<div class="content-wrapper">
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Notifications</h1>
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
                      <label for="inputName">Title<span class="red">*</span></label>
                      <input type="text" id="title" name="title" class="form-control" value="<?= $title;?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <?php if(empty($id)){ ?>
                    <div class="form-group">
                      <label for="inputDescription">Attachment<span class="red">*</span></label>
                      <input type="file" name="attachment" id="attachment" class="form-control" required>
                    </div>
                  <?php }else{ ?>
                    <div class="form-group">
                      <label for="inputDescription">Attachment<span class="red">*</span></label>
                      <input type="file" name="attachment" id="attachment" class="form-control" <?php if(empty($attachment)){ ?> required <?php } ?>>
                    </div>
                    <?php if(!empty($attachment)){?>
                    <span>
                      <a href="<?= base_url('assets/uploads/notifications/'.$attachment);?>" target="_blank">View</a> 
                      | 
                      <a href="<?= site_url('Notifications/deleteAttachment/'.$id);?>" onclick="return confirm('Are you sure you want to delete this record?');">Delete Attachment</a>
                    </span>
                    <?php } ?>
                    <!-- <img src="<?= base_url('assets/uploads/blog/'.$attachment);?>" alt="img" style="width:150px;"> -->
                  <?php } ?>
                </div>
              </div>

             
              <div class="row">
                <!-- <div class="col-md-6">
                    <div class="form-group">
                      <label for="inputStatus">Date<span class="red">*</span></label>
                      <input type="text" name="date" id="date" class="form-control" placeholder="DD-MM-YY" value="<?= $date;?>" required>
                    </div>
                </div> -->
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
                <div class="col-md-12">
                  <div class="form-group">
                      <label for="inputStatus">Description<span class="red">*</span></label>
                      <textarea name="description" id="description" class="form-control" ><?= $description;?></textarea>
                  </div>
                    
                </div>
                
              </div>

              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="submit" value="<?= $btn;?>" class="btn btn-success">
                        <input type="hidden" name="id" id="id" value="<?= $id?>">
                        <a href="<?= site_url('Notifications');?>" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
                
              </div>
              
            </div>
          </form>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Budget</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputEstimatedBudget">Estimated budget</label>
                <input type="number" id="inputEstimatedBudget" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputSpentBudget">Total amount spent</label>
                <input type="number" id="inputSpentBudget" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputEstimatedDuration">Estimated project duration</label>
                <input type="number" id="inputEstimatedDuration" class="form-control">
              </div>
            </div>//card-body
            
          </div>//.card 
          
        </div> -->
      </div>
      <!-- <div class="row">
        <div class="col-12">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Create new Project" class="btn btn-success float-right">
        </div>
      </div> -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 </div>

 