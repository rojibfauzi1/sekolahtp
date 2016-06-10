
<?php  ob_start(); ?>
<?php
$sql = "SELECT max(id_sarana) as id FROM sarana_sekolah";
$s = $conn->query($sql);
$row = $s->fetch_assoc();
$idku = $row['id'];
$nourut = (int)$idku;
$nourut++;
$idBaru = $nourut; 

function tampil_pengajar(){
include '../conf/connect.php';
	$sql = "SELECT * FROM pengajar ";
	$s = $conn->query($sql);
	while($row = $s->fetch_assoc()){
		echo "<option value='".$row['id_pengajar']."'>".$row['nama_guru']."</option>";
	}
}
?>
<div class="judul">
	<h2>Tambah Sarana</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8" action="?p=tambahsarana">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" required name="id" class="form-control" readOnly value="<?php echo $idBaru; ?>">
  </div>
  <div class="form-group">
    <label for="nama">Nama Sarana</label>
    <input type="text" required name="nama" class="form-control" placeholder="Nama Sarana">
  </div>
   <div class="form-group">
    <label for="nama">Jumlah</label>
    <input type="number" required name="jumlah" class="form-control" placeholder="Jumlah">
  </div>
   <div class="form-group">
    <label for="nama">Keterangan</label>
    <input type="text" required name="keterangan" class="form-control" placeholder="Keterangan">
  </div>

   <div class="form-group">
    <label for="nama">Guru</label>
    <select  required name="pengajar" class="form-control" >
    <?php tampil_pengajar(); ?>
    </select>
  </div>
   <div class="form-group">
    <label for="nama">Fungsi</label>
    <input type="text" required name="fungsi" class="form-control" placeholder="Fungsi">
  </div>
  
  <button type="submit" required name="kirim" class="btn btn-primary">Tambah Sarana</button>
</form>
<div class="clear" style="clear:both;"></div>
<div class="judul">
	<h2>Berita</h2>
</div>

<table class="table table-striped">
	<thead>
		
	<tr>
	  <th>No</th>
	  
	  <th>Nama Sarana</th>
	  <th>Jumlah</th>
	  <th>Ketarangan</th>
	  <th>Aksi</th>
	</tr>
	</thead>
	<tbody>
		
	<?php
	$no = 1;
	$sql = "SELECT * FROM sarana_sekolah";
	$s = $conn->query($sql);
	while($row=$s->fetch_assoc()){
	if($s->num_rows > 0){
		?>
		<tr>
	  <td><?php echo $no; ?></td>
	  <td><?php echo $row['nama_sarana'] ?></td>
	  <td><?php echo $row['jumlah'] ?></td>
	  <td><?php echo $row['keterangan'] ?></td>
	  <td>
	  	<a class="btn btn-danger" href="?p=hapussarana&id=<?php echo $row['id_sarana'] ?>" onclick="return confirm('Yakin ingin menghapus ini ?')">Hapus</a>
	  	<a class="btn btn-warning" href="?p=editsarana&id=<?php echo $row['id_sarana'] ?>" >Edit</a>
	  </td>
	</tr>
	<?php $no++; 
	}else{
		?>
		<tr>
			<td><?php echo "Data Kosong"; ?></td>
		</tr> 
		<?php
	}}
	?>
	</tbody>
	
</table>
