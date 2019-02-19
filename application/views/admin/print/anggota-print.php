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
                    <h2 class="text-center text-uppercase text-secondary mb-0">
                    DATA ANGGOTA<br>
                        Dinas Energi dan Sumber Daya Mineral<br>Provinsi Jawa Tengah <br><br>
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
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Pangkat/Golongan</th>
                                <th>Bidang</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach($tabel_record as $row){ ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row->nip ?></td>
                                    <td><?php echo $row->nama ?></td>
                                    <td><?php echo $row->jabatan ?></td>
                                    <td><?php echo $row->pangkat_golongan ?></td>
                                    <td><?php echo $row->seksi ?></td>                        
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
