<style>
@page {
    size:  auto;
    margin-top: 50px;
    margin-bottom: 50px;

}
</style>
<body onload="window.print();">
        <div class="wrapper">
        <br>
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
            </div>
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center mb-0">
                    Log Peminjaman Barang<br>
                        Dinas Energi dan Sumber Daya Mineral<br>Provinsi Jawa Tengah <br><br>
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Pinjam</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Nama Barang</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach($tabel_record as $row){ ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row->kd_pinjam ?></td>
                                    <td><?php echo $row->nip ?></td>
                                    <td><?php echo $row->nama ?></td>
                                    <td><?php echo $row->nama_barang ?></td>
                                    <td><?php echo $row->tgl_pinjam ?></td>
                                    <td><?php echo $row->tgl_kembali ?></td>                        
                                    <?php $i++; ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
        </div>
    <!-- ./wrapper -->
    </body>
</html>
