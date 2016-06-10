<?php  ob_start(); ?>
<?php
$sql = "SELECT max(id_siswa) as id FROM siswa";
$s = $conn->query($sql);
$row = $s->fetch_assoc();
$idku = $row['id'];
$nourut = (int)$idku;
$nourut++;
$idBaru = $nourut; 
?>
<div class="judul">
	<h2>Tambah Siswa</h2>
</div>

<form method="post" enctype="multipart/form" class="col-md-8" action="?p=tambahsiswa">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" required name="id" class="form-control" readOnly value="<?php echo $idBaru; ?>">
  </div>
  <div class="form-group">
    <label for="nama">NIS</label>
    <input type="text" required name="nis" class="form-control" placeholder="NIS">
  </div>
  <div class="form-group">
    <label for="nama">Nama Siswa</label>
    <input type="text" required name="nama" class="form-control" placeholder="Nama">
  </div>
  <div class="form-group">
    <label for="jk">Jenis Kelamin</label><br/>
    <input type="radio" name="jk" value="laki-Laki">Laki-Laki<br/>
    <input type="radio" name="jk" value="perempuan">Perempuan<br/>
  </div>
  <div class="form-group">
    <label for="nama">Tempat Lahir</label>
    <input type="text" required name="tempat" class="form-control" placeholder="Tempat Lahir">
  </div>
  
  <div class="form-group">
    <label for="nama">Tanggal Lahir</label>
    <div class="input-group date">
      <input type="text" required name="tanggal" id="datepicker2" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
    </div>
  </div>
  <div class="form-group">
    <label for="nama">Agama</label>
    <input type="text" required name="agama" class="form-control" placeholder="Agama">
  </div>
 
  <div class="form-group">
    <label for="nama">Alamat</label>
    <textarea required name="alamat" class="form-control" placeholder="Alamat"></textarea>
  </div>
  <button type="submit" name="kirim" class="btn btn-primary">Tambah Siswa</button>
</form>
<div class="clear" style="clear:both;"></div>
<div class="judul">
	<h2>Siswa</h2>
</div>

<table class="table table-striped">
	<thead>
    
  <tr>
	  <th>No</th>
	  
	  <th>NIS</th>
	  <th>Nama Siswa</th>
	  <th>Jenis Kelamin</th>
	  
	  <th>Event</th>
	</tr>
  </thead>
  <tbody>
    
	<?php
	$no = 1;
	$sql = "SELECT * FROM siswa";
	$s = $conn->query($sql);
	while($row=$s->fetch_assoc()){
	?>
	<tr>
	  <td><?php echo $no; ?></td>
	  <td><?php echo $row['nis'] ?></td>
	  <td><?php echo $row['nama_siswa'] ?></td>
	  <td><?php echo $row['jenis_kelamin'] ?></td>
	  
	  <td>
	  	<a class="btn btn-danger" href="?p=hapussiswa&id=<?php echo $row['id_siswa'] ?>" onclick="return confirm('Anda yakin ingin mengahpus ini ?')">Hapus</a>
	  	<a class="btn btn-warning" href="?p=editsiswa&id=<?php echo $row['id_siswa'] ?>">Edit</a>
	  </td>
	</tr>
	<?php $no++; } ?>
  </tbody>
</table>
<div class="bawah" style="margin-bottom:100px;"></div>