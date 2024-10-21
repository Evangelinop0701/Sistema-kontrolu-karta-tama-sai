<?php 
switch ($_GET['act']) {
	case 'read':
 ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Diresaun<small></small>
            </h2>
            <ol class="breadcrumb">
                <li class="active" style="font-weight: bold;">
                    <a href="?module=home">Home</a>
                </li>
                <li class="active">
                    Diresaun
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
                    <h3 class="panel-title"> Diresaun</h3>
                </div>
                <div class="panel-body">
                    <?php if ($_SESSION['level_user'] == "Sekretatria") { ?>
                    <a href="?module=diresaun&act=input" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>
                        Aumenta dadus</a>
                    <br>
                    <br>
                    <?php } ?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped" id="example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Diresaun</th>
                                    <th>Diretor</th>
                                    <?php if ($_SESSION['level_user'] == "Sekretatria") { ?>
                                    <th>Asaun</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 

                                                $no = 1;
                                                $data = $diresaun->Read_diresaun();
                                                foreach ($data as $row) {?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= htmlspecialchars($row['diresaun']); ?></td>
                                    <td><?= htmlspecialchars($row['chefe_diresaun']); ?></td>
                                    <?php if ($_SESSION['level_user'] == "Sekretatria") { ?>
                                    <td>
                                        <a href="?module=diresaun&act=update&id_diresaun=<?= encrypt($row['id_diresaun']); ?>"
                                            class="btn btn-primary btn-xs">
                                            <!-- <i class="fa fa-edit"></i>  -->Hadia
                                        </a>
                                        <a href="module/mod_diresaun/aksi.php?act=delete&id_diresaun=<?= encrypt($row['id_diresaun']); ?>"
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
                Formulario dadus Diresaun <small></small>
            </h2>
            <ol class="breadcrumb">
                <li class="active" style="font-weight: bold;">
                    <a href="?module=home">Home</a>
                </li>
                <li class="active" style="font-weight: bold;">
                    <a href="?module=diresaun&act=read">Diresaun</a>
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
                    <h3 class="panel-title"> Formulario Diresaun</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="module/mod_diresaun/aksi.php?act=insert">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Diresaun<sup style="color: red;">*</sup></label>
                                <input type="text" name="diresaun" class="form-control" placeholder="Prense...."
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label>Chefe Diresaun<sup style="color: red;">*</sup></label>
                                <input type="text" name="chefe_diresaun" class="form-control" placeholder="Prense...."
                                    required>
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

$updir = $diresaun->select_form(decrypt($_GET['id_diresaun']));

 ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Formulario dadus Diresaun <small></small>
            </h2>
            <ol class="breadcrumb">
                <li class="active" style="font-weight: bold;">
                    <a href="?module=home">Home</a>
                </li>
                <li class="active" style="font-weight: bold;">
                    <a href="?module=diresaun&act=read">Diresaun</a>
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
                    <h3 class="panel-title"> Formulario hadia dadus Diresaun</h3>
                </div>
                <div class="panel-body">
                    <form method="POST"
                        action="module/mod_diresaun/aksi.php?act=update&id_diresaun=<?=decrypt($_GET['id_diresaun']); ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Diresaun<sup style="color: red;">*</sup></label>
                                <input type="text" value="<?=$updir[0]['diresaun'] ?>" name="diresaun"
                                    class="form-control" placeholder="Prense...." required>
                            </div>
                            <div class="col-md-6">
                                <label>Chefe Diresaun<sup style="color: red;">*</sup></label>
                                <input type="text" value="<?=$updir[0]['chefe_diresaun'] ?>" name="chefe_diresaun"
                                    class="form-control" placeholder="Prense...." required>
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