

<?php  ob_start(); ?>
<?php
$sql = "SELECT max(id_pengumuman) as id FROM pengumuman";
$s = $conn->query($sql);
$row = $s->fetch_assoc();
$idku = $row['id'];
$nourut = (int)$idku;
$nourut++;
$idBaru = $nourut; 


?>
<div class="judul">
	<h2>Tambah Pengumuman</h2>
</div>
<form  method="post" enctype="multipart/form-data" class="col-md-12" action="?p=tambahpengumuman">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" required name="id" class="form-control" readOnly value="<?php echo $idBaru; ?>">
  </div>
  <div class="form-group">
    <label for="nama">Tema</label>
    <input type="text" required name="tema" class="form-control" placeholder="Tema">
  </div>

  <div class="form-group">
    <label for="nama">Isi Pengumuman</label>
   <textarea  required name="isi" id="text-ckeditor" class="form-control"></textarea>
    <script>CKEDITOR.replace('text-ckeditor');</script>
  </div>
   <div class="form-group">
    <label for="nama">Tempat</label>
    <input type="text" required name="tempat" class="form-control" placeholder="Tempat">
  </div>
   <div class="form-group">
    <label for="nama">Jam</label>
    
    <input type="time"  required name="jam" class="form-control"  >
    <span class="add-on">
      <i data-time-icon="icon-time" data-date-icon="icon-calendar">
      </i>
    </span>
<!--   <p>AM = mulai dari jam 12 malam sampai jam 12 siang</p>
  <p>PM = mulai dari jam 12 siang sampai jam 12  malam</p> -->
  </div>
   <div class="form-group">
    <label for="nama">Tanggal Mulai</label>
    <!-- <input type="text"  class="form-control" placeholder="Tema"> -->
    <!-- <div class="input-append date">
      <input type="text" id="datepicker" name="tgl_mulai" class="span2"><span class="add-on"><i class="icon-th"></i></span>
    </div> -->
    <div class="input-group date">
      <input type="text" name="tgl_mulai" id="datepicker" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
    </div>
   <!--  <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
  </div> -->
    
   <div class="form-group">
    <label for="nama">Tanggal Selesai</label>
    <div class="input-group date">
      <input type="text" name="tgl_selesai" id="datepicker2" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
    </div>
  </div>
  
  <button type="submit" name="kirim" class="btn btn-primary">Tambah Pengumuman</button>
</form>
<div class="clear" style="clear:both;"></div>
<div class="judul">
	<h2>Pengumuman</h2>
</div>
  

<table class="table table-striped">
  <thead>
    
  <tr>
    <th>No</th>
    
    <th>Tema</th>
    <th>Tanggal Mulai</th>
    <th>Tanggal Selesai</th>
    <th>Jam</th>
    <th>Pengirim</th>
    <th>Aksi</th>
  </tr>
  </thead>
  <tbody>
    
  <?php
  $no = 1;
  $sql = "SELECT * FROM pengumuman order by tgl_posting desc";
  $s = $conn->query($sql);
  while($row=$s->fetch_assoc()){
  ?>
  <tr>
    <td><?php echo $no; ?></td>
    <td><?php echo $row['tema'] ?></td>
    <td><?php echo date('d m Y',strtotime($row['tgl_mulai'])) ?></td>
    <td><?php echo date('d m Y',strtotime($row['tgl_selesai'])) ?></td>
    <td><?php echo  date('H : i',strtotime($row['jam'])) ; ?></td>
    <td><?php echo $row['pengirim'] ?></td>
    <td>
      <a class="btn btn-danger" href="?p=hapuspengumuman&id=<?php echo $row['id_pengumuman'] ?>" onclick="return confirm('Anda yakin ingin mengahpus ini ?')">Hapus</a>
      <a class="btn btn-warning" href="?p=editpengumuman&id=<?php echo $row['id_pengumuman'] ?>">Edit</a>
    </td>
  </tr>
  <?php $no++; } ?>
  </tbody>
</table>

