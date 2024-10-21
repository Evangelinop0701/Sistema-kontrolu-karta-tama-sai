<?php
require '../../class/Database.php';
require '../../class/filter_text.php';
require '../../class/Crud.php';
require '../../class/ecrypt_id.php';

// Create a new instance of the Database class
$database = new Database();
$pdo = $database->getConnection();
$crud = new Crud($pdo);

$user = new User($pdo);

$fun = new Funsionario($pdo);


switch ($_GET['act']) {
		case 'update':

			if (empty($_POST['password'])) {

				if (!$user->update_username($_POST['username'], $_POST['level_user'],$_GET['id_user'])) {
					echo "<script>alert('Hadia dadus ho Sucessu..!')</script>";
					echo "<script>window.location='../../media.php?module=user&act=read'</script>";
				}else{
					echo "<script>alert('Faila..!')</script>";
					echo "<script>window.location='../../media.php?module=user&act=read'</script>";
				}
			} else {
				
				$pass = $pass_has = password_hash($_POST['password'], PASSWORD_BCRYPT);

				if (!$user->update_username_pass($_POST['username'], $_POST['level_user'], $pass, $_POST['password'], $_GET['id_user'])) {
					echo "<script>alert('Hadia dadus ho Sucessu..!')</script>";
					echo "<script>window.location='../../media.php?module=user&act=read'</script>";
				}else{
					echo "<script>alert('Faila..!')</script>";
					echo "<script>window.location='../../media.php?module=user&act=read'</script>";
				}

			}
			

						
		break;
		case 'reset_pass':
			 $pass = $pass_has = password_hash('password', PASSWORD_BCRYPT);
			 if (!$user->reset_pass($pass, 'password', decrypt($_GET['id_user']))) {
			 		echo "<script>alert('Reset password ho susessu...!')</script>";
                	echo "<script>window.location='../../media.php?module=user&act=read'</script>";
				}else{
					echo "<script>alert('Hamoos dadus ho susessu...!')</script>";
                	echo "<script>window.location='../../media.php?module=user&act=read'</script>";
				}
			break;

			case 'update_user':
				if (empty($_POST['password'])) {

				if (!$user->update_user_pass($_POST['username'], $_GET['id_user'])) {
					echo "<script>alert('Hadia dadus ho Sucessu..!')</script>";
					echo "<script>window.location='../../media.php'</script>";
				}else{
					echo "<script>alert('Faila..!')</script>";
					echo "<script>window.location='../../media.php'</script>";
				}
			} else {
				
				$pass = $pass_has = password_hash($_POST['password'], PASSWORD_BCRYPT);

				if (!$user->update_pass_user($_POST['username'], $pass, $_POST['password'], $_GET['id_user'])) {
					echo "<script>alert('Hadia dadus ho Sucessu..!')</script>";
					echo "<script>window.location='../../media.php'</script>";
				}else{
					echo "<script>alert('Faila..!')</script>";
					echo "<script>window.location='../../media.php'</script>";
				}

			}
				break;
}



?>
