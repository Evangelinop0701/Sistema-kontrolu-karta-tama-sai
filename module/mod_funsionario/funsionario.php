<?php switch ($_GET['act']) {
    case 'read': ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Dadus Funsionario<small></small>
            </h2>
            <ol class="breadcrumb">
                <li class="active" style="font-weight: bold;">
                    <a href="?module=home">Home</a>
                </li>
                <li class="active">
                    Funsionario
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
                    <h3 class="panel-title"> Dadus Funsionario</h3>
                </div>
                <div class="panel-body">
                    <?php if ($_SESSION['level_user'] == "Sekretatria") {?>
                    <a href="?module=funsionario&act=input" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>
                        Aumenta dadus</a>
                    <br>
                    <br>
                    <?php } ?>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped" id="example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Naran Funsionario</th>
                                    <th>Email</th>
                                    <th>Posisaun</th>
                                    <th>Estadu Servisu</th>
                                    <th>Periodo</th>
                                    <?php if ($_SESSION['level_user'] == "Sekretatria") {?>
                                    <th>Asaun</th>
                                    <?php } ?>

                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                                $no = 1;
        $data = $fun->Read_data();
        foreach ($data as $row) {?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><a
                                            href="?module=funsionario&act=profile&id_fun=<?=$row['id_funsionario']?>"><?= htmlspecialchars($row['naran_fun']); ?></a>
                                    </td>
                                    <td><?= htmlspecialchars($row['email']); ?></td>
                                    <td><?= htmlspecialchars($row['posisaun']); ?></td>
                                    <td><?= htmlspecialchars($row['status_servisu']); ?></td>
                                    <td><?= htmlspecialchars($row['periodo']); ?></td>
                                    <?php if ($_SESSION['level_user'] == "Sekretatria") {?>
                                    <td>
                                        <a href="?module=funsionario&act=update&id_fun=<?= encrypt($row['id_funsionario']); ?>"
                                            class="btn btn-primary btn-xs">
                                            <!-- <i class="fa fa-edit"></i>  -->Hadia
                                        </a>
                                        <a href="module/mod_funsionario/aksi.php?act=delete&id_fun=<?= encrypt($row['id_funsionario']);?>&file=<?=$row['foto'] ?>"
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
                Formulario Aumenta Dadus Funsionario<small></small>
            </h2>
            <ol class="breadcrumb">
                <li class="active" style="font-weight: bold;">
                    <a href="?module=home">Home</a>
                </li>
                <li class="active">
                    Fromulario Funsionario
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
                    <h3 class="panel-title"> Formulario Funsionario</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="module/mod_funsionario/aksi.php?act=insert"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Naran Funsionario<sup style="color: red;">*</sup></label>
                                <input type="text" name="naran_fun" class="form-control" placeholder="Prense...."
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label>Sexu<sup style="color: red;">*</sup></label>
                                <select class="form-control" name="sexu" required>
                                    <option value="" hidden>Sexu</option>
                                    <option value="Mane">Mane</option>
                                    <option value="Feto">Feto</option>
                                </select>
                            </div>
                            <br><br><br><br>
                            <div class="col-md-6">
                                <label>Data Moris<sup style="color: red;">*</sup></label>
                                <input type="date" name="data_moris" class="form-control" placeholder="" required>
                            </div>
                            <div class="col-md-6">
                                <label>Nu. Telfone<sup style="color: red;">*</sup></label>
                                <input type="text" name="no_tlf" class="form-control" placeholder="Prense...." required>
                            </div>
                            <br><br><br><br>
                            <div class="col-md-6">
                                <label>Email<sup style="color: red;">*</sup></label>
                                <input type="email" name="email" class="form-control" placeholder="Prense...." required>
                            </div>
                            <div class="col-md-6">
                                <label>Posisaun<sup style="color: red;">*</sup></label>
                                <select class="form-control" name="id_posisaun" required>
                                    <option value="" hidden>Pozisaun</option>
                                    <?php $pozi = $posisaun->Read_posisaun();
        foreach ($pozi as $key) {?>
                                    <option value="<?=$key['id_posisaun'] ?>"><?=$key['posisaun'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <br><br><br><br>
                            <div class="col-md-6">
                                <label>Departementu<sup style="color: red;">*</sup></label>
                                <input type="text" name="departemetu" class="form-control" placeholder="Prense...."
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label>Data hahu Servisu<sup style="color: red;">*</sup></label>
                                <input type="date" name="data_hahu_ser" class="form-control" placeholder="Prense...."
                                    required>
                            </div>
                            <br><br><br><br>
                            <div class="col-md-6">
                                <label>Suku<sup style="color: red;">*</sup></label>
                                <select class="form-control" name="id_suku" required>
                                    <option value="" hidden>Suku</option>
                                    <?php $suk = $mps->Read_suku();
        foreach ($suk as $key) {?>
                                    <option value="<?=$key['id_suku'] ?>">
                                        <?=$key['naran_mun'] ?>-<?=$key['postu'] ?>-<?=$key['suku'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Perido<sup style="color: red;">*</sup></label>
                                <select class="form-control" name="id_periodo" required>
                                    <option value="" hidden>Periodo</option>
                                    <?php $per = $periodo->Read_periodo_yes();
        foreach ($per as $key) {?>
                                    <option value="<?=$key['id_periodo'] ?>"><?=$key['periodo'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <br><br><br><br>
                            <div class="col-md-6">
                                <label>Estadu Servisu<sup style="color: red;">*</sup></label>
                                <select class="form-control" name="status_servisu" required>
                                    <option value="" hidden>Hili estadu Servisu</option>
                                    <option value="Ativo">Ativo</option>
                                    <option value="Desativo">Desativo</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Enderesu<sup style="color: red;">*</sup></label>
                                <input type="text" name="enderesu" class="form-control" placeholder="Prense...."
                                    required>
                            </div>
                            <br><br><br><br>
                            <div class="col-md-6">
                                <label>Estadu Civil<sup style="color: red;">*</sup></label>
                                <select class="form-control" name="estadu_sivil" required>
                                    <option value="" hidden>Hili estadu Sivil</option>
                                    <option value="Solteiro">Solteiro</option>
                                    <option value="Kassadu">Kassadu</option>
                                    <option value="Barlakeadu">Barlakeadu</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Abilitasaun Literaria<sup style="color: red;">*</sup></label>
                                <textarea class="form-control" name="albilidade_lite" placeholder="Prense...."
                                    required></textarea>
                            </div>
                            <br><br><br><br>
                            <div class="col-md-6">
                                <label>Perfil Servisu<sup style="color: red;">*</sup></label>

                                <select class="form-control" name="perfil_servisu" required>
                                    <option value="" hidden>Hili Perfile Servisu</option>
                                    <option value="Permanente">Permanente</option>
                                    <option value="Kontratadu">Kontratadu</option>
                                    <option value="Kasuais">Kasuais</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Areas Formasaun<sup style="color: red;">*</sup></label>
                                <textarea class="form-control" name="areas_formasaun" placeholder="Prense...."
                                    required></textarea>
                            </div>
                            <br><br><br><br>
                            <div class="col-md-4">
                                <label>Salario<sup style="color: red;">*</sup></label>
                                <input type="text" class="form-control" name="salrio" placeholder="Prense....."
                                    required>
                            </div>
                            <div class="col-md-4">
                                <label>Experensia Servisu<sup style="color: red;">*</sup></label>
                                <input type="text" class="form-control" name="esperensia_servisu"
                                    placeholder="Prense...." required>
                            </div>
                            <div class="col-md-4">
                                <label>Foto<sup style="color: red;"></sup></label>
                                <input type="file" class="form-control" name="image" placeholder="Prense....">
                            </div>
                            <br><br><br><br>
                            <div class="col-md-2">
                                <button class="btn btn-primary" type="submit">Save</button>
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
    case 'update':

        $up = $fun->select_form(decrypt($_GET['id_fun']), null);

        ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Formulario Hadia Dadus Funsionario<small></small>
            </h2>
            <ol class="breadcrumb">
                <li class="active" style="font-weight: bold;">
                    <a href="?module=home">Home</a>
                </li>
                <li class="active">
                    Fromulario hadia dadus Funsionario
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
                    <h3 class="panel-title"> Formulario Funsionario</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="module/mod_funsionario/aksi.php?act=update&id_fun=<?=$_GET['id_fun']?>"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Naran Funsionario<sup style="color: red;">*</sup></label>
                                <input type="text" value="<?= $up[0]['naran_fun']; ?>" name="naran_fun"
                                    class="form-control" placeholder="Prense...." required>
                            </div>
                            <div class="col-md-6">
                                <label>Sexu<sup style="color: red;">*</sup></label>
                                <select class="form-control" name="sexu" required>
                                    <option value="<?= $up[0]['sexu'] ?>" hidden><?= $up[0]['sexu'] ?></option>
                                    <option value="Mane">Mane</option>
                                    <option value="Feto">Feto</option>
                                </select>
                            </div>
                            <br><br><br><br>
                            <div class="col-md-6">
                                <label>Data Moris<sup style="color: red;">*</sup></label>
                                <input type="date" value="<?= $up[0]['data_moris']; ?>" name="data_moris"
                                    class="form-control" placeholder="" required>
                            </div>
                            <div class="col-md-6">
                                <label>Nu. Telfone<sup style="color: red;">*</sup></label>
                                <input type="text" name="no_tlf" value="<?= $up[0]['no_tlf']; ?>" class="form-control"
                                    placeholder="Prense...." required>
                            </div>
                            <br><br><br><br>
                            <div class="col-md-6">
                                <label>Email<sup style="color: red;">*</sup></label>
                                <input type="email" name="email" value="<?= $up[0]['email']; ?>" class="form-control"
                                    placeholder="Prense...." required>
                            </div>
                            <div class="col-md-6">
                                <label>Posisaun<sup style="color: red;">*</sup></label>
                                <select class="form-control" name="id_posisaun" required>
                                    <option value="<?= $up[0]['id_posisaun'] ?>" hidden><?=$up[0]['posisaun'] ?>
                                    </option>
                                    <?php $pozi = $posisaun->Read_posisaun();
        foreach ($pozi as $key) {?>
                                    <option value="<?=$key['id_posisaun'] ?>"><?=$key['posisaun'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <br><br><br><br>
                            <div class="col-md-6">
                                <label>Departementu<sup style="color: red;">*</sup></label>
                                <input type="text" name="departemetu" value="<?= $up[0]['departemetu']; ?>"
                                    class="form-control" placeholder="Prense...." required>
                            </div>
                            <div class="col-md-6">
                                <label>Data hahu Servisu<sup style="color: red;">*</sup></label>
                                <input type="date" name="data_hahu_ser" value="<?= $up[0]['data_hahu_ser']; ?>"
                                    class="form-control" placeholder="Prense...." required>
                            </div>
                            <br><br><br><br>
                            <div class="col-md-6">
                                <label>Suku<sup style="color: red;">*</sup></label>
                                <select class="form-control" name="id_suku" required>
                                    <option value="<?=$up[0]['id_suku'] ?>" hidden>
                                        <?=$up[0]['naran_mun'] ?>-<?=$up[0]['postu'] ?>-<?=$up[0]['suku'] ?></option>
                                    <?php $suk = $mps->Read_suku();
        foreach ($suk as $key) {?>
                                    <option value="<?=$key['id_suku'] ?>">
                                        <?=$key['naran_mun'] ?>-<?=$key['postu'] ?>-<?=$key['suku'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Perido<sup style="color: red;">*</sup></label>
                                <select class="form-control" name="id_periodo" required>
                                    <option value="<?= $up[0]['id_periodo'] ?>" hidden><?= $up[0]['periodo'] ?></option>
                                    <?php $per = $periodo->Read_periodo_yes();
        foreach ($per as $key) {?>
                                    <option value="<?=$key['id_periodo'] ?>"><?=$key['periodo'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <br><br><br><br>
                            <div class="col-md-6">
                                <label>Estatutu Servisu<sup style="color: red;">*</sup></label>
                                <select class="form-control" name="status_servisu" required>
                                    <option value="<?= $up[0]['status_servisu'] ?>" hidden>
                                        <?= $up[0]['status_servisu'] ?></option>
                                    <option value="Ativo">Ativo</option>
                                    <option value="Desativo">Desativo</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Enderesu<sup style="color: red;">*</sup></label>
                                <input type="text" name="enderesu" value="<?= $up[0]['enderesu'] ?>"
                                    class="form-control" placeholder="Prense...." required>
                            </div>
                            <br><br><br><br>
                            <div class="col-md-6">
                                <label>Estadu Civil<sup style="color: red;">*</sup></label>
                                <select class="form-control" name="estadu_sivil" required>
                                    <option value="<?= $up[0]['estadu_sivil'] ?>" hidden>
                                        <?= $up[0]['estadu_sivil'] ?></option>
                                    <option value="Solteiro">Solteiro</option>
                                    <option value="Kassadu">Kassadu</option>
                                    <option value="Barlakeadu">Barlakeadu</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Abilitasaun Literaria<sup style="color: red;">*</sup></label>
                                <textarea class="form-control" name="albilidade_lite" placeholder="Prense...." required>
                                    <?= $up[0]['albilidade_lite']; ?>
                                </textarea>
                            </div>
                            <br><br><br><br>
                            <div class="col-md-6">
                                <label>Perfil Servisu<sup style="color: red;">*</sup></label>

                                <select class="form-control" name="perfil_servisu" required>
                                    <option value="<?= $up[0]['perfil_servisu'] ?>" hidden>
                                        <?= $up[0]['perfil_servisu'] ?></option>
                                    <option value="Permanente">Permanente</option>
                                    <option value="Kontratadu">Kontratadu</option>
                                    <option value="Kasuais">Kasuais</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Areas Formasaun<sup style="color: red;">*</sup></label>
                                <textarea class="form-control" name="areas_formasaun" placeholder="Prense...."
                                    required> <?= $up[0]['areas_formasaun'] ?> </textarea>
                            </div>
                            <br><br><br><br>
                            <div class="col-md-4">
                                <label>Salario<sup style="color: red;">*</sup></label>
                                <input type="text" class="form-control" name="salrio" value="<?= $up[0]['salrio'] ?>"
                                    placeholder="Prense....." required>
                            </div>
                            <div class="col-md-4">
                                <label>Experensia Servisu<sup style="color: red;">*</sup></label>
                                <input type="text" class="form-control" value="<?= $up[0]['esperensia_servisu'] ?>"
                                    name="esperensia_servisu" placeholder="Prense...." required>
                            </div>
                            <div class="col-md-4">
                                <label>Foto<sup style="color: red;"></sup></label>
                                <input type="file" class="form-control" name="image" placeholder="Prense....">
                            </div>
                            <input type="hidden" name="image_dell" value="<?= $up[0]['foto'] ?>">
                            <br><br><br><br>
                            <div class="col-md-4">
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
    case 'profile':

        $detallu = $fun->select_form($_GET['id_fun'], null);

        ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Identidade Pessoal Funsionario<small></small>
            </h2>
            <ol class="breadcrumb">
                <li class="active" style="font-weight: bold;">
                    <a href="?module=home">Home</a>
                </li>
                <?php if ($_SESSION['level_user'] == "Sekretatria" or $_SESSION['level_user'] == "Presidente" or $_SESSION['level_user'] == "Xefe gabinete") {?>
                <li class="active">
                    <a href="?module=funsionario&act=read">Funsionario</a>
                </li>
                <?php } ?>
                <li class="active">
                    Identidade Pessoal Funsionario
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
                    <h3 class="panel-title"> Identidade Pessoal Funsionario</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-primary">Naran</th>
                                            <td><?= $detallu[0]['naran_fun'] ?></td>
                                        </tr>
                                        <tr>
                                            <th class="text-primary">Data Moris</th>
                                            <td><?= $detallu[0]['data_moris'] ?></td>
                                        </tr>
                                        <tr>
                                            <th class="text-primary">Sexu</th>
                                            <td><?= $detallu[0]['sexu'] ?></td>
                                        </tr>
                                        <tr>
                                            <th class="text-primary">No. Telfone</th>
                                            <td><?= $detallu[0]['no_tlf'] ?></td>
                                        </tr>
                                        <tr>
                                            <th class="text-primary">Email</th>
                                            <td><?= $detallu[0]['email'] ?></td>
                                        </tr>
                                        <tr>
                                            <th class="text-primary">Departementu</th>
                                            <td><?= $detallu[0]['departemetu'] ?></td>
                                        </tr>
                                        <tr>
                                            <th class="text-primary">Posisaun</th>
                                            <td><?= $detallu[0]['posisaun'] ?></td>
                                        </tr>
                                        <tr>
                                            <th class="text-primary">Data Hahu Servisu</th>
                                            <td><?= $detallu[0]['data_hahu_ser'] ?></td>
                                        </tr>
                                        <tr>
                                            <th class="text-primary">Periodo</th>
                                            <td><?= $detallu[0]['periodo'] ?></td>
                                        </tr>
                                        <tr>
                                            <th class="text-primary">Originalidade</th>
                                            <td>Munisipiu <b><?= $detallu[0]['naran_mun'] ?></b> Posto Adm.
                                                <b><?= $detallu[0]['postu'] ?></b> Suku
                                                <b><?= $detallu[0]['suku'] ?></b>
                                            </td>
                                        </tr>

                                    </thead>
                                </table>

                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="thumbnail">
                                <img src="foto_fun/<?= $detallu[0]['foto'] ?>">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>

                                        <tr>
                                            <th class="text-primary">Estatutu Servisu</th>
                                            <td><?= $detallu[0]['status_servisu'] ?></td>
                                        </tr>
                                        <tr>
                                            <th class="text-primary">Enderesu</th>
                                            <td><?= $detallu[0]['enderesu'] ?></td>
                                        </tr>
                                        <tr>
                                            <th class="text-primary">Estadu Sivil</th>
                                            <td><?= $detallu[0]['estadu_sivil'] ?></td>
                                        </tr>
                                        <tr>
                                            <th class="text-primary">Abilidade Leteraria</th>
                                            <td><?= $detallu[0]['albilidade_lite'] ?></td>
                                        </tr>
                                        <tr>
                                            <th class="text-primary">Perfil Servisu</th>
                                            <td><?= $detallu[0]['perfil_servisu'] ?></td>
                                        </tr>
                                        <tr>
                                            <th class="text-primary">Area Fromasaun</th>
                                            <td><?= $detallu[0]['areas_formasaun'] ?></td>
                                        </tr>
                                        <tr>
                                            <th class="text-primary">Salario</th>
                                            <td><?= $detallu[0]['salrio'] ?> <i>USD</i></td>
                                        </tr>
                                        <tr>
                                            <th class="text-primary">Experensia Servisu</th>
                                            <td><?= $detallu[0]['esperensia_servisu'] ?></td>
                                        </tr>

                                    </thead>
                                </table>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <?php if ($_SESSION['id_fun'] == $detallu[0]['id_funsionario']) {?>
                            <a href="?module=funsionario&act=update&id_fun=<?= encrypt($_SESSION['id_fun']) ?>"
                                class="btn btn-xs btn-success"><i class="fa fa-fw fa-edit"></i> Hadia ita boot nia
                                dadus</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</div>
<?php break; ?>
<?php } ?>