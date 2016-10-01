
<!DOCTYPE html>
<html lang="en">	
<head>
	<title>Teacher | EdVu</title>
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
		</div><br><br>
		<?PHP 
		if(!isset($_GET['action'])){ echo 'Hi '.$fname[0].'! Glad to see you :)'; }
		else{
			if($_GET['action']=='newBatch'){
				if ($result5=mysqli_query($con,"INSERT INTO `abatches` (`name`) VALUES ('".$_POST['batchname']."');"))
  					{
  						echo '<div class="panel panel-success" id="success">
      			<div class="panel-heading" id="success_content">New Batch Created!</div>
     
    		</div>';
  					}
			}//end of action==newBatch condition
			elseif($_GET['action']=='createdNewCourse'){
				
  						echo '<div class="panel panel-success" id="success">
      			<div class="panel-heading" id="success_content">New Course Created!</div>
     
    		</div>';
  					
			}
		}
		 ?>
		
		<div class="row">
			<div class="col-sm-12"><br><br>
				<button type="button" class="btn btn-success goto" style="width:90%" data="1,newCourse.php">Create new course</button><br><br>
				<button type="button" class="btn btn-info" style="width:90%" data-toggle="collapse" data-target="#viewC">View courses</button><br><br><!-- Add students option in this plus create new course -->
				<div id="viewC" class="collapse">
					<div class="form-group">
					<?PHP 
						
					?>
					</div>
				</div>
				<button type="button" class="btn btn-warning goto" style="width:90%" data="1,attend.php">Upload Coursework</button><br><hr class="hr1"><br>
				<button type="button" class="btn btn-success goto" style="width:90%" data="1,newCourse.php">Schedule a class</button><br><br>
				<button type="button" class="btn btn-info goto" style="width:90%" data="1,attend.php">Mark attendance</button><br><br>
				
				<button type="button" class="btn btn-warning goto" style="width:90%" data="1,attend.php">Upload Homework</button><br><hr class="hr1"><br>
				<button type="button" class="btn btn-success goto" style="width:90%" data="1,attend.php">Add an assessment</button><br><br><!-- notify for dates from here -->
				<button type="button" class="btn btn-info goto" style="width:90%" data="1,attend.php">View assessments</button><br><br><!-- add marks here -->
				<button type="button" class="btn btn-warning goto" style="width:90%" data="1,attend.php">Add assignments</button><br><hr class="hr1"><br>
				<button type="button" class="btn btn-success goto" style="width:90%" data="1,attend.php">Add a project</button><br><br>
				<button type="button" class="btn btn-success" data-toggle="collapse" data-target="#newBatch" style="width:90%" >Create a new batch</button>
				
				<div id="newBatch" class="collapse">
					<div class="form-group">
					<form method="post" action="index.php?action=newBatch">
  						<label for="usr"><h3>Name of batch:</h3></label>
  						<input type="text" style="width:80%" class="form-control" name="batchname" id="batchname"  autocomplete="off">
  					<input type="submit" value="Create!"  class="btn btn-success" style="width:80%">	
  					</form>	
					</div>
				</div>
				<br><br>
				<button type="button" class="btn btn-warning goto" style="width:90%" data="1,newCourse.php">Declare a holiday</button><br><br>
				<button type="button" class="btn btn-danger goto" style="width:90%" data="1,newCourse.php">Call for a PTM</button><br><br>

				
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12"></div>
		</div>
	</center></div>
</body>
</html>