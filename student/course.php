
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
if ($result2w=mysqli_query($con,"SELECT `cname`,`tid` FROM `course` where `id`=".$_GET['cid'].";"))
  					{
 		 	
  				 while ($rowew=mysqli_fetch_row($result2w))
  			 {

 		       $cname=$rowew[0];
 		       $tid=$rowew[1];
  			 }
  			
}
if ($result2=mysqli_query($con,"SELECT `tname` FROM `teachr` where `id`=".$tid))
  					{
 		 	
  				 while ($rowe=mysqli_fetch_row($result2))
  			 {

 		       $tname=$rowe[0];

  			 }
  			
  			 // Free result set
  			// mysqli_free_result($result2);
}
?>
</div>
	<div class="container"><center>
		<div class="row">
			<div class="col-sm-12" id="head">EdVu<a href="../logout.php"><img id="logout" style="z-index:10" src="../logout.png"></a></div>
		</div>
			<h1><?PHP echo $cname ?></h1><br>-<h3 style="color:#4286f4"><?PHP echo $tname ?></h3>
		<br>
		<div class="panel panel-primary">
      <div class="panel-heading">Coursework</div>
      <div class="panel-body">
    
		<?PHP 
			if ($result224=mysqli_query($con,"SELECT `title`,`descr`,`url` FROM `cwork` where `cid`=".$_GET['cid']." ORDER BY `id` DESC"))
  					{
 		 	
  				 while ($rowereq=mysqli_fetch_row($result224))
  			 {

 		       echo '<a type="button" href="'.$rowereq[2].'" class="btn btn-warning" style="width:90%;margin:10px"><h2>'.$rowereq[0].'</h2>'.$rowereq[1].'</a>';

  			 }
  			 
}
		?></div>
		</div>

		<br><br>
				
				
				<br>
		<div class="row">
			
		</div>
		<div class="row">
			<div class="col-sm-12" ><?PHP echo 'Name: '.$_SESSION['name']; ?></div>
		</div>
	</center></div>
</body>
</html>