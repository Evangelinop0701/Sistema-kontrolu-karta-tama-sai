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
	$image = $_FILES['image'];

	if (!empty($_FILES['image']['tmp_name'])) {
		$allowed_types = ['image/jpeg', 'image/png'];
		    if (!in_array($image['type'], $allowed_types)) {
		        die("Invalid file type.");
		    }

		    $upload_dir = '../../foto_fun/';
		    $file_name = uniqid() . '-' . basename($image['name']);
		    $upload_file = $upload_dir . $file_name;

		    if (!move_uploaded_file($image['tmp_name'], $upload_file)) {
		        die("Failed to move uploaded file.");
    	}

		$data = [
			'naran_fun' => input_text($_POST['naran_fun']), 
			'sexu' => input_text($_POST['sexu']),
			'data_moris' => input_text($_POST['data_moris']),
			'no_tlf' => input_text($_POST['no_tlf']),
			'email' => input_text($_POST['email']),
			'id_posisaun' => input_text($_POST['id_posisaun']),
			'departemetu' => input_text($_POST['departemetu']),
			'data_hahu_ser' => input_text($_POST['data_hahu_ser']),
			'id_periodo' => input_text($_POST['id_periodo']),
			'id_suku' => input_text($_POST['id_suku']),
			'status_servisu' => input_text($_POST['status_servisu']),
			'enderesu' => input_text($_POST['enderesu']),
			'estadu_sivil' => input_text($_POST['estadu_sivil']),
			'albilidade_lite' => input_text($_POST['albilidade_lite']),
			'perfil_servisu' => input_text($_POST['perfil_servisu']),
			'areas_formasaun' => input_text($_POST['areas_formasaun']),
			'salrio' => input_text($_POST['salrio']),
			'esperensia_servisu' => input_text($_POST['esperensia_servisu']),
			'foto' => $file_name,
			
			
		];


		if ($crud->Create('t_funsionario', $data)) {
			$dadus = $fun->select_form(null,$_POST['naran_fun']);
			$uname = explode(" ", $dadus[0]['naran_fun']);
			$pass = "password";
			$pass_has = password_hash("password", PASSWORD_BCRYPT);

			$data2 = [ 
			'id_funsionario' => $dadus[0]['id_funsionario'],
			'username' => $uname[0],
			'pas1' => $pass_has,
			'pass2' => $pass,
			'data_login' => date('Y-m-d'),
			];
			$crud->Create('t_user', $data2);
			echo "<script>alert('Dados rai ho Sucessu..!')</script>";
			echo "<script>window.location='../../media.php?module=funsionario&act=read'</script>";
		}else{
			echo "<script>alert('Error..!')</script>";
			echo "<script>window.location='../../media.php?module=funsionario&act=read'</script>";
		}
  }else{
  	$null = "default.png";

		$data = [
			'naran_fun' => input_text($_POST['naran_fun']), 
			'sexu' => input_text($_POST['sexu']),
			'data_moris' => input_text($_POST['data_moris']),
			'no_tlf' => input_text($_POST['no_tlf']),
			'email' => input_text($_POST['email']),
			'id_posisaun' => input_text($_POST['id_posisaun']),
			'departemetu' => input_text($_POST['departemetu']),
			'data_hahu_ser' => input_text($_POST['data_hahu_ser']),
			'id_periodo' => input_text($_POST['id_periodo']),
			'id_suku' => input_text($_POST['id_suku']),
			'status_servisu' => input_text($_POST['status_servisu']),
			'enderesu' => input_text($_POST['enderesu']),
			'estadu_sivil' => input_text($_POST['estadu_sivil']),
			'albilidade_lite' => input_text($_POST['albilidade_lite']),
			'perfil_servisu' => input_text($_POST['perfil_servisu']),
			'areas_formasaun' => input_text($_POST['areas_formasaun']),
			'salrio' => input_text($_POST['salrio']),
			'esperensia_servisu' => input_text($_POST['esperensia_servisu']),
			'foto' => $null,
			
			
		];


		if ($crud->Create('t_funsionario', $data)) {
			$dadus = $fun->select_form(null,$_POST['naran_fun']);
			$uname = explode(" ", $dadus[0]['naran_fun']);
			$pass = "password";
			$pass_has = password_hash("password", PASSWORD_BCRYPT);

			$data2 = [ 
			'id_funsionario' => $dadus[0]['id_funsionario'],
			'username' => $uname[0],
			'pas1' => $pass_has,
			'pass2' => $pass,
			'data_login' => date('Y-m-d'),
			];
			$crud->Create('t_user', $data2);
			echo "<script>alert('Dados rai ho Sucessu..!')</script>";
			echo "<script>window.location='../../media.php?module=funsionario&act=read'</script>";
		}else{
			echo "<script>alert('Error..!')</script>";
			echo "<script>window.location='../../media.php?module=funsionario&act=read'</script>";
		}
  }
		break;
		case 'update':
		$image = $_FILES['image'];

		if (!empty($_FILES['image']['tmp_name'])) {
			$allowed_types = ['image/jpeg', 'image/png'];
		    if (!in_array($image['type'], $allowed_types)) {
		        die("Invalid file type.");
		    }

		    $upload_dir = '../../foto_fun/';
		    $file_name = uniqid() . '-' . basename($image['name']);
		    $upload_file = $upload_dir . $file_name;

		    $dell = $_POST['image_dell'];

		    if(!empty($_POST['image_dell'])){
		    	unlink("../../foto_fun/$dell");
		    	if (!move_uploaded_file($image['tmp_name'], $upload_file)) {
		        die("Failed to move uploaded file.");
		    	}
		    }else{
		    	if (!move_uploaded_file($image['tmp_name'], $upload_file)) {
		        die("Failed to move uploaded file.");
		    	}
		    }


			$updateData = [
				'naran_fun' => input_text($_POST['naran_fun']), 
				'sexu' => input_text($_POST['sexu']),
				'data_moris' => input_text($_POST['data_moris']),
				'no_tlf' => input_text($_POST['no_tlf']),
				'email' => input_text($_POST['email']),
				'id_posisaun' => input_text($_POST['id_posisaun']),
				'departemetu' => input_text($_POST['departemetu']),
				'data_hahu_ser' => input_text($_POST['data_hahu_ser']),
				'id_periodo' => input_text($_POST['id_periodo']),
				'id_suku' => input_text($_POST['id_suku']),
				'status_servisu' => input_text($_POST['status_servisu']),
				'enderesu' => input_text($_POST['enderesu']),
				'estadu_sivil' => input_text($_POST['estadu_sivil']),
				'albilidade_lite' => input_text($_POST['albilidade_lite']),
				'perfil_servisu' => input_text($_POST['perfil_servisu']),
				'areas_formasaun' => input_text($_POST['areas_formasaun']),
				'salrio' => input_text($_POST['salrio']),
				'esperensia_servisu' => input_text($_POST['esperensia_servisu']),
				'foto' => $file_name,
				];
				$condition = ['id_funsionario' => decrypt($_GET['id_fun'])];
		 // Assuming an ID of 1


		if ($crud->Update('t_funsionario', $updateData, $condition)) {
			echo "<script>alert('Hadia dadus ho Sucessu..!')</script>";
			echo "<script>window.location='../../media.php?module=funsionario&act=read'</script>";
		}else{
			echo "<script>alert('Faila..!')</script>";
			echo "<script>window.location='../../media.php?module=funsionario&act=read'</script>";
		}
	}else{

		$updateData = [
				'naran_fun' => input_text($_POST['naran_fun']), 
				'sexu' => input_text($_POST['sexu']),
				'data_moris' => input_text($_POST['data_moris']),
				'no_tlf' => input_text($_POST['no_tlf']),
				'email' => input_text($_POST['email']),
				'id_posisaun' => input_text($_POST['id_posisaun']),
				'departemetu' => input_text($_POST['departemetu']),
				'data_hahu_ser' => input_text($_POST['data_hahu_ser']),
				'id_periodo' => input_text($_POST['id_periodo']),
				'id_suku' => input_text($_POST['id_suku']),
				'status_servisu' => input_text($_POST['status_servisu']),
				'enderesu' => input_text($_POST['enderesu']),
				'estadu_sivil' => input_text($_POST['estadu_sivil']),
				'albilidade_lite' => input_text($_POST['albilidade_lite']),
				'perfil_servisu' => input_text($_POST['perfil_servisu']),
				'areas_formasaun' => input_text($_POST['areas_formasaun']),
				'salrio' => input_text($_POST['salrio']),
				'esperensia_servisu' => input_text($_POST['esperensia_servisu']),
				'foto' => $_POST['image_dell'],
				];
				$condition = ['id_funsionario' => decrypt($_GET['id_fun'])];
		 // Assuming an ID of 1


		if ($crud->Update('t_funsionario', $updateData, $condition)) {
			echo "<script>alert('Hadia dadus ho Sucessu..!')</script>";
			echo "<script>window.location='../../media.php?module=funsionario&act=read'</script>";
		}else{
			echo "<script>alert('Faila..!')</script>";
			echo "<script>window.location='../../media.php?module=funsionario&act=read'</script>";
		}
	}			
		break;
		case 'delete':
		$fo =$_GET['file'];
			if (!empty($_GET['file'])) {
				unlink("../../foto_fun/$fo");
			}
			$id = ['id_funsionario' => decrypt($_GET['id_fun'])];
			 if ($crud->Delete('t_funsionario', $id)) {
			 		echo "<script>alert('Hamoos dadus ho susessu...!')</script>";
                	echo "<script>window.location='../../media.php?module=funsionario&act=read'</script>";
				}else{
					echo "<script>alert('Hamoos dadus ho susessu...!')</script>";
                	echo "<script>window.location='../../media.php?module=funsionario&act=read'</script>";
				}
			break;
}



?>
