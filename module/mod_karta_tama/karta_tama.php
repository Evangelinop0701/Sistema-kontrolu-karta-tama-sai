<?php

switch ($_GET['act']) {
    case 'read_tipo':?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Tipo Karta Tama<small></small>
            </h2>
            <ol class="breadcrumb">
                <li class="active" style="font-weight: bold;">
                    <a href="?module=home">Home</a>
                </li>
                <li class="active">
                    Tipo Karata tama
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title"> Karta Tama</h2>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <i class="fa fa-info-circle"></i> Klik iha kraik hodi rejistu karta
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead class="text-center">
                                <?php

                                            $dataT = $tipu->tipo_karta();
        foreach ($dataT as $key) {?>
                                <tr>
                                    <td><a href="?module=karta_tama&act=read&id_tipo=<?=$key['id_tipo'] ?>"
                                            style="font-size: 18px;"><?=$key['tipo_karta']; ?></a></td>
                                </tr>
                                <?php } ?>
                            </thead>
                        </table>
                    </div>
                    <!-- <div class="text-right">
                                    <a href="#">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
                                </div> -->
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    <!-- /.row -->

</div>

<?php break; ?>
<?php case 'read': ?>

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
                    <a href="?module=karta_tama&act=read_tipo">Tipo karta</a>
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
    $data = $karta_tama->Read_karta_tama($id);
    ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"> Karta Tama</h3>
                </div>
                <div class="panel-body">
                    <?php if ($_SESSION['level_user'] == "Sekretatria" or $_SESSION['level_user'] == "Resepsionista") {?>
                    <a href="?module=karta_tama&act=input&id_tipo=<?=$id; ?>" class="btn btn-sm btn-primary"><i
                            class="fa fa-plus"></i> Aumenta Karta</a>
                    <br>
                    <br>
                    <?php } ?>
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
                                    <?php if ($_SESSION['level_user'] == "Presidente") {?>
                                    <th>Despaiso</th>
                                    <?php } ?>
                                    <th>Data Despaiso</th>
                                    <?php if ($_SESSION['level_user'] == "Arkivador") {?>
                                    <th>Arkivo</th>
                                    <?php } ?>
                                    <th>Data Arkivu</th>
                                    <th>Obs</th>
                                    <?php if ($_SESSION['level_user'] == "Sekretatria" or $_SESSION['level_user'] == "Resepsionista") {?>
                                    <th>Asaun</th>
                                    <?php } ?>
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
                                    <td><a
                                            href="?module=karta_tama&act=detallu_karta&id_karta_tama=<?=$row['id_karta_tama'] ?>&id_tipo=<?=$row['id_tipu'] ?>">Reff:
                                            <?= htmlspecialchars($row['no_ref']); ?></a>
                                    </td>
                                    <td><?= htmlspecialchars($row['diresaun']); ?></td>
                                    <td><?= htmlspecialchars($row['asuntu']); ?></td>
                                    <?php if ($_SESSION['level_user'] == "Presidente") {?>

                                    <?php if ($row['status_karta_des'] != "") { ?>

                                    <td>
                                        <?php if ($row['status_karta_arkivu'] == "") {?>
                                        <a href="module/mod_karta_tama/aksi.php?act=knasela_despaiso&id_karta_tama=<?=$row['id_karta_tama']?>&id_tipo=<?= $row['id_tipu'] ?>"
                                            class="btn btn-danger btn-xs">Kansela</a>
                                        <?php } else {
                                            echo "Karta arkivadu";
                                        } ?>
                                    </td>

                                    <!-- Modal -->
                                    <?php } elseif ($row['status_karta_des'] == "") { ?>
                                    <td>
                                        <a type="button" class="btn btn-success btn-xs" data-toggle="modal"
                                            data-target="#myModal">Despaiso</a>
                                        <!-- <a href="module/mod_karta_tama/aksi.php?act=despaiso&id_karta_tama=<?=$row['id_karta_tama']?>id_tipo=<?= $row['id_tipu'] ?>" class="btn btn-success btn-xs">Despaiso</a> -->
                                        <!-- Modal -->
                                        <div id="myModal" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Despaiso ba kada diresaun</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form
                                                            action="module/mod_karta_tama/aksi.php?act=despaiso&id_karta_tama=<?=$row['id_karta_tama']?>&id_tipo=<?= $row['id_tipu'] ?>"
                                                            method="POST">
                                                            <?php
                                                    $dir = $diresaun->Read_diresaun();
                                        foreach ($dir as $key) { ?>
                                                            <input type="radio" value="<?=$key['diresaun'] ?>"
                                                                name="obs" required> <?=$key['diresaun'] ?> <br>
                                                            <?php } ?>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Despaiso</button>
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- Modal -->
                                    </td>
                                    <?php } ?>
                                    <?php } ?>
                                    <td><?= htmlspecialchars($row['data_despaiso']) ?></td>
                                    <?php if ($_SESSION['level_user'] == "Arkivador") {?>
                                    <td>
                                        <?php if ($row['status_karta_des'] == "") {?>
                                        <span style="color: red; font-size: 12px; font-weight: bold;">Sedauk
                                            despaiso</span>
                                        <?php } else { ?>
                                        <?php if ($row['status_karta_arkivu'] != "") {?>
                                        <a href="module/mod_karta_tama/aksi.php?act=kansela_arquivo&id_karta_tama=<?=$row['id_karta_tama']?>&id_tipo=<?= $row['id_tipu'] ?>"
                                            class="btn btn-danger btn-xs">Kansela</a>
                                        <?php } else { ?>
                                        <a href="module/mod_karta_tama/aksi.php?act=arquivo&id_karta_tama=<?=$row['id_karta_tama']?>&id_tipo=<?= $row['id_tipu'] ?>"
                                            class="btn btn-success btn-xs">Arquivo</a>
                                        <?php } ?>
                                        <?php } ?>
                                    </td>

                                    <?php } ?>
                                    <td><?= htmlspecialchars($row['data_arquivo']) ?></td>
                                    <td><?= htmlspecialchars($row['obs']) ?></td>
                                    <?php if ($_SESSION['level_user'] == "Sekretatria" or $_SESSION['level_user'] == "Resepsionista") {?>
                                    <td>
                                        <a href="?module=karta_tama&act=update&id_karta_tama=<?= encrypt($row['id_karta_tama']); ?>&id_tipo=<?= $row['id_tipu'] ?>"
                                            class="btn btn-primary btn-xs">
                                            <!-- <i class="fa fa-edit"></i>  -->Hadia
                                        </a>
                                        <a href="module/mod_karta_tama/aksi.php?act=delete&id_karta_tama=<?= encrypt($row['id_karta_tama']); ?>&id_tipo=<?=$row['id_tipu'] ?>"
                                            class="btn btn-danger p-0 btn-xs"> Hamos</a>
                                    </td>
                                    <?php } ?>
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
case 'input': ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Formulario Aumenta Dadus Karta<small></small>
            </h2>
            <ol class="breadcrumb">
                <li class="active" style="font-weight: bold;">
                    <a href="?module=home">Home</a>
                </li>
                <li class="active" style="font-weight: bold;">
                    <a href="?module=karta_tama&act=read_tipo">Tipo karta</a>
                </li>
                <li class="active">
                    Aumenta karta
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
                    <h3 class="panel-title"> Formulario Karta tama</h3>
                </div>
                <div class="panel-body">
                    <form method="POST"
                        action="module/mod_karta_tama/aksi.php?act=insert&id_tipo=<?=$_GET['id_tipo']; ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Data Karta tama<sup style="color: red;">*</sup></label>
                                <input type="date" name="data_karta_tama" class="form-control" placeholder="Prense...."
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label>Data Karta<sup style="color: red;">*</sup></label>
                                <input type="date" name="data_karta" class="form-control" placeholder="" required>
                            </div>
                            <br><br><br><br>
                            <div class="col-md-6">
                                <label>No. Referensia<sup style="color: red;">*</sup></label>
                                <input type="text" name="no_ref" class="form-control" placeholder="Prense...." required>
                            </div>
                            <div class="col-md-6">
                                <label>Husi Instituisaun<sup style="color: red;">*</sup></label>
                                <input type="text" name="husi_instituisaun" class="form-control"
                                    placeholder="Prense...." required>
                            </div>
                            <br><br><br><br>
                            <div class="col-md-12">
                                <label>Diresaun<sup style="color: red;">*</sup></label>
                                <select class="form-control" name="id_diresaun" required>
                                    <option value="" hidden>Diresaun</option>
                                    <?php $dire = $diresaun->Read_diresaun();
    foreach ($dire as $key) {?>
                                    <option value="<?=$key['id_diresaun'] ?>"><?=$key['diresaun'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <br><br><br><br>
                            <div class="col-md-12">
                                <label>Asuntu<sup style="color: red;">*</sup></label>
                                <textarea name="asuntu" class="form-control"></textarea>
                            </div>

                            <input type="hidden" name="id_tipu" class="form-control" placeholder="Prense...."
                                value="<?=$_GET['id_tipo']?>">

                            <input type="hidden" name="id_funsionario" class="form-control" placeholder="Prense...."
                                value="<?= $_SESSION['id_fun'] ?>">
                            <br><br><br><br><br>
                            <div class="col-md-12">
                                <button class="btn btn-primary" type="submit">Save</button>
                                <button class="btn btn-danger" type="reset">Kansela</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</div>

<?php break;
case 'update':

    $idkt = decrypt($_GET['id_karta_tama']);
    $upkt = $karta_tama->select_form_kt($idkt);

    ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Formulario hadia Dadus Karta<small></small>
            </h2>
            <ol class="breadcrumb">
                <li class="active" style="font-weight: bold;">
                    <a href="?module=home">Home</a>
                </li>
                <li class="active" style="font-weight: bold;">
                    <a href="?module=karta_tama&act=read_tipo">Tipo karta</a>
                </li>
                <li class="active">
                    Hadia karta
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
                    <h3 class="panel-title"> Formulario hadia Karta tama</h3>
                </div>
                <div class="panel-body">
                    <form method="POST"
                        action="module/mod_karta_tama/aksi.php?act=update&id_karta_tama=<?=$idkt; ?>&id_tipo=<?= $_GET['id_tipo'] ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Data Karta tama<sup style="color: red;">*</sup></label>
                                <input type="date" value="<?=$upkt[0]['data_karta_tama'] ?>" name="data_karta_tama"
                                    class="form-control" placeholder="Prense...." required>
                            </div>
                            <div class="col-md-6">
                                <label>Data Karta<sup style="color: red;">*</sup></label>
                                <input type="date" value="<?=$upkt[0]['data_karta'] ?>" name="data_karta"
                                    class="form-control" placeholder="" required>
                            </div>
                            <br><br><br><br>
                            <div class="col-md-6">
                                <label>No. Referensia<sup style="color: red;">*</sup></label>
                                <input type="text" value="<?=$upkt[0]['no_ref'] ?>" name="no_ref" class="form-control"
                                    placeholder="Prense...." required>
                            </div>
                            <div class="col-md-6">
                                <label>Husi Instituisaun<sup style="color: red;">*</sup></label>
                                <input type="text" value="<?=$upkt[0]['husi_instituisaun'] ?>" name="husi_instituisaun"
                                    class="form-control" placeholder="Prense...." required>
                            </div>
                            <br><br><br><br>
                            <div class="col-md-12">
                                <label>Posisaun<sup style="color: red;">*</sup></label>
                                <select class="form-control" name="id_diresaun" required>
                                    <option value="<?= $upkt[0]['id_diresaun'] ?>" hidden><?=$upkt[0]['diresaun'] ?>
                                    </option>
                                    <?php $dire = $diresaun->Read_diresaun();
    foreach ($dire as $key) {?>
                                    <option value="<?=$key['id_diresaun'] ?>"><?=$key['diresaun'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <br><br><br><br>
                            <div class="col-md-12">
                                <label>Asuntu<sup style="color: red;">*</sup></label>
                                <textarea name="asuntu" class="form-control"><?=$upkt[0]['asuntu'] ?></textarea>
                            </div>

                            <input type="hidden" name="id_funsionario" class="form-control" placeholder="Prense...."
                                value="<?= $upkt[0]['id_funsionario'] ?>">
                            <br><br><br><br><br>
                            <div class="col-md-12">
                                <button class="btn btn-primary" type="submit">Update</button>
                                <button class="btn btn-danger" onclick="self.history.back();"
                                    type="reset">Kansela</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</div>

<?php break;
case 'detallu_karta':
    $dt_karta = $karta_tama->select_form_kt($_GET['id_karta_tama']);
    ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Detaillu Karta<small></small>
            </h2>
            <ol class="breadcrumb">
                <li class="active" style="font-weight: bold;">
                    <a href="?module=home">Home</a>
                </li>
                <li class="active" style="font-weight: bold;">
                    <a href="?module=karta_tama&act=read&id_tipo=<?=$_GET['id_tipo'] ?>">Karta Tama</a>
                </li>
                <li class="active">
                    Detallu Karta
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
                    <h3 class="panel-title"> Detallu Karta Registu</h3>
                </div>
                <div class="panel-body">
                    <eiv class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th class="text-primary">Data Karta tama</th>
                                <td><?=$dt_karta[0]['data_karta_tama'] ?></td>
                            </tr>
                            <tr>
                                <th class="text-primary">Data Karta</th>
                                <td><?=$dt_karta[0]['data_karta'] ?></td>
                            </tr>
                            <tr>
                                <th class="text-primary">Numero Referensia</th>
                                <td><?=$dt_karta[0]['no_ref'] ?></td>
                            </tr>
                            <tr>
                                <th class="text-primary">Husi Instituisaun</th>
                                <td><?=$dt_karta[0]['husi_instituisaun'] ?></td>
                            </tr>
                            <tr>
                                <th class="text-primary">Diresaun</th>
                                <td><?=$dt_karta[0]['diresaun'] ?></td>
                            </tr>
                            <tr>
                                <th class="text-primary">Asuntu</th>
                                <td><?=$dt_karta[0]['tipo_karta'] ?></td>
                            </tr>
                            <tr>
                                <th class="text-primary">Funsionario Responsabilidade</th>
                                <td><?=$dt_karta[0]['naran_fun'] ?></td>
                            </tr>
                            <tr>
                                <th class="text-primary">Data Despaiso</th>
                                <td><?=$dt_karta[0]['data_despaiso'] ?></td>
                            </tr>
                            <tr>
                                <th class="text-primary">Data Arquivo</th>
                                <td><?=$dt_karta[0]['data_arquivo'] ?></td>
                            </tr>
                            <tr>
                                <th class="text-primary">Observasaun</th>
                                <td><?=$dt_karta[0]['obs'] ?></td>
                            </tr>
                        </table>
                    </eiv>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</div>
<?php break;case 'read_despaiso': ?>
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
                $ktama = $karta_tama->harre_delallu();
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
<?php break; case 'read_des_tipo':?>
<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Detallu Karta Tama Despaiso <small></small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-home"></i> Detallu
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title"> <b>Detallu Karta Despasio</b></h2>
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
            $ktamad = $karta_tama->harre_delallu_tipo($_GET['id_tipo']);
            foreach ($ktamad as $row) {?>
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
<?php break;case 'read_arquivo':?>
<div class="container-fluid">

<!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Detallu Karta Tama Arquivado <small></small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-home"></i> Detallu
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title"> <b>Detallu Karta Arquivado</b></h2>
                </div>
                <div class="panel-body">
                <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"> Karta Arquivadu</h3>
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
                $ktamadq = $karta_tama->harre_delallu_arq();
                foreach ($ktamadq as $row) {?>
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
</div>
<!-- /.row -->
<?php break;case 'read_obs':?>

<div class="container-fluid">

<!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Detallu Observasaun Karta Tama <small></small>
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
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title"> <b>Detallu Observasaun Karta</b></h2>
                </div>
                <div class="panel-body">
                <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"> Observasaun</h3>
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
                $obs = $karta_tama->read_obs($_GET['id_tipo'],$_GET['tinan2']);
                foreach ($obs as $row) {?>
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
</div>
<?php break; ?>
<?php } ?>