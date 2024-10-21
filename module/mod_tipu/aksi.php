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
			'tipo_karta' => input_text($_POST['tipo_karta']),
			'deskrisaun' => input_text($_POST['deskrisaun']),
		];


		if ($crud->Create('t_tipo_karta', $data)) {
			echo "<script>alert('Dados rai ho Sucessu..!')</script>";
			echo "<script>window.location='../../media.php?module=tipo&act=read'</script>";
		}else{
			echo "<script>alert('Error..!')</script>";
			echo "<script>window.location='../../media.php?module=tipo&act=read'</script>";
		}
		break;
		case 'update':
			$updateData = [
				'tipo_karta' => input_text($_POST['tipo_karta']),
				'deskrisaun' => input_text($_POST['deskrisaun']),
				];
			$condition = ['id_tipo' => $_GET['id_tipo']];
		 // Assuming an ID of 1


		if ($crud->Update('t_tipo_karta', $updateData, $condition)) {
			echo "<script>alert('Hadia dadus ho Sucessu..!')</script>";
			echo "<script>window.location='../../media.php?module=tipo&act=read'</script>";
		}else{
			echo "<script>alert('Faila..!')</script>";
			echo "<script>window.location='../../media.php?module=tipo&act=read'</script>";
		}			
		break;
		case 'delete':
			$id = ['id_tipo' => decrypt($_GET['id_tipo'])];
			 if ($crud->Delete('t_tipo_karta', $id)) {
			 		echo "<script>alert('Hamoos dadus ho susessu...!')</script>";
                	echo "<script>window.location='../../media.php?module=tipo&act=read'</script>";
				}else{
					echo "<script>alert('Hamoos dadus ho susessu...!')</script>";
                	echo "<script>window.location='../../media.php?module=tipo&act=read'</script>";
				}
			break;
}



?>
