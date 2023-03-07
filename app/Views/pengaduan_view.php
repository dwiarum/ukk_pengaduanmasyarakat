<?=$this->extend('layouts/admin')?>
<?=$this->section('title')?>
Pengaduan
<?=$this->endsection()?>
<?=$this->section('content')?>
<div class="col">
     <div class="card">
          <div class="card border-primary">
               <div class="card-header bg-info">
                    <?php
                         if(session()->get('level')=='masyarakat'){
                    ?>
                    <a href=""  data-target="#modalPengaduan" data-toggle="modal" class="btn btn-primary">Ajukan Pengaduan</a>
                    <?php
                         }
                    ?>
               </div>
               <div class="card-body">
                    <table class="table table-bordered table-striped" id="pengaduan">
                         <tr>
                              <th>No</th>
                              <th>tanggal pengaduan</th>
                              <th>isi laporan</th>
                              <th>foto</th>
                              <th>status</th>
                              <th>Opsi</th>
                         </tr>
                         <?php
                              $no=0;
                              foreach($pengaduan as $row){
                              $no++;
                              $data = $row['tgl_pengaduan'].",".$row['isi_laporan'].",".$row['foto'].",".$row['status'].",".base_url('pengaduan/edit/'.$row['id_pengaduan']);
                         ?>
                        
                         <tr>
                              <td><?=$no?></td>
                              <td><?=$row['tgl_pengaduan']?></td>
                              <td><?=$row['isi_laporan']?></td>
                              <td><?=$row['foto']?></td>
                              <td><?=$row['status']?></td>
                              <td>
                                   <?php
                                   if(session('level')=='masyarakat'){
                                        if($row['status']= '0'){
                                   ?>
                                   <a href="<?=base_url('pengaduan/delete/'.$row['id_pengaduan'])?>" class="btn btn-danger" ><i class="fas fa-trash"></i>Hapus</a>
                                   <?php
                                        } else {

                                        }
                                   }
                                   if(!empty(session('level')) && session('level')!='masyarakat'){
                                        if($row['status']== '0'){
                                             ?>
                                             <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalTanggapan" data-pengaduan="<?=$row['id_pengaduan']?>">Tanggapi</a>
                                             <?php
                                        } else {
                                             ?>
                                             <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modalTanggapan" data-pengaduan="<?=$row['id_pengaduan']?>" data-aduan="selesai">Lihat Tanggapan</a>
                                             <?php

                                        }
                                   }
                                   ?>
                              </td>
                         </tr>
                         <?php
                         }
                         ?>
                    </table>
               </div>
          </div>
     </div>
     <div class="modal fade" id="modalPengaduan" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5>Tambah Pengaduan</h5>
            </div>
            <form action="/tambahpengaduan" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="form-group">
                <label for="">Isi Laporan</label>
                <textarea class="form-control" name="isi_laporan" cols="30" rows="10"></textarea>
              </div>
              <div class="form-group">
                <label for="">Foto</label>
                <input type="file" name="foto" class="form-control">
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            </form>
          </div>
        </div>
      </div>

      <div class="modal fade" id="modalTanggapan" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header"></div>
            <form action="/tanggapi" method="post">
              <input type="text" name="id_pengaduan" id="id_pengaduan">
              <div class="modal-body">
                <div class="form-group">
                  <label for="">Tanggapan</label>
                  <textarea name="tanggapan" id="tanggapans" cols="30" rows="10" class="form-control"></textarea>
          </div>
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-success">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

    <?=$this->endSection()?>
    <?=$this->section('script')?>
           <script>
            $(document).ready(function(){
              $('#modalTanggapan').on('show.bs.modal',function(e){
                var button = $(e.relatedTarget);
                var data = button.data('pengaduan');
                var aduan = button.data('aduan');
                $('#id_pengaduan').val(data);
                if (aduan=="selesai"){
                  var query="id_pengaduan="+data;
                  // alert(query);

                  $('#btstanggapan').hide();
                  $.ajax({
                    url:"/getTanggapan",
                    type:"GET",
                    data:query,
                    dataType:"json",
                    succes:function(data){
                      // alert(data);
                      $('#tanggapans').val(data[0].tanggapan);
                    },
                    error:function(error){
                      console.log(error);
                    }
                  });

                  $('#tanggapans').val();
                }else{
                  $('#btstanggapan').show();
                  $('#tanggapans').val("");
                }
              });
            })
            </script>
    <?=$this->endSection()?>