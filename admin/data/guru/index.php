<?php  ob_start(); ?>
<?php
$sql = "SELECT max(id_pengajar) as id FROM pengajar";
$s = $conn->query($sql);
$row = $s->fetch_assoc();
$idku = $row['id'];
$nourut = (int)$idku;
$nourut++;
$idBaru = $nourut; 
?>
<div class="judul">
	<h2>Tambah Guru</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8" action="?p=tambahguru">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" required name="id" class="form-control" readOnly value="<?php echo $idBaru; ?>">
  </div>
  <div class="form-group">
    <label for="nama">NIP</label>
    <input type="text" required name="nip" class="form-control" placeholder="NIP">
  </div>
  <div class="form-group">
    <label for="nama">Nama Guru</label>
    <input type="text" required name="nama" class="form-control" placeholder="Nama">
  </div>
  <div class="form-group">
    <label for="jk">Jenis Kelamin</label><br/>
    <input type="radio" name="jk" value="laki-Laki">Laki-Laki<br/>
    <input type="radio" name="jk" value="perempuan">Perempuan<br/>
  </div>
  <div class="form-group">
    <label for="nama">Email</label>
    <input type="email" required name="email" class="form-control" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="nama">No HP</label>
    <input type="text" pattern="08[0-9]{10,11}" required name="hp" class="form-control" placeholder="Email">
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
    <input type="text" name="agama" class="form-control" placeholder="Agama">
  </div>
  <div class="form-group">
    <label for="nama">Jabatan</label>
    <input type="text" name="jabatan" class="form-control" placeholder="Jabatan">
  </div>
  <div class="form-group">
    <label for="nama">Alamat</label>
    <textarea name="alamat" class="form-control" placeholder="Alamat"></textarea>
  </div>
   <div class="form-group">
    <label for="nama">Password</label>
    <input type="text" name="password" class="form-control" placeholder="Password">
  </div>
   <div class="form-group">
    <label for="foto1">Foto</label>
    <input type="file" name="gambar" accept="image/jpeg">
 
  </div>
  <button type="submit" name="kirim" class="btn btn-primary">Tambah Guru</button>
</form>
<div class="clear" style="clear:both;"></div>
<div class="judul">
	<h2>Guru</h2>
</div>

<table class="table table-striped">
	<thead>
    
  <tr>
	  <th>No</th>
	  
	  <th>NIP</th>
	  <th>Nama Guru</th>
	  <th>Jenis Kelamin</th>
	  <th>Email</th>
	  <th>Event</th>
	</tr>
  </thead>
  <tbody>
    
	<?php
	$no = 1;
	$sql = "SELECT * FROM pengajar";
	$s = $conn->query($sql);
	while($row=$s->fetch_assoc()){
	?>
	<tr>
	  <td><?php echo $no; ?></td>
	  <td><?php echo $row['nip'] ?></td>
	  <td><?php echo $row['nama_guru'] ?></td>
	  <td><?php echo $row['jenis_kelamin'] ?></td>
	  <td><?php echo $row['email'] ?></td>
	  <td>
	  	<a class="btn btn-danger"  href="?p=hapusguru&id=<?php echo $row['id_pengajar'] ?>" onclick="return confirm('Anda yakin ingin mengahpus ini ?')">Hapus</a>
	  	<a class="btn btn-warning"  href="?p=editguru&id=<?php echo $row['id_pengajar'] ?>">Edit</a>
	  </td>
	</tr>
	<?php $no++; } ?>
  </tbody>
</table>
<div class="bawah" style="margin-bottom:100px;"></div>