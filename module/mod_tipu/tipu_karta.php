<?php 
switch ($_GET['act']) {
	case 'read':
 ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Tipo Karta<small></small>
            </h2>
            <ol class="breadcrumb">
                <li class="active" style="font-weight: bold;">
                    <a href="?module=home">Home</a>
                </li>
                <li class="active">
                    Tipo Karta
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
                    <h3 class="panel-title"> Tipo Karta</h3>
                </div>
                <div class="panel-body">
                    <?php if ($_SESSION['level_user'] == "Sekretatria" OR $_SESSION['level_user'] == "Resepsionista") {?>
                    <a href="?module=tipo&act=input" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Aumenta
                        dadus</a>
                    <br>
                    <br>
                    <?php } ?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped" id="example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tipo Karta</th>
                                    <th>Deskrisaun</th>
                                    <?php if ($_SESSION['level_user'] == "Sekretatria" OR $_SESSION['level_user'] == "Resepsionista") {?>
                                    <th>Asaun</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 

                                                $no = 1;
                                                $data = $tipu->tipo_karta();
                                                foreach ($data as $row) {?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= htmlspecialchars($row['tipo_karta']); ?></td>
                                    <td><?= htmlspecialchars($row['deskrisaun']); ?></td>
                                    <?php if ($_SESSION['level_user'] == "Sekretatria" OR $_SESSION['level_user'] == "Resepsionista") {?>
                                    <td>
                                        <a href="?module=tipo&act=update&id_tipo=<?= encrypt($row['id_tipo']); ?>"
                                            class="btn btn-primary btn-xs">
                                            <!-- <i class="fa fa-edit"></i>  -->Hadia
                                        </a>
                                        <a href="module/mod_tipu/aksi.php?act=delete&id_tipo=<?= encrypt($row['id_tipo']); ?>"
                                            class="btn btn-danger p-0 btn-xs"> Hamos</a>
                                    </td>
                                    <?php } ?>
                                </tr>
                                <?php $no++; } ?>
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

<?php break;case 'input': ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Formulario tipu Karta <small></small>
            </h2>
            <ol class="breadcrumb">
                <li class="active" style="font-weight: bold;">
                    <a href="?module=home">Home</a>
                </li>
                <li class="active" style="font-weight: bold;">
                    <a href="?module=tipo&act=read">Tipu Karta</a>
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
                    <h3 class="panel-title"> Formulario Tipu Karta</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="module/mod_tipu/aksi.php?act=insert">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Tipo Karta<sup style="color: red;">*</sup></label>
                                <input type="text" name="tipo_karta" class="form-control" placeholder="Prense...."
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label>Deskrisaun Karta<sup style="color: red;">*</sup></label>
                                <textarea class="form-control" name="deskrisaun" placeholder="Prense...."></textarea>
                            </div>
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
<?php break; case 'update': 

$updtipo = $tipu->select_form(decrypt($_GET['id_tipo']));

 ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Formulario hadia tipu Karta <small></small>
            </h2>
            <ol class="breadcrumb">
                <li class="active" style="font-weight: bold;">
                    <a href="?module=home">Home</a>
                </li>
                <li class="active" style="font-weight: bold;">
                    <a href="?module=tipo&act=read">Tipu Karta</a>
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
                    <h3 class="panel-title"> Formulario hadia Tipu Karta</h3>
                </div>
                <div class="panel-body">
                    <form method="POST"
                        action="module/mod_tipu/aksi.php?act=update&id_tipo=<?= decrypt($_GET['id_tipo']) ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Tipo Karta<sup style="color: red;">*</sup></label>
                                <input type="text" value="<?= $updtipo[0]['tipo_karta'] ?>" name="tipo_karta"
                                    class="form-control" placeholder="Prense...." required>
                            </div>
                            <div class="col-md-6">
                                <label>Deskrisaun Karta<sup style="color: red;">*</sup></label>
                                <textarea class="form-control" name="deskrisaun"
                                    placeholder="Prense...."><?= $updtipo[0]['deskrisaun'] ?></textarea>
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
<?php break; ?>
<?php } ?>