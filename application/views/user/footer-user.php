<footer class="container-fluid bg-4 text-center">
<strong>Copyright &copy; 2019 <a href="http://adminlte.io">Power By AdminLTE</a>.</strong>
    Team Udinus
    </div></footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="<?php echo base_url()?>user/assets/js/vendor/popper.min.js"></script>
    <script src="<?php echo base_url()?>user/dist/js/bootstrap.min.js"></script>
    <script>
      window.onscroll = function() {myFunction()};

      var navbar = document.getElementById("navbar");
      var sticky = navbar.offsetTop;

      function myFunction() {
        if (window.pageYOffset >= sticky) {
          navbar.classList.add("sticky")
        } else {
          navbar.classList.remove("sticky");
        }
      }
    </script>


  </body>
</html>
