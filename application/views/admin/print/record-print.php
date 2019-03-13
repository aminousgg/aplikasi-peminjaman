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
                    DATA RECORD<br>
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
                                <th>Nama</th>
                                <th>Barang</th>
                                <th>Jumlah Pinjam</th>
                                <th>Jumlah Kembali</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach($tabel_record as $row){ ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row->kd_pjm ?></td>
                                    <td><?php 
                                        $anggota=$this->db->get_where('anggota',array('nip'=>$row->nip));
                                        $hsl=$anggota->row_array();
                                        echo $hsl['nama'];
                                    ?></td>
                                    <td><?php
                                        $brg=$this->db->get_where('barang',array('kode_barang'=>$row->kd_brg));
                                        $hsl1=$brg->row_array();
                                        echo $hsl1['nama_barang'];
                                    ?></td>
                                    <td><?php echo $row->jml_pjm ?></td>
                                    <td><?php echo $row->jml_kmbl ?></td>
                                    <td><?php echo $row->status ?></td>                        
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
