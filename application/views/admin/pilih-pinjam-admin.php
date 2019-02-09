<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>Data <?php //echo $judul; ?></h1> -->
            <!-- <div>
              <button class="btn btn-info" type="button">
                <i class="ion ion-android-add"></i>
              </button>
              Tambah Barang
            </div> -->
          </div>
          
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data </li>
            </ol> -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-8">
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Pilih barang yg akan dipinjam</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th>Nama Barang</th>
                  <th>Merk</th>
                  <th>Jumlah</th>
                  <th>Tersedia</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i=1; foreach($tabel_record as $row){ ?>
                  <tr>
                    
                    <td><?= $row->nama_barang ?></td>
                    <td><?php echo $row->merk ?></td>
                    <td><?php echo $row->jml_barang ?></td>

                    <?php if($row->jml_tersedia==0){ ?>
                      <td style="color:red;"><?php echo $row->jml_tersedia ?></td>
                      <td>
                        <button style="cursor: not-allowed;" type="button" class="btn btn-info">pilih</button>
                      </td>

                    <?php } else { ?>
                      <td><?php echo $row->jml_tersedia ?></td>
                      <td>
                        <button data-kode="<?= $row->kode_barang ?>" data-nama="<?= $row->nama_barang ?>" type="button" class="add-to-cart btn btn-info">pilih</button>
                      </td>
                    <?php } ?>
                    <?php $i++; ?>
                  </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  
                  <th>Nama Barang</th>
                  <th>Merk</th>
                  <th>Jumlah</th>
                  <th>Tersedia</th>
                  <th>Aksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-4">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Daftar pinjam</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse">
                  <i class="fa fa-minus"></i>
                </button>
                <button type="button" id="clear-cart" class="btn btn-tool">
                  Clear
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <ul id="show-cart" class="products-list product-list-in-card pl-2 pr-2">
                <li class="item">
                  <!-- <div class="product-img">
                    <img src="" alt="Image" class="img-size-50">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">Samsung TV</a>
                    <span class="product-description">
                      Samsung 32" 1080p 60Hz LED Smart HDTV.
                    </span>
                  </div> -->???
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center">
              <button type="button" class="btn btn-success">Pinjam</button>
            </div>
            <!-- /.card-footer -->
          </div>
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<!-- <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script> -->
<script src="<?php echo base_url() ?>admin-lte-master/pesan/js/shoppingCart.js"></script>
<script>

    $(".add-to-cart").click(function(event){
        event.preventDefault();
        var name = $(this).attr("data-nama");
        var price = Number($(this).attr("data-kode"));
        //alert('asdas');
        shoppingCart.addItemToCart(name, price, 1);
        displayCart();
    });

    $("#clear-cart").click(function(event){
        shoppingCart.clearCart();
        displayCart();
    });

    function displayCart() {
        var cartArray = shoppingCart.listCart();
        console.log(cartArray);
        var output = "";

        for (var i in cartArray) {
            output += "<li class='item'>"
                +"<div class='product-info'><div class='row'>"
                +"<div class='col-4'>"+cartArray[i].name+"</div>"
                +"<div class='col-4'><input style='width:70px;' class='item-count' type='number' data-name='"
                +cartArray[i].name
                +"' value='"+cartArray[i].count+"' readonly ></div>"
                +"<div class='col-4'> <button class='plus-item' data-name='"
                +cartArray[i].name+"'>+</button>"
                +" <button class='subtract-item' data-name='"
                +cartArray[i].name+"'>-</button>"
                +" <button class='delete-item' data-name='"
                +cartArray[i].name+"'>batal</button></div>"
                +"</div></div></li>";
        }

        $("#show-cart").html(output);
        $("#count-cart").html( shoppingCart.countCart() );
        $("#total-cart").html( shoppingCart.totalCart() );
    }

    $("#show-cart").on("click", ".delete-item", function(event){
        var name = $(this).attr("data-name");
        shoppingCart.removeItemFromCartAll(name);
        displayCart();
    });

    $("#show-cart").on("click", ".subtract-item", function(event){
        var name = $(this).attr("data-name");
        shoppingCart.removeItemFromCart(name);
        displayCart();
    });

    $("#show-cart").on("click", ".plus-item", function(event){
        var name = $(this).attr("data-name");
        shoppingCart.addItemToCart(name, 0, 1);
        displayCart();
    });

    $("#show-cart").on("change", ".item-count", function(event){
        var name = $(this).attr("data-name");
        var count = Number($(this).val());
        shoppingCart.setCountForItem(name, count);
        displayCart();
    });

    displayCart();

</script>