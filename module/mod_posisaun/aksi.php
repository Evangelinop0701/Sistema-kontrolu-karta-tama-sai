<?php
require '../../class/Database.php';
require '../../class/filter_text.php';
require '../../class/Crud.php';
require '../../class/ecrypt_id.php';

// Create a new instance of the Database class
$database = new Database();
$pdo = $database->getConnection();
$crud = new Crud($pdo);

$fun = new Funsionario($pdo);


switch ($_GET['act']) {
	case 'insert':
		$data = [
			'posisaun' => input_text($_POST['posisaun']),
		];


		if ($crud->Create('t_posisaun', $data)) {
			echo "<script>alert('Dados rai ho Sucessu..!')</script>";
			echo "<script>window.location='../../media.php?module=posisaun&act=read'</script>";
		}else{
			echo "<script>alert('Error..!')</script>";
			echo "<script>window.location='../../media.php?module=posisaun&act=read'</script>";
		}
		break;
		case 'update':
			$updateData = [
				'posisaun' => input_text($_POST['posisaun']),
				];
			$condition = ['id_posisaun' => $_GET['id_posisaun']];
		 // Assuming an ID of 1


		if ($crud->Update('t_posisaun', $updateData, $condition)) {
			echo "<script>alert('Hadia dadus ho Sucessu..!')</script>";
			echo "<script>window.location='../../media.php?module=posisaun&act=read'</script>";
		}else{
			echo "<script>alert('Faila..!')</script>";
			echo "<script>window.location='../../media.php?module=posisaun&act=read'</script>";
		}			
		break;
		case 'delete':
			$id = ['id_posisaun' => decrypt($_GET['id_posisaun'])];
			 if ($crud->Delete('t_posisaun', $id)) {
			 		echo "<script>alert('Hamoos dadus ho susessu...!')</script>";
                	echo "<script>window.location='../../media.php?module=posisaun&act=read'</script>";
				}else{
					echo "<script>alert('Hamoos dadus ho susessu...!')</script>";
                	echo "<script>window.location='../../media.php?module=posisaun&act=read'</script>";
				}
			break;
}



?>
