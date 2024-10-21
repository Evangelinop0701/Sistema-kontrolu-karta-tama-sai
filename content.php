<?php


if (!isset($_GET['module'])) {
    include "home.php";
} elseif ($_GET['module'] == "home") {
    include "home.php";
} elseif ($_GET['module'] == "funsionario") {
    include "module/mod_funsionario/funsionario.php";
} elseif ($_GET['module'] == "karta_tama") {
    include "module/mod_karta_tama/karta_tama.php";
} elseif ($_GET['module'] == "posisaun") {
    include "module/mod_posisaun/posisaun.php";
} elseif ($_GET['module'] == "diresaun") {
    include "module/mod_diresaun/diresaun.php";
} elseif ($_GET['module'] == "tipo") {
    include "module/mod_tipu/tipu_karta.php";
} elseif ($_GET['module'] == "user") {
    include "module/mod_user/user.php";
} elseif ($_GET['module'] == "karta_sai") {
    include "module/mod_karta_sai/karta_sai.php";
} elseif ($_GET['module'] == "periodo") {
    include "module/mod_periodo/periodo.php";
} elseif ($_GET['module'] == "relatorio") {
    include "module/mod_relatorio/relatorio.php";
}elseif ($_GET['module'] == "mps") {
    include "module/mod_mps/mps.php";
}
