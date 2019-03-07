 <!-- Footer -->


  <div class="copyright py-4 bg-info text-center text-white">
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
