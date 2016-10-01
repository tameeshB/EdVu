
<!DOCTYPE html>
<html lang="en">	
<head>
<meta name="theme-color" content="#42bcf4">
	<title>Register | EdVu</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <meta charset="utf-8"> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="gen.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		@import 'https://fonts.googleapis.com/css?family=Baloo+Bhai|Roboto+Condensed';
	</style>
	<script>
		$(document).ready(function(){
			var myvar='<center><h1>Account created!</h1><h2>user ID is<br><h1> s.8</h1></h2><button type="button" class="btn btn-success goto" style="width:81%" data="0,index.php">Go to login page</button></center>';
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
			echo 'window.location="student/";});</script></head></html>';
			exit();
		}elseif($sessionarr[0]=='t'){
			//redirect to teacher
			echo 'window.location="student/";});</script></head></html>';
			exit();
		}elseif($sessionarr[0]=='p'){
			//redirect to parent
			echo 'window.location="student/";});</script></head></html>';
			exit();
		}
		
	}
}elseif($_GET['submit']=='true'){
	
	$con = mysqli_connect($servername,$username,$password,$dbname);

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  //form validation
  if($_POST['name']==null || $_POST['name']==''){
  	//code for name missing
  	$work=0;
  	echo'$("#error_wrap").fadeIn();';
  	echo'$("#error").text("Name cant be blank");';
  } elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === true){
  	$work=0;
  	echo'$("#error_wrap").fadeIn();';
  	echo'$("#error").text("Invalid email");';
  }elseif($_POST['pswd']==null || $_POST['pswd']==''){
  	$work=0;
  			echo'$("#error_wrap").fadeIn();';
  			echo'$("#error").text("password must be set");';
  }elseif($_POST['type']=='p' && !isset($_POST['studid'])){
  	$work=0;
  			echo'$("#error_wrap").fadeIn();';
  			echo'$("#error").text("Student ID must be filled for parent account");';
  }elseif($_POST['type']=='p' && $_POST['studid']==''){
  	$work=0;
  			echo'$("#error_wrap").fadeIn();';
  			echo'$("#error").text("Student ID must be filled for parent account");';
  }
  elseif($_POST['pswd']!=$_POST['pswdvar']){
  			$work=0;
  			echo'$("#error_wrap").fadeIn();';
  			echo'$("#error").text("passwords are not same");';
  		}
  		else{//all fine!
  			$work=1;
  		}

if($_POST['type']=='s'){
			$query2='SELECT `id` FROM `stud` ORDER BY `id` ASC';
			//student
			$sql = "INSERT INTO `stud` (`id`, `sname`, `points`, `email`, `pwd`) VALUES (NULL, '".$_POST['name']."', '0', '".$_POST['email']."', '".$_POST['pswd']."');";
			
		}elseif($_POST['type']=='t'){
			$query2='SELECT `id` FROM `teachr`  ORDER BY `id` ASC';
			$sql = "INSERT INTO `teachr` (`id`, `tname`, `email`, `pwd`) VALUES (NULL, '".$_POST['name']."', '".$_POST['email']."', '".$_POST['pswd']."');";
			
		}elseif($_POST['type']=='p'){
			$query2='SELECT `id` FROM `parent`  ORDER BY `id` ASC';
			$studidsplit=explode('.',$_POST['studid']);
			if ($result2=mysqli_query($con,"SELECT `sname` FROM `stud` where `id`=".$studidsplit[1]))
  					{
 		 	$num_rows11 = mysqli_num_rows($result2);
  			if($num_rows11<1){
  				$work=0;
  				echo'$("#error_wrap").fadeIn();';
  				echo'$("#error").text("Student DNE");';
  			}
 			 // Fetch one and one row
  				 while ($rowe=mysqli_fetch_row($result2))
  			 {

 		       $sname=$rowe[0];
  			 }
  			 // Free result set
  			// mysqli_free_result($result2);
}

			$sql = "INSERT INTO `parent` (`id`, `pname`, `sid`, `sname`, `email`, `pwd`) VALUES (NULL, '".$_POST['name']."', '".$studidsplit[1]."', '".$sname."', '".$_POST['email']."', '".$_POST['pswd']."');";
			
		} else{
			
			echo'$("#error_wrap").fadeIn();';
  			echo'$("#error").text("Invalid account type");';
  			$work=0;
		}


	if($work==1){
		// echo'$("#error_wrap").fadeIn();';
  // 			echo'$("#error").text("valid");';
if ($result=mysqli_query($con,$sql))
  {

  	if ($result3=mysqli_query($con,$query2))
  					{
  						while ($row31=mysqli_fetch_row($result3))
    {

        $num_rows12 = $row31[0];
    }
 		 	
 		 	
  	echo'$("#mainccontent").html(myvar);';
   
  
  // Fetch one and one row
  // while ($row=mysqli_fetch_row($result))
  //   {

  //       // printf ("%s",$row[0]);
  //   }
  // // Free result set
  // mysqli_free_result($result);
}}

mysqli_close($con);
	}
}
?>
			$("#acctype").change(function(){
				if($("#acctype").val()=='p'){
					$("#s_uid").fadeIn();
					$("#ls_uid").fadeIn();
				}
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
	
</head>

<body>
	<div class="container"><center>
		<div class="row">
			<div class="col-sm-12" id="head">Ed-Vu</div>
		</div><br><br><br>
		<div class="row"><!-- register screen-->
		<button type="button" class="btn btn-success goto" style="width:81%" data="0,index.php">Go to Login page</button>
			<div class="panel panel-danger" id="error_wrap">
      			<div class="panel-heading" id="error"></div>
     
    		</div>
			<div class="panel panel-primary" id="mainc">
      			<div class="panel-heading" style="font-size: 2em">Regsiter</div>
      			<div class="panel-body" id="mainccontent">
      				<form method="post" action="register.php?submit=true">
  					<label for="name"><h3>Name:</h3></label>
  					<input type="text" class="form-control" value="<?PHP if($_GET['submit']=='true'){echo $_POST['name'];}?>" id="name" name="name">
  					<label for="acctype"><h3>Account type:</h3></label>
  					<select class="form-control" name="type" id="acctype">
  						<option value="s">Student</option>
  						<option value="p">Parent</option>
  						<option value="t">Teacher</option>	
					</select>
          
					<label for="studid" id="ls_uid"><h3>Enter ward's userid:</h3></label>
  					<input type="text" class="form-control" value="<?PHP if($_GET['submit']=='true'){echo $_POST['studid'];}?>" id="s_uid" name="studid">
					<label for="email"><h3>email:</h3></label>
  					<input type="text" class="form-control" value="<?PHP if($_GET['submit']=='true'){echo $_POST['email'];}?>" id="email" name="email">
  					<label for="pwd"><h3>Password:</h3></label>
  					<input type="password" class="form-control" id="pwd" name="pswd">
  					<label for="pwd"><h3>Confirm Password:</h3></label>
  					<input type="password" class="form-control" id="pwd" name="pswdvar">
  					
  					
  					<br>
  					<input type="submit" value="Register"  class="btn btn-success" style="width:90%">
					<!-- <button type="button" class="btn btn-success" style="width:90%">Register!</button> -->
				</form>
      			</div>
      			
    		</div>
				
			
		</div>
		<div class="row">
			<div class="col-sm-12"></div>
		</div>
	</center></div>
</body>
</html>