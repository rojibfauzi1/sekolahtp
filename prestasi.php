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
      <!--     <form method="post" action="cari_siswa.php" style="margin-left:-20px">
              <table border="0px">
               
                  
                  <td style="float:right"><input type="text"  name="cari" style="float:left">
                  <input type="submit" name="submit" value="Cari" style="float:right"></td>
                
              
              </table>
            </form> -->
          <table id="table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Lomba</th>
              <th>Tingkat</th>
              <th>Peringkat</th>
              <th>Tahun</th>
              
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT * FROM prestasi";
            $s = $conn->query($sql);
            
            $no=1;
            while($row=$s->fetch_assoc()){
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $row['nama_lomba'] ?></td>
              <td><?php echo $row['tingkat'] ?></td>
              <td><?php echo $row['peringkat'] ?></td>
              <td><?php echo $row['tahun'] ?></td>
              
            </tr>
              <?php $no++; } ?>
              </tbody>
          </table>
        
        
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