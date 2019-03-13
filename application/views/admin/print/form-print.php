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
                <div class="col-3">
                    <img src="<?= base_url()?>admin-lte-master/dist/img/Logo-Jateng.png" class="mx-auto " width="200px" height="130px">
                </div>
                <div class="col-6">
                    <h3 class="text-center text-uppercase mb-0 mt-20">
                    BUKTI PEMINJAMAN BARANG<br>
                        Dinas Energi Sumber Daya dan Mineral<br>Provinsi Jawa Tengah <br><br>
                    </h3>
                </div>
                <div class="col-3">
                    
                </div>
                <!-- /.col -->
            </div>
            <div class="row invoice-info" id="<?php echo $row['kd_pjm'] ?>">
              <div class="col-md-4">
                <table style="margin-bottom:30px; width:40%;">
                    <tr>
                        <td>Kode Pinjam</td>
                        <td> : </td>
                        <td><?php echo $row['kd_pjm'] ?></td>
                    </tr>
                    <tr>
                        <td>Nama Peminjam</td>
                        <td> : </td>
                        <td>
                            <?php
                                $nama=$this->db->get_where('pinjam_barang', array('kd_pinjam'=>$row['kd_pjm']))->row_array();
                                echo $nama['nama'];
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>NIP</td>
                        <td> : </td>
                        <td><?php echo $row['nip'] ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Pinjam</td>
                        <td> : </td>
                        <td><?php echo $row['tgl_pjm'] ?></td>
                    </tr>
                    <tr>
                        <td>Estimasi Kembali</td>
                        <td> : </td>
                        <td><?php echo $row['estimate_kmbl'] ?></td>
                    </tr>
                    <tr>
                        <td>Petugas</td>
                        <td> : </td>
                        <td>
                        <?php
                            $gets=$this->db->get_where('anggota',array('nip'=>$row['ptgs_pjm']))->row_array();
                            echo $gets['nama'];
                        ?>
                        </td>
                    </tr>
                </table>
              </div>
              <div class="col-md-8">
              </div>  
            </div>
            
            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width:20px;">No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Spesifikasi</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach($tabel_record as $row){ ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row->kode_barang ?></td>
                                    <td><?php echo $row->nama_barang ?></td>
                                    <td>
                                        <?php
                                          $get=$this->db->get_where('barang',array('kode_barang'=>$row->kode_barang))->row_array();
                                          echo $get['spesifikasi'];
                                        ?>
                                    </td>
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
        <section>
           <div class="row">
              <div class="col-12">
                <table style="margin-top:50px; width:100%;">
                  <tr>
                    <td style="width:20%; text-align:center;">Peminjam</td>
                    <td style="width:60%;">&nbsp;</td>
                    <td style="width:20%; text-align:center;">Petugas</td>
                  </tr>
                  <tr>
                    <td style="width:20%;">&nbsp;</td>
                    <td style="width:60%;">&nbsp;</td>
                    <td style="width:20%;">&nbsp;</td>
                  </tr>
                  <tr>
                    <td style="width:20%;">&nbsp;</td>
                    <td style="width:60%;">&nbsp;</td>
                    <td style="width:20%;">&nbsp;</td>
                  </tr>
                  <tr>
                    <td style="width:20%;">&nbsp;</td>
                    <td style="width:60%;">&nbsp;</td>
                    <td style="width:20%;">&nbsp;</td>
                  </tr>
                  <tr>
                    <td style="width:20%; text-align:center;"><?= $nama['nama'] ?></td>
                    <td style="width:60%;">&nbsp;</td>
                    <td style="width:20%; text-align:center;"><?= $gets['nama'] ?></td>
                  </tr>
                </table>
              </div>
              
           </div>
        </section>
        <!-- /.content -->
        </div>
    <!-- ./wrapper -->
    </body>
</html>
