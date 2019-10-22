
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <?php if(validation_errors()): ?>

              <div class = "alert alert-danger" role = "alert">
                
                <?= validation_errors();?>

              </div>

            <?php endif; ?>
        
         
        <?= $this->session->flashdata('message'); ?>

          <div class="row">
          	<div class="col-lg">

          		<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">+ Mahasantri</a>

          		<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
				  <thead>
				    <tr>
				      <th scope="col">NO</th>
				      <th scope="col">NIM</th>
				      <th scope="col">Nama</th>
				      <th scope="col">Alamat</th>
				      <th scope="col">Tanggal Lahir</th>
				      <th scope="col">Kelas</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $i = 1; ?>
				  	<?php foreach ($menu as $m) : ?>
				    <tr>
				      <th scope="row"><?= $i; ?></th>
				      <td><?= $m['nim']; ?></td>
				      <td><?= $m['nama']; ?></td>
				      <td><?= $m['alamat']; ?></td>
				      <td><?= $m['tgl_lahir']; ?></td>
				      <td><?= $m['nama_kelas']; ?></td>
				      <td>
				      	<a href="<?= base_url('menu/edit/').$m['id'] ?>" class="badge badge-success">Edit</a>
				      	<a href="<?= base_url('menu/delete/').$m['id'] ?>" class="badge badge-danger">Delete</a>
				      </td>
				    </tr>
				    <?php $i++; ?>
					<?php endforeach; ?>
				  </tbody>
				</table>
          	</div>
          </div>

        </div>     
       
        </div>


<!-- Modal -->

<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newMenuModalLabel">Tambah Mahasantri</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('menu');  ?>" method="post">
	      <div class="modal-body">
	      	<div>NIM Mahasantri</div>
	        <div class="form-group">
		    	<input type="text" class="form-control" id="nim" name="nim" placeholder="NIM">
		  	</div>
		  	<div>Nama Mahasantri</div>
		  	<div class="form-group">
		    	<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
		  	</div>
		  	<div>Alamat Mahasantri</div>
		  	<div class="form-group">
		    	<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
		  	</div>
		  	<div>Tanggal Lahir</div>
		  	<div class="form-group">
		    	<input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Tgl Lahir Mahasantri">
		  	</div>
		  	<div>Kelas</div>
		    <div class="form-grup">
		        <select name="kelas" id="kelas" class="form-control">
		          <option value="">Pilih Kelas</option>
		         
		         <?php foreach ($kelas as $a):?>
		             <option value="<?= $a['id']; ?>"><?= $a['nama_kelas']; ?></option>
		         <?php endforeach; ?>
		        </select>
      		</div>
		  	
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
	        <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
	      </div>
      </form>
    </div>
  </div>
</div> 