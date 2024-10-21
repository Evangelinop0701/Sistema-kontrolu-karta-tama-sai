<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Baranda <small></small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-home"></i> Baranda
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-envelope fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?= $total_kt[0]['total_tipo'] ?></div>
                            <div>Total Karta Tama</div>
                        </div>
                    </div>
                </div>
                <a href="?module=karta_tama&act=read_despaiso&id_tipo=">
                    <div class="panel-footer">
                        <span class="pull-left">Hare Detallu</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-sign-out fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?= $total_kt_sai[0]['total_ksai'] ?></div>
                            <div>Total Karta Sai</div>
                        </div>
                    </div>
                </div>
                <a href="?module=karta_sai&act=dtkarta_sai">
                    <div class="panel-footer">
                        <span class="pull-left">Hare Detallu</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-envelope fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?=$total_kt_des[0]['total_tipo'] ?></div>
                            <div>Total Karta Despaiso</div>
                        </div>
                    </div>
                </div>
                <a href="?module=karta_tama&act=read_despaiso">
                    <div class="panel-footer">
                        <span class="pull-left">Hare Detallu</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-envelope fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?=$total_kt_arq[0]['total_tipo'] ?></div>
                            <div>Total Karta Arquivadu</div>
                        </div>
                    </div>
                </div>
                <a href="?module=karta_tama&act=read_arquivo">
                    <div class="panel-footer">
                        <span class="pull-left">Hare Detallu</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="panel-title"> <b>Total Karta Tama</b></h2>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tipo Karta</th>
                                <th>Total Karta</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tbody>
                            <?php
                            $no = 1;
                            $data_t = $total_tipo_kada->Total_tipo_kada();
                            foreach ($data_t as $row) {?>
                            <tr>
                                <td><?=$no; ?></td>
                                <td><?=$row['tipo_karta']; ?></td>
                                <td><?=$row['total_tipo']; ?></td>
                            </tr>
                            <?php $no++;
                            } ?>
                        </tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="panel-title"> <b>Total Karta Despasio</b></h2>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tipo Karta</th>
                                <th>Total Karta</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tbody>
                            <?php
                            $no = 1;
                            $data_d = $total_tipo_kada->total_despaiso();
                            foreach ($data_d as $row) {?>
                            <tr>
                                <td><?=$no; ?></td>
                                <td><a href="?module=karta_tama&act=read_des_tipo&id_tipo=<?=$row['id_tipu']; ?>"><?=$row['tipo_karta']; ?></a></td>
                                <td><?=$row['total_tipo']; ?></td>
                            </tr>
                            <?php $no++;
                            } ?>
                        </tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="panel-title"> <b>Total Karta Arquivado</b></h2>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tipo Karta</th>
                                <th>Total Karta</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tbody>
                            <?php
                            $no = 1;
                            $data_a = $total_tipo_kada->total_arquivo();
                            foreach ($data_a as $row) {?>
                            <tr>
                                <td><?=$no; ?></td>
                                <td><?=$row['tipo_karta']; ?></td>
                                <td><?=$row['total_tipo']; ?></td>
                            </tr>
                            <?php $no++;
                            } ?>
                        </tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">

        <div class="col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="panel-title">
                        <span style="font-size: 18px;">Total Tipo karta tama iha grafiku</span>
                    </div>
                </div>
                <div class="panel-body">
                        <canvas id="myBarChart" style="width: 100%; height: 200px;"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</div>