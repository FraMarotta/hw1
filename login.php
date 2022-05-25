<?php
		session_start();
		if(isset($_SESSION["usr"]))
		{
			header("Location: logged_home.php");
			exit();		
		}
		else
		{	

		if(isset($_POST["username"])&&isset($_POST["password"])) //verifico presenza dati post
		{	
			$conn = mysqli_connect("localhost", "root", "", "si_viaggia");
			$usr = mysqli_real_escape_string($conn,$_POST["username"]);
			$pwd = mysqli_real_escape_string($conn,$_POST["password"]);
			$query1 = "SELECT * FROM utenti WHERE username = '$usr'AND password = '$pwd'";
			$query2 = " AND password = ' " .$pwd. " '";
			$query = $query1 . $query2; 
			$res = mysqli_query($conn, $query1);
			if(mysqli_num_rows($res)>0)
			{	
				//set cookie
				$_SESSION["usr"]= $_POST["username"];
				header("Location: logged_home.php");
				exit();
			}
			else
				$errore = true;
	
		}
		}

?>
        <?php
			if(isset($errore))
			{	
				header("Location: sign_in.php?error='Credenziali non valide' ");
			}
			
		?>
