<ul class="nav navbar-right top-nav">
    <li class="dropdown">
    <li>
        <a href="?module=relatorio&act=read_periodo"><i class="fa fa-fw fa-tasks"></i>
            Relatorio</a>
    </li>
    <?php if ($_SESSION['level_user'] == "Sekretatria") {?>
    <li>
        <a href="?module=periodo&act=read"><i class="fa fa-fw fa-tasks"></i> Periodo</a>
    </li>
<?php } ?>
    </li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
            <?= $_SESSION['naran_fun']; ?><b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li>
                <a href="?module=funsionario&act=profile&id_fun=<?=$_SESSION['id_fun'] ?>"><i
                        class="fa fa-fw fa-user"></i> Profile</a>
            </li>
            <li>
                <a href="?module=user&act=user_update&id_user=<?=$_SESSION['id_user'] ?>"><i
                        class="fa fa-fw fa-gear"></i> Hadia Password</a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
            </li>
        </ul>
    </li>
</ul>