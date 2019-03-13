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
                <div class="col-2">
                    <img src="<?= base_url()?>admin-lte-master/dist/img/Logo-Jateng.png" class="mx-auto " width="200px" height="130px">
                </div>
                <div class="col-8">
                    <h3 class="text-center mb-0">
                    DATA BARANG<br>
                        Dinas Energi Sumber Daya dan Mineral<br>Provinsi Jawa Tengah <br><br>
                    </h3>
                </div>
                <div class="col-2">   
                </div>
                <!-- /.col -->
            </div>
            <!-- Table row -->
            <div style="margin-top:50px;" class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width:25px;">No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
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
