<!-- First Container -->
<div class="container-fluid bg-2 text-center">
    <h3 class="margin">Pencarian</h3>
        <form class="form-inline">
            <div class="input-group">
                <input type="email" class="form-control" size="50" placeholder="Cari . . . . ." required>
                <div class="input-group-btn">
                    <button type="button" class="btn btn-danger">Cari</button>
                </div>
            </div>
        </form>
    <h3></h3>
</div>

<!-- Second Container -->
<div class="container-fluid bg-1 text-center">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Barang</h3>
            </div>
            
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode barang</th>
                            <th>Nama Barang</th>
                            <th>Tersedia</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach($tabel_record as $row){ ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row->kode_barang ?></td>
                                <td><?php echo $row->nama_barang ?></td>
                                <td><?php echo $row->jml_tersedia ?></td>
                                <?php $i++; ?>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-2">
    </div>
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Peminjaman</h3>
              
            </div>
            
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Peminjam</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Barang</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach($tabel_record as $row){ ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row->nama_barang ?></td>
                                <td><?php echo $row->nama_barang ?></td>
                                <td><?php echo $row->jml_tersedia ?></td>
                                <?php $i++; ?>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Third Container (Grid) -->
<div class="container-fluid bg-3 text-center">    
    <h3 class="margin">Where To Find Me?</h3><br>
        <div class="row">
            <div class="col-sm-4">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div class="col-sm-4"> 
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div class="col-sm-4"> 
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </div>
    </div>
</div>
