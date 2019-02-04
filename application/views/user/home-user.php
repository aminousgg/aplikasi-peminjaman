<div class="awak">
  <div class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="bodikiri">
          <div class="col-md-1">
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Barang</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
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
          <div class="col-md-1">
          </div>
          <br>
          <div class="col-md-1">
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Peminjaman</h3>
              </div>
            
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
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
      </div>
      <div class="col-md-4">
        <div class="bodikanan">
          <div class="card bg-light-gradient">
            <div class="card-header no-border">
              <h3 class="card-title">
                <i class="fa fa-calendar"></i>
                Calendar
              </h3>
              <!-- tools card -->
              <div class="card-tools">
                <!-- button with a dropdown -->
                <div class="btn-group">
                  <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bars"></i></button>
                  <div class="dropdown-menu float-right" role="menu">
                    <a href="#" class="dropdown-item">Add new event</a>
                    <a href="#" class="dropdown-item">Clear events</a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">View calendar</a>
                  </div>
                </div>
                <button type="button" class="btn btn-success btn-sm" data-widget="collapse">
                  <i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-widget="remove">
                  <i class="fa fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"></div>
            </div>
              <!-- /.card-body -->
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

      

      

    </main>