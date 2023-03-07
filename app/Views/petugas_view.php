<?=$this->extend('layouts/admin')?>
<?=$this->section('title')?>
Petugas
<?=$this->endsection()?>
<?=$this->section('content')?>
<div class="col">
     <div class="card">
          <div class="card border-primary">
               <div class="card-header bg-info">
                    <a href="#" data-petugas="" data-target="#modalPetugas" data-toggle="modal" class="btn btn-outline-light"><i class="fas fa-fw-fa-solid fa-user-plus"></i>Tambah Petugas</a>
               </div>
               <div class="card-body">
                    <table class="table table-bordered table-striped" id="petugas">
                         <tr>
                              <th>No</th>
                              <th>Nama</th>
                              <th>Username</th>
                              <th>Password</th>
                              <th>Telp</th>
                              <th>Level</th>
                              <th>Opsi</th>
                         </tr>
                         <?php
                              $no=0;
                              foreach($petugas as $row){
                              $no++;
                              $data = $row['nama_petugas'].",".$row['username'].",".$row['telp'].",".$row['level'].",".base_url('petugas/edit/'.$row['id_petugas']);
                         ?>
                        
                         <tr>
                              <td><?=$no?></td>
                              <td><?=$row['nama_petugas']?></td>
                              <td><?=$row['username']?></td>
                              <td><?=$row['password']?></td>
                              <td><?=$row['telp']?></td>
                              <td><?=$row['level']?></td>
                              <td>
                                   <a href="#" data-petugas="<?=$data?>" data-target="#modalPetugas" data-toggle="modal" class="btn btn-warning"><i class="fas fa-edit"></i>Edit</a>
                                   <a href="<?=base_url('petugas/delete/'.$row['id_petugas'])?>" class="btn btn-danger"><i class="fas fa-trash"></i>Hapus</a>
                              </td>
                         </tr>
                         <?php
                         }
                         ?>
                    </table>
               </div>
          </div>
     </div>
     <div class="modal fade" id="modalPetugas" tabindex="-1"aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Input Data Petugas</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="/spetugas" method="post">
                <div class="modal-body">
                    <div class="form-group">
                         <label for="">Nama Petugas</label>
                         <input type="text" name="nama_petugas" id="nama_petugas" class="form-control form-control-user" required>
                    </div>
                    <div class="form-group">
                         <label for="">Username</label>
                         <input type="text" name="username" id="username" class="form-control form-control-user" required>
                    </div>
                    <div class="form-group">
                         <label for="">Password</label>
                         <input type="password" name="password" id="password" class="form-control form-control-user" required>
                    </div>
                    <div class="form-group">
                         <label for="">Telepon</label>
                         <input type="text" name="telp" id="telp" class="form-control form-control-user" required>
                    </div>
                    <div class="form-group">
                         <label for="">Level</label>
                         <select name="level" id="level" class="form-control form-control-user" >
                              <option value="">== pilih level ==</option>
                              <option value="ADMIN">Admin</option>
                              <option value="PETUGAS">Petugas</option>
                         </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Simpan</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php if(!empty(session()->getFlashdata('message'))) : ?>
     <div class="alert alert-primary">
          <?php echo session()->getFlashdata('message')?>
     </div>
     <?php endif ?>
<?=$this->endsection()?>


