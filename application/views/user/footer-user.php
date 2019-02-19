 <!-- Footer -->
 <footer class="footer text-center">
    
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 style="margin-top: -70px;" class="text-center text-uppercase mb-0">Fitur</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Pinjam</h4>
          <p class="lead mb-0">Dapat meminjam barang dengan
            <br>lebih dari 1 jenis barang</p>
        </div>
        <div class="col-md-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Mengembalikan</h4>
          <p class="lead mb-0">Mengembalikan dengan 1x click
          <br>Serta pengembalian dapat per Jenis barang</p>
        </div>
        <div class="col-md-4">
          <h4 class="text-uppercase mb-4">Daftar Akun</h4>
          <p class="lead mb-0">Mendaftar dengan authentifikasi
          <br>Tanpa Repot</p>
        </div>
      </div>
    </div>
  </footer>

  <div class="copyright py-4 text-center text-white">
    <div class="container">
      <small>Copyright &copy; teamudinus 2019</small>
    </div>
  </div>

  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
  <div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
      <i class="fa fa-chevron-up"></i>
    </a>
  </div>



  <!-- Bootstrap core JavaScript -->

  <script src="<?php echo base_url() ?>user/vendor/jquery/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  <script src="<?php echo base_url() ?>user/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="<?php echo base_url() ?>user/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?php echo base_url() ?>user/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="<?php echo base_url() ?>user/js/jqBootstrapValidation.js"></script>
  <script src="<?php echo base_url() ?>user/js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="<?php echo base_url() ?>user/js/freelancer.min.js"></script>
  <script src="<?php echo base_url() ?>user/datatables/jquery.dataTables.js"></script>
  <script src="<?php echo base_url() ?>user/datatables/dataTables.bootstrap4.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
        var table = $('#example').DataTable( {
            fixedHeader: true
        } );
    } );

  </script>
<script src="<?php echo base_url() ?>user/css/cal.js" type="text/javascript"></script>
<script>
  window.addEventListener('load', function () {
    vanillaCalendar.init({
      disablePastDays: true
    });
  })
</script>

</body>

</html>
