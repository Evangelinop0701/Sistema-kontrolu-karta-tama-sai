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
$karta_tama = new Karta_tama($pdo);


switch ($_GET['act']) {
	case 'insert':
		$data = [
			'data_karta_tama' => input_text($_POST['data_karta_tama']), 
			'data_karta' => input_text($_POST['data_karta']),
			'no_ref' => input_text($_POST['no_ref']),
			'husi_instituisaun' => input_text($_POST['husi_instituisaun']),
			'id_diresaun' => input_text($_POST['id_diresaun']),
			'asuntu' => input_text($_POST['asuntu']),
			'id_tipu' => input_text($_POST['id_tipu']),
			'id_funsionario' => input_text($_POST['id_funsionario']),
			'data_despaiso' => "",
			'data_arquivo' => "",
			'status_karta_des' => "",
			'status_karta_arkivu' => "",
			'obs' => "",
			
		];


		if ($crud->Create('t_karta_tama', $data)) {
			echo "<script>alert('Dados rai ho Sucessu..!')</script>";
			echo "<script>window.location='../../media.php?module=karta_tama&act=read&id_tipo=". $_POST['id_tipu'] ."'</script>";
		}else{
			echo "<script>alert('Error..!')</script>";
			echo "<script>window.location='../../media.php?module=karta_tama&act=read&id_tipo=". $_POST['id_tipu'] ."'</script>";
		}
		break;
		case 'update':
			$updateData = [
				'data_karta_tama' => input_text($_POST['data_karta_tama']), 
				'data_karta' => input_text($_POST['data_karta']),
				'no_ref' => input_text($_POST['no_ref']),
				'husi_instituisaun' => input_text($_POST['husi_instituisaun']),
				'id_diresaun' => input_text($_POST['id_diresaun']),
				'asuntu' => input_text($_POST['asuntu']),
				'id_funsionario' => input_text($_POST['id_funsionario']),
				];
			$condition = ['id_karta_tama' => $_GET['id_karta_tama']];
		 // Assuming an ID of 1


		if ($crud->Update('t_karta_tama', $updateData, $condition)) {
			echo "<script>alert('Hadia dadus ho Sucessu..!')</script>";
			echo "<script>window.location='../../media.php?module=karta_tama&act=read&id_tipo=". $_GET['id_tipo'] ."'</script>";
		}else{
			echo "<script>alert('Faila..!')</script>";
			echo "<script>window.location='../../media.php?module=karta_tama&act=read&id_tipo=". $_GET['id_tipo'] ."'</script>";
		}			
		break;
		case 'delete':
			$id = ['id_karta_tama' => decrypt($_GET['id_karta_tama'])];
			 if ($crud->Delete('t_karta_tama', $id)) {
			 		echo "<script>alert('Hamoos dadus ho susessu...!')</script>";
                	echo "<script>window.location='../../media.php?module=karta_tama&act=read&id_tipo=". $_GET['id_tipo'] ."'</script>";
				}else{
					echo "<script>alert('Hamoos dadus ho susessu...!')</script>";
                	echo "<script>window.location='../../media.php?module=karta_tama&act=read&id_tipo=". $_GET['id_tipo'] ."'</script>";
				}
			break;
			case 'despaiso':
				$date = date('Y-m-d');
				if (!$karta_tama->despaiso_karta($date, $_POST['obs'], $_GET['id_karta_tama'])) {
			 		echo "<script>alert('Karta despaiso ho susessu...!')</script>";
                	echo "<script>window.location='../../media.php?module=karta_tama&act=read&id_tipo=". $_GET['id_tipo'] ."'</script>";
				}else{
					echo "<script>alert('Faila')</script>";
                	echo "<script>window.location='../../media.php?module=karta_tama&act=read&id_tipo=". $_GET['id_tipo'] ."'</script>";
				}
				break;
			case 'knasela_despaiso':
				if (!$karta_tama->kansela_despaiso_karta($_GET['id_karta_tama'])) {
			 		echo "<script>alert('Karta despaiso Kansela ho susessu...!')</script>";
                	echo "<script>window.location='../../media.php?module=karta_tama&act=read&id_tipo=". $_GET['id_tipo'] ."'</script>";
				}else{
					echo "<script>alert('Faila')</script>";
                	echo "<script>window.location='../../media.php?module=karta_tama&act=read&id_tipo=". $_GET['id_tipo'] ."'</script>";
				}
				break;
			case 'arquivo':
				$date = date('Y-m-d');
				if (!$karta_tama->arquivo_karata($date,$_GET['id_karta_tama'])) {
			 		echo "<script>alert('Dadus Arquivo ho susessu...!')</script>";
                	echo "<script>window.location='../../media.php?module=karta_tama&act=read&id_tipo=". $_GET['id_tipo'] ."'</script>";
				}else{
					echo "<script>alert('Failla arquivo dadus...!')</script>";
                	echo "<script>window.location='../../media.php?module=karta_tama&act=read&id_tipo=". $_GET['id_tipo'] ."'</script>";
				}
				break;
			case 'kansela_arquivo':
				if (!$karta_tama->kansela_arquivo_karata($_GET['id_karta_tama'])) {
			 		echo "<script>alert('Kansela dadus arquivo ho susessu...!')</script>";
                	echo "<script>window.location='../../media.php?module=karta_tama&act=read&id_tipo=". $_GET['id_tipo'] ."'</script>";
				}else{
					echo "<script>alert('Faila arquivo dadus..!')</script>";
                	echo "<script>window.location='../../media.php?module=karta_tama&act=read&id_tipo=". $_GET['id_tipo'] ."'</script>";
				}
				break;
}



?>
