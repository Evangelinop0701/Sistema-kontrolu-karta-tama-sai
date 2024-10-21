<?php
error_reporting(0);
include "class/Database.php";
include "class/crud.php";
include "class/ecrypt_id.php";

$database = new Database();
$db = $database->getConnection();

$fun = new Funsionario($db);
$periodo = new Periodo($db);
$mps = new Mps($db);
$posisaun = new Posisaun($db);
$karta_tama = new Karta_tama($db);
$tipu = new Tipo_karta($db);
$diresaun = new Diresaun($db);
$user = new User($db);
$karta_sai = new Karta_sai($db);
$total_tipo_kada = new Baranda($db);


$total_kt = $total_tipo_kada->total_karta_tama();
$total_kt_des = $total_tipo_kada->total_kt_des();
$total_kt_arq = $total_tipo_kada->total_kt_arkivo();
$total_kt_sai = $total_tipo_kada->total_karta_sai();

$level_user = $fun->level_user($_SESSION['id_fun']);

if (!$user->get_sessi()) {
    header('location: blank-page.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema Gestau karta tama sai Gabinete PAM</title>

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="assets/datatablesBootV3.2.0/css/bootstrap.min.css"> -->

    <!-- DataTables CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css"> -->
    <link rel="stylesheet" href="assets/datatablesBootV3.2.0/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="assets/datatablesBootV3.2.0/css/dataTables.bootstrap.min.css">

    <!-- jQuery -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script src="assets/datatablesBootV3.2.0/js/jquery-3.6.0.min.js"></script>
    <script src="charts/Chart.min.js"></script>

    <!-- Bootstrap JS -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->
    <!-- <script src="assets/datatablesBootV3.2.0/js/bootstrap.min.js"></script> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-9/5N2kzyVp2cK5kU2BQoGCmBYA5x5mP2LnMNqrDcvKuWu1pD7v4AlwFz+nEOU4N+PMrKlSHeRxWgI8K+XYy+mQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js" integrity="sha512-Ylq8CHkcS8O91d/FNQCOW3/8LMY9DcvVxP1/lUzREuFPm0SYXCNQ2z5IcENHPCg5OPr3sU6+1C+/5zGqI0EH+w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->


    <!-- DataTables JS -->
    <!-- <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script> -->
    <script src="assets/datatablesBootV3.2.0/js/jquery.dataTables.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap.min.js"></script> -->
    <script src="assets/datatablesBootV3.2.0/js/dataTables.bootstrap.min.js"></script>



    <script type='text/javascript'>
    // JavaScript anonymous function
    (() => {
        if (window.localStorage) {

            // If there is no item as 'reload'
            // in localstorage then create one &
            // reload the page
            if (!localStorage.getItem('reload')) {
                localStorage['reload'] = true;
                window.location.reload();
            } else {

                // If there exists a 'reload' item
                // then clear the 'reload' item in
                // local storage
                localStorage.removeItem('reload');
            }
        }
    })(); // Calling anonymous function here only
    </script>
    <!-- javascrip load automatic -->


    <!-- ------------------------------------------------------------------------------------------------------ -->

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->

    <!-- Custom Fonts -->
    <link href="assets/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body style="background-color: white; ">

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="?module=home" style="font-weight: bold; color: white;">Sistema Kontrolo dadus karta tama
                    sai GAB PAM / <u><?= $_SESSION['level_user']; ?></u></a>
            </div>
            <!-- Top Menu Items -->
            <?php include "menu_top.php"; ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php include "menu_side.php"; ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <?php include "content.php"; ?>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        <footer style="text-align: center; background-color: white; ">&copy; Copyright Estudante Etagiadus
            Engenharia Informatica
            UNTL - Hera 2024 <br><br><br><br><br><br></footer>

    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#example').DataTable({
            "language": {
                "search": "Filter records:"
            },
            "drawCallback": function() {
                // Apply the Font Awesome icon to sorting headers
                $('.dataTables_sorting').append('<span class="dataTables_sort_icon"></span>');
            }
        });
    });
    </script>

    <script>
    var ctx = document.getElementById('myBarChart').getContext('2d');
    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?php foreach ($total_tipo_kada->Total_tipo_kada() as $key) {

                echo '"' . $key['tipo_karta'] . '",';

            } ?>],
            datasets: [{
                label: 'Total Tipo Karta tama',
                data: [<?php foreach ($total_tipo_kada->Total_tipo_kada() as $row) {

                    echo '"' . $row['total_tipo'] . '",';

                } ?>],
                backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                borderColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                borderWidth: 0
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>
    <!-- -------------------------------------------------------- -->
    <script>
    var ctx = document.getElementById('myBarChartKada').getContext('2d');
    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [<?php foreach ($total_tipo_kada->karta_tama_kada_fulan(@$_GET['id_tipo'],$_GET['tinan']) as $key) {

                echo '"' . $key['fulan'] . '",';

            } ?>],
            datasets: [{
                label: 'Total Tipo Karta tama Kada Fulan',
                data: [<?php foreach ($total_tipo_kada->karta_tama_kada_fulan(@$_GET['id_tipo'],$_GET['tinan']) as $row) {

                    echo '"' . $row['total'] . '",';

                } ?>],
                backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                borderColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                borderWidth: 0
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>

</body>

</html>