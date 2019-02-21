<body onload="window.print();">
        <div class="wrapper">
        <br>
        <!-- Main content -->
        <section style="margin-top:20px;" class="invoice">
            <!-- title row -->
            <div class="row">
            </div>
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center text-uppercase text-secondary mb-0">
                    BUKTI PEMINJAMAN BARANG<br>
                        Dinas Energi dan Sumber Daya Mineral<br>Provinsi Jawa Tengah <br><br>
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <div class="row invoice-info" id="<?php echo $row['kd_pjm'] ?>">
                <div class="col-md-4">
                    Kode Pinjam <br>
                    Nama Peminjam <br>
                    NIP <br>
                    Tanggal Pinjam <br>
                    Estimasi Kembali <br>
                    Petugas <br>
                </div>
                <div class="col-md-4">
                    &nbsp;:&nbsp;<?php echo $row['kd_pjm'] ?><br>
                    &nbsp;:&nbsp;<?php
                        $nama=$this->db->get_where('pinjam_barang', array('kd_pinjam'=>$row['kd_pjm']))->row_array();
                        echo $nama['nama'];
                    ?><br>
                    &nbsp;:&nbsp;<?php echo $row['nip'] ?><br>
                    &nbsp;:&nbsp;<?php echo $row['tgl_pjm'] ?><br>
                    &nbsp;:&nbsp;<?php echo $row['estimate_kmbl'] ?><br>
                    &nbsp;:&nbsp;<?php echo $row['ptgs_pjm'] ?><br>
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
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Jumlah Pinjam</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach($tabel_record as $row){ ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row->kode_barang ?></td>
                                    <td><?php echo $row->nama_barang ?></td>
                                    <td><?php echo $row->jml_pinjam ?></td>
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
