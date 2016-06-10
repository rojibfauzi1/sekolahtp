<?php
session_start();
ob_start(); 
require_once('../conf/connect.php');


/*if(!isset($_SESSION['login'])){
	header("location: login.php");
}*/
$user = $_SESSION['username'];
$login = $_SESSION['login'];


if($login != '1'){
	session_destroy();
	/*header("Refresh: 0; URL=../index.php");*/
	header("location: ../index.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<title>SDN 17 Tanjung</title>
	<link rel="stylesheet" type="text/css" href="../asset/css/contents.css">
	<link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../asset/DataTables/DataTables-1/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="../asset/css/bootstrap-datetimepicker.min.css">	
	<link rel="stylesheet" type="text/css" href="../asset/css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" type="text/css" href="../asset/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../asset/css/custom.css">

	
	

	<link rel='stylesheet' type='text/css' href='../asset/css/timepicki.css'/> 
	
	<script type="text/javascript" src="../asset/js/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="../asset/js/bootstrap.min.js"></script>
	
	<script type="text/javascript" src="../asset/DataTables/DataTables-1/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="../asset/js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="../asset/js/bootstrap-datepicker.min.js"></script>
		<script type="text/javascript" src="../asset/ckeditor/ckeditor.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
	    $('table').DataTable();
	});
	</script>

	
</head>
<body>
<div class="container-fluid">
	<div class="row">



		<nav class="navigation col-md-2 col-sm-3">
			<header>
				
				<div class="lingkaran">
					<img src="../upload/admin/<?php echo $user ?>.jpg" width="100px" style="margin-left:-20px;">	
				</div>
				<h4 style="margin-top:20px;margin-left:90px;color:#eee;padding-top:20px;">Welcome,</h4>
				<h4 style="color:#eee;margin-left:90px;"><?php echo $user; ?></h4>
			</header>
			<div class="clear" style="clear:both;"></div>
			<ul>
				<li><a href="?p=dasboard_admin">Dasboard</a></li>
				<div class="panel panel-default">
				    <li><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseZero" aria-e
				    	xpanded="false" aria-controls="collapseZero">
				       Admin<i class="fa fa-chevron-down" style="color:#eee;float:right;margin-top:3px"></i>
				    </a></li>
				    <div id="collapseZero" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
				      <div class="panel-body" style="padding:0px 15px">
				        <li><a href="?p=admin">Admin</a></li> 
				        <li><a href="?p=kategori">Logout</a></li>
				              
				      </div>
				    </div>
				</div>
				<div class="panel panel-default">
				    <li><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-e
				    	xpanded="false" aria-controls="collapseOne">
				       Content<i class="fa fa-chevron-down" style="color:#eee;float:right;margin-top:3px"></i>
				    </a></li>
				    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
				      <div class="panel-body" style="padding:0px 15px">
				        <li><a href="?p=berita">Berita</a></li> 
				        <li><a href="?p=kategori">Kategori</a></li>
				        <li><a href="?p=pengumuman">Pengumuman</a></li>      
				      </div>
				    </div>
				</div>
				<div class="panel panel-default">
				    <li><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-e
				    	xpanded="false" aria-controls="collapseTwo">
				       Data<i class="fa fa-chevron-down" style="color:#eee;float:right;margin-top:3px"></i>
				    </a></li>
				    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
				      <div class="panel-body" style="padding:0px 15px">
				        <li><a href="?p=guru">Guru</a></li> 
				        <li><a href="?p=siswa">Siswa</a></li>
				        <li><a href="?p=kelas">Kelas</a></li>
				        <li><a href="?p=matapelajaran">Mata Pelajaran</a></li>
				        <li><a href="?p=prestasi">Prestasi</a></li>
				        <li><a href="?p=sarana">Sarana Prasarana</a></li>
				        <li><a href="?p=guru_mapel">Guru Mapel</a></li>    
				        <li><a href="?p=kelas_siswa">Kelas Siswa</a></li>  
				      </div>
				    </div>
				</div>
				<div class="panel panel-default">
				    <li><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-e
				    	xpanded="false" aria-controls="collapseThree">
				       Media<i class="fa fa-chevron-down" style="color:#eee;float:right;margin-top:3px"></i>
				    </a></li>
				    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
				      <div class="panel-body" style="padding:0px 15px">
				        <li><a href="?p=album">Album Foto</a></li> 
				        <li><a href="?p=gallery">Gallery Foto</a></li>
				          
				      </div>
				    </div>
				</div>
				
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</nav>
		<nav class="navbar navbar-default navbar-static-top" style="width:1267px;float:right; ">
		  <div class="container-fluid">
		  	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		    <ul class="nav navbar-nav navbar-right">
		        
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $user; ?> <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="../index.php">Lihat Situs</a></li>
		            <!-- <li><a href="#">Another action</a></li>
		            <li><a href="#">Something else here</a></li>
		            <li role="separator" class="divider"></li>  -->
		            <li><a href="logout.php">Logout</a></li>
		          </ul>
		        </li>
		      </ul>
			</div>
		  </div>
		</nav>
		<main class="col-md-9 col-sm-5 col-md-offset-2 col-sm-offset-4  content">
		
		<?php
		if(isset($_GET['p'])){
			
			switch ($_GET['p']) {
				case 'dasboard_admin':
					$page = 'dasboard_admin.php';
					break;
				case 'admin':
					$page = 'admin/index.php';
					break;
				case 'tambahadmin':
					$page = 'admin/tambah.php';
					break;
				case 'editadmin':
					$page = 'admin/edit.php';
					break;
				case 'hapusadmin':
					$page = 'admin/hapus.php';
					break;
				case 'berita':
					$page = 'berita/index.php';
					break;
				case 'tambahberita':
					$page = 'berita/tambah.php';
					break;
				case 'editberita':
					$page = 'berita/edit.php';
					break;
				case 'hapusberita':
					$page = 'berita/hapus.php';
					break;
				case 'pengumuman':
					$page = 'pengumuman/index.php';
					break;
				case 'tambahpengumuman':
					$page = 'pengumuman/tambah.php';
					break;
				case 'editpengumuman':
					$page = 'pengumuman/edit.php';
					break;
				case 'hapuspengumuman':
					$page = 'pengumuman/hapus.php';
					break;
				case 'kategori';
					$page = 'kategori_berita/index.php';
					break;
				case 'tambahkategori';
					$page = 'kategori_berita/tambah.php';
					break;
				case 'editkategori';
					$page = 'kategori_berita/edit.php';
					break;
				case 'hapuskategori';
					$page = 'kategori_berita/hapus.php';
					break;
				case 'matapelajaran':
					$page = 'mata_pelajaran/index.php';
					break;
				case 'tambahmapel':
					$page = 'mata_pelajaran/tambah.php';
					break;
				case 'editmapel':
					$page = 'mata_pelajaran/edit.php';
					break;
				case 'hapusmapel':
					$page = 'mata_pelajaran/hapus.php';
					break;
				case 'kelas':
					$page = 'kelas/index.php';
					break;
				case 'hapuskelas':
					$page = 'kelas/hapus.php';
					break;
				case 'tambahkelas':
					$page = 'kelas/tambah.php';
					break;
				case 'editkelas':
					$page = 'kelas/edit.php';
					break;
				case 'guru':
					$page = 'guru/index.php';
					break;
				case 'tambahguru':
					$page = 'guru/tambah.php';
					break;
				case 'editguru':
					$page = 'guru/edit.php';
					break;
				case 'hapusguru':
					$page = 'guru/hapus.php';
					break;
				case 'siswa':
					$page = 'siswa/index.php';
					break;
				case 'tambahsiswa':
					$page = 'siswa/tambah.php';
					break;
				case 'editsiswa':
					$page = 'siswa/edit.php';
					break;
				case 'hapussiswa':
					$page = 'siswa/hapus.php';
					break;
				case 'album':
					$page = 'album/index.php';
					break;
				case 'tambahalbum':
					$page = 'album/tambah.php';
					break;
				case 'editalbum':
					$page = 'album/edit.php';
					break;
				case 'hapusalbum':
					$page = 'album/hapus.php';
					break;
				case 'gallery':
					$page = 'gallery/index.php';
					break;
				case 'tambahgallery':
					$page = 'gallery/tambah.php';
					break;
				case 'editgallery':
					$page = 'gallery/edit.php';
					break;
				case 'hapusgallery':
					$page = 'gallery/hapus.php';
					break;
				case 'guru_mapel':
					$page = 'guru_mapel/index.php';
					break;
				case 'tambahguru_mapel':
					$page = 'guru_mapel/tambah.php';
					break;
				case 'editguru_mapel':
					$page = 'guru_mapel/edit.php';
					break;
				case 'hapusguru_mapel':
					$page = 'guru_mapel/hapus.php';
					break;
				case 'sarana':
					$page = 'sarana/index.php';
					break;
				case 'tambahsarana':
					$page = 'sarana/tambah.php';
					break;
				case 'editsarana':
					$page = 'sarana/edit.php';
					break;
				case 'hapussarana':
					$page = 'sarana/hapus.php';
					break;
				/*case 'materi':
					$page = 'materi/index.php';
					break;
				case 'tambahmateri':
					$page = 'materi/tambah.php';
					break;
				case 'editmateri':
					$page = 'materi/edit.php';
					break;
				case 'hapusmateri':
					$page = 'materi/hapus.php';
					break;*/
				case 'kelas_siswa':
					$page = 'kelas_siswa/index.php';
					break;
				case 'tambahkelas_siswa':
					$page = 'kelas_siswa/tambah.php';
					break;
				case 'editkelas_siswa':
					$page = 'kelas_siswa/edit.php';
					break;
				case 'hapuskelas_siswa':
					$page = 'kelas_siswa/hapus.php';
					break;
				case 'prestasi':
					$page = 'prestasi/index.php';
					break;
				case 'tambahprestasi':
					$page = 'prestasi/tambah.php';
					break;
				case 'editprestasi':
					$page = 'prestasi/edit.php';
					break;
				case 'hapusprestasi':
					$page = 'prestasi/hapus.php';
					break;
				default:
					# code...
					break;
			}
			require_once('data/'.$page);
		}

		?>

		</main>

	</div>
</div>	
</body>
	

	
	<script type='text/javascript'src='../asset/js/timepicki.js'></script>

	 
    
	
	

	<script type="text/javascript" src="../asset/ckeditor/styles.js"></script>

	<script type="text/javascript">
            
 $(function() {
    $('#datetimepicker3').datetimepicker({
      pickDate: false
    });
  });
            

            $(function() {
    $( "#datepicker" ).datepicker({
    	formatSubmit: 'Y-m-d',
  		hiddenName: true,
  		format: 'yyyy-mm-dd'
    });
    $( "#datepicker2" ).datepicker({
    	formatSubmit: 'Y-m-d',
  		hiddenName: true,
  		format: 'yyyy-mm-dd'
    });
    $('#timepicker1').timepicki({
		show_meridian:false,
		min_hour_value:0,
		max_hour_value:23,
		step_size_minutes:15,
		overflow_minutes:true,
		increase_direction:'up',
		disable_keyboard_mobile: true});
    

    
  
   
  });
	</script> 

</html>

