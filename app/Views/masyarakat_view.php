<?=$this->extend('layouts/admin')?>
<?=$this->section('title')?>
Masyarakat
<?=$this->endsection()?>
<?=$this->section('content')?>
<div class="col">
     <div class="card">
          <div class="card border-primary">
               <div class="card-header bg-info">
                    <a href="#" class="btn btn-outline-light"><i class="fas fa-fw-fa-solid fa-user-plus"></i>Data Masyarakat</a>
               </div>
               <div class="card-body">
                    <table class="table table-bordered table-striped" id="masyarakat">
                         <tr>
                              <th>No</th>
                              <th>Nik</th>
                              <th>Username</th>
                              <th>Password</th>
                              <th>Telp</th>
                              <th>Opsi</th>
                         </tr>
                         <?php
                              $no=0;
                              foreach($masyarakat as $row){
                              $no++;
                              $data = $row['nik'].",".$row['username'].",".$row['telp'].",".base_url('masyarakat/edit/'.$row['id_masyarakat']);
                         ?>
                        
                         <tr>
                              <td><?=$no?></td>
                              <td><?=$row['nik']?></td>
                              <td><?=$row['username']?></td>
                              <td><?=$row['password']?></td>
                              <td><?=$row['telp']?></td>
                              <td>
                                   <a href="<?=base_url('masyarakat/delete/'.$row['id_masyarakat'])?>" class="btn btn-danger"><i class="fas fa-trash"></i>Hapus</a>
                                   
                              </td>
                         </tr>
                         <?php
                         }
                         ?>
                    </table>
               </div>
          </div>
     </div>
     
</div>
<?php if(session()->setFlashdata('message')):?>
     <div class="alert alert-success">
          <? if(session()->setFlashdata('message')) ; ?>
     </div>
<?php endif ?>
<?=$this->endsection()?>