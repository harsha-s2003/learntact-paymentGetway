<div class="content-wrapper">
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gallery</h1>
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
                    <?php if(empty($id)){ ?>
                    <div class="form-group">
                      <label for="inputDescription">Attachment<span class="red">*</span></label>
                      <input type="file" name="attachment" id="attachment" class="form-control" accept=".png, .jpg, .jpeg" required>
                    </div>
                  <?php }else{ ?>
                    <div class="form-group">
                      <label for="inputDescription">Attachment<span class="red">*</span></label>
                      <input type="file" name="attachment" id="attachment" class="form-control" accept=".png, .jpg, .jpeg" >
                    </div>
                    <img src="<?= base_url('assets/uploads/gallery_category/'.$attachment);?>" alt="img" style="width:150px;">
                  <?php } ?>
                </div>
                <div class="col-md-6">
                      <!-- <div class="form-group">
                        <label for="inputDescription">Project Description</label>
                        <textarea id="inputDescription" class="form-control" rows="4"></textarea>
                      </div> -->
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

 <script type="text/javascript">
    $(function(){
        $("#input-id").on('change', function(event) {
            var file = event.target.files[0];
            if(file.size>=2*1024*1024) {
                alert("JPG images of maximum 2MB");
                $("#form-id").get(0).reset(); //the tricky part is to "empty" the input file here I reset the form.
                return;
            }

            if(!file.type.match('image/jp.*')) {
                alert("only JPG images");
                $("#form-id").get(0).reset(); //the tricky part is to "empty" the input file here I reset the form.
                return;
            }

            var fileReader = new FileReader();
            fileReader.onload = function(e) {
                var int32View = new Uint8Array(e.target.result);
                //verify the magic number
                // for JPG is 0xFF 0xD8 0xFF 0xE0 (see https://en.wikipedia.org/wiki/List_of_file_signatures)
                if(int32View.length>4 && int32View[0]==0xFF && int32View[1]==0xD8 && int32View[2]==0xFF && int32View[3]==0xE0) {
                    alert("ok!");
                } else {
                    alert("only valid JPG images");
                    $("#form-id").get(0).reset(); //the tricky part is to "empty" the input file here I reset the form.
                    return;
                }
            };
            fileReader.readAsArrayBuffer(file);
        });
    });
</script>