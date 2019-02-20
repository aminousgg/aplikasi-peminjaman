  <footer class="main-footer">
    <strong>Copyright &copy; 2019 <a href="http://adminlte.io">Power By AdminLTE</a>.</strong>
    Team Udinus
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<!-- <script src="<?php echo base_url() ?>admin-lte-master/plugins/jquery/jquery.min.js"></script> -->
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url() ?>sijek/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>admin-lte-master/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url() ?>admin-lte-master/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url() ?>admin-lte-master/plugins/datatables/dataTables.bootstrap4.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php echo base_url() ?>admin-lte-master/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url() ?>admin-lte-master/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url() ?>admin-lte-master/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url() ?>admin-lte-master/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url() ?>admin-lte-master/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="<?php echo base_url() ?>admin-lte-master/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url() ?>admin-lte-master/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url() ?>admin-lte-master/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url() ?>admin-lte-master/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>admin-lte-master/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>admin-lte-master/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url() ?>admin-lte-master/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>admin-lte-master/dist/js/demo.js"></script>
<script src="<?php echo base_url() ?>admin-lte-master/plugins/fullcalendar/fullcalendar.min.js"></script>

  <!-- OPTIONAL SCRIPTS -->
  <!-- <script src="<?php echo base_url() ?>admin-lte-master/plugins/chart.js/Chart.min.js"></script>
<script src="<?php echo base_url() ?>admin-lte-master/dist/js/demo.js"></script>
<script src="<?php echo base_url() ?>admin-lte-master/dist/js/pages/dashboard3.js"></script> -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<!-- <script src="<?php echo base_url() ?>widget/bower_components/jquery/dist/jquery.min.js"></script> -->
<script>
	function filePreview(input) {
		if(input.files&&input.files[0]){
			var tipefile=/.\.(gif|jpg|png|jpeg)$/i;
			var namafile=input.files[0]['name'];
			var ukuran=input.files[0]['size'];
			if (!tipefile.test(namafile))
				$("#pesaneror").html('Only images are allowed!');
			else if (ukuran > 500000)
                $("#pesaneror").html('Your file is too big! Max allowed size is: 500KB');
            else{
            	var reader = new FileReader();
				reader.onload=function(e){
					$('#uploadForm + img').remove();
					$('#gambar').html('<img src="'+e.target.result+'" width="150px" height="150px" />')
				}
				reader.readAsDataURL(input.files[0]);
            }
		}
	}
	$('#file').change(function(){
		filePreview(this);
	});
</script>


</body>
</html>
