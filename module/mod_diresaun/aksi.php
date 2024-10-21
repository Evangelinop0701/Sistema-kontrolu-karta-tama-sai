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
			'diresaun' => input_text($_POST['diresaun']),
			'chefe_diresaun' => input_text($_POST['chefe_diresaun']),
		];


		if ($crud->Create('t_diresaun', $data)) {
			echo "<script>alert('Dados rai ho Sucessu..!')</script>";
			echo "<script>window.location='../../media.php?module=diresaun&act=read'</script>";
		}else{
			echo "<script>alert('Error..!')</script>";
			echo "<script>window.location='../../media.php?module=diresaun&act=read'</script>";
		}
		break;
		case 'update':
			$updateData = [
				'diresaun' => input_text($_POST['diresaun']),
				'chefe_diresaun' => input_text($_POST['chefe_diresaun']),
				];
			$condition = ['id_diresaun' => $_GET['id_diresaun']];
		 // Assuming an ID of 1


		if ($crud->Update('t_diresaun', $updateData, $condition)) {
			echo "<script>alert('Hadia dadus ho Sucessu..!')</script>";
			echo "<script>window.location='../../media.php?module=diresaun&act=read'</script>";
		}else{
			echo "<script>alert('Faila..!')</script>";
			echo "<script>window.location='../../media.php?module=diresaun&act=read'</script>";
		}			
		break;
		case 'delete':
			$id = ['id_diresaun' => decrypt($_GET['id_diresaun'])];
			 if ($crud->Delete('t_diresaun', $id)) {
			 		echo "<script>alert('Hamoos dadus ho susessu...!')</script>";
                	echo "<script>window.location='../../media.php?module=diresaun&act=read'</script>";
				}else{
					echo "<script>alert('Hamoos dadus ho susessu...!')</script>";
                	echo "<script>window.location='../../media.php?module=diresaun&act=read'</script>";
				}
			break;
}



?>
