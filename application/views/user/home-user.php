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
          <div class="col-md-4">
            <div class="card card-primary">
              <div class="card-body p-0">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /. box -->
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

      

      

    </main>