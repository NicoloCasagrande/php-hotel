<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];
    $filtered_hotels = $hotels;

    if(!empty($_GET['parking']) || $_GET['parking'] == 0){
        $temp_hotels = [];
        foreach($filtered_hotels as $hotel){
            if($hotel['parking'] == $_GET['parking']) {
                $temp_hotels[] = $hotel;
            }
        }
        $filtered_hotels = $temp_hotels;
    }
    if(!empty($_GET['vote'])){
        $temp_hotels = [];
        foreach($filtered_hotels as $hotel){
            if($hotel['vote'] >= $_GET['vote']) {
                $temp_hotels[] = $hotel;
            }
        }
        $filtered_hotels = $temp_hotels;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <form action="index.php">
        <label for="parking">Parking</label>
        <select name="parking" id="parking-filter">
            <option value="" selected>Nessuna preferenza</option>
            <option value="1">Si</option>
            <option value="0">No</option>
        </select>
        <label for="vote">Voto struttura</label>
        <select name="vote" id="vote-filter">
            <option value="" selected>Nessuna preferenza</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <button type="submit" class="btn btn-primary">Invia</button>
    </form>
    <div class="row">
        <div class="col">
            <span>Nome</span>
        </div>
        <div class="col">
            <span>Descrizione</span>
        </div>
        <div class="col">
            <span>Descrizione</span>
        </div>
        <div class="col">
            <span>Descrizione</span>
        </div>
        <div class="col">
            <span>Descrizione</span>
        </div>
    </div>
    <?php foreach ($filtered_hotels as $key => $value){ ?>
        <?php if($value['parking'] || $value['vote']){
            ?>
        <div class="row">
            <div class="col">
                <span><?php echo $value['name']?></span>
            </div>
            <div class="col">
                <span><?php echo $value['description']?></span>
            </div>
            <div class="col">
                <span><?php 
                if($value['parking']){
                    echo 'si';
                }else{
                    echo 'no';
                }
                ?></span>
            </div>
            <div class="col">
                <span class="font-weight-bold"><?php echo $value['vote']?></span>
            </div>
            <div class="col">
                <span class="font-weight-bold"><?php echo $value['distance_to_center']?></span>
            </div>
        </div>
        <?php } ?>
    <?php } ?>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>