<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav" style="background-color: black;">
        <li class="active">
            <a href="?module=home"><i class="fa fa-fw fa-home"></i> Baranda</a>
        </li>

        <?php if ($_SESSION['level_user'] == "Resepsionista") { ?>
        <li class="active">
            <a href="?module=tipo&act=read"><i class="fa fa-fw fa-bar-chart-o"></i> Tipo karta</a>
        </li>
        <li class="active">
            <a href="?module=karta_tama&act=read_tipo"><i class="fa fa-fw fa-inbox"></i> Karta tama</a>
        </li>
        <!-- ------------------------------------------------------------------------- -->

        <?php

        $no = 30;

            for ($i = 0; $i < $no; $i++) { ?>
        <li class="active">
            <a href=""></a>
        </li>
        <?php } ?>

        <?php } elseif ($_SESSION['level_user'] == "Sekretatria") { ?>

        <li class="active">
            <a href="?module=funsionario&act=read"><i class="fa fa-fw fa-user"></i> Funsionario</a>
        </li>
        <li class="active">
            <a href="?module=posisaun&act=read"><i class="fa fa-fw fa-list"></i> Pozisaun</a>
        </li>
        <li class="active">
            <a href="?module=diresaun&act=read"><i class="fa fa-fw fa-list"></i> Didresaun</a>
        </li>
        <li class="active">
            <a href="?module=tipo&act=read"><i class="fa fa-fw fa-bar-chart-o"></i> Tipo karta</a>
        </li>
        <li class="active">
            <a href="?module=karta_tama&act=read_tipo"><i class="fa fa-fw fa-inbox"></i> Karta tama</a>
        </li>
        <li class="active">
            <a href="?module=karta_sai&act=read"><i class="fa fa-fw fa-table"></i> Karta sai</a>
        </li>
        <li class="active">
            <a href="?module=user&act=read"><i class="fa fa-fw fa-user"></i> User</a>
        </li>
        <li class="active">
            <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dadus
                <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="demo" class="collapse">
                <li class="active">
                    <a href="?module=mps&act=read">Munisipiu</a>
                </li>
                <li class="active">
                    <a href="?module=mps&act=read">Postu</a>
                </li>
                <li class="active">
                    <a href="?module=mps&act=read">Suku</a>
                </li>
                

            </ul>
        </li>


        <?php

        $no = 30;

            for ($i = 0; $i < $no; $i++) { ?>
        <li class="active">
            <a href=""></a>
        </li>
        <?php } ?>
        <?php } elseif ($_SESSION['level_user'] == "Presidente") {?>
        <li class="active">
            <a href="?module=funsionario&act=read"><i class="fa fa-fw fa-user"></i> Funsionario</a>
        </li>
        <li class="active">
            <a href="?module=karta_tama&act=read_tipo"><i class="fa fa-fw fa-inbox"></i> Karta tama</a>
        </li>
        <li class="active">
            <a href="?module=karta_sai&act=read"><i class="fa fa-fw fa-table"></i> Karta sai</a>
        </li>
        <li class="active">
            <a href="?module=diresaun&act=read"><i class="fa fa-fw fa-list"></i> Didresaun</a>
        </li>
        <!-- ------------------------------------------------------------------------- -->

        <?php

$no = 30;

            for ($i = 0; $i < $no; $i++) { ?>
        <li class="active">
            <a href=""></a>
        </li>
        <?php } ?>
        <?php } elseif ($_SESSION['level_user'] == "Arkivador") {?>
        <li class="active">
            <a href="?module=tipo&act=read"><i class="fa fa-fw fa-bar-chart-o"></i> Tipo karta</a>
        </li>
        <li class="active">
            <a href="?module=karta_tama&act=read_tipo"><i class="fa fa-fw fa-inbox"></i> Karta tama</a>
        </li>
        <!-- ------------------------------------------------------------------------- -->

        <?php

            $no = 30;

            for ($i = 0; $i < $no; $i++) { ?>
        <li class="active">
            <a href=""></a>
        </li>
        <?php } ?>

        <?php } elseif ($_SESSION['level_user'] == "Xefe gabinete") {?>
        <li class="active">
            <a href="?module=funsionario&act=read"><i class="fa fa-fw fa-user"></i> Funsionario</a>
        </li>
        <li class="active">
            <a href="?module=karta_tama&act=read_tipo"><i class="fa fa-fw fa-inbox"></i> Karta tama</a>
        </li>
        <li class="active">
            <a href="?module=diresaun&act=read"><i class="fa fa-fw fa-list"></i> Didresaun</a>
        </li>
        <li class="active">
            <a href="?module=karta_sai&act=read"><i class="fa fa-fw fa-table"></i> Karta sai</a>
        </li>
        <?php 
         $no = 30;

            for ($i = 0; $i < $no; $i++) { ?>
        <li class="active">
            <a href=""></a>
        </li>
        <?php } ?>
        <?php }else{
            
        } ?>

    </ul>
</div>