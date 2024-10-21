<?php
switch ($_GET['act']) {
    case 'read':
        ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Munisipiu<small></small>
            </h2>
            <ol class="breadcrumb">
                <li class="active" style="font-weight: bold;">
                    <a href="?module=home">Home</a>
                </li>
                <li class="active">
                    Munisipio Postu Suku
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->


    <!-- /.row -->


    <div class="row">
    	<div class="col-md-4">
    		<div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Munisipiu Postu Suku</h3>
                </div>
                <div class="panel-body">
                    <a href="?module=mps&act=input_mun" class="btn btn-xs btn-primary"><i class="fa fa-plus"></i>
                        Aumenta dadus</a>
                    <br>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Munisipiu</th>
                                    <th>Asaun</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                 $mun = $mps->Read_mun();
                                 foreach ($mun as $row) {?>
                                 	<tr>
                                 		<td><?=$no; ?></td>
                                 		<td><?=$row['naran_mun']; ?></td>
                                 		<td>
                                 			<a href="?module=mps&act=update_mun&id_mun=<?=$row['id_mun'] ?>" class="btn btn-xs btn-primary">Hadia</a>
                                 			<a href="module/mod_mps/aksi.php?act=delete_mun&id_mun=<?=$row['id_mun'] ?>" class="btn btn-xs btn-danger">Hamos</a>
                                 		</td>
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
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Postu Admistrativu </h3>
                </div>
                <div class="panel-body">
                    <a href="?module=mps&act=input_postu" class="btn btn-xs btn-primary"><i class="fa fa-plus"></i>
                        Aumenta dadus</a>
                    <br>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Postu</th>
                                    <th>Asaun</th>
                                </tr>
                            </thead>
                            <tbody>

                            	<?php
                                $no = 1;
                                 $postu = $mps->Read_postu();
                                 foreach ($postu as $row) {?>
                                 	<tr>
                                 		<td><?=$no; ?></td>
                                 		<td><?=$row['postu']; ?></td>
                                 		<td>
                                 			<a href="?module=mps&act=update_postu&id_postu=<?=$row['id_postu'] ?>" class="btn btn-xs btn-primary">Hadia</a>
                                 			<a href="module/mod_mps/aksi.php?act=delete_postu&id_postu=<?=$row['id_postu'] ?>" class="btn btn-xs btn-danger">Hamos</a>
                                 		</td>
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
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Suku </h3>
                </div>
                <div class="panel-body">
                    <a href="?module=mps&act=input_suku" class="btn btn-xs btn-primary"><i class="fa fa-plus"></i>
                        Aumenta dadus</a>
                    <br>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Suku</th>
                                    <th>Asaun</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                 $su = $mps->Read_suku();
                                 foreach ($su as $row) {?>
                                 	<tr>
                                 		<td><?=$no; ?></td>
                                 		<td><?=$row['suku']; ?></td>
                                 		<td>
                                 			<a href="?module=mps&act=update_suku&id_suku=<?=$row['id_suku']; ?>" class="btn btn-xs btn-primary">Hadia</a>
                                 			<a href="module/mod_mps/aksi.php?act=delete_suku&id_suku=<?=$row['id_suku']; ?>" class="btn btn-xs btn-danger">Hamos</a>
                                 		</td>
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

<?php break;
    case 'input_mun': ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Famulario Munisipiu<small></small>
            </h2>
            <ol class="breadcrumb">
                <li class="active" style="font-weight: bold;">
                    <a href="?module=home">Home</a>
                </li>
                <li class="active" style="font-weight: bold;">
                    <a href="?module=mps&act=read">Munisipiu</a>
                </li>
                <li class="active">
                    Aumenta dadus
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"> Formulario Munisipiu</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="module/mod_mps/aksi.php?act=insert">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Munisipiu<sup style="color: red;">*</sup></label>
                                <input type="text" name="naran_mun" class="form-control" placeholder="Prense...."
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
    case 'update_mun':

        $upm = $mps->Read_mun_id($_GET['id_mun']);
        ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Famulario Munisipiu<small></small>
            </h2>
            <ol class="breadcrumb">
                <li class="active" style="font-weight: bold;">
                    <a href="?module=home">Home</a>
                </li>
                <li class="active" style="font-weight: bold;">
                    <a href="?module=mps&act=read">Munisipiu</a>
                </li>
                <li class="active">
                    Hadia dadus
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"> Formulario Munisipiu</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="module/mod_mps/aksi.php?act=update_mun&id_mun=<?=$_GET['id_mun'] ?>">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Munisipiu<sup style="color: red;">*</sup></label>
                                <input type="text" value="<?= $upm[0]['naran_mun'] ?>" name="naran_mun" class="form-control" placeholder="Prense...."
                                    required>
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
<?php break; case 'input_postu': ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Famulario Postu<small></small>
            </h2>
            <ol class="breadcrumb">
                <li class="active" style="font-weight: bold;">
                    <a href="?module=home">Home</a>
                </li>
                <li class="active" style="font-weight: bold;">
                    <a href="?module=mps&act=read">Postu</a>
                </li>
                <li class="active">
                    Aumenta dadus
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"> Formulario Postu</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="module/mod_mps/aksi.php?act=insert_postu">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Postu<sup style="color: red;">*</sup></label>
                                <input type="text" name="postu" class="form-control" placeholder="Prense...."
                                    required>
                            </div> 
                            <div class="col-md-6">
                                <label>Hili Munisipiu<sup style="color: red;">*</sup></label>
                                <select class="form-control" name="id_mun" required="">
                                	<option value="" hidden="">Hili Munisipu</option>
                                	<?php $m = $mps->Read_mun();
                                	foreach ($m as $key) { ?>
                                		<option value="<?= $key['id_mun'] ?>"><?= $key['naran_mun'] ?></option>
                                	<?php } ?>
                                </select>
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
<?php break;case 'update_postu':
	$upostu = $mps->Read_postu_id($_GET['id_postu']);
	 ?>

	 <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Famulario Postu<small></small>
            </h2>
            <ol class="breadcrumb">
                <li class="active" style="font-weight: bold;">
                    <a href="?module=home">Home</a>
                </li>
                <li class="active" style="font-weight: bold;">
                    <a href="?module=mps&act=read">Postu</a>
                </li>
                <li class="active">
                    Hadia dadus
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"> Formulario Postu</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="module/mod_mps/aksi.php?act=update_postu&id_postu=<?= $_GET['id_postu'] ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Postu<sup style="color: red;">*</sup></label>
                                <input type="text" value="<?= $upostu[0]['postu'] ?>" name="postu" class="form-control" placeholder="Prense...."
                                    required>
                            </div> 
                            <div class="col-md-6">
                                <label>Hili Munisipiu<sup style="color: red;">*</sup></label>
                                <select class="form-control" name="id_mun" required="">
                                	<option value="<?= $upostu[0]['id_mun'] ?>" hidden=""><?= $upostu[0]['naran_mun'] ?></option>
                                	<?php $m = $mps->Read_mun();
                                	foreach ($m as $key) { ?>
                                		<option value="<?= $key['id_mun'] ?>"><?= $key['naran_mun'] ?></option>
                                	<?php } ?>
                                </select>
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
<?php break; case 'input_suku':?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Famulario Postu<small></small>
            </h2>
            <ol class="breadcrumb">
                <li class="active" style="font-weight: bold;">
                    <a href="?module=home">Home</a>
                </li>
                <li class="active" style="font-weight: bold;">
                    <a href="?module=mps&act=read">Suku</a>
                </li>
                <li class="active">
                    Hadia dadus
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"> Formulario Suku</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="module/mod_mps/aksi.php?act=insert_suku">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Suku<sup style="color: red;">*</sup></label>
                                <input type="text" name="suku" class="form-control" placeholder="Prense...."
                                    required>
                            </div> 
                            <div class="col-md-6">
                                <label>Hili Postu<sup style="color: red;">*</sup></label>
                                <select class="form-control" name="id_postu" required="">
                                	<option value="" hidden="">Hili Postu</option>
                                	<?php $pos = $mps->Read_postu();
                                	foreach ($pos as $key) { ?>
                                		<option value="<?= $key['id_postu'] ?>"><?= $key['postu'] ?></option>
                                	<?php } ?>
                                </select>
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
<?php break;case 'update_suku':
	$upsuku = $mps->Read_suku_id($_GET['id_suku']);?>

	<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                Famulario Postu<small></small>
            </h2>
            <ol class="breadcrumb">
                <li class="active" style="font-weight: bold;">
                    <a href="?module=home">Home</a>
                </li>
                <li class="active" style="font-weight: bold;">
                    <a href="?module=mps&act=read">Suku</a>
                </li>
                <li class="active">
                    Hadia dadus
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"> Formulario Suku</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="module/mod_mps/aksi.php?act=update_suku&id_suku=<?= $_GET['id_suku'] ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Suku<sup style="color: red;">*</sup></label>
                                <input type="text" value="<?= $upsuku[0]['suku'] ?>" name="suku" class="form-control" placeholder="Prense...."
                                    required>
                            </div> 
                            <div class="col-md-6">
                                <label>Hili Postu<sup style="color: red;">*</sup></label>
                                <select class="form-control" name="id_postu" required="">
                                	<option value="<?=$upsuku[0]['id_postu'] ?>" hidden=""><?=$upsuku[0]['postu'] ?></option>
                                	<?php $pos = $mps->Read_postu();
                                	foreach ($pos as $key) { ?>
                                		<option value="<?= $key['id_postu'] ?>"><?= $key['postu'] ?></option>
                                	<?php } ?>
                                </select>
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