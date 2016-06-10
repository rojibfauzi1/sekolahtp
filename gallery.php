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
        <div class="one_half" style="text-align:center"> 
          <!-- ################################################################################################ -->
          <h2>Gallery Foto</h2>
          
            
            <?php
            $limit = 20;
            $jumlah_record = $conn->query("SELECT * from gallery");
            $jml = $jumlah_record->num_rows;
            $halaman = ceil($jml / $limit);
            $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

            $start = ($page - 1) * $limit;

            $sql = "SELECT gallery.gambar_gallery  FROM gallery join album on gallery.id_album=album.id_album where gallery.id_album='".$_GET['id']."' limit $start,$limit";
           
            $s = $conn->query($sql);
            $lokasi= "upload/gallery/";
            while($row=$s->fetch_assoc()){
            /*$sql1 = "SELECT gallery.gambar_gallery  FROM gallery join album on gallery.id_album=album.id_album  order by gallery.id_album desc limit $start,$limit";
            $r = $conn->query($sql1);
            $rows = $r->fetch_assoc();*/
            ?>
            
              
              <a href="upload/gallery/<?php echo $row['gambar_gallery'] ?>" target="new"><img style="margin:10px;" width="100px" height="100px" src="upload/gallery/<?php echo $row['gambar_gallery'] ?>"></a>
     <!--        <section>

      <div id="gallery">
        <ul>
          <li>
            <a href="photo/1.jpg" title="Satu">
              <img src="photo/thumb/1.jpg" alt="tutorial web design" />
            </a>
          </li>
          <li>
            <a href="photo/2.jpg" title="Dua">
              <img src="photo/thumb/2.jpg" alt="tutorial web design" />
            </a>
          </li>
        </ul>
      </div>

            </section>   -->
            
              <?php  } ?>
          
         
          <div class="paging">
            <?php
            if($page > 1){

            ?>
            <a href="?id=<?php echo $_GET['id'] ?>&page=<?php echo $page - 1 ?>"><</a>
            <?php
            for($x=1;$x<=$halaman;$x++){
            ?>
              <a href="?id=<?php echo $_GET['id'] ?>&page=<?php echo $x ?>"><?php echo $x ?></a>
            <?php
              }
            }elseif($page==1){
              for($x=1;$x<=$halaman;$x++){
              ?>
              <a href="?id=<?php echo $_GET['id'] ?>&page=<?php echo $x ?>"><?php echo $x ?></a>
            <?php
            }
            ?>
            <a href="?id=<?php echo $_GET['id'] ?>&page=<?php echo $page +1 ?>">></a>
           <?php } ?> 
          </div>
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