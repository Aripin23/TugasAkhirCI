
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

            <form action="<?= base_url('nilai/update');  ?>" method="post">
	      <div class="modal-body">

	      	<div class="form-group">
		    	<input type="hidden" class="form-control" id="id" name="id" value="<?= $siswa->id; ?>">
		  	</div>

	      	<div class="form-group">
		    	<input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $siswa->tanggal; ?>">
		  	</div>
	        <div class="form-group">
		    	<input type="text" class="form-control" id="surah" readonly name="surah" value="<?= $siswa->surah; ?>">
		  	</div>
		  	 <div class="form-group">
		    	<input type="text" class="form-control" id="ayat" readonly name="ayat" value="<?= $siswa->ayat; ?>">
		  	</div>
		  	<div class="form-group">
		    	<input type="text" class="form-control" id="kelancaran" name="kelancaran" placeholder="Nilai kelancaran" value="<?= $siswa->kelancaran; ?>">
		  	</div>
		  	<div class="form-group">
		    	<input type="text" class="form-control" id="kesalahan" name="kesalahan" placeholder="Sisa nilai kesalahan" value="<?= $siswa->kesalahan; ?>">
		  	</div>
		  	<div class="form-group">
		    	<input type="text" class="form-control" id="makna_ayat" name="makna_ayat" placeholder="Nilai makna" value="<?= $siswa->makna_ayat; ?>">
		  	</div>
		  	<div class="form-group">
		    	<input type="text" class="form-control" id="nilai" name="nilai" value="<?= $siswa->nilai; ?>">
		  	</div>
		  	<div class="form-group">
		    	<input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Lulus / Ulang" value="<?= $siswa->keterangan; ?>">
		  	</div>
		  	 <div class="form-grup">
		        <select name="mahasantri" id="mahasantri" class="form-control">
		          <option value="<?= $nama->id; ?>"><?= $nama->nama; ?></option>
		         <option disabled>Pilih Mahasantri</option>
		         <?php foreach ($santri as $a):?>
		             <option value="<?= $a['id']; ?>"><?= $a['nama']; ?></option>
		         <?php endforeach; ?>
		        </select>
      		</div>
      		<br>
		    <div class="form-grup">
		        <select name="kelas" id="kelas" class="form-control">
		          <option value="<?= $class->id; ?>"><?= $class->nama_kelas; ?></option>
		         <option disabled>Pilih Kelas</option>
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