
<!DOCTYPE html>
<html lang="en">	
<head>
	<title>My Courses | EdVu</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <meta charset="utf-8"> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="../gen.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		@import 'https://fonts.googleapis.com/css?family=Baloo+Bhai|Roboto+Condensed';
	</style>
	<script>
	$(document).ready(function(){
		$("#logout").click(function(){
			window.location='../logout.php';
		});
			$(".goto").click(function(){
    		var string = $(this).attr('data').split(',') ;
        	var type= string[0];
        	var uri= string[1];
        	if(type==0){
				window.location=uri;
        	} else if(type==1){
        		window.open(uri,'_blank');
        	}
        	
    	});

		
	});
	</script>
	<meta name="theme-color" content="#42bcf4">
</head>

<body>
<div id="php" >
<?PHP
if (session_status() === PHP_SESSION_NONE) session_start();
include ('../gen.php');
if(isset($_SESSION['usr'])){
	$userarr=explode('.',$_SESSION['usr']);
	if($userarr[0]!='s'){
	header("Location: ../index.php");
	die();}
	}else{
	$userarr=explode('.',$_SESSION['usr']);
header("Location: ../index.php");
die();
}
$con = mysqli_connect($servername,$username,$password,$dbname);

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
if ($result2=mysqli_query($con,"SELECT `batch` FROM `stud` where `id`=".$userarr[1]))
  					{
 		 	// $num_rows11 = mysqli_num_rows($result2);
  			
 			 // Fetch one and one row
  				 while ($rowe=mysqli_fetch_row($result2))
  			 {

 		       $batch=$rowe[0];

  			 }
  			
  			 // Free result set
  			// mysqli_free_result($result2);
}
?>
</div>
	<div class="container"><center>
		<div class="row">
			<div class="col-sm-12" id="head">EdVu<a href="../logout.php"><img id="logout" style="z-index:10" src="../logout.png"></a></div>
		</div><br><br>
		<?PHP 
			if ($result24=mysqli_query($con,"SELECT `cid`,`cname` FROM `cnroll` where `batch`='".$batch."'"))
  					{
 		 	// $num_rows11 = mysqli_num_rows($result2);
  			
 			 // Fetch one and one row
  				 while ($rowere=mysqli_fetch_row($result24))
  			 {

 		       echo '<button type="button" class="btn btn-warning goto" data="0,course.php?cid='.$rowere[0].'" style="width:90%;margin:10px">'.$rowere[1].'</button>';

  			 }
  			 
}
		?>
		

		<br><br>
				
				
				<br>
		<div class="row">
			
		</div>
		<div class="row">
			<div class="col-sm-12"><?PHP echo 'Name: '.$_SESSION['name'].'<br>Batch:'.$batch; ?></div>
		</div>
	</center></div>
</body>
</html>