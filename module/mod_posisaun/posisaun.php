<?php
switch ($_GET['act']) {
    case 'read':
        ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Pozisaun<small></small>
            </h2>
            <ol class="breadcrumb">
                <li class="active" style="font-weight: bold;">
                    <a href="?module=home">Home</a>
                </li>
                <li class="active">
                    Posisaun
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
                    <h3 class="panel-title"> Posisaun</h3>
                </div>
                <div class="panel-body">
                    <a href="?module=posisaun&act=input" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>
                        Aumenta dadus</a>
                    <br>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped" id="example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Posisaun</th>
                                    <th>Asaun</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                                       $no = 1;
        $data = $posisaun->Read_posisaun();
        foreach ($data as $row) {?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= htmlspecialchars($row['posisaun']); ?></td>
                                    <td>
                                        <a href="?module=posisaun&act=update&id_posisaun=<?= encrypt($row['id_posisaun']); ?>"
                                            class="btn btn-primary btn-xs">
                                            <!-- <i class="fa fa-edit"></i>  -->Hadia
                                        </a>
                                        <a href="module/mod_posisaun/aksi.php?act=delete&id_posisaun=<?= encrypt($row['id_posisaun']); ?>"
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
                Formulario dadus posisaun<small></small>
            </h2>
            <ol class="breadcrumb">
                <li class="active" style="font-weight: bold;">
                    <a href="?module=home">Home</a>
                </li>
                <li class="active" style="font-weight: bold;">
                    <a href="?module=posisaun&act=read">Posisaun</a>
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
                    <h3 class="panel-title"> Formulario Posisaun</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="module/mod_posisaun/aksi.php?act=insert">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Posisaun<sup style="color: red;">*</sup></label>
                                <input type="text" name="posisaun" class="form-control" placeholder="Prense...."
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

        $upposi = $posisaun->select_form(decrypt($_GET['id_posisaun']));

        ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Formulario hadia posisaun<small></small>
            </h2>
            <ol class="breadcrumb">
                <li class="active" style="font-weight: bold;">
                    <a href="?module=home">Home</a>
                </li>
                <li class="active" style="font-weight: bold;">
                    <a href="?module=posisaun&act=read">Posisaun</a>
                </li>
                <li class="active">
                    Hadia dados
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
                    <h3 class="panel-title"> Formulario hadia Posisaun</h3>
                </div>
                <div class="panel-body">
                    <form method="POST"
                        action="module/mod_posisaun/aksi.php?act=update&id_posisaun=<?= decrypt($_GET['id_posisaun']) ?>">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Posisaun<sup style="color: red;">*</sup></label>
                                <input type="text" name="posisaun" value="<?= $upposi[0]['posisaun'] ?>"
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