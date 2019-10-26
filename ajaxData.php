<?php
//Include database configuration file
include('db_connection.php');

if(isset($_POST["region_id"]) && !empty($_POST["region_id"])){

    $query = $pdo->prepare("SELECT * FROM departments WHERE region_code = ? ORDER BY name ASC");
    $query->execute([$_POST['region_id']]);

    $rowCount = $query->rowCount();
    
    if($rowCount > 0){
        echo '<option value="">Choisir un département</option>';
        while($row = $query->fetch(PDO::FETCH_ASSOC)){ 
            echo '<option value="'.$row['code'].'">'.$row['name'].'</option>';
        }
    }else{
        echo '<option value="">Département indisponible</option>';
    }
}

if(isset($_POST["department_id"]) && !empty($_POST["department_id"])){

    $query = $pdo->prepare("SELECT * FROM cities WHERE department_code = ? ORDER BY name ASC");
    $query->execute([$_POST['department_id']]);

    $rowCount = $query->rowCount();
    
    if($rowCount > 0){
        echo '<option value="">Choisir une ville</option>';
        while($row = $query->fetch(PDO::FETCH_ASSOC)){ 
            echo '<option value="'.$row['insee_code'].'" data-lat="'.$row['gps_lat'].'" data-lng="'.$row['gps_lng'].'">'.$row['name'].'</option>';
        }
    }else{
        echo '<option value="">Ville indisponible</option>';
    }
}
?>