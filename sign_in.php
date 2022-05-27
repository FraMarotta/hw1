<?php
function checkPwd($password){
    $len = strlen($password);
    $num = 0;
    $upp = 0;
    if($len < 8){
        return 0;
    }

    foreach(count_chars($password,1) as $i => $val ){
        if ($i >= 48 && $i <= 57){
            $num = $num + $val;
        }
        if($i >= 65 && $i <= 90){
            $upp = $upp + $val;
        }
    }
    if(($num < 1) || ($upp < 1)){
        return 0;
    }
    return 1;
}

function checkUser($username){
    $conn = mysqli_connect("localhost", "root", "", "si_viaggia");
    $query = "SELECT * FROM utenti WHERE username = ' " .$username. " '";
    $res = mysqli_query($conn, $query);
    if(mysqli_num_rows($res)>0)
        return 0;
    return 1;
}
?>
<?php
		session_start();
		if(isset($_SESSION["usr"]))
		{
			header("Location: logged_home.php");
			exit();		
		}
		else
		{	

        if(isset($_POST["Username"]) && isset($_POST["Password"]) && isset($_POST["Nome"]) && isset($_POST["Cognome"])) //verifico presenza dati post
		{	
            //controllo username già in uso
            if(!checkUser($_POST["Username"])){
				$error = "Username già in uso";
            }
            //controllo criteri password
            if(!checkPwd($_POST["Password"])){
				$error = "Password non rispetta i criteri di sicurezza";
            }

			if(!isset($error)){
				$conn = mysqli_connect("localhost", "root", "", "si_viaggia");

				$nome = mysqli_real_escape_string($conn, $_POST["Nome"]);
				$cognome = mysqli_real_escape_string($conn, $_POST["Cognome"]);
				$usr = mysqli_real_escape_string($conn,$_POST["Username"]);
				$pwd = mysqli_real_escape_string($conn,$_POST["Password"]);

				$query = "INSERT INTO utenti VALUES( '$nome', '$cognome' , '$usr' , '$pwd' )";
				
				$res = mysqli_query($conn, $query);
				if(($res)>0)
				{	
					//set cookie
					$_SESSION["usr"]= $_POST["Username"];
					header("Location: logged_home.php");
					exit();
				}
				else
					$error = "Registrazione non riuscita";
			}
		}
           
		}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Si Viaggia - LOGIN </title>
	<link rel="stylesheet" type="text/css" href="styles/login.css">
	<script src="scripts/signup.js" defer = "true"></script>
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">
			<div class="signup">
				<form name = "signup_form" method = "post">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="Nome" placeholder="Nome" required="">
					<input type="text" name="Cognome" placeholder="Cognome" required="">
					<input type="text" name="Username" placeholder="Username" required="">
					<input type="password" name="Password" placeholder="Password" required="">
					<span id ='psw' class= "msg errore">Password non rispetta i criteri di sicurezza</span>
					<span id = 'usr' class = "msg errore"> Username non disponibile</span>
					<button>Sign up</button>
					<div class = "specs">
						La Password deve essere lunga almeno 8 caratteri e avere almeno 1 lettera maiuscola e 1 carattere numerici
					</div>
					
					<?php
						if(isset($error))
							echo "<span class='errore'>$error</span>";
						if(isset($_GET['error']))
							echo "<span class='errore'>" . $_GET['error'] . "</span>";


					?>
				</form>

			</div>

			<div class="login">
				<form name = "login_form" method = "post" action = "login.php">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="text" name="username" placeholder="Username" required="">
					<input type="password" name="password" placeholder="Password" required="" id="psw">
					<input type = 'checkbox' id = 'show'> <p>Show Password</p>
					<button>Login</button>
				</form>
			</div>
	</div>
</body>
</html>