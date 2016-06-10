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
      <div class="group btmspace-30"> 
        <!-- Left Column -->
        <div class="one_quarter first"> 
          <!-- ################################################################################################ -->
          <ul class="nospace">
            <li class="btmspace-15"><a href="kepsek.php"><em class="heading">Profil Kepala Sekolah</em> <img height="200" width="175" class="borderedbox" src="upload/kepsek.jpg" style="margin-left:17px;"></a></li>
            <p>LOGIN AREA</p>
            <?php  

            ?>
            <form method="post" action="" style="margin-left:-20px">
              <table border="0px">
                <tr>
                  <td>Username</td>
                  <td><input type="text" name="username"></td>
                </tr>
                <tr>
                  <td>Password</td>
                  <td><input type="password" name="password"></td>
                </tr>
                <tr>
                  <td></td>
                  <td><input type="submit" name="login" value="Login"></td>
                </tr>
              </table>
            </form>
          </ul>
          <!-- ################################################################################################ --> 
        </div>
        <!-- / Left Column --> 
        <!-- Middle Column -->
        <div class="one_half"> 
          <!-- ################################################################################################ -->
          <h2>Daftar Siswa</h2>
          <form method="post" action="cari_siswa.php" style="margin-left:-20px">
              <table border="0px">
               
                  
                  <td style="float:right"><input type="text"  name="cari" style="float:left">
                  <input type="submit" name="submit" value="Cari" style="float:right"></td>
                
              
              </table>
            </form>
          <table>
            <tr>
              <th>No</th>
              <th>Kelas</th>
              <th>Jumlah Siswa</th>
              <th>Detail</th>
            </tr>
            <?php
             $limit = 100;
            $jumlah_record = $conn->query("SELECT * from siswa");
            $jml = $jumlah_record->num_rows;
            $halaman = ceil($jml / $limit);
            $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

            $start = ($page - 1) * $limit;



            $sql = "SELECT kelas.nama_kelas,kelas_siswa.id_kelas FROM kelas_siswa join kelas on kelas_siswa.id_kelas=kelas.id_kelas group by kelas_siswa.id_kelas  order by kelas.nama_kelas desc limit $start,$limit";
            $s = $conn->query($sql);
            
            $no=1;
            while($row=$s->fetch_assoc()){
            $sql = "SELECT count(id_kelas) as jml FROM kelas_siswa WHERE id_kelas='".$row['id_kelas']."'";
            
            ?>
            <tr>
            <?php $r = $conn->query($sql);
            $rows = $r->fetch_assoc();
            $jml = $rows['jml'];
            /*$result = $jml->num_rows;*/

             ?>
              <td><?php echo $no; ?></td>
              <td><?php echo $row['nama_kelas'] ?></td>
              <td><?php echo $jml ?></td>
              <td><a href="detail_siswa.php?id=<?php echo $row['id_kelas'] ?>">Detail</a></td>
            </tr>
              <?php $no++; } ?>
          </table>
           <!--  -->
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
        <div class="one_quarter sidebar"> 
          <!-- ################################################################################################ -->
          
          <div class="sdb_holder">
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