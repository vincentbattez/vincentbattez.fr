<?php
    session_start();
$select = [];
$orderBy = "";
$limit = "";
$sql = "SELECT * FROM peinture";
$cPage = $_POST['cPage'];

if (isset($_POST['type'])){   //WHERE
    $type = $_POST['type'];
    array_push($select, $type);
}
if (isset($_POST['format'])){    //WHERE
    $format = $_POST['format'];
    array_push($select, $format);
}

if (isset($_POST['orientation'])){    //WHERE
    $orientation = $_POST['orientation'];
    array_push($select, $orientation);
}

if (isset($_POST['prix'])){   //WHERE
    $prix = $_POST['prix'];
    array_push($select, $prix);
}
if (isset($_POST['ordonner'])){   //ORDER BY
    $ordonner = $_POST['ordonner'];
    $orderBy = 'ORDER BY '.$ordonner;
}

if (isset($_POST['nombre'])){ //LIMIT
    $nombre = $_POST['nombre'];
    $perPage = $nombre;
    $limit = "LIMIT 0,$perPage";
}

// var_dump($select);
// var_dump($orderBy);
// var_dump($limit);
// var_dump($_POST);

$where = "WHERE ";
$sqlPage = "SELECT COUNT(id) as nbPeinture FROM peinture";
$i = 0;
foreach ($_POST as $key => $value){
    if ($value != null && $value != "null"){
        if($key != "ordonner" && $key != "nombre"){
            if ($key == "prix"){
                if($i == 2){
                    $sql .= " WHERE $key $value";
                    $sqlPage .= " WHERE $key $value";
                }
                else{
                    $sql .= " AND $key $value";
                    $sqlPage .= " AND $key $value";

                }
            }else{
                if(!is_numeric($value)){
                    if($i == 2){
                        $sql .= " WHERE $key = \"$value\"";
                        $sqlPage .= " WHERE $key = \"$value\"";
                    }
                    else{
                        $sql .= " AND $key = \"$value\"";
                        $sqlPage .= " AND $key = \"$value\"";
                    }
                }
            }
        }
        $i++;
    }
}
$sql .= " $orderBy";
$sql .= " $limit";

$_SESSION['sql'] = $sql;
$_SESSION['sqlPage'] = $sqlPage;
$_SESSION['perPage'] = $perPage;
// echo "Session perpage : $_SESSION[perPage]";
// echo "SESSION : $_SESSION[sql] <br/><br/>";

// echo "select : $where <br/>";
// echo "orderBy : $orderBy <br/>";
// echo "limit : $limit <br/>";

header("Location:../../pages/peinture.php?page=1");
// var_dump($_SESSION);
?>
