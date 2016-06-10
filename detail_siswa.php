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
            
            <?php
            

            $sql = "SELECT kelas.nama_kelas,siswa.nama_siswa,siswa.nis,kelas_siswa.id_siswa FROM kelas_siswa 
            join kelas on kelas_siswa.id_kelas=kelas.id_kelas 
            join siswa on kelas_siswa.id_siswa=siswa.id_siswa
            where kelas.id_kelas='".$_GET['id']."'";
            $s = $conn->query($sql);
          
            /*$row=$s->fetch_assoc();*/
          ?>
          <h2>Detail Siswa</h2>
          <!-- <p align="center"><strong><?php echo $row['nama_kelas'] ?></strong></p> -->
          <table>
            <tr>
              <th>No</th>
              <th>NIS</th>
              <th>Nama Siswa</th>
              <th>Aksi</th>
            </tr>
            <tr>
            
            <?php 
            /*$result = $jml->num_rows;*/
            $no=1;
            while($row=$s->fetch_assoc()){
           
            

             ?>
              <td><?php echo $no; ?></td>
              <td><?php echo $row['nis'] ?></td>
              <td><?php echo $row['nama_siswa'] ?></td>
              <td>
                <a href="detail_siswa2.php?id=<?php echo $row['id_siswa'] ?>">Detail</a>
              </td>
            </tr>
              <?php $no++; } ?>
          </table>

         
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