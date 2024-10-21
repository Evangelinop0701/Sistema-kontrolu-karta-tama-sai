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
$periodo = new Periodo($pdo);


switch ($_GET['act']) {
    case 'insert':
        $data = [
            'naran_mun' => input_text($_POST['naran_mun']),

        ];


        if ($crud->Create('t_mun', $data)) {
            echo "<script>alert('Dados rai ho Sucessu..!')</script>";
            echo "<script>window.location='../../media.php?module=mps&act=read'</script>";
        } else {
            echo "<script>alert('Error..!')</script>";
            echo "<script>window.location='../../media.php?module=mps&act=read'</script>";
        }
        break;
    case 'update_mun':
        $updateData = [
            'naran_mun' => input_text($_POST['naran_mun']),
            
            ];
        $condition = ['id_mun' => $_GET['id_mun']];
        // Assuming an ID of 1


        if ($crud->Update('t_mun', $updateData, $condition)) {
            echo "<script>alert('Hadia dadus ho Sucessu..!')</script>";
            echo "<script>window.location='../../media.php?module=mps&act=read'</script>";
        } else {
            echo "<script>alert('Faila..!')</script>";
            echo "<script>window.location='../../media.php?module=mps&act=read'</script>";
        }
        break;
    case 'delete_mun':
        $id = ['id_mun' => $_GET['id_mun']];
        if ($crud->Delete('t_mun', $id)) {
            echo "<script>alert('Hamoos dadus ho susessu...!')</script>";
            echo "<script>window.location='../../media.php?module=mps&act=read'</script>";
        } else {
            echo "<script>alert('Hamoos dadus ho susessu...!')</script>";
            echo "<script>window.location='../../media.php?module=mps&act=read'</script>";
        }
        break;
    case 'insert_postu':
       	$data = [
            'postu' => input_text($_POST['postu']),
            'id_mun' => input_text($_POST['id_mun']),

        ];


        if ($crud->Create('t_postu', $data)) {
            echo "<script>alert('Dados rai ho Sucessu..!')</script>";
            echo "<script>window.location='../../media.php?module=mps&act=read'</script>";
        } else {
            echo "<script>alert('Error..!')</script>";
            echo "<script>window.location='../../media.php?module=mps&act=read'</script>";
        }
        break;
        case 'update_postu':
        	$updateData = [
            'postu' => input_text($_POST['postu']),
            'id_mun' => input_text($_POST['id_mun']),
            
            ];
        $condition = ['id_postu' => $_GET['id_postu']];
        // Assuming an ID of 1


        if ($crud->Update('t_postu', $updateData, $condition)) {
            echo "<script>alert('Hadia dadus ho Sucessu..!')</script>";
            echo "<script>window.location='../../media.php?module=mps&act=read'</script>";
        } else {
            echo "<script>alert('Faila..!')</script>";
            echo "<script>window.location='../../media.php?module=mps&act=read'</script>";
        }
        	break;
        case 'delete_postu':
        	 $id = ['id_postu' => $_GET['id_postu']];
		        if ($crud->Delete('t_postu', $id)) {
		            echo "<script>alert('Hamoos dadus ho susessu...!')</script>";
		            echo "<script>window.location='../../media.php?module=mps&act=read'</script>";
		        } else {
		            echo "<script>alert('Hamoos dadus ho susessu...!')</script>";
		            echo "<script>window.location='../../media.php?module=mps&act=read'</script>";
		        }
        	break;

        	// ====================================================================
        case 'insert_suku':
       	$data = [
            'suku' => input_text($_POST['suku']),
            'id_postu' => input_text($_POST['id_postu']),

        ];


        if ($crud->Create('t_suku', $data)) {
            echo "<script>alert('Dados rai ho Sucessu..!')</script>";
            echo "<script>window.location='../../media.php?module=mps&act=read'</script>";
        } else {
            echo "<script>alert('Error..!')</script>";
            echo "<script>window.location='../../media.php?module=mps&act=read'</script>";
        }
        break;
        case 'update_suku':
        	$updateData = [
            'suku' => input_text($_POST['suku']),
            'id_postu' => input_text($_POST['id_postu']),
            
            ];
        $condition = ['id_suku' => $_GET['id_suku']];
        // Assuming an ID of 1


        if ($crud->Update('t_suku', $updateData, $condition)) {
            echo "<script>alert('Hadia dadus ho Sucessu..!')</script>";
            echo "<script>window.location='../../media.php?module=mps&act=read'</script>";
        } else {
            echo "<script>alert('Faila..!')</script>";
            echo "<script>window.location='../../media.php?module=mps&act=read'</script>";
        }
        	break;
        case 'delete_suku':
        	 $id = ['id_suku' => $_GET['id_suku']];
		        if ($crud->Delete('t_suku', $id)) {
		            echo "<script>alert('Hamoos dadus ho susessu...!')</script>";
		            echo "<script>window.location='../../media.php?module=mps&act=read'</script>";
		        } else {
		            echo "<script>alert('Hamoos dadus ho susessu...!')</script>";
		            echo "<script>window.location='../../media.php?module=mps&act=read'</script>";
		        }
        	break;
}