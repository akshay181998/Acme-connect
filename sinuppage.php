<?php
	
	if(isset($_POST['username'])&&isset($_POST['emailid'])&&isset($_POST['password'])&&isset($_POST['conformpassword']))
	{
		$username=$_POST['username'];
		$emailid=$_POST['emailid'];
		$password=$_POST['password'];
		$conformpassword=$_POST['conformpassword'];
		$invaild=false;

		if(!empty($username)&&!empty($emailid)&&!empty($password)&&!empty($conformpassword))
		{
			$filename='details.txt' ;
			$read=fopen($filename,'r');
			$dataread=fread($read , filesize($filename));
			$detailsarray=explode( ' ' , $dataread);

			for($i=0 ;$i<((count($detailsarray))/3) ;$i+=3)
			{
				if(($detailsarray[$i]==$username)||($detailsarray[$i+1]==$emailid))
				{
					$invaild=true;
				}
			}

			if(!$invaild)
			{			
				if($password===$conformpassword){
				$file=fopen($filename,'a');
				fwrite(' ' . $file , $username ." ". $emailid ." ". $password ." ");
				fclose($file);
				}
				else{
				echo 'Passwords is not correct';
				}
			}
			else
			{
				echo 'User is already exist' ;
			}
		}
		else{
			echo 'fill in all the filled' ;
		}
	}

	if(isset($_POST['email'])&&isset($_POST['pass']))
	{
		$email=$_POST['email'];
		$password=$_POST['pass'];
		$check = false ;
		if(!empty($email)&&!empty($password))
		{
			$filename= 'details.txt';
			$read = fopen($filename , 'r');
			$dataread = fread($read , filesize($filename));
			$detailsarray = explode(' ' , $dataread);

			for($i=0 ; $i<count($detailsarray);$i+=3)
			{
				if(($detailsarray[$i+1]==$email)&&($detailsarray[$i+2]==$password))
				{
					$check=true;
					break;
				}
			}

			if($check)
			{
				echo 'you made it!' ;
			}
			else{
				echo 'invaild password/email' ;
			}

		}
		else
		{
			echo 'fill all the fields in log in section' ;
		}
	}

?>
<!DOCTYPE html> 
<html lang="en">
	<head>
		<meta charset="UTF-8" >
		<title>Sign up</title>
		<link rel="stylesheet" href="sinuppage.css">
	</head>
	<body>
		<div class="header">
			<div class="box1">
				<h1><span class="name">Acme</span> Connnect</h1>
			</div>
			<div class="box2">

			</div>
			<div class="box3">
				<div class="box4">
						<form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
						<input  type="email" name="email">
						<input  type="password" name="pass" >
						<input type="submit" name="submit" value="Log In">
					</form>
				</div>	
				<div class="box5">
					<a href="<?php $_SERVER['PHP_SELF']?>">forget password</a>
					<input type="checkbox" name="login" value="login">
						Keep me logged in
				</div>	
			</div>
		</div>
		<div id="main">
			<div class="block1">
				<h1>Random things</h1>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
				</p>
			</div>
			<div class="block2">
				<div class="space1">
					<h1>Why be old fashioned<br>Try new methods</h1>
					<div class="box1">
						<div class="area1">
							<img src="facebook.png">
						</div>
						<div class="area2">
							<h2>log in with Facebook</h2>
						</div>				
					</div>
					<div class="box2">
						<div class="area1">
							<img src="google.png">
						</div>
						<div class="area2">
							<h2>Log in with Google+</h2>
						</div>					
					</div>
					<div class="box3">
						<div class="area1">
							<img src="linkedin.png">
						</div>
						<div class="area2">
							<h2>Log in with Linkedin</h2>
						</div>				
					</div>
					<div class="box4">
						
					</div>
				</div>
				<div class="space2">
					<form action="<?php $_SERVER['PHP_SELF']?>" method="post">
						<div class="userbox">
							<input type="text" name="username" placeholder="User Name">
						</div>				
						<div class="emailbox">
							<input type="email" name="emailid" placeholder="Email">
						</div>				
						<div class="passwordbox">
							<input type="password" name="password" placeholder="*******">
						</div>				
						<div class="conformpasswordbox">
							<input type="password" name="conformpassword" placeholder="*******">
						</div>				
						<div class="buttonbox">
							<input type="submit" name="submit" value="Sign Up">
						</div>				
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
