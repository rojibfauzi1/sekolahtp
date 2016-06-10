<?php 
error_reporting(0);
session_start();
include 'header.php'; 


require_once('conf/connect.php');




require_once('proses_login.php');
?>
<body id="top">
<?php include 'header2.php'; ?>

<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <!-- main body --> 
      <!-- ################################################################################################ -->
      <div class="group btmspace-30" > 
        <!-- Left Column -->
        
        <!-- / Left Column --> 
        <!-- Middle Column -->
        <div class="one_half"style="width:650px"> 
          <!-- ################################################################################################ -->
          <h2>Daftar Sarana</h2>
          <table>
            <tr>
              <th>No</th>
              <th>Sarana Prasarana</th>
              
              <th>Fungsi</th>
              <th>Jumlah</th>
              <th>Keterangan</th>
              <th>Aksi</th>
            </tr>
            <?php
             $limit = 20;
            $jumlah_record = $conn->query("SELECT * from sarana_sekolah");
            $jml = $jumlah_record->num_rows;
            $halaman = ceil($jml / $limit);
            $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

            $start = ($page - 1) * $limit;

            $sql = "SELECT nama_sarana,fungsi,jumlah,keterangan,id_sarana FROM sarana_sekolah 
                        group by nama_sarana
            order by id_sarana desc limit $start, $limit";
            $s = $conn->query($sql);
            $no=1;
            while($row=$s->fetch_assoc()){
            ?>
            <tr>
              <td><?php echo ++$start; ?></td>
              <td><?php echo $row['nama_sarana'] ?></td>
              
              <td><?php echo $row['fungsi'] ?></td>
              <td><?php echo $row['jumlah'] ?></td>
              <td><?php echo $row['keterangan'] ?></td>
              <td><a href="detail_sarana.php?id=<?php echo $row['id_sarana'] ?>">Detail</a></td>
            </tr>
              <?php $no++; } ?>
          </table>
          <div class="paging">
            <?php
            if($page > 1){

            ?>
            <a href="?page=<?php echo $page - 1 ?>"><</a>
            <?php
            for($x=1;$x<=$halaman;$x++){
            ?>
              <a href="?page=<?php echo $x ?>"><?php echo $x ?></a>
            <?php
              }
            }elseif($page==1){
              for($x=1;$x<=$halaman;$x++){
              ?>
              <a href="?page=<?php echo $x ?>"><?php echo $x ?></a>
            <?php
            }
            ?>
            <a href="?page=<?php echo $page +1 ?>">></a>
           <?php } ?> 
          </div>
         <!--  <ul class="nospace listing">
            <?php
            $sql = "SELECT * FROM kelas_siswa";
            $s = $conn->query($sql);
            while($row=$s->fetch_assoc()){
            ?>

            <li class="clear">
              <div class="imgl borderedbox"><img width="120px" src="../upload/berita/<?php echo $row['gambar'] ?>" alt=""></div>
              <p class="nospace btmspace-15"><a href="#"><?php echo $row['judul'] ?></a></p>
              <p><?php echo substr($row['isi_berita'], 0,50)  ?><br/><a href="http://www.os-templates.com/template-terms">Baca Selengkapnya</a></p>
            </li>
            <?php } ?>
          </ul> -->
          <p class="right"></p>
          <!-- ################################################################################################ --> 
        </div>
        <!-- / Middle Column --> 
        <!-- Right Column -->
        <div class="one_quarter sidebar" style="float:right"> 
          <!-- ################################################################################################ -->
          
          <div class="sdb_holder" style="">
            <h6>Pengumuman</h6>
            <ul class="nospace quickinfo">
            <?php 
            $sql = "SELECT * FROM pengumuman order by tgl_posting DESC limit 0,5";
            $s = $conn->query($sql);
            while($row=$s->fetch_assoc()){
             ?>
              <li ><a href="detail_pengumuman.php?id=<?php echo $row['id_pengumuman'] ?>"><p><?php echo date('d m Y',strtotime($row['tgl_mulai'])) ?></p><?php echo $row['tema'] ?></a></li>
              
              <?php } ?>
            </ul>
          </div>
          <!-- ################################################################################################ --> 
        </div>
        <!-- / Right Column --> 
      </div>
      <!-- ################################################################################################ --> 
      <!-- ################################################################################################ -->
      <?php include 'footer2.php'; ?>

<!-- JAVASCRIPTS --> 
<?php include 'footer.php'; ?>