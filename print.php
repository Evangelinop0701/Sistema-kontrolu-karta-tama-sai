<?php
error_reporting();
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


if (!$user->get_sessi()) {
    header('location: index.php');
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

    <style>
    .customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    .customers td,
    .customers th {
        border: 1px solid #ddd;
        padding: 3px;
        text-align: center;
    }


    .customers tr:nth-child(even) {
        /*background-color: #f2f2f2;*/
    }

    .customers tr:hover {
        /*background-color: #ddd;*/
    }

    .customers th {
        padding-top: 2px;
        padding-bottom: 2px;
        text-align: center;
        /* text-align: center; */
        /* background-color: #04AA6D; */
        /* color: white; */
    }


    @media print {
        #print {
            display: none;
        }
    }

    @media print {
        #PrintButton {
            display: none;
        }
    }

    @page {
        size: auto;
        /* auto is the initial value */
        margin: 0;
        /* this affects the margin in the printer settings */
    }
    </style>

</head>

<body style="background-color: white; ">

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="text-uppercase text-center">Relatorio karta tama no sai kada tinan</h3>
                <hr style="border-width: 5px; border-radius: 10px; border-color: black;">
            </div>
            <?php 
                    $per = $periodo->Read_tinan();
                    foreach ($per as $keys) {?>
            <div class="panel panel-default" style="border-radius: 0px;">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h5 class="text-center text-uppercase" style="padding: 0; margin: 0;">Karta tama no sai periodo
                            - <?= $keys['tinan'] ?></h5>
                    </div>
                </div>
                <div class="panel-body">

                    <div class="col-md-7" style="padding: 0; margin: 0;">
                        <table class="customers">
                            <thead>
                                <tr>
                                    <th colspan="6"><b style="color: red;">KARTA TAMA</b></th>
                                </tr>
                                <tr>
                                    <th>No</th>
                                    <th>Tipo Karta</th>
                                    <th>Total Karta</th>
                                    <th>Despaiso</th>
                                    <th>Arquivo</th>
                                    <th>Obs</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                            $no = 1;
						        $data_t = $total_tipo_kada->Total_kada_periodo($keys['tinan']);
						        foreach ($data_t as $row) {?>
                                <tr>
                                    <td><?=$no; ?></td>
                                    <td style="text-align:left;"><?=$row['tipo_karta']; ?></td>
                                    <td class="text-center"><?=$row['total_tipo']; ?></td>
                                    <?php foreach ($total_tipo_kada->Relatorio_karta_tama($row['id_tipu'],$keys['tinan']) as $key) { ?>
                                    <td class="text-center"><?= $key['total_des'] ?></td>
                                    <?php } ?>
                                    <?php foreach ($total_tipo_kada->Relatorio_karta_tama_arquivo($row['id_tipu'],$keys['tinan']) as $key) { ?>
                                    <td class="text-center"><?= $key['total_ark'] ?></td>
                                    <?php } ?>
                                    <?php foreach ($total_tipo_kada->Total_obs($row['id_tipu'],$keys['tinan']) as $obs) { ?>
                                    <td class="text-center"><?= $obs['total_des'] ?></td>
                                    <?php } ?>

                                </tr>
                                <?php $no++;
        						} ?>
                            </tbody>

                        </table>
                    </div>

                    <div class="col-md-5" style="padding-left: 12px; padding-right: 0; margin: 0;">
                        <table class="customers">
                            <thead>
                                <tr>
                                    <td colspan="3"><b style="color: red;">KARTA SAI</b></td>
                                </tr>
                                <tr>
                                    <th>No</th>
                                    <th>Fulan</th>
                                    <th>Total Karta</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                            $data2 = $total_tipo_kada->karta_sai_periodo($keys['tinan']);
						        $no2 = 1;

						        foreach ($data2 as $rws) {?>
                                <tr>
                                    <td style="text-align: center;"><?= $no2; ?></td>
                                    <td><?= $rws['fulan']; ?></td>
                                    <td style="text-align: center;"><?= $rws['total_ks']; ?></td>
                                </tr>
                                <?php $no2++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <?php } ?>
        </div>
    </div>
    <script src="js/jquery-1.11.0.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>

    <?php if ($_SESSION['level_user'] == "Sekretatria") { ?>

    <script type="text/javascript">
    function PrintPage() {
        window.print();
    }
    document.loaded = function() {

    }
    window.addEventListener('DOMContentLoaded', (event) => {
        PrintPage()
        setTimeout(function() {
            window.close()
        }, 750)
    });
    </script>
    <?php } ?>
</body>

</html>