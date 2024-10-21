<?php
switch ($_GET['act']) {
    case 'read_periodo': ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Relatorio Karta Tama no Sai Baseia ba Periodo <small></small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-home"></i> Relatorio baseia ba Periodo
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3"> </div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Relatorio Karta tama Sai baseia ba Periodo

                        <?php if ($_SESSION['level_user'] == "Sekretatria") { ?>
                        <a href="print.php" class="btn btn-xs btn-success" style="color:white;"> <i
                                class="fa fa-print"></i>
                            Imprimir
                            Relatorio</a>
                        <?php } else {?>
                        <a href="print.php" class="btn btn-xs btn-success" style="color:white;"> <i
                                class="fa fa-print"></i>
                            Relatorio Jeral
                        </a>
                        <?php } ?>

                    </h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>Perido</td>
                                <td>
                                    <?php if ($_SESSION['level_user'] == "Sekretatria") {
                                        echo "Imprimir Relatorio";
                                    } else {
                                        echo "Relatorio Kada Tinan";
                                    } ?>
                                </td>
                            </tr>
                            <?php
                            $per = $periodo->Read_tinan();
        foreach ($per as $key) {?>
                            <tr>
                                <th class="text-center"><a
                                        href="?module=relatorio&act=read&tinan=<?=$key['tinan'] ?>"><?=$key['tinan'] ?></a>
                                    <?php if ($key['tinan'] == date('Y')) {?>
                                    <i class="fa fa-check text-success"></i>
                                    <?php } else {?>
                                    <i class="fa fa-info-circle text-danger"></i>
                                    <?php } ?>
                                </th>
                                <th>
                                    <?php if ($_SESSION['level_user'] == "Sekretatria") { ?>
                                    <a href="print_kada.php?tinan=<?= $key['tinan'] ?>"
                                        class="btn btn-xs btn-success"><i class="fa fa-print"></i>
                                        Imprimir</a>
                                    <?php } else { ?>
                                    <a href="print_kada.php?tinan=<?= $key['tinan'] ?>"
                                        class="btn btn-xs btn-success"><i class="fa fa-print"></i>
                                        Relatorio Kada Tinan</a>
                                    <?php } ?>
                                </th>
                            </tr>
                            <?php } ?>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3"> </div>
</div>
<?php   break;
    case 'read':?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Relatorio Karta Tama no Sai <small></small>
            </h1>
            <ol class="breadcrumb">
                <li class="active" style="font-weight: bold;">
                    <a href="?module=home">Home</a>
                </li>
                <li class="active" style="font-weight: bold;">
                    <a href="?module=relatorio&act=read_periodo">Periodo</a>
                </li>
                <li class="active">
                    Relatorio Jeral
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title"> <b>Relatorio Karta Tama periodo - <span
                                class="text-primary">[<?=$_GET['tinan']?>]</span></b></h2>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
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
        $data_t = $total_tipo_kada->Total_kada_periodo($_GET['tinan']);
        foreach ($data_t as $row) {?>
                            <tr>
                                <td><?=$no; ?></td>
                                <td><a
                                        href="?module=relatorio&act=read_kada_fulan&id_tipo=<?=$row['id_tipu'] ?>&tinan=<?=$_GET['tinan']; ?>&tinan=<?=$_GET['tinan']; ?>"><?=$row['tipo_karta']; ?></a>
                                </td>
                                <td class="text-center"><a
                                        href="?module=relatorio&act=read_kada_tipo&id_tipo=<?=$row['id_tipu'] ?>&tinan=<?=$_GET['tinan']; ?>"><?=$row['total_tipo']; ?></a>
                                </td>
                                <?php foreach ($total_tipo_kada->Relatorio_karta_tama($row['id_tipu'], $_GET['tinan']) as $key) { ?>
                                <td class="text-center"><a
                                        href="?module=relatorio&act=read_despaiso&id_tipo=<?=$row['id_tipu'] ?>&tinan=<?=$_GET['tinan'] ?>"><?= $key['total_des'] ?></a>
                                </td>
                                <?php } ?>
                                <?php foreach ($total_tipo_kada->Relatorio_karta_tama_arquivo($row['id_tipu'], $_GET['tinan']) as $key) { ?>
                                <td class="text-center"><a
                                        href="?module=relatorio&act=read_dt_arq&id_tipo=<?=$row['id_tipu'] ?>&tinan=<?=$_GET['tinan'] ?>"><?= $key['total_ark'] ?></a>
                                </td>
                                <?php } ?>
                                <?php foreach ($total_tipo_kada->Total_obs($row['id_tipu'], $_GET['tinan']) as $obs) { ?>
                                <td class="text-center"><a
                                        href="?module=karta_tama&act=read_obs&id_tipo=<?= $row['id_tipu']; ?>&tinan2=<?= $_GET['tinan'] ?>"><?= $obs['total_des'] ?></a>
                                </td>
                                <?php } ?>

                            </tr>
                            <?php $no++;
        } ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title"> <b>Relatorio Karta Sai periodo - <span
                                class="text-primary">[<?=$_GET['tinan']?>]</span></b></h2>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Fulan</th>
                                <th>Total Karta</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

            $data = $total_tipo_kada->karta_sai_periodo($_GET['tinan']);
        $no = 1;

        foreach ($data as $key) {?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td style="text-align:center;"><?= $key['fulan']; ?></td>
                                <td style="text-align:center;"><a
                                        href="?module=relatorio&act=read_karta_sai&fulan=<?=$key['no_fulan'] ?>&tinan=<?=$_GET['tinan'] ?>"><?= $key['total_ks']; ?></a>
                                </td>
                            </tr>
                            <?php $no++;
        } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.row -->

</div>

<?php break;
    case 'read_kada_tipo': ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Karta Tama<small></small>
            </h2>
            <ol class="breadcrumb">
                <li class="active" style="font-weight: bold;">
                    <a href="?module=home">Home</a>
                </li>
                <li class="active" style="font-weight: bold;">
                    <a href="?module=relatorio&act=read_tipo">Relatorio</a>
                </li>
                <li class="active">
                    Karta Tama
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->




    <!-- /.row -->




    <?php

                    $id = $_GET['id_tipo'];
        $data = $karta_tama->Read_karta_tama_tinan($id, $_GET['tinan']);
        ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"> Karta Tama</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped" id="example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Data Karta Tama</th>
                                    <th>Data Karta</th>
                                    <th>No. Reff</th>
                                    <th>Diresaun</th>
                                    <th>Asuntu</th>
                                    <th>Data Despaiso</th>
                                    <th>Data Arkivu</th>
                                    <th>Obs</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                   $no = 1;

        foreach ($data as $row) {?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= htmlspecialchars($row['data_karta_tama']); ?></td>
                                    <td><?= htmlspecialchars($row['data_karta']); ?></td>
                                    <td>
                                        <a
                                            href="?module=karta_tama&act=detallu_karta&id_karta_tama=<?=$row['id_karta_tama'] ?>&id_tipo=<?=$row['id_tipu'] ?>">
                                            Reff: <?= htmlspecialchars($row['no_ref']); ?></a>
                                    </td>
                                    <td><?= htmlspecialchars($row['diresaun']); ?></td>
                                    <td><?= htmlspecialchars($row['asuntu']); ?></td>
                                    <td><?= htmlspecialchars($row['data_despaiso']) ?></td>
                                    <td><?= htmlspecialchars($row['data_arquivo']) ?></td>
                                    <td><?= htmlspecialchars($row['obs']) ?></td>

                                </tr>
                                <?php $no++;
        } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- <div class="text-right">
                                    <a href="#">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
                                </div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</div>

<?php break;
    case 'read_kada_fulan':
        $tpkt = $tipu->select_form($_GET['id_tipo']);
        ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Relatorio Karta Tama Kada Fulan <small></small>
            </h1>
            <ol class="breadcrumb">
                <li class="active" style="font-weight: bold;">
                    <a href="?module=home">Home</a>
                </li>
                <li class="active" style="font-weight: bold;">
                    <a href="?module=relatorio&act=read&tinan=<?=$_GET['tinan']?>">Relatorio</a>
                </li>
                <li class="active">
                    Relatorio Kada fulan
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-7">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"> Relatorio Kada Fulan Tipo karta - <b
                            class="text-primary">[<?=$tpkt[0]['tipo_karta'] ?>]</b>
                    </h3>
                </div>
                <div class="panel-body">
                    <canvas id="myBarChartKada"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Relatorio Kada Fulan Tipo karta - <b
                            class="text-primary">[<?=$tpkt[0]['tipo_karta'] ?>]</b></h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>No</th>
                            <th>Fulan</th>
                            <th>Total</th>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
        $dtm = $total_tipo_kada->karta_tama_kada_fulan($_GET['id_tipo'], $_GET['tinan']);
        foreach ($dtm as $key) { ?>
                            <tr>
                                <td><?=$no; ?></td>
                                <td><?=$key['fulan']; ?></td>
                                <td><?=$key['total']; ?></td>
                            </tr>
                            <?php $no++;
        } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<?php break;
    case 'read_despaiso': ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Relatorio Karta Tama Despaiso <small></small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-home"></i> Relatorio
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title"> <b>Relatorio Karta Despasio</b></h2>
                </div>
                <div class="panel-body">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"> Karta Despaiso</h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped" id="example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Data Karta Tama</th>
                                            <th>Data Karta</th>
                                            <th>No. Reff</th>
                                            <th>Diresaun</th>
                                            <th>Asuntu</th>
                                            <th>Data Despaiso</th>
                                            <th>Data Arkivu</th>
                                            <th>Obs</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                       $no = 1;
        $ktama = $karta_tama->data_karta_despaiso($_GET['id_tipo'], $_GET['tinan']);
        foreach ($ktama as $row) {?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= htmlspecialchars($row['data_karta_tama']); ?></td>
                                            <td><?= htmlspecialchars($row['data_karta']); ?></td>
                                            <td>
                                                <a
                                                    href="?module=karta_tama&act=detallu_karta&id_karta_tama=<?=$row['id_karta_tama'] ?>&id_tipo=<?=$row['id_tipu'] ?>">
                                                    Reff: <?= htmlspecialchars($row['no_ref']); ?></a>
                                            </td>
                                            <td><?= htmlspecialchars($row['diresaun']); ?></td>
                                            <td><?= htmlspecialchars($row['asuntu']); ?></td>
                                            <td><?= htmlspecialchars($row['data_despaiso']) ?></td>
                                            <td><?= htmlspecialchars($row['data_arquivo']) ?></td>
                                            <td><?= htmlspecialchars($row['obs']) ?></td>

                                        </tr>
                                        <?php $no++;
        } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- <div class="text-right">
                                    <a href="#">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
                                </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</div>

<?php break;
    case 'read_dt_arq': ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Relatorio Karta Tama Arquivado <small></small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-home"></i> Relatorio
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title"> <b>Relatorio Karta Arquivado</b></h2>
                </div>
                <div class="panel-body">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"> Karta Arquivado</h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped" id="example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Data Karta Tama</th>
                                            <th>Data Karta</th>
                                            <th>No. Reff</th>
                                            <th>Diresaun</th>
                                            <th>Asuntu</th>
                                            <th>Data Despaiso</th>
                                            <th>Data Arkivu</th>
                                            <th>Obs</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                       $no = 1;
        $ktama_ta = $karta_tama->data_karta_aquivo($_GET['id_tipo'], $_GET['tinan']);
        foreach ($ktama_ta as $row) {?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= htmlspecialchars($row['data_karta_tama']); ?></td>
                                            <td><?= htmlspecialchars($row['data_karta']); ?></td>
                                            <td>
                                                <a
                                                    href="?module=karta_tama&act=detallu_karta&id_karta_tama=<?=$row['id_karta_tama'] ?>&id_tipo=<?=$row['id_tipu'] ?>">
                                                    Reff: <?= htmlspecialchars($row['no_ref']); ?></a>
                                            </td>
                                            <td><?= htmlspecialchars($row['diresaun']); ?></td>
                                            <td><?= htmlspecialchars($row['asuntu']); ?></td>
                                            <td><?= htmlspecialchars($row['data_despaiso']) ?></td>
                                            <td><?= htmlspecialchars($row['data_arquivo']) ?></td>
                                            <td><?= htmlspecialchars($row['obs']) ?></td>

                                        </tr>
                                        <?php $no++;
        } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- <div class="text-right">
                                    <a href="#">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
                                </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</div>
<?php break;
    case 'read_karta_sai':?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Detallu Karta sai<small></small>
            </h2>
            <ol class="breadcrumb">
                <li class="active" style="font-weight: bold;">
                    <a href="?module=home">Home</a>
                </li>

                <li class="active">
                    Detallu Karta Sai
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->


    <!-- /.row -->


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Detallu Kararta Sai</h3>
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped" id="example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Data Karta Sai</th>
                                    <th>Titulu Karta</th>
                                    <th>No. Referensia</th>
                                    <th>Asuntu</th>
                                    <th>Haruka ba Diresaun</th>
                                    <th>Obs</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                                           $no = 1;
        $datasai = $karta_sai->Karta_sai_kada_fulan($_GET['tinan'], $_GET['fulan']);
        foreach ($datasai as $row) {?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= htmlspecialchars($row['data_karta_sai']); ?></td>
                                    <td><?= htmlspecialchars($row['titlu_karta']); ?></td>
                                    <td><a
                                            href="?module=karta_sai&act=detallu_karta_sai&id_karta_sai=<?=$row['id_karta_sai']; ?>">Reff:
                                            <?= htmlspecialchars($row['no_reff_sai']); ?></a>
                                    </td>
                                    <td><?= htmlspecialchars($row['asuntu']); ?></td>
                                    <td><?= htmlspecialchars($row['diresaun']); ?></td>
                                    <td><?= htmlspecialchars($row['obs']); ?></td>

                                </tr>
                                <?php $no++;
        } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- <div class="text-right">
                                    <a href="#">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
                                </div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</div>
<?php break; ?>
<?php } ?>