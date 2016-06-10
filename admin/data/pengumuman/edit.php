<?php
include '../conf/connect.php';


if(isset($_POST['edit'])){
  $id = $_POST['id'];
  $tema = $_POST['tema'];
  $isi = $_POST['isi'];
  $tempat = $_POST['tempat'];
  $jam = $_POST['jam']  ;
  $tgl_mulai = date('Y-m-d',strtotime($_POST['tgl_mulai']));
  $tgl_selesai = date('Y-m-d',strtotime($_POST['tgl_selesai'])) ;
  $tgl_posting = date('Y-m-d');
  $pengirim = $_SESSION['username'];


  $s = "UPDATE pengumuman SET id_pengumuman='$id',tema='$tema',
  isi='$isi',tempat='$tempat',jam='$jam',tgl_mulai='$tgl_mulai',tgl_selesai='$tgl_selesai',
  tgl_posting='$tgl_posting',pengirim='$pengirim'";
  $s .= "WHERE id_pengumuman='$id'";


 

  $sql = $conn->query($s);
  if($sql){
     echo "<script>alert('Data berhasil diedit');</script>";
    header("Refresh: 0; URL=?p=pengumuman");
  }
}elseif($_GET['id']){
  $s = "SELECT * FROM pengumuman WHERE id_pengumuman='$_GET[id]'";
  $sql = $conn->query($s);
  $row = $sql->fetch_assoc();
?>

<div class="judul">
	<h2>Edit Pengumuman</h2>
</div>
<form method="post" enctype="multipart/form" class="col-md-8">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" name="id" class="form-control" readOnly value="<?php echo $row['id_pengumuman']; ?>">
  </div>
  <div class="form-group">
    <label for="nama">Tema</label>
    <input type="text" name="tema" class="form-control" value="<?php echo $row['tema']; ?>">
  </div>

  <div class="form-group">
    <label for="nama">Isi Pengumuman</label>
    <textarea  name="isi" id="text-ckeditor" class="form-control"><?php echo $row['isi']; ?></textarea>
    <script type="text/">CKEDITOR.replace( 'text-ckeditor');</script>
  </div>
   <div class="form-group">
    <label for="nama">Tempat</label>
    <input type="text" name="tempat" class="form-control" value="<?php echo $row['tempat']; ?>">
  </div>
   <div class="form-group">
    <label for="nama">Jam</label>
    
    <input type="time"  name="jam" class="form-control" value="<?php echo $row['jam']; ?>" >
    <span class="add-on">
      <i data-time-icon="icon-time" data-date-icon="icon-calendar">
      </i>
    </span>
  
  </div>
   <div class="form-group">
    <label for="nama">Tanggal Mulai</label>
    <!-- <input type="text"  class="form-control" placeholder="Tema"> -->
    <!-- <div class="input-append date">
      <input type="text" id="datepicker" name="tgl_mulai" class="span2"><span class="add-on"><i class="icon-th"></i></span>
    </div> -->
    <div class="input-group date">
      <input type="text" name="tgl_mulai" id="datepicker" class="form-control" value="<?php echo $row['tgl_mulai']; ?>"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
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
      <input type="text" name="tgl_selesai" id="datepicker2" class="form-control" value="<?php echo $row['tgl_selesai']; ?>" ><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
    </div>
  </div>
   
  <br/><button type="submit" name="edit" class="btn btn-primary">Edit Pengumuman</button>
</form>
<?php } ?>