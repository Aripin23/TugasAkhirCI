
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          

           <form action="<?= base_url('menu/update');  ?>" method="post">
	      <div class="modal-body">

	      		<div class="form-group">
		    	<input type="hidden" class="form-control" id="id" name="id" placeholder="Alamat Mahasantri" value="<?= $siswa->id; ?>">
		  	</div>
	        <div class="form-group">
		    	<input type="text" class="form-control" id="nim" readonly name="nim" placeholder="NIM Mahasantri" value="<?= $siswa->nim; ?>">
		  	</div>
		  	<div class="form-group">
		    	<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Mahasantri" value="<?= $siswa->nama; ?>">
		  	</div>
		  	<div class="form-group">
		    	<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Mahasantri" value="<?= $siswa->alamat; ?>">
		  	</div>
		  	<div class="form-group">
		    	<input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Tgl Lahir Mahasantri" value="<?= $siswa->tgl_lahir; ?>">
		  	</div>
		    	<div class="form-grup">
		        <select name="kelas" id="kelas" class="form-control">
		          <option value="<?= $class->id; ?>"><?= $class->nama_kelas; ?></option>
		         <option disabled></option>
		         <?php foreach ($kelas as $a):?>
		             <option value="<?= $a['id']; ?>"><?= $a['nama_kelas']; ?></option>
		         <?php endforeach; ?>
		        </select>

      			</div>
		  	
	      </div>
	      <div >
	        <button type="submit" class="btn btn-primary">Simpan</button>
	      </div>
      </form>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->      