<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Home</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.css" rel="stylesheet">
    <link href="dist/css/navbar.css" rel="stylesheet">
    <link href="dist/css/sampul.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
  </head>

  <body>

    

    <main role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      
      <div class="header">
        <div class="row">
          <div class="col-md-2">
            <img src="logo/logo-esdm.png" class="logo-kiri">
          </div>
          <div class="col-md-8">
            <h3 class="judul">
              Peminjaman Barang <br>
              Pendataan Barang dan Transaksi Peminjaman <br>
              
            </h3>
            <h2 class="judul">
              DINAS ENERGI DAN SUMBER DAYA MINERAL
            </h2>
          </div>
          <div class="col-md-2">
            <img src="logo/Logo-Jateng.png" class="logo-kanan">
          </div>
        </div>
        
      </div>


      <div id="navbar">
        <a class="" href="javascript:void(0)">Home</a>
        <a href="javascript:void(0)">News</a>
        <a href="javascript:void(0)">Contact</a>
      </div>

      <div class="awak">
        <div class="content">
          <div class="row">
            <div class="col-md-8">
              <div class="bodikiri"></div>
            </div>
            <div class="col-md-4">
              <div class="bodikanan"></div>
            </div>
          </div>
        </div>

      </div>

      

      

    </main>

    <footer class="container">
      <p>&copy; team dinus</p>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
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
