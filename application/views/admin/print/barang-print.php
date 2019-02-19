    <body onload="window.print();">
        <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center text-uppercase text-secondary mb-0">
                        DATA BARANG<br>
                        Dinas Energi dan Sumber Daya Mineral<br>Provinsi Jawa Tengah <br>
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            
            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Kode Barang</th>
                                <th>Merk</th>
                                <th>Jumlah</th>
                                <th>Tersedia</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach($tabel_record as $row){ ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row->kode_barang ?></td>
                                    <td><?php echo $row->nama_barang ?></td>
                                    <td><?php echo $row->merk ?></td>
                                    <td><?php echo $row->jml_barang ?></td>
                                    <td><?php echo $row->jml_tersedia ?></td>                        
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
