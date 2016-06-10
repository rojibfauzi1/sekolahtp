<div class="wrapper row0">
  <div id="topbar" class="clear"> 
   
   
    <!-- ################################################################################################ --> 
  </div>
</div>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row1">
  <header id="header" class="clear"> 
    <!-- ################################################################################################ -->
    <div id="logo" class="fl_left">
      <h1><a href="index.php">SDN 17 Tanjung Pandan</a></h1>
      <p>Free Website </p>
    </div>
    <div class="fl_right">
      <form class="clear" method="post" action="search.php">
        <fieldset>
          <legend>Search:</legend>
          <input type="text" value="" name="search" placeholder="Search Here">
          <button class="fa fa-search" type="submit" name="submit" title="Search"><em>Search</em></button>
        </fieldset>
      </form>
    </div>
    <!-- ################################################################################################ --> 
  </header>
</div>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row2">
  <div class="rounded">
    <nav id="mainav" class="clear"> 
      <!-- ################################################################################################ -->
      <ul class="clear">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a class="drop" href="#">Profil Sekolah</a>
          <ul>
            <li><a href="visi&misi.php">Visi & Misi</a></li>
            <li><a href="prestasi.php">Prestasi</a></li>
           <li><a href="sejarah.php">Sejarah</a></li>
            <!-- <li><a href="pages/sidebar-left.html">Sidebar Left</a></li>
            <li><a href="pages/sidebar-left-2.html">Sidebar Left 2</a></li>
            <li><a href="pages/sidebar-right.html">Sidebar Right</a></li>
            <li><a href="pages/sidebar-right-2.html">Sidebar Right 2</a></li>
            <li><a href="pages/basic-grid.html">Basic Grid</a></li>   -->
          </ul>
        </li>
        <li><a href="sarana.php">Sarana Prasarana</a>
          
        </li>
        <li><a href="daftar_siswa.php">Daftar Murid</a></li>
        <li><a href="daftar_guru.php">Daftar Guru</a></li>
      
      </ul>
      <!-- ################################################################################################ --> 
    </nav>
  </div>
</div>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper">
  <div id="slider">
    <div id="slide-wrapper" class="rounded clear"> 
      <!-- ################################################################################################ -->
      <figure id="slide-1"><a class="view" href="#"><img width="960px" height="350px" src="asset/gambar/buka.jpg" alt=""></a>
        <figcaption>
          <h2>Visi & Misi SDN 17 Tanjung Pandan</h2>
          <p>Attincidunt vel nam a maurisus lacinia consectetus magnisl sed ac morbi. Inmaurisus habitur pretium eu et ac vest penatibus id lacus parturpis.</p>
          <p class="right"><a href="visi&misi.php">Continue Reading &raquo;</a></p>
        </figcaption>
      </figure>
     <!--  <figure id="slide-2"><a class="view" href="#"><img src="images/demo/slider/2.png" alt=""></a>
        <figcaption>
          <h2>Aliquatjusto quisque nam</h2>
          <p>Attincidunt vel nam a maurisus lacinia consectetus magnisl sed ac morbi. Inmaurisus habitur pretium eu et ac vest penatibus id lacus parturpis.</p>
          <p class="right"><a href="#">Continue Reading &raquo;</a></p>
        </figcaption>
      </figure>
      <figure id="slide-3"><a class="view" href="#"><img src="images/demo/slider/3.png" alt=""></a>
        <figcaption>
          <h2>Aliquatjusto quisque nam</h2>
          <p>Attincidunt vel nam a maurisus lacinia consectetus magnisl sed ac morbi. Inmaurisus habitur pretium eu et ac vest penatibus id lacus parturpis.</p>
          <p class="right"><a href="#">Continue Reading &raquo;</a></p>
        </figcaption>
      </figure>
      <figure id="slide-4"><a class="view" href="#"><img src="images/demo/slider/4.png" alt=""></a>
        <figcaption>
          <h2>Aliquatjusto quisque nam</h2>
          <p>Attincidunt vel nam a maurisus lacinia consectetus magnisl sed ac morbi. Inmaurisus habitur pretium eu et ac vest penatibus id lacus parturpis.</p>
          <p class="right"><a href="#">Continue Reading &raquo;</a></p>
        </figcaption>
      </figure>
      <figure id="slide-5"><a class="view" href="#"><img src="images/demo/slider/5.png" alt=""></a>
        <figcaption>
          <h2>Dapiensociis temper donec</h2>
          <p>Attincidunt vel nam a maurisus lacinia consectetus magnisl sed ac morbi. Inmaurisus habitur pretium eu et ac vest penatibus id lacus parturpis.</p>
          <p class="right"><a href="#">Continue Reading &raquo;</a></p>
        </figcaption>
      </figure> -->
      <!-- ################################################################################################ -->
      <!-- <ul id="slide-tabs">
        <li><a href="#slide-1">All About The University</a></li>
        <li><a href="#slide-2">Why You Should Study With Us</a></li>
        <li><a href="#slide-3">Education And Student Experience</a></li>
        <li><a href="#slide-4">Alumni And Its Donors</a></li>
        <li><a href="#slide-5">Latest University News &amp; Events</a></li>
      </ul> -->
      <!-- ################################################################################################ --> 
    </div>
  </div>
</div>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row2">
  <div class="rounded">
    <nav id="mainav" class="main clear"> 
      <!-- ################################################################################################ -->
      <ul class="clear">
        <li class="active"><a href="index.php">Berita Terbaru</a></li>
        <li><a  href="pengumuman.php">Pengumuman</a>
          
        </li>
        <li><a class="drop" href="#">Gallery Foto</a>
        
          <ul>
          <?php  
        $sql = "SELECT * FROM album order by tanggal desc limit 0,10";
        $s = $conn->query($sql);
        while($row=$s->fetch_assoc()){
        ?>
            <li><a href="gallery.php?id=<?php echo $row['id_album'] ?>"><?php echo $row['jdl_album'] ?></a></li>
        <?php } ?>
          </ul>
        </li>
        <li><a href="download.php">Download</a></li>
        <li><a href="kontak.php">Kontak</a></li>
        
      </ul>
      <!-- ################################################################################################ --> 
    </nav>
  </div>
</div>