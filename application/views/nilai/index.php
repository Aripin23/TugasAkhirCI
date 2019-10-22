
        <!-- Begin Page Content -->
        <div class="container">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          
        <div class="">
          <div class="row">
          	<div class="col-lg table-responsive">

          	<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#new1MenuModal">+ Nilai Mahasantri</a>

          		<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
				  <thead>
				    <tr>
				      <th scope="col">No</th>
				      <th scope="col">Tanggal</th>
				      <th scope="col">Surah</th>
				      <th scope="col">Ayat</th>
				      <th scope="col">Kelancaran</th>
				      <th scope="col">Kesalahan</th>
				      <th scope="col">Makna</th>
				      <th scope="col">Nilai</th>
				      <th scope="col">Keterangan</th>
				      <th scope="col">Mahasantri</th>
				      <th scope="col">Kelas</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $i = 1; ?>
				  	<?php foreach ($aku as $n) : ?>
				    <tr>
				      <th scope="row"><?= $i; ?></th>
				      <td><?= $n['tanggal']; ?></td>
				      <td><?= $n['surah']; ?></td>
				      <td><?= $n['ayat']; ?></td>
				      <td><?= $n['kelancaran']; ?></td>
				      <td><?= $n['kesalahan']; ?></td>
				      <td><?= $n['makna_ayat']; ?></td>
				      <td><?= $n['nilai']; ?></td>
				      <td><?= $n['keterangan']; ?></td>
				      <td><?= $n['nama']; ?></td>
				      <td><?= $n['nama_kelas']; ?></td>
				      <td>
				      	<a href="<?= base_url('nilai/edit/').$n['id'] ?>" class="badge badge-success">Edit</a>
				      	<a href="<?= base_url('nilai/delete/').$n['id'] ?>" class="badge badge-danger">Delete</a>
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
        </div>



<!-- Modal -->

<div class="modal fade" id="new1MenuModal" tabindex="-1" role="dialog" aria-labelledby="new1MenuModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="new1MenuModalLabel">+ Nilai Mahasantri</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('nilai');  ?>" method="post">
	      <div class="modal-body">
	      	<div>Nama Mahasantri</div>
	      	<div class="form-grup">
		        <select name="mahasantri" id="mahasantri" class="form-control">
		          <option value="">Pilih Mahasantri</option>
		         
		         <?php foreach ($maha as $a):?>
		             <option value="<?= $a['id']; ?>"><?= $a['nama']; ?></option>
		         <?php endforeach; ?>
		        </select>
      		</div>
      		<br>
      		<div>Kelas</div>
		    <div class="form-grup">
		        <select name="kelas" id="kelas" class="form-control">
		          <option value="">Pilih Kelas</option>
		         
		         <?php foreach ($kelas as $a):?>
		             <option value="<?= $a['id']; ?>"><?= $a['nama_kelas']; ?></option>
		         <?php endforeach; ?>
		        </select>
      		</div>
      		<br>
      		<div>Tanggal Setoran</div>	
	        <div class="form-group">
		    	<input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal">
		  	</div>
		  	<div>Nama Surah</div>
		  	<div class="form-group">
		    	<input type="text" class="form-control" id="surah" name="surah" placeholder="Surah">
		  	</div>
		  	<div>Jumlah Ayat</div>
		  	<div class="form-group">
		    	<input type="text" class="form-control" id="ayat" name="ayat" placeholder="Dari ayat 1 sampai...">
		  	</div>
		  	<div>Nilai Kelancaran</div>
		  	<div class="form-group">
		    	<input type="number" class="form-control" id="kelancaran" name="kelancaran" placeholder="Kelancaran">
		  	</div>
		  	<div>Nilai Kesalahan</div>
		  	<div class="form-group">
		    	<input type="number" class="form-control" id="kesalahan" name="kesalahan" placeholder="Kesalahan">
		  	</div>
		  	<div>Nilai Makna</div>
		  	<div class="form-group">
		    	<input type="number" class="form-control" id="makna_ayat" name="makna_ayat" placeholder="Makna">
		  	</div>
		  	<div>Nilai Asli</div>
		  	<div class="form-group">
		    	<input type="text" class="form-control" id="nilai" name="nilai" placeholder="Nilai Asli">
		  	</div>
		  	<div>Status</div>
		  	<div class="form-group">
		    	<input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Lanjut / Ulang">
		  	</div>	
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
	        <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
	      </div>
	</form>
      </form>
    </div>
  </div>
</div> 


