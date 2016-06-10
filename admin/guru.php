<?php
ob_start(); 
require_once('../conf/connect.php');


session_start();
/*if(!isset($_SESSION['login'])){
	header("location: login.php");
}*/


$nip = $_SESSION['nip'];
$login = $_SESSION['login'];
$guru = $_SESSION['nama_guru'];
$foto = $_SESSION['gambar'];



if($login != '2'){
	session_destroy();
	/*header("Refresh: 0; URL=../index.php");*/
	header("location: ../index.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<title>SOMASE</title>
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
					<img src="../upload/guru/<?php echo $foto ?>" width="100px" style="margin-left:-20px;">	
				</div>
				<h4 style="margin-top:20px;margin-left:90px;color:#eee;padding-top:20px;">Welcome,</h4>
				<h4 style="color:#eee;margin-left:90px;"><?php echo $guru; ?></h4>
			</header>
			<div class="clear" style="clear:both;"></div>
			<ul>
				<li><a href="?p=dasboard_guru">Dasboard</a></li>
				
			
				<div class="panel panel-default">
				    <li><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-e
				    	xpanded="false" aria-controls="collapseTwo">
				       Data<i class="fa fa-chevron-down" style="color:#eee;float:right;margin-top:3px"></i>
				    </a></li>
				    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
				      <div class="panel-body" style="padding:0px 15px">
				        <!-- <li><a href="?p=guru">Guru</a></li> --> 
				        
				        <li><a href="?p=materi">Materi</a></li>
				       
				        <!-- <li><a href="?p=guru_mapel">Guru Mapel</a></li> -->      
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
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $guru; ?> <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="../index.php">Lihat Situs</a></li>
		            <!-- <li><a href="#">Another action</a></li>
		            <li><a href="#">Something else here</a></li>
		            <li role="separator" class="divider"></li> -->
		            <li><a href="logout.php">Logout</a></li>
		          </ul>
		        </li>
		      </ul>
			</div>
		  </div>
		</nav>
		<main class="col-md-9 col-sm-5 col-md-offset-2 col-sm-offset-8 content">
		
		<?php
		if(isset($_GET['p'])){
			switch ($_GET['p']) {
				case 'dasboard_guru':
					$page = 'dasboard_guru.php';
				break;
				/*case 'berita':
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
					break;*/
				case 'materi':
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
    $( "#datepicker" ).datepicker();
     $( "#datepicker2" ).datepicker();
  });
       
        </script>
	 

</html>

