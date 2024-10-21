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
            'data_karta_sai' => input_text($_POST['data_karta_sai']),
            'titlu_karta' => input_text($_POST['titlu_karta']),
            'no_reff_sai' => input_text($_POST['no_reff_sai']),
            'asuntu' => input_text($_POST['asuntu']),
            'id_diresaun' => input_text($_POST['id_diresaun']),
            'obs' => "",
            'id_funsionairo' => input_text($_POST['id_funsionairo']),
            'status_karta' => "",


        ];


        if ($crud->Create('t_karta_sai', $data)) {
            echo "<script>alert('Dados rai ho Sucessu..!')</script>";
            echo "<script>window.location='../../media.php?module=karta_sai&act=read'</script>";
        } else {
            echo "<script>alert('Error..!')</script>";
            echo "<script>window.location='../../media.php?module=karta_sai&act=read'</script>";
        }
        break;
    case 'update':
        $updateData = [
            'data_karta_sai' => input_text($_POST['data_karta_sai']),
            'titlu_karta' => input_text($_POST['titlu_karta']),
            'no_reff_sai' => input_text($_POST['no_reff_sai']),
            'asuntu' => input_text($_POST['asuntu']),
            'id_diresaun' => input_text($_POST['id_diresaun']),
            ];
        $condition = ['id_karta_sai' => $_GET['id_karta_sai']];
        // Assuming an ID of 1


        if ($crud->Update('t_karta_sai', $updateData, $condition)) {
            echo "<script>alert('Hadia dadus ho Sucessu..!')</script>";
            echo "<script>window.location='../../media.php?module=karta_sai&act=read'</script>";
        } else {
            echo "<script>alert('Faila..!')</script>";
            echo "<script>window.location='../../media.php?module=karta_sai&act=read'</script>";
        }
        break;
    case 'delete':
        $id = ['id_karta_sai' => decrypt($_GET['id_karta_sai'])];
        if ($crud->Delete('t_karta_sai', $id)) {
            echo "<script>alert('Hamoos dadus ho susessu...!')</script>";
            echo "<script>window.location='../../media.php?module=karta_sai&act=read'</script>";
        } else {
            echo "<script>alert('Hamoos dadus ho susessu...!')</script>";
            echo "<script>window.location='../../media.php?module=karta_sai&act=read'</script>";
        }
        break;
}
