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
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i=1; foreach($tabel_record as $row){ ?>
                  <tr>
                    <td><?= $row->nama_barang ?></td>
                    <td><?php echo $row->merk ?></td>
                    <?php if($row->status==0){ ?>
                      <td style="color:red;"><?php echo "Terpinjam" ?></td>
                      <td>
                        <button style="cursor: not-allowed;" type="button" class="btn btn-info">pilih</button>
                      </td>
                    <?php } else { ?>
                      <td id="sedia<?= $row->kode_barang ?>"><?php echo "Tersedia" ?></td>
                      <td id="pilih<?= $row->kode_barang ?>">
                        <button data-sedia="<?= $row->status ?>" data-merk="<?= $row->merk ?>" data-kode="<?= $row->kode_barang ?>" data-nama="<?= $row->nama_barang ?>" type="button" class="add-to-cart btn btn-info">pilih</button>
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
                  <th>Status</th>
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
                  ???
                </li>
              </ul>
              <p style="margin-left: 20px; color: red;" id="maks"></p>
            </div>
            <!-- /.card-body -->
            <div id="tombol" class="card-footer text-center">
              <!-- <button type="button" class="btn btn-success">Pinjam</button> -->
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
        if(shoppingCart.listCart().length<5){ // maksimal pinjem 5
          event.preventDefault();
          var name = $(this).attr("data-nama");
          var price = Number($(this).attr("data-kode"));
          var sedia = Number($(this).attr("data-sedia"));
          var merk = $(this).attr("data-merk");
          shoppingCart.addItemToCart(name, sedia, price, 1, merk);
          displayCart();
        }else{
          var name = $(this).attr("data-nama");
          var price = Number($(this).attr("data-kode"));
          var sedia = Number($(this).attr("data-sedia"));
          shoppingCart.addItemToCart("",sedia, price, 1);
          //name, sedia, price, count
          displayCart();
        }
        
    });

    $("#clear-cart").click(function(event){
        shoppingCart.clearCart();
        $("#maks").html('');
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
                +"<div class='col-4'><input style='width:70px;' class='item-count' type='text' data-name='"
                +cartArray[i].name
                +"' value='"+cartArray[i].merk+"' disabled ></div>"
                +"<div class='col-4'>"
                +" <button class='delete-item' data-name='"
                +cartArray[i].price+"'>batal</button></div>"
                +"</div></div></li>";
        }
        if(cartArray.length!==0){
          var data = JSON.stringify(cartArray);
          $("#tombol").html("<form action='<?= base_url() ?>admin/form_pinjam' method='post'><button name='list' value='"+data+"' type='submit' class='btn btn-success'>Pinjam</button></form>");
          // $("#tombol").html(clicks);
          //$("#tombol").html(cartArray.length);
        }else{
          $("#tombol").html('');
        }
        if(cartArray.length==5){
          $("#maks").html('Maks Pinjam 5 jenis barang');
        }
        $("#show-cart").html(output);
        
        $("#count-cart").html( shoppingCart.countCart() );
        $("#total-cart").html( shoppingCart.totalCart() );

    }

    $("#show-cart").on("click", ".delete-item", function(event){
        var price = Number($(this).attr("data-name"));
        shoppingCart.removeItemFromCartAll(price);
        displayCart();
    });

    $("#show-cart").on("click", ".subtract-item", function(event){
        // var price = Number($(this).attr("data-name"));
        // shoppingCart.removeItemFromCart(price);
        // displayCart();
    });

    $("#show-cart").on("click", ".plus-item", function(event){
        var price = Number($(this).attr("data-name"));
        var sedia = Number($(this).attr("data-sedia"));
        //name, sedia, price, count
        displayCart();
    });

    $("#show-cart").on("change", ".item-count", function(event){
        var name = $(this).attr("data-name");
        var count = Number($(this).val());
        shoppingCart.setCountForItem(name, count);
        displayCart();
    });
    displayCart();
    function kirim(list){
      window.location.href="<?php echo base_url() ?>admin/tambah_pinjam/"+list;
    }
</script>