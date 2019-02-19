<script src="<?php echo base_url() ?>admin-lte-master/pesan/js/shoppingCart.js"></script>
<script>
shoppingCart.clearCart();
</script>
<?php $i=0; $count=0; ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <button class="btn btn-info" type="button" onclick="window.location='<?php echo base_url() ?>Report_pdf/pdf_pinjam';">
            <i class="ion ion-ios-printer-outline"></i> PDF
          </button>
          <button class="btn btn-info" type="button" onclick="window.location='<?php echo base_url() ?>Report_Excel/exportPinjam';">
            <i class="ion ion-ios-printer-outline"></i> Excel
          </button>
          <button class="btn btn-info" type="button">
            <i class="ion ion-ios-printer-outline"></i> Print Out
          </button>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
<?php 
  if($this->session->flashdata('error')):
      $link="<script src='".base_url()."swal/sweetalert2.all.min.js'></script>";
      echo $link;
      echo '<script>
              swal({
                  type: "'.'error'.'",
                  title: "'.$this->session->flashdata('error').'",
                  text: "'.'Data tidak masuk ke database'.'",
                  timer: 10000,
                  customClass: "'.'animated bounceIn'.'",
                  })
            </script>';
  endif;
  if($this->session->flashdata('gagal')):
    $link="<script src='".base_url()."swal/sweetalert2.all.min.js'></script>";
    echo $link;
    echo '<script>
            swal({
                type: "'.'error'.'",
                title: "'.$this->session->flashdata('gagal').'",
                text: "'.'gagal mengurangi jumlah tersedia'.'",
                timer: 10000,
                customClass: "'.'animated bounceIn'.'",
                })
          </script>';
  endif;
  if($this->session->flashdata('success')):
      $link="<script src='".base_url()."swal/sweetalert2.all.min.js'></script>";
      echo $link;
      echo '<script>
              swal({
                  type: "'.'success'.'",
                  title: "'.$this->session->flashdata('success').'",
                  text: "'.'Cek tabel peminjaman'.'",
                  customClass: "'.'animated bounceIn'.'",
                  })
            </script>';
  endif;
?>

    <div class="row">
    </div>
    <div class="row">
      <div class="col-md-12">
        <!-- /.card -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data Peminjam</h3>
            <button style="margin-top:-25px;" onclick="link()" class="btn btn-success float-right"><i class="ion ion-android-add"></i>  Pinjam Barang</button>
          </div>
          <script>
            function link() {
              window.location.href='<?php echo base_url() ?>admin/pinjam_barang';
            }
          </script>
          <!-- /.card-header -->
          <div class="card-body" style="padding-left:4px;">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="font-size:13px; width:10px;">kode</th>
                  <th style="font-size:13px;">NIP</th>
                  <th style="font-size:13px;">Nama</th>
                  <th style="font-size:13px;">Nama Barang</th>
                  <th style="font-size:13px;">Unit</th>
                  <th style="font-size:13px;">Tanggal Pinjam</th>
                  <th style="font-size:13px;">Estimasi Kembali</th>
                  <th style="font-size:13px;">Status</th>
                  <th style="font-size:13px;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=0; for($i=0;$i<count((array)$tabel_record);$i++){ $count=0;?>
                  <tr>
                    <?php
                      $index=array();
                      $row=(array)$tabel_record;
                      //var_dump(count((array)$tabel_record)); die;
                      //var_dump($row[$i]->kd_pinjam); die;
                      $kd_pjm=$row[$i]->kd_pinjam;
                      for($a=0;$a<count((array)$tabel_record);$a++){
                        if($kd_pjm==$row[$a]->kd_pinjam){
                          $index[$count]=$a;
                          $count++;
                        }
                      }
                      if($count>0){
                        if($i>0)
                        {
                          if($row[$i]->kd_pinjam==$row[$i-1]->kd_pinjam){
                            echo "<td style='display:none;'></td>";
                            echo "<td style='display:none;'></td>";
                            echo "<td style='display:none;'></td>";
                            echo "<td style='display:none;'></td>";
                            echo "<td style='display:none;'></td>";
                            echo "<td style='display:none;'></td>";
                            echo "<td style='display:none;'></td>";
                            echo "<td style='display:none;'></td>";
                            echo "<td style='display:none;'></td>";

                            continue;
                          }
                        }
                        echo "<td>".$row[$i]->kd_pinjam."</td>";
                        echo "<td>".$row[$i]->nip."</td>";
                        echo "<td><b>".$row[$i]->nama."</b></td>";
                        echo "<td><ul>";
                        for($b=0;$b<$count;$b++){
                          echo "<li>".$row[$index[$b]]->nama_barang."</li>";
                        }
                        echo "</ul></td>";
                        echo "<td><ul>";
                        for($b=0;$b<count($index);$b++){
                          echo "<li>".$row[$index[$b]]->jml_pinjam."</li>";
                        }
                        echo "</ul></td>";
                      ?>
                        <?php
                          echo "<td>".$row[$i]->tgl_pinjam."</td>";
                          //Our "then" date.
                          $then = $row[$i]->tgl_kembali;
                          //Convert it into a timestamp.
                          $then = strtotime($then);
                          //Get the current timestamp.
                          $now = time();
                          //Calculate the difference.
                          $difference = $then - $now;
                          //Convert seconds into days.
                          $days = floor($difference / (60*60*24) )+1;
                          //echo $days;
                        ?>
                        <?php if($days>0){ ?>
                          <td><?php echo $days." hari" ?></td>
                        <?php } elseif($days==0) {?>
                          <td style="color:#007bff;"><?php echo "hari ini" ?></td>
                        <?php }else{ $day=$days*-1; ?>
                          <td style="color:red;"><?php echo "Lewat ".$day." hari"; }?></td>
                        

                        <?php echo "<td>".$row[$i]->status."</td>"; ?></td>
                        <td>
                          <div class="button-group">
                            
                            <!-- <script>
                              function link1() {
                                window.location.href='<?php //echo base_url()."admin/edit_form_pinjam/".$row->id ?>';
                              }
                            </script>onclick="confrm(<?php echo $row[$i]->id?>)" -->
                            <button type="button" data-toggle="modal" data-target="#kd_<?= $row[$i]->kd_pinjam ?>" class="btn btn-danger" style="font-size:12px; padding:3px;">Kembalikan</button>
                          </div>
                        </td>
                        
                        <div class="modal fade" id="kd_<?= $row[$i]->kd_pinjam ?>" role="dialog">
                          <div class="modal-dialog">
                          
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Kembalikan Barang</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <div class="modal-body">
                                <?php
                                echo "<p align='center'><b>".$row[$i]->kd_pinjam."</b><br>";
                                echo $row[$i]->nama."<br></p>";
                                
                                ?>
                                <div class="row">
                                  <div class="col-md-2">
                                    <?php
                                      $pjm=$this->db->get_where('pinjam_barang',array('kd_pinjam'=>$row[$i]->kd_pinjam));
                                      
                                      //var_dump($pjm->num_rows()); die;
                                      for($c=1;$c<=$pjm->num_rows();$c++){
                                        echo $c." Barang<br>";
                                        echo "<br>";
                                      }
                                    ?>

                                    
                                  </div>
                                  <div class="col-md-6">
                                    <?php
                                      foreach($pjm->result() as $u){
                                        echo "&nbsp; :".$u->nama_barang."<br>";
                                        // echo $u->id."<br>"; ambil id untuk mengembalikan
                                        echo "<br>";
                                      }
                                    ?>
                                  </div>
                                  <div class="col-md-4">
                                    <?php
                                      foreach($pjm->result() as $u){
                                        echo $u->jml_pinjam."&nbsp;";
                                        
                                        echo "<button type='button' onclick='kmbl(".$u->id.")' class='btn btn-danger' style='font-size:9px;'>kembalikan</button><br>";
                                        echo "<br>";
                                        
                                        // echo $u->id."<br>"; ambil id untuk mengembalikan
                                      }
                                    ?>
                                    <script>
                                      function kmbl(id){
                                        window.location.href='<?= base_url() ?>admin/kembalikan/'+id;
                                      }
                                    </script>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                            
                          </div>
                        </div>

                      <?php 
                        
                      
                    }
                      ?>
                      
                      
                    
                  </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th style="font-size:13px; width:10px;">kode</th>
                  <th style="font-size:13px;">NIP</th>
                  <th style="font-size:13px;">Nama</th>
                  <th style="font-size:13px;">Nama Barang</th>
                  <th style="font-size:13px;">Unit</th>
                  <th style="font-size:13px;">Tanggal Pinjam</th>
                  <th style="font-size:13px;">Estimasi Kembali</th>
                  <th style="font-size:13px;">Status</th>
                  <th style="font-size:13px;">Aksi</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
        
    </div>
      <!-- /.row -->
  </section>
  <!-- modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Modal Header</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
    <!-- /.content -->
</div>

<?php
$link="<script src='".base_url()."swal/sweetalert2.all.min.js'></script>";
echo $link;

?>
<script>
  function confrm(id){
    swal({
      title: 'Are you sure?',
      text: "Yakin akan mengembalikan barang ini?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#28a745',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya',
      cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.value) {
          window.location = "<?php echo base_url() ?>admin/kembalikan/"+id;
        }
    })
  }
</script>