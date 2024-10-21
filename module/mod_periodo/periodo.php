<?php
switch ($_GET['act']) {
    case 'read':
        ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Periodo<small></small>
            </h2>
            <ol class="breadcrumb">
                <li class="active" style="font-weight: bold;">
                    <a href="?module=home">Home</a>
                </li>
                <li class="active">
                    Perido
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
                    <h3 class="panel-title"> Periodo</h3>
                </div>
                <div class="panel-body">
                    <a href="?module=periodo&act=input" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>
                        Aumenta dadus</a>
                    <br>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped" id="example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Periodo</th>
                                    <th>Data Periodo</th>
                                    <th>Ativasaun</th>
                                    <th>Asaun</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                                       $no = 1;
        $data = $periodo->Read_periodo();
        foreach ($data as $row) {?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= htmlspecialchars($row['periodo']); ?></td>
                                    <td><?= htmlspecialchars($row['data_periodo']); ?></td>
                                    <td class="text-center">
                                        <?php if ($row['status_periodo'] == "") {?>
                                        <a href="module/mod_periodo/aksi.php?act=update_status&id_periodo=<?=$row['id_periodo'] ?>"
                                            class="btn btn-xs btn-danger"><i class="fa fa-edit">
                                            </i> Ativasaun</a>
                                        <?php } elseif ($row['status_periodo'] != "") {?>
                                            <a href="module/mod_periodo/aksi.php?act=kansela_status&id_periodo=<?=$row['id_periodo'] ?>"
                                            class="btn btn-xs btn-warning"><i class="fa fa-edit">
                                            </i> Kansela</a>
                                            <button class="btn btn-xs btn-success"> <i class="fa fa-check"></i>
                                            Ativado</button>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a href="?module=periodo&act=update&id_periodo=<?= encrypt($row['id_periodo']); ?>"
                                            class="btn btn-primary btn-xs">
                                            <!-- <i class="fa fa-edit"></i>  -->Hadia
                                        </a>
                                        <a href="module/mod_periodo/aksi.php?act=delete&id_periodo=<?= encrypt($row['id_periodo']); ?>"
                                            class="btn btn-danger p-0 btn-xs"> Hamos</a>
                                    </td>
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
                Formulario dadus Periodo<small></small>
            </h2>
            <ol class="breadcrumb">
                <li class="active" style="font-weight: bold;">
                    <a href="?module=home">Home</a>
                </li>
                <li class="active" style="font-weight: bold;">
                    <a href="?module=periodo&act=read">Periodo</a>
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
                    <h3 class="panel-title"> Formulario Periodo</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="module/mod_periodo/aksi.php?act=insert">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Data<sup style="color: red;">*</sup></label>
                                <input type="date" name="data_periodo" class="form-control" placeholder="Prense...."
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label>Periodo<sup style="color: red;">*</sup></label>
                                <input type="text" name="periodo" class="form-control" placeholder="Prense...."
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
<?php break;
    case 'update':

        $up_per = $periodo->select_form(decrypt($_GET['id_periodo']));
        ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Formulario dadus Periodo<small></small>
            </h2>
            <ol class="breadcrumb">
                <li class="active" style="font-weight: bold;">
                    <a href="?module=home">Home</a>
                </li>
                <li class="active" style="font-weight: bold;">
                    <a href="?module=periodo&act=read">Periodo</a>
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
                    <h3 class="panel-title"> Formulario Periodo</h3>
                </div>
                <div class="panel-body">
                    <form method="POST"
                        action="module/mod_periodo/aksi.php?act=update&id_periodo=<?=$up_per[0]['id_periodo'] ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Data<sup style="color: red;">*</sup></label>
                                <input type="date" value="<?= $up_per[0]['data_periodo'] ?>" name="data_periodo"
                                    class="form-control" placeholder="Prense...." required>
                            </div>
                            <div class="col-md-6">
                                <label>Periodo<sup style="color: red;">*</sup></label>
                                <input type="text" name="periodo" value="<?= $up_per[0]['periodo'] ?>"
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