<?php
switch ($_GET['act']) {
    case 'read':
        ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Dados User<small></small>
            </h2>
            <ol class="breadcrumb">
                <li class="active" style="font-weight: bold;">
                    <a href="?module=home">Home</a>
                </li>
                <li class="active">
                    Dadus User
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
                    <h3 class="panel-title"> Dados User</h3>
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped" id="example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Naran User</th>
                                    <th>Username</th>
                                    <th>Level User</th>
                                    <th>Asaun</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                                       $no = 1;
        $data = $user->Read_user();
        foreach ($data as $row) {?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= htmlspecialchars($row['naran_fun']); ?></td>
                                    <td><?= htmlspecialchars($row['username']); ?></td>
                                    <td><?= htmlspecialchars($row['level_user']); ?></td>
                                    <td>
                                        <a href="?module=user&act=update&id_user=<?= encrypt($row['id_user']); ?>"
                                            class="btn btn-primary btn-xs">
                                            <!-- <i class="fa fa-edit"></i>  -->Hadia
                                        </a>
                                        <a href="module/mod_user/aksi.php?act=reset_pass&id_user=<?= encrypt($row['id_user']); ?>"
                                            class="btn btn-danger p-0 btn-xs"> Reset Password</a>
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
    case 'update':

        $up_user = $user->Read_user_form(decrypt($_GET['id_user']));

        ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Formulario hadia user <small></small>
            </h2>
            <ol class="breadcrumb">
                <li class="active" style="font-weight: bold;">
                    <a href="?module=home">Home</a>
                </li>
                <li class="active" style="font-weight: bold;">
                    <a href="?module=user&act=read">Dados User</a>
                </li>
                <li class="active">
                    Hadia dados User
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
                    <h3 class="panel-title"> Formulario hadia User</h3>
                </div>
                <div class="panel-body">
                    <form method="POST"
                        action="module/mod_user/aksi.php?act=update&id_user=<?= decrypt($_GET['id_user']) ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Naran Funsionario<sup style="color: red;">*</sup></label>
                                <input type="text" name="diresaun" value="<?=$up_user[0]['naran_fun'] ?>"
                                    class="form-control" placeholder="Prense...." disabled="">
                            </div>
                            <div class="col-md-6">
                                <label>Username<sup style="color: red;">*</sup></label>
                                <input type="text" name="username" value="<?=$up_user[0]['username'] ?>"
                                    class="form-control" placeholder="Prense...." required>
                            </div>
                            <br><br><br><br>
                            <div class="col-md-6">
                                <label>Password</label>
                                <input type="text" name="password" class="form-control" placeholder="Password foun">
                            </div>
                            <div class="col-md-6">
                                <label>Level User<sup style="color: red;">*</sup></label>
                                <select name="level_user" class="form-control" required="">
                                    <option value="<?=$up_user[0]['level_user'] ?>" hidden><?php if (empty($up_user[0]['level_user'])) {
                                        echo "Hili level user";
                                    } else {
                                        echo $up_user[0]['level_user'];
                                    }
        ?></option>
                                    <option value="Presidente">Presidente</option>
                                    <option value="Xefe gabinete">Xefe gabinete</option>
                                    <option value="Sekretatria">Sekretatria</option>
                                    <option value="Apoiu Tekniku">Apoiu Tekniku</option>
                                    <option value="Resepsionista">Resepsionista</option>
                                    <option value="Arkivador">Arkivador</option>

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
    case 'user_update':

        $up_user = $user->Read_user_form($_GET['id_user']);

        ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Formulario hadia user <small></small>
            </h2>
            <ol class="breadcrumb">
                <li class="active" style="font-weight: bold;">
                    <a href="?module=home">Home</a>
                </li>
                <li class="active">
                    Hadia dados user
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
                    <h3 class="panel-title"> Formulario hadia User</h3>
                </div>
                <div class="panel-body">
                    <form method="POST"
                        action="module/mod_user/aksi.php?act=update_user&id_user=<?= $_GET['id_user'] ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Naran Funsionario<sup style="color: red;">*</sup></label>
                                <input type="text" name="diresaun" value="<?=$up_user[0]['naran_fun'] ?>"
                                    class="form-control" placeholder="Prense...." disabled="">
                            </div>
                            <div class="col-md-6">
                                <label>Username<sup style="color: red;">*</sup></label>
                                <input type="text" name="username" value="<?=$up_user[0]['username'] ?>"
                                    class="form-control" placeholder="Prense...." required>
                            </div>
                            <br><br><br><br>
                            <div class="col-md-12">
                                <label>Password</label>
                                <input type="text" name="password" class="form-control" placeholder="Password foun">
                            </div>
                            <br><br><br><br>
                            <div class="col-md-6">
                                <button class="btn btn-primary" type="submit">Update</button>
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
<?php break; ?>
<?php } ?>