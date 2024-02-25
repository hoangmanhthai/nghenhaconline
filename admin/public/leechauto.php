<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Bài Viết Mới</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Bài Viết Mới</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">leech linh tinh</h3>
              </div>
              <!-- form start -->
              <form id="leechauto_acaivippro" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label>Link bài:</label>
                    <input type="text" name="link" class="form-control" id="link" placeholder="link bài viết">
                  </div>
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" id="leechauto_submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Bài Viết Mới</h3>
              </div>
              <!-- form start -->
              <form id="newpost_acaivippro" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label>Tiêu Đề</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Tiêu đề bài viết">
                  </div>
                  <div class="form-group">
                    <label>Mô Tả</label>
                    <input type="text" name="description" class="form-control" id="description" placeholder="Mô tả bài viết">
                  </div>
                  <div class="form-group">
                    <label>Ảnh Đại Diện</label>
                    <input type="text" name="images" class="form-control" id="images" placeholder="Ảnh Đại Diện">
                  </div>
                  <div class="form-group">
                    <label>Link video</label>
                    <input type="text" name="xvideos" class="form-control" id="xvideos" placeholder="Link video">
                  </div>
                  <div class="form-group">
                  <label>Chuyên Mục Chính</label>
                  <select class="form-control select2" name="category" style="width: 100%;">
                   <?php foreach ($ACAIVIPPRO->get_list("SELECT * FROM `category` WHERE `hidden`='0' ORDER BY `id` DESC") as $cate) : ?>
                    <option value="<?=$cate['id'];?>" <?php if($cate['id'] == 3){echo "selected";}?>><?=$cate['title'];?></option>
                    	<?php endforeach;?>
                  </select>
                </div>
                   <div class="form-group">
                  <label>Chuyên Mục Tag Bài</label>
                  <select class="select2" name="category2[]" id="category2" multiple="multiple" data-placeholder="Chọn Chuyên Mục Tag Bài" style="width: 100%;">
                      <?php foreach ($ACAIVIPPRO->get_list("SELECT * FROM `category` WHERE `hidden`='0' ORDER BY `id` DESC") as $cate) : ?>
                    <option value="<?=$cate['id'];?>" <?php if($cate['id'] == 3 || $cate['id'] == 4 ||$cate['id'] == 7 ||$cate['id'] == 8 ){echo "selected";}?>><?=$cate['title'];?></option>
                    	<?php endforeach;?>
                  </select>
                </div>
                <div class="form-group">
                    <label>Tag bài viết</label>
                    <input type="text" name="tag" class="form-control" id="tag" placeholder="Tag bài viết cách nhau bởi dấu ,">
                  </div>
                <div class="form-group">
                    <label>Nội Dung Bài Viết</label>
                    <textarea type="text" name="content" rows="10" class="form-control" id="content" placeholder="content bài viết"></textarea>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" id="newpost_submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="js/acaivippro.js"></script>
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
<!-- Page specific script -->
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2();
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()
  })
</script>