<?PHP
		include'gen.php';
	if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
	//$_SESSION['usr'];
	if(!isset($_GET['submit'])){$_GET['submit']='';}
	if(isset($_SESSION['usr'])){
	if($_SESSION['usr']!='' || $_SESSION['usr']!=null){
		$sessionarr=explode('.', $_SESSION['usr']);
		if($sessionarr[0]=='s'){
			//redirect to student
			header("Location: student/");
			exit();
		}elseif($sessionarr[0]=='t'){
			//redirect to teacher
			header("Location: teacher/");
			exit();
		}elseif($sessionarr[0]=='p'){
			//redirect to parent
			header("Location: parent/");
			exit();
		}
		
	}
}
?>
<!DOCTYPE html>
<html lang="en">	
<head>
	<title>Home | EdVu</title>
	<meta name="theme-color" content="#42bcf4">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <meta charset="utf-8"> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="gen.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		@import 'https://fonts.googleapis.com/css?family=Baloo+Bhai|Roboto+Condensed';
	die();
	</style>
	<script>
	$(document).ready(function(){
	<?PHP
if($_GET['submit']=='true'){
	
	$con = mysqli_connect($servername,$username,$password,$dbname);

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
$usernameo=explode('.', $_POST['userid']);
		if($usernameo[0]=='s'){
			$work=1;
			//student
			$sql = "SELECT * FROM `stud` where (`id`=".$usernameo[1].") AND (`pwd`='".$_POST['pswd']."')";
			//echo 'window.location="student/";});</script></head></html>'
			// exit();
		}elseif($usernameo[0]=='t'){
			$work=1;
			$sql = "SELECT * FROM `teachr` where (`id`=".$usernameo[1].") AND (`pwd`='".$_POST['pswd']."')";
			//redirect to teacher
			// echo 'window.location="student/";});</script></head></html>'
			// exit();
		}elseif($usernameo[0]=='p'){
			$work=1;
			//redirect to parent
			
			$sql = "SELECT * FROM `parent` where (`id`=".$usernameo[1].") AND (`pwd`='".$_POST['pswd']."')";
			// echo 'window.location="student/";});</script></head></html>'
			// exit();
		} else{
			$work=0;
			echo'$("#error_wrap").fadeIn();';
  			echo'$("#error").text("Invalid1");';
		}


	if($work==1){
		// echo'$("#error_wrap").fadeIn();';
  // 			echo'$("#error").text("valid");';
if ($result=mysqli_query($con,$sql))
  {
  $num_rows = mysqli_num_rows($result);
  if($num_rows>0){
  	if($usernameo[0]=='s'){
			echo 'window.location="student/";});</script></head></html>';
			$_SESSION['usr']=$_POST['userid'];
  			exit();
		}elseif($usernameo[0]=='t'){
			echo 'window.location="teacher/";});</script></head></html>';
			$_SESSION['usr']=$_POST['userid'];
  			exit();
		}elseif($usernameo[0]=='p'){
			echo 'window.location="parent/";});</script></head></html>';
			$_SESSION['usr']=$_POST['userid'];
  			exit();
		}  else{echo'alert("unhandled exception!");';
		}
  	
  }else{
  	echo'$("#error_wrap").fadeIn();';
  	echo'$("#error").text("Invalid");';
  	
  }
  // Fetch one and one row
  // while ($row=mysqli_fetch_row($result))
  //   {

  //       // printf ("%s",$row[0]);
  //   }
  // // Free result set
  mysqli_free_result($result);
}

mysqli_close($con);
	}
}
?>
	
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
</head>

<body>
	<div class="container"><center>
		<div class="row">
			<div class="col-sm-12" id="head">EdVu</div>
		</div><br><br><br>
		<div class="row"><!-- login screen-->
			<div class="panel panel-danger" id="error_wrap">
      			<div class="panel-heading" id="error"></div>
     
    		</div>
			<div class="panel panel-primary" id="mainc">
      			<div class="panel-heading" style="font-size: 2em">Login</div>
      			<div class="panel-body" id="mainccontent">
      				<form method="POST" action="index.php?submit=true">
					<div class="form-group">
  					<label for="usr"><h3>usrid:</h3></label>
  					<input type="text" class="form-control" name="userid" id="usr"  autocomplete="off">
					</div>
					<div class="form-group">
  					<label for="pwd"><h3>Password:</h3></label>
  					<input type="password" class="form-control" name="pswd" id="pwd">
					</div>
					<input type="submit" value="Login"  class="btn btn-success" style="width:90%">
					<!-- <button type="button" class="btn btn-success" style="width:90%">Submit</button> -->
				</form>
      			</div>

    		</div>
				
			<button type="button" class="btn btn-success goto" style="width:81%" data="0,register.php">Regsiter!</button>
		</div>
		<div class="row">
			<div class="col-sm-12"></div>
		</div>
	</center></div>
</body>
</html>