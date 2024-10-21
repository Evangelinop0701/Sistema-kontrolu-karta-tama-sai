<?php
switch ($_GET['act']) {
    case 'read_tipo_karta':?>
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
                    Tipo Karta Sai
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title"> Karta Sai</h2>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <i class="fa fa-info-circle"></i> Klik iha kraik hodi rejistu karta Sai
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
                                    <td><a href="?module=karta_sai&act=read&id_tipo=<?=$key['id_tipo'] ?>"
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
<?php
        break;
    case 'read':
        ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Karta sai<small></small>
            </h2>
            <ol class="breadcrumb">
                <li class="active" style="font-weight: bold;">
                    <a href="?module=home">Home</a>
                </li>

                <li class="active">
                    Karta Sai
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
                    <h3 class="panel-title"> Kararta Sai</h3>
                </div>
                <div class="panel-body">
                <?php if ($_SESSION['level_user'] == "Sekretatria") {?>
                    <a href="?module=karta_sai&act=input" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>
                        Aumenta dadus</a>
                    <br>
                    <br>
                    <?php } ?>
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
                                    <?php if ($_SESSION['level_user'] == "Sekretatria") {?>
                                    <th>Asaun</th>
                                    <?php } ?>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                                       $no = 1;
        $data = $karta_sai->karta_sai();
        foreach ($data as $row) {?>
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
                                    <?php if ($_SESSION['level_user'] == "Sekretatria") {?>
                                    <td>
                                        <a href="?module=karta_sai&act=update&id_karta_sai=<?= encrypt($row['id_karta_sai']); ?>"
                                            class="btn btn-primary btn-xs">
                                            <!-- <i class="fa fa-edit"></i>  -->Hadia
                                        </a>
                                        <a href="module/mod_karta_sai/aksi.php?act=delete&id_karta_sai=<?= encrypt($row['id_karta_sai']); ?>"
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
                Formulario Karta Sai<small></small>
            </h2>
            <ol class="breadcrumb">
                <li class="active" style="font-weight: bold;">
                    <a href="?module=home">Home</a>
                </li>
                <li class="active" style="font-weight: bold;">
                    <a href="?module=karta_sai&act=read">Karta Sai</a>
                </li>
                <li class="active">
                    Aumenta dadus
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
                    <h3 class="panel-title"> Formulario Karta Sai</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="module/mod_karta_sai/aksi.php?act=insert">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Data Karta Sai<sup style="color: red;">*</sup></label>
                                <input type="date" name="data_karta_sai" class="form-control" placeholder="Prense...."
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label>Titulu Karta<sup style="color: red;">*</sup></label>
                                <input type="text" name="titlu_karta" class="form-control" placeholder="Prense...."
                                    required>
                            </div>
                            <br><br><br><br>
                            <div class="col-md-6">
                                <label>No. Referensia<sup style="color: red;">*</sup></label>
                                <input type="text" name="no_reff_sai" class="form-control" placeholder="Prense...."
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label>Asuntu<sup style="color: red;">*</sup></label>
                                <textarea name="asuntu" id="" cols="" rows="" class="form-control" value="Prense"
                                    required></textarea>
                            </div>
                            <br><br><br><br>
                            <div class="col-md-12">
                                <label>Haruka ba Diresaun<sup style="color: red;">*</sup></label>
                                <label>Diresaun<sup style="color: red;">*</sup></label>
                                <select class="form-control" name="id_diresaun" required>
                                    <option value="" hidden>Diresaun</option>
                                    <?php $dire = $diresaun->Read_diresaun();
        foreach ($dire as $key) {?>
                                    <option value="<?=$key['id_diresaun'] ?>"><?=$key['diresaun'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <input type="hidden" name="id_funsionairo" value="<?=$_SESSION['id_fun'] ?>">
                            <br><br><br><br>
                            <div class="col-md-6">
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

        $ks = $karta_sai->select_form(decrypt($_GET['id_karta_sai']));

        ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Formulario Karta Sai<small></small>
            </h2>
            <ol class="breadcrumb">
                <li class="active" style="font-weight: bold;">
                    <a href="?module=home">Home</a>
                </li>
                <li class="active" style="font-weight: bold;">
                    <a href="?module=karta_sai&act=read">Karta Sai</a>
                </li>
                <li class="active">
                    Hadia dadus
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
                    <h3 class="panel-title"> Formulario hadia Karta Sai</h3>
                </div>
                <div class="panel-body">
                    <form method="POST"
                        action="module/mod_karta_sai/aksi.php?act=update&id_karta_sai=<?= $ks[0]['id_karta_sai'] ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Data Karta Sai<asup style="color: red;">*</asup></label>
                                <input type="date" value="<?=$ks[0]['data_karta_sai'] ?>" name="data_karta_sai"
                                    class="form-control" placeholder="Prense...." required>
                            </div>
                            <div class="col-md-6">
                                <label>Titulu Karta<sup style="color: red;">*</sup></label>
                                <input type="text" value="<?=$ks[0]['titlu_karta'] ?>" name="titlu_karta"
                                    class="form-control" placeholder="Prense...." required>
                            </div>
                            <br><br><br><br>
                            <div class="col-md-6">
                                <label>No. Referensia<sup style="color: red;">*</sup></label>
                                <input type="text" name="no_reff_sai" value="<?=$ks[0]['no_reff_sai'] ?>" class="
                                    form-control" placeholder="Prense...." required>
                            </div>
                            <div class="col-md-6">
                                <label>Asuntu<sup style="color: red;">*</sup></label>
                                <textarea name="asuntu" id="" cols="" rows="" class="form-control" value="Prense"
                                    required><?=$ks[0]['asuntu'] ?></textarea>
                            </div>
                            <br><br><br><br>
                            <div class="col-md-12">
                                <label>Haruka ba Diresaun<sup style="color: red;">*</sup></label>
                                <label>Diresaun<sup style="color: red;">*</sup></label>
                                <select class="form-control" name="id_diresaun" required>
                                    <option value="<?=$ks[0]['id_diresaun'] ?>" hidden><?=$ks[0]['diresaun'] ?></option>
                                    <?php $dire = $diresaun->Read_diresaun();
        foreach ($dire as $key) {?>
                                    <option value="<?=$key['id_diresaun'] ?>"><?=$key['diresaun'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <br><br><br><br>
                            <div class="col-md-6">
                                <button class="btn btn-primary" type="submit">Update</button>
                                <button class="btn btn-danger" onclick="self.history.back()"
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
    case 'detallu_karta_sai':
        $dt_ks = $karta_sai->detallu_karta_sai($_GET['id_karta_sai'])
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
                    <a href="?module=karta_sai&act=read">Karta Sai</a>
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
                    <h3 class="panel-title"> Detallu Karta Registu</h3>
                </div>
                <div class="panel-body">
                    <eiv class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th class="text-primary">Titulu Karta</th>
                                <td><?=$dt_ks[0]['titlu_karta'] ?></td>
                            </tr>
                            <tr>
                                <th class="text-primary">Data Karta Sai</th>
                                <td><?=$dt_ks[0]['data_karta_sai'] ?></td>
                            </tr>
                            <tr>
                                <th class="text-primary">Numero Referensia</th>
                                <td><?=$dt_ks[0]['no_reff_sai'] ?></td>
                            </tr>
                            <tr>
                                <th class="text-primary">Diresaun</th>
                                <td><?=$dt_ks[0]['diresaun'] ?></td>
                            </tr>
                            <tr>
                                <th class="text-primary">Asuntu</th>
                                <td><?=$dt_ks[0]['asuntu'] ?></td>
                            </tr>
                            <tr>
                                <th class="text-primary">Funsionario Responsabilidade</th>
                                <td><?=$dt_ks[0]['naran_fun'] ?></td>
                            </tr>
                            <tr>
                                <th class="text-primary">Observasaun</th>
                                <td><?=$dt_ks[0]['obs'] ?></td>
                            </tr>
                        </table>
                    </eiv>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</div>
<?php break;case 'dtkarta_sai': ?>
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
                                $data = $karta_sai->karta_sai();
                                foreach ($data as $row) {?>
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
<?php } ?>