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
            'periodo' => input_text($_POST['periodo']),
            'status_periodo' => "",
            'data_periodo' => input_text($_POST['data_periodo']),
        ];


        if ($crud->Create('t_periodo', $data)) {
            echo "<script>alert('Dados rai ho Sucessu..!')</script>";
            echo "<script>window.location='../../media.php?module=periodo&act=read'</script>";
        } else {
            echo "<script>alert('Error..!')</script>";
            echo "<script>window.location='../../media.php?module=periodo&act=read'</script>";
        }
        break;
    case 'update':
        $updateData = [
            'periodo' => input_text($_POST['periodo']),
            'data_periodo' => input_text($_POST['data_periodo']),
            ];
        $condition = ['id_periodo' => $_GET['id_periodo']];
        // Assuming an ID of 1


        if ($crud->Update('t_periodo', $updateData, $condition)) {
            echo "<script>alert('Hadia dadus ho Sucessu..!')</script>";
            echo "<script>window.location='../../media.php?module=periodo&act=read'</script>";
        } else {
            echo "<script>alert('Faila..!')</script>";
            echo "<script>window.location='../../media.php?module=periodo&act=read'</script>";
        }
        break;
    case 'delete':
        $id = ['id_periodo' => decrypt($_GET['id_periodo'])];
        if ($crud->Delete('t_periodo', $id)) {
            echo "<script>alert('Hamoos dadus ho susessu...!')</script>";
            echo "<script>window.location='../../media.php?module=periodo&act=read'</script>";
        } else {
            echo "<script>alert('Hamoos dadus ho susessu...!')</script>";
            echo "<script>window.location='../../media.php?module=periodo&act=read'</script>";
        }
        break;
    case 'update_status':
        if (!$periodo->update_status($_GET['id_periodo'])) {
            // echo "<script>alert('Ativasaun ho susessu...!')</script>";
            echo "<script>window.location='../../media.php?module=periodo&act=read'</script>";
        }
        break;
    case 'kansela_status':
         if (!$periodo->kansela_status($_GET['id_periodo'])) {
            // echo "<script>alert('Ativasaun ho susessu...!')</script>";
            echo "<script>window.location='../../media.php?module=periodo&act=read'</script>";
        }
        break;
}