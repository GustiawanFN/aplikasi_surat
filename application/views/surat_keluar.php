<?php
$this->load->view('admin/template/header');
?>
<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<?php
$this->load->view('admin/template/topbar');
$this->load->view('admin/template/sidebar');
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="margin-bottom:0px;background-color:#dfe1e2; padding-bottom:10px">
  <h1 style="">
    Surat Keluar
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo site_url('admin') ?>"><i class="fa fa-home"></i> Home</a></li>
    <li class="active"><i class="fa fa-envelope"></i> Surat Keluar</li>
  </ol>
</section>

<section class="content">
  <table class="table table-bordered" cellspacing="0" style="margin-bottom:0px;">
    <thead>
      <tr>
        <td colspan="3" style="padding-left:0px;">
          <form class="navbar-form" action="<?php echo site_url('surat_keluar/search_keyword'); ?>" method="post" role="search" style="padding-left:0px;" method="post">
            <div class="input-group add-on">
              <input class="form-control" name="keyword" type="date" size="55" required>
              <div class="input-group-btn">
                <button class="btn btn-default" type="submit" value="Search"><i class="glyphicon glyphicon-search"></i></button>
              </div>
            </div>
          </form>
        </td>
        <td colspan="6" align="right" style="padding-right:0px;">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
        </td>
      </tr>
      <tr style="background-color:#3c8dbc; color:white;">
        <th style="text-align: center; width:10px; ">No.</th>
        <th style="text-align: center;">Nomor Surat</th>
        <th style="text-align: center;">Tanggal</th>
        <th style="text-align: center;">Pengirim</th>
        <th style="text-align: center;">Tujuan</th>
        <th style="text-align: center;">Perihal</th>
        <th style="text-align: center;">Lampiran</th>
        <th style="text-align: center;">Dokumen</th>
        <th style="text-align: center;" colspan="2">Aksi</th>
      </tr>
      <?php
      $no = $this->uri->segment('3') + 1;
      // var_dump($user);
      if (count($user) > 0) {
        foreach ($user as $key) {
      ?>
          <tr style="background-color:#dfe1e2; color:black;">
            <td style="text-align: center;"><?php echo $no++; ?></td>
            <td style="text-align: center;"><?php echo $key->no_surat ?></td>
            <td style="text-align: center;"><?php echo $key->tanggal ?></td>
            <td style="text-align: center;"><?php echo $key->pengirim ?></td>
            <td style="text-align: center;"><?php echo $key->tujuan ?></td>
            <td style="text-align: center;"><?php echo $key->perihal ?></td>
            <td style="text-align: center;"><?php echo $key->lampiran ?></td>
            <td> 
              <a href="<?php echo base_url(); ?>uploads/surat_keluar/<?php echo $key->no_surat . ".pdf"?>" target="_blank">
                <img style="width: 30px; " src="<?php echo base_url() . 'assets/pdf.png' ?>">
              </a>
            </td>
            <td style="text-align: center;">
              <a href="<?php echo base_url(); ?>surat_keluar/update/<?php echo $key->id ?>" class="btn btn-info btn-warning btn-xs">
                <span class="glyphicon glyphicon-pencil"></span>
              </a>
            </td>
            <td style="text-align: center;">
              <a href="<?php echo base_url(); ?>surat_keluar/delete/<?php echo $key->id ?>" class="btn btn-info btn-danger btn-xs">
                <span class="glyphicon glyphicon-trash"></span>
              </a>
            </td>
    </thead>
  <?php }
      } else { ?>
  <tr>
    <td colspan="8" align="center">
      Data Tidak ditemukan
    </td>
  </tr>
<?php
      } ?>
  </table>
  <?php
  echo $this->pagination->create_links();
  ?>

  <!-- modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="alert alert-info" id="exampleModalLabel">
            <h3 align="center">Data Surat keluar</h3>
          </div>

        </div>
        <div class="modal-body">
          <div class="form-group">
          <?php echo form_open_multipart('surat_keluar/action_add'); ?>
          <form action="" method="post" name="berkas" enctype="multipart/form-data">
              <label for="exampleInputEmail1">Nomor Surat</label>
              <input type="text" class="form-control" name="no_surat" placeholder="Nomor Surat Masuk" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Tanggal</label>
            <input type="date" class="form-control" name="tanggal" placeholder="Tanggal" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Pengirim</label>
            <input type="text" class="form-control" name="pengirim" placeholder="Nama Pengirim Surat" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Tujuan</label>
            <input type="text" class="form-control" name="tujuan" placeholder="Tujuan Pengirim" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Perihal</label>
            <input type="text" class="form-control" name="perihal" placeholder="Perihal Surat" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Lampiran</label>
            <input type="text" class="form-control" name="lampiran" placeholder="Jumlah Lampiran Surat" autocomplete="off" required>
          </div>
          <div class="form-group g-mb-25">
            <label for="exampleInputFile">Lampirkan File PDF</label>
            <input type="file" class="form-control-file" name="userfile">
            <small id="fileHelp" class="form-text text-muted">Upload file PDF.</small>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
  <br /><br />
  </div>
</section>

<?php
$this->load->view('admin/template/footer');
?>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Create the tabs -->
  <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <!-- Home tab content -->
    <div class="tab-pane" id="control-sidebar-home-tab">

      </a>
      </li>
      </ul>
    </div>
  </div>
</aside>

<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
   immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="<?php echo base_url() ?>assets/template/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url() ?>assets/template/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>assets/template/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url() ?>assets/template/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url() ?>assets/template/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url() ?>assets/template/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url() ?>assets/template/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url() ?>assets/template/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url() ?>assets/template/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url() ?>assets/template/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/template/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url() ?>assets/template/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url() ?>assets/template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url() ?>assets/template/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>assets/template/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url() ?>assets/template/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/template/dist/js/demo.js"></script>
</body>

</html>