<?php

session_start();

class Crud
{
    private $conn;

    // Constructor to receive the PDO connection instance
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Create a record
    public function Create($table, $data)
    {
        $columns = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));
        $query = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        $stmt = $this->conn->prepare($query);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        return $stmt->execute();
    }

    // Update a record
    public function Update($table, $data, $condition)
    {
        $fields = implode(", ", array_map(function ($key) {
            return "$key = :$key";
        }, array_keys($data)));

        $conditions = implode(" AND ", array_map(function ($key) {
            return "$key = :condition_$key";
        }, array_keys($condition)));

        $query = "UPDATE $table SET $fields WHERE $conditions";
        $stmt = $this->conn->prepare($query);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        foreach ($condition as $key => $value) {
            $stmt->bindValue(":condition_$key", $value);
        }
        return $stmt->execute();
    }

    // Delete a record
    public function Delete($table, $condition)
    {
        $conditions = implode(" AND ", array_map(function ($key) {
            return "$key = :$key";
        }, array_keys($condition)));

        $query = "DELETE FROM $table WHERE $conditions";
        $stmt = $this->conn->prepare($query);

        foreach ($condition as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        return $stmt->execute();
    }

    // Read records (simple SELECT query)
    public function Read($table, $condition = null)
    {
        $query = "SELECT * FROM $table";
        if ($condition) {
            $conditions = implode(" AND ", array_map(function ($key) {
                return "$key = :$key";
            }, array_keys($condition)));

            $query .= " WHERE $conditions";
        }

        $stmt = $this->conn->prepare($query);

        if ($condition) {
            foreach ($condition as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function read_data()
    {
        $query = "SELECT * FROM tb_pessoa";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
}

/**
 *
 */
class User
{
    private $conn;
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function check_login($username, $password)
    {
        $sql = "SELECT * FROM t_user u, t_funsionario f, t_posisaun p, t_periodo pr WHERE u.id_funsionario=f.id_funsionario AND f.id_posisaun=p.id_posisaun AND f.id_periodo=pr.id_periodo AND u.username= :username";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Fetch the user data
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verify the password using password_verify
            if (password_verify($password, $user['pas1'])) {
                $_SESSION['username'] = true;
                $_SESSION['password'] = true;
                $_SESSION['id_user'] = $user['id_user'];
                $_SESSION['naran_fun'] = $user['naran_fun'];
                $_SESSION['id_fun'] = $user['id_funsionario'];
                $_SESSION['id_posisaun'] = $user['id_posisaun'];
                $_SESSION['posisaun'] = $user['posisaun'];
                $_SESSION['level_user'] = $user['level_user'];
                return true;
            } else {
                return false; // Incorrect password
            }
        } else {
            return false; // Username not found
        }

    }

    public function get_sessi()
    {
        return $_SESSION['username'] and $_SESSION['password'];
    }

    public function Read_user()
    {
        $sql = "SELECT * FROM t_user u, t_funsionario f, t_posisaun p, t_periodo pr WHERE u.id_funsionario=f.id_funsionario AND f.id_posisaun=p.id_posisaun AND f.id_periodo=pr.id_periodo";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function Read_user_form($id)
    {
        $sql = "SELECT * FROM t_user u, t_funsionario f, t_posisaun p, t_periodo pr WHERE u.id_funsionario=f.id_funsionario AND f.id_posisaun=p.id_posisaun AND f.id_periodo=pr.id_periodo AND u.id_user='$id'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_username($username, $level_user, $id)
    {
        $sql = "UPDATE t_user SET username='$username', level_user='$level_user' WHERE id_user='$id'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function update_username_pass($username, $level_user, $pass1, $pass, $id)
    {
        $sql = "UPDATE t_user SET username='$username', level_user='$level_user', pas1='$pass1', pass2='$pass' WHERE id_user='$id'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function reset_pass($pass1, $pass, $id)
    {
        $sql = "UPDATE t_user SET pas1='$pass1', pass2='$pass' WHERE id_user='$id'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }
    public function update_pass_user($username, $pass1, $pass, $id)
    {
        $sql = "UPDATE t_user SET username='$username', pas1='$pass1', pass2='$pass' WHERE id_user='$id'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function update_user_pass($username, $id)
    {
        $sql = "UPDATE t_user SET username='$username' WHERE id_user='$id'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    //

}


class Funsionario
{
    private $conn;
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function Read_data()
    {
        $query = "SELECT * FROM t_funsionario f, t_posisaun p, t_periodo pr, t_suku s, t_postu ps, t_mun m WHERE f.id_posisaun = p.id_posisaun AND f.id_periodo = pr.id_periodo AND f.id_suku=s.id_suku AND s.id_postu=ps.id_postu AND ps.id_mun=m.id_mun AND pr.status_periodo='Y'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function select_form($id, $naran)
    {
        $query = "SELECT * FROM t_funsionario f, t_posisaun p, t_periodo pr, t_suku s, t_postu ps, t_mun m WHERE f.id_posisaun = p.id_posisaun AND f.id_periodo = pr.id_periodo AND f.id_suku=s.id_suku AND s.id_postu=ps.id_postu AND ps.id_mun=m.id_mun AND f.id_funsionario='$id' OR f.naran_fun='$naran'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function level_user($id)
    {
        $query = "SELECT * FROM t_funsionario f, t_posisaun p, t_periodo pr, t_suku s, t_postu ps, t_mun m WHERE f.id_posisaun = p.id_posisaun AND f.id_periodo = pr.id_periodo AND f.id_suku=s.id_suku AND s.id_postu=ps.id_postu AND ps.id_mun=m.id_mun AND f.id_funsionario='$id'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

class Periodo
{
    private $conn;
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function Read_periodo()
    {
        $query = "SELECT * FROM t_periodo";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function Read_periodo_yes()
    {
        $query = "SELECT * FROM t_periodo WHERE status_periodo='Y'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function Read_tinan()
    {
        $query = "SELECT DISTINCT(YEAR(p.data_karta_tama)) as tinan FROM t_karta_tama p, t_funsionario f, t_periodo pr WHERE p.id_funsionario=f.id_funsionario AND f.id_periodo=pr.id_periodo AND pr.status_periodo='Y'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function select_form($id)
    {
        $query = "SELECT * FROM t_periodo WHERE id_periodo='$id'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function update_status($id)
    {
        $query = "UPDATE t_periodo SET status_periodo='Y' WHERE id_periodo='$id'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    }
    public function kansela_status($id)
    {
        $query = "UPDATE t_periodo SET status_periodo='' WHERE id_periodo='$id'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    }
}

class Posisaun
{
    private $conn;
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function Read_posisaun()
    {
        $query = "SELECT * FROM t_posisaun";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function select_form($id)
    {
        $query = "SELECT * FROM t_posisaun WHERE id_posisaun='$id'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

class Mps
{
    private $conn;
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function Read_suku()
    {
        $query = "SELECT * FROM t_suku s, t_postu p, t_mun m WHERE s.id_postu=p.id_postu AND p.id_mun=m.id_mun";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function Read_suku_id($id)
    {
        $query = "SELECT * FROM t_suku s, t_postu p, t_mun m WHERE s.id_postu=p.id_postu AND p.id_mun=m.id_mun AND s.id_suku='$id'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function Read_mun()
    {
        $query = "SELECT * FROM t_mun";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } 
    public function Read_mun_id($id)
    {
        $query = "SELECT * FROM t_mun WHERE id_mun='$id'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } 
    public function Read_postu()
    {
        $query = "SELECT * FROM t_postu";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function Read_postu_id($id)
    {
        $query = "SELECT * FROM t_postu p, t_mun m WHERE p.id_mun=m.id_mun AND p.id_postu='$id'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

/**
 *
 */
class Karta_tama
{
    private $conn;
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function Read_karta_tama($id)
    {
        $query = "SELECT * FROM t_karta_tama kt, t_tipo_karta tp, t_funsionario f, t_diresaun d WHERE kt.id_diresaun=d.id_diresaun AND kt.id_tipu=tp.id_tipo AND kt.id_funsionario=f.id_funsionario AND kt.id_tipu='$id'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

     public function Read_karta_tama_tinan($id,$tinan)
    {
        $query = "SELECT * FROM t_karta_tama kt, t_tipo_karta tp, t_funsionario f, t_diresaun d WHERE kt.id_diresaun=d.id_diresaun AND kt.id_tipu=tp.id_tipo AND kt.id_funsionario=f.id_funsionario AND kt.id_tipu='$id' AND YEAR(kt.data_karta_tama) = '$tinan'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function select_form_kt($id)
    {
        $query = "SELECT * FROM t_karta_tama kt, t_tipo_karta tp, t_funsionario f, t_diresaun d WHERE kt.id_diresaun=d.id_diresaun AND kt.id_tipu=tp.id_tipo AND kt.id_funsionario=f.id_funsionario AND kt.id_karta_tama='$id'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function data_karta_despaiso($id,$tinan)
    {
        $query = "SELECT * FROM t_karta_tama kt, t_tipo_karta tp, t_funsionario f, t_diresaun d, t_periodo p WHERE kt.id_diresaun=d.id_diresaun AND kt.id_tipu=tp.id_tipo AND kt.id_funsionario=f.id_funsionario AND kt.id_tipu='$id' AND f.id_periodo=p.id_periodo AND kt.status_karta_des='despaiso' AND p.status_periodo='Y' AND YEAR(kt.data_karta_tama)='$tinan'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

     public function data_karta_aquivo($id,$tinan)
    {
        $query = "SELECT * FROM t_karta_tama kt, t_tipo_karta tp, t_funsionario f, t_diresaun d, t_periodo p WHERE kt.id_diresaun=d.id_diresaun AND kt.id_tipu=tp.id_tipo AND kt.id_funsionario=f.id_funsionario AND kt.id_tipu='$id' AND f.id_periodo=p.id_periodo AND kt.status_karta_des !='' AND kt.status_karta_arkivu !='' AND p.status_periodo='Y' AND YEAR(kt.data_karta_tama)='$tinan'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function despaiso_karta($data_des, $obs, $id)
    {
        $query = "UPDATE t_karta_tama SET status_karta_des='despaiso', data_despaiso='$data_des', obs='$obs' WHERE id_karta_tama='$id'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

    }
    public function kansela_despaiso_karta($id)
    {
        $query = "UPDATE t_karta_tama SET status_karta_des='', data_despaiso='', obs='' WHERE id_karta_tama='$id'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

    }
    public function arquivo_karata($data_arquivo, $id)
    {
        $query = "UPDATE t_karta_tama SET status_karta_arkivu='arquivado', data_arquivo='$data_arquivo' WHERE id_karta_tama='$id'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

    }
    public function kansela_arquivo_karata($id)
    {
        $query = "UPDATE t_karta_tama SET status_karta_arkivu='', data_arquivo='' WHERE id_karta_tama='$id'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

    }

    public function harre_delallu()
    {
        $query = "SELECT * FROM t_karta_tama kt, t_tipo_karta tp, t_funsionario f, t_diresaun d, t_periodo p WHERE kt.id_diresaun=d.id_diresaun AND kt.id_tipu=tp.id_tipo AND kt.id_funsionario=f.id_funsionario AND f.id_periodo=p.id_periodo AND kt.status_karta_des='despaiso' AND p.status_periodo='Y'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    public function harre_delallu_arq()
    {
        $query = "SELECT * FROM t_karta_tama kt, t_tipo_karta tp, t_funsionario f, t_diresaun d, t_periodo p WHERE kt.id_diresaun=d.id_diresaun AND kt.id_tipu=tp.id_tipo AND kt.id_funsionario=f.id_funsionario AND f.id_periodo=p.id_periodo AND kt.status_karta_arkivu='arquivado' AND p.status_periodo='Y'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function read_obs($id,$tinan)
    {
        $query = "SELECT * FROM t_karta_tama kt, t_tipo_karta tp, t_funsionario f, t_diresaun d, t_periodo p WHERE kt.id_diresaun=d.id_diresaun AND kt.id_tipu=tp.id_tipo AND kt.id_funsionario=f.id_funsionario AND f.id_periodo=p.id_periodo AND kt.status_karta_arkivu !='' AND kt.status_karta_des !='' AND p.status_periodo='Y' AND kt.id_tipu='$id' AND YEAR(kt.data_karta_tama)='$tinan'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    public function harre_delallu_tipo($id)
    {
        $query = "SELECT * FROM t_karta_tama kt, t_tipo_karta tp, t_funsionario f, t_diresaun d, t_periodo p WHERE kt.id_diresaun=d.id_diresaun AND kt.id_tipu=tp.id_tipo AND kt.id_funsionario=f.id_funsionario AND f.id_periodo=p.id_periodo AND kt.status_karta_des='despaiso' AND p.status_periodo='Y' AND kt.id_tipu='$id'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }


    public function header_karta()
    {
        $query = "SELECT MONTHNAME(t.data_karta_tama) as fulan, MONTH(t.data_karta_tama) as no_fulan FROM t_karta_tama t, t_tipo_karta tp, t_funsionario f, t_periodo p WHERE f.id_periodo=p.id_periodo AND p.status_periodo='Y' AND t.id_tipu=tp.id_tipo GROUP BY MONTH(t.data_karta_tama) ORDER BY MONTH(t.data_karta_tama) ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
}

class Tipo_karta
{
    private $conn;
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function tipo_karta()
    {
        $query = "SELECT * FROM t_tipo_karta";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function select_form($id)
    {
        $query = "SELECT * FROM t_tipo_karta WHERE id_tipo='$id'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

class Diresaun
{
    private $conn;
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function Read_diresaun()
    {
        $query = "SELECT * FROM t_diresaun";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function select_form($id)
    {
        $query = "SELECT * FROM t_diresaun WHERE id_diresaun='$id'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
class Karta_sai
{
    private $conn;
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function Karta_sai()
    {
        $query = "SELECT * FROM t_karta_sai ks, t_diresaun d, t_periodo p, t_funsionario f WHERE ks.id_diresaun=d.id_diresaun AND ks.id_funsionairo=f.id_funsionario AND f.id_periodo=p.id_periodo AND p.status_periodo !=''";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

     public function Karta_sai_kada_fulan($tinan, $fulan)
    {
        $query = "SELECT * FROM t_karta_sai ks, t_diresaun d, t_periodo p, t_funsionario f WHERE ks.id_diresaun=d.id_diresaun AND ks.id_funsionairo=f.id_funsionario AND f.id_periodo=p.id_periodo AND p.status_periodo !='' AND MONTH(ks.data_karta_sai) = '$fulan' AND YEAR(ks.data_karta_sai)='$tinan'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function select_form($id)
    {
        $query = "SELECT * FROM t_karta_sai ks, t_diresaun d, t_funsionario f WHERE ks.id_diresaun=d.id_diresaun AND ks.id_funsionairo=f.id_funsionario AND ks.id_karta_sai AND ks.id_karta_sai='$id'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function detallu_karta_sai($id)
    {
        $query = "SELECT * FROM t_karta_sai ks, t_diresaun d, t_funsionario f WHERE ks.id_diresaun=d.id_diresaun AND ks.id_funsionairo=f.id_funsionario AND ks.id_karta_sai= '$id'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
class Baranda
{
    private $conn;
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function Total_tipo_kada()
    {
        $query = "SELECT COUNT(*) as total_tipo, kt.id_tipu, t.tipo_karta FROM t_karta_tama kt, t_funsionario f, t_tipo_karta t, t_periodo p WHERE kt.id_tipu=t.id_tipo AND kt.id_funsionario=f.id_funsionario AND f.id_periodo=p.id_periodo AND p.status_periodo='Y' GROUP BY kt.id_tipu";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function Total_kada_periodo($tinan)
    {
        $query = "SELECT COUNT(*) as total_tipo, kt.id_tipu, t.tipo_karta FROM t_karta_tama kt, t_funsionario f, t_tipo_karta t, t_periodo p WHERE kt.id_tipu=t.id_tipo AND kt.id_funsionario=f.id_funsionario AND f.id_periodo=p.id_periodo AND p.status_periodo='Y' AND YEAR(kt.data_karta_tama)='$tinan' GROUP BY kt.id_tipu";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function total_despaiso()
    {
        $query = "SELECT COUNT(*) as total_tipo, t.tipo_karta, kt.id_tipu FROM t_karta_tama kt, t_funsionario f, t_tipo_karta t, t_periodo p WHERE kt.id_tipu=t.id_tipo AND kt.id_funsionario=f.id_funsionario AND f.id_periodo=p.id_periodo AND p.status_periodo='Y' AND kt.status_karta_des='despaiso' GROUP BY kt.id_tipu";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function total_arquivo()
    {
        $query = "SELECT COUNT(*) as total_tipo, t.tipo_karta FROM t_karta_tama kt, t_funsionario f, t_tipo_karta t, t_periodo p WHERE kt.id_tipu=t.id_tipo AND kt.id_funsionario=f.id_funsionario AND f.id_periodo=p.id_periodo AND p.status_periodo='Y' AND kt.status_karta_arkivu='arquivado' GROUP BY kt.id_tipu";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function total_karta_tama()
    {
        $query = "SELECT COUNT(*) as total_tipo FROM t_karta_tama kt, t_funsionario f, t_tipo_karta t, t_periodo p WHERE kt.id_tipu=t.id_tipo AND kt.id_funsionario=f.id_funsionario AND f.id_periodo=p.id_periodo AND p.status_periodo='Y'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function total_kt_des()
    {
        $query = "SELECT COUNT(*) as total_tipo FROM t_karta_tama kt, t_funsionario f, t_tipo_karta t, t_periodo p WHERE kt.id_tipu=t.id_tipo AND kt.id_funsionario=f.id_funsionario AND f.id_periodo=p.id_periodo AND p.status_periodo='Y' AND kt.status_karta_des='despaiso'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function total_kt_arkivo()
    {
        $query = "SELECT COUNT(*) as total_tipo FROM t_karta_tama kt, t_funsionario f, t_tipo_karta t, t_periodo p WHERE kt.id_tipu=t.id_tipo AND kt.id_funsionario=f.id_funsionario AND f.id_periodo=p.id_periodo AND p.status_periodo='Y' AND kt.status_karta_arkivu='arquivado'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function total_karta_sai()
    {
        $query = "SELECT COUNT(*) as total_ksai FROM t_karta_sai ks, t_funsionario f, t_periodo p WHERE ks.id_funsionairo=f.id_funsionario AND f.id_periodo=p.id_periodo AND p.status_periodo='Y'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Despaiso total
    public function Relatorio_karta_tama($id,$tinan)
    {
        $query = "SELECT COUNT(*) as total_des, kt.status_karta_des, kt.id_tipu FROM t_karta_tama kt, t_tipo_karta t, t_diresaun d, t_funsionario f, t_periodo p WHERE kt.id_funsionario=f.id_funsionario AND kt.id_tipu=t.id_tipo AND kt.id_diresaun=d.id_diresaun AND f.id_periodo=p.id_periodo AND p.status_periodo='Y'AND kt.id_tipu='$id' AND kt.status_karta_des='despaiso' AND YEAR(kt.data_karta_tama) = '$tinan'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function Total_obs($id, $tinan)
    {
        $query = "SELECT COUNT(*) as total_des, kt.status_karta_des, kt.id_tipu FROM t_karta_tama kt, t_tipo_karta t, t_diresaun d, t_funsionario f, t_periodo p WHERE kt.id_funsionario=f.id_funsionario AND kt.id_tipu=t.id_tipo AND kt.id_diresaun=d.id_diresaun AND f.id_periodo=p.id_periodo AND p.status_periodo='Y'AND kt.id_tipu='$id' AND kt.status_karta_des !='' AND kt.status_karta_arkivu !='' AND YEAR(kt.data_karta_tama) = '$tinan'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // Qrquivo
    public function Relatorio_karta_tama_arquivo($id,$tinan)
    {
        $query = "SELECT COUNT(*) as total_ark, kt.status_karta_des FROM t_karta_tama kt, t_tipo_karta t, t_diresaun d, t_funsionario f, t_periodo p WHERE kt.id_funsionario=f.id_funsionario AND kt.id_tipu=t.id_tipo AND kt.id_diresaun=d.id_diresaun AND f.id_periodo=p.id_periodo AND p.status_periodo='Y'AND kt.id_tipu='$id' AND kt.status_karta_arkivu !='' AND YEAR(kt.data_karta_tama) = '$tinan'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function karta_sai()
    {
        $query = "SELECT COUNT(*) as total_ks, MONTHNAME(s.data_karta_sai) as fulan FROM t_karta_sai s, t_funsionario f, t_periodo p WHERE s.id_funsionairo=f.id_funsionario AND f.id_periodo=p.id_periodo AND p.status_periodo='Y' GROUP BY MONTHNAME(s.data_karta_sai) ORDER BY MONTH(s.data_karta_sai) ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function karta_sai_periodo($tinan)
    {
        $query = "SELECT COUNT(*) as total_ks, MONTHNAME(s.data_karta_sai) as fulan, MONTH(s.data_karta_sai) as no_fulan FROM t_karta_sai s, t_funsionario f, t_periodo p WHERE s.id_funsionairo=f.id_funsionario AND f.id_periodo=p.id_periodo AND p.status_periodo='Y' AND YEAR(s.data_karta_sai)='$tinan' GROUP BY MONTHNAME(s.data_karta_sai) ORDER BY MONTH(s.data_karta_sai) ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function karta_tama_kada_fulan($id, $tinan)
    {
        $query = "SELECT COUNT(*) as total, MONTHNAME(kt.data_karta_tama) as fulan, MONTH(kt.data_karta_tama) as no_fulan FROM t_karta_tama kt, t_funsionario f, t_periodo p, t_tipo_karta t WHERE kt.id_funsionario=f.id_funsionario AND f.id_periodo=p.id_periodo AND kt.id_tipu=t.id_tipo AND p.status_periodo='Y' AND kt.id_tipu='$id' AND YEAR(kt.data_karta_tama)='$tinan' GROUP BY MONTHNAME(kt.data_karta_tama) ORDER BY MONTH(kt.data_karta_tama) ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
