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
          <h2>Detail Pengumuman</h2>
          
          <strong><p>Visi & Misi</p></strong>
          <p>
Assalamu'alakum Wr. Wb

     Para pengunjung situs yang berbahagia, selamat datang di situs SMKN 5 Yogyakarta. Anda bisa mengetahui lebih banyak tentang SMK Negeri 5 Yogyakarta, yang dahulu dikenal dengan Sekolah Menengah Seni dan Kerajinan.
     Kami sebagai lembaga pendidikan yang lahir sejak tahun 1953, akan terus memperkembangkan ini sebagai alternatif mengejar ketertinggalan kita dalam informasi pendidikan maupun cakupan lebih luas.
     Situs ini dibuat untuk bisa menyediakan informasi yang menyeluruh tentang SMK Negeri 5 Yogyakarta, baik dari segi fasilitas yang dimiliki, maupun dari segi proses pembelajaran reguler maupun ekstrakurikuler. Proses belajar mengajar di SMK Negeri 5 Yogyakarta, mencakup mata pelajaran normatif, adaptif dan produktif atau sering disebut dengan kompetensi kejuruan. SMK Negeri 5 Yogyakarta bertujuan untuk menghasilkan lulusan yang berkompetensi
Lokasi sekolah yang berada di tengah kota membuat SMK Negeri 5 Yogyakarta mudah untuk dikunjungi dan menjadi alternatif bagi siswa SMP yang ingin melanjutkan di SMK Seni dan Kerajinan.
     Situs ini akan sangat membantu bagi semua pihak yang menginginkan informasi tentang apa dan siapa SMK Negeri 5 Yogyakarta itu. Sekolah yang sudah bersertifikasi baik dari Badan Akreditasi Nasional dan SMM ISO 9000:2001 merupakan salah satu sekolah yang berhasil mengantongi predikat sekolah Rintisan Sekolah Berstandar Internasional pada tahun 2008.
Akhirnya kami ucapkan selamat datang di situs resmi SMK Negeri 5 Yogyakarta.. Semoga ini semua dapat bermanfaat bagi kita semua.
 
 Wassalamu'alaikum wr.wb
Kepala Sekolah
 
 
SUYONO, S.Pd.,M.Eng.</p>
<table>
  <tr>
     <th>No</th>
      <th>Nama</th>
      <th>Kelas</th>
  </tr>
 <tr>
   <td>1</td>
   <td>Rojib</td>
   <td>SI</td>
 </tr>
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