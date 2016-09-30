
<!DOCTYPE html>
<html lang="en">	
<head>
	<title>Add Course | EdVu</title>
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

		$("#logout").click(function(){
			window.location='../logout.php';
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
	if($userarr[0]!='t'){
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
if ($result2=mysqli_query($con,"SELECT * FROM `stud` where `id`=".$userarr[1]))
  					{
 		 	$num_rows11 = mysqli_num_rows($result2);
  			
 			 // Fetch one and one row
  				 while ($rowe=mysqli_fetch_row($result2))
  			 {

 		       $sname=$rowe[1];

  			 }
  			 $fname=explode(' ', $sname);  ////////first name////////////
  			 // Free result set
  			// mysqli_free_result($result2);
}
?>
</div>
	<div class="container"><center>
		<div class="row">
			<div class="col-sm-12" id="head">EdVu<img id="logout" src="../logout.png"></div>
		</div>
		<br><br>	
		<div class="row"><form method="POST" action="newCourse.php?submit=true">
			<div class="col-sm-12">
    			<div class="panel panel-info" >
    				<div class="panel-heading" >General info</div>
    				<div class="panel-body" style="background:#16d8ad">
    					<div class="form-group">
  						<label for="usr"><h3>Course name:</h3></label>
  						<input type="text" class="form-control" name="cname"  autocomplete="off" id="usr">
						</div>
						<div class="form-group">
  						<label for="usr"><h3>Course starts(YYYY-MM-DD):</h3></label>
  						<input type="text" class="form-control" name="date"  autocomplete="off" id="date">
						</div>
    				</div>
    			</div>
								
			</div>
			<input type="submit" value="Create!"  class="btn btn-success" style="width:90%">
			</form>
		</div>
		<div class="row">
			<div class="col-sm-12"></div>
		</div>
	</center></div>
</body>
</html>