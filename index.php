<!DOCTYPE html>
<html>
    <head>       
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SELECT</title>
        <link type="text/css" rel="stylesheet" href="style.css"/>
        <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v1.5.1/leaflet.css" />
        <script src="http://cdn.leafletjs.com/leaflet/v1.5.1/leaflet.js"></script>
        <script src="jquery.min.js"></script>
    </head>
    <body>
        <header>
            <h1>Select</h1>    
        </header>
        <main>
            <?php
                include('db_connection.php');

                $query = $pdo->prepare("SELECT * FROM regions ORDER BY name ASC");
                $query->execute();
                $rowCount = $query->rowCount();
            ?>
            <select name="region" id="region" >
                <option value="">Choisir une région</option>
                <?php
                    if($rowCount > 0){
                        while($row = $query->fetch(PDO::FETCH_ASSOC)){ 
                            echo '<option value="'.$row['code'].'">'.$row['name'].'</option>';
                        }
                    }else{
                        echo '<option value="">Region non valable</option>';
                    }
                ?>
            </select>

            <select name="department" id="department">
                <option value="">Choisir une région en premier</option>
            </select>

            <select name="city" id="city">
                <option value="">Choisir un département en premier</option>
            </select>

            <div id="map"></div>
        </main>
        <script src="map.js"></script>
        <script src="index.js"></script>
    </body>
</html>











 
