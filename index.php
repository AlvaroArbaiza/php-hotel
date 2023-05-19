<?php

// array $hotels
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

    if ( $_GET['park'] == 'yes') {
        $park = true;
    } else if ($_GET['park'] == 'no') {
        $park = false;
    } else {
        $park = null;
    }

    $vote = intval($_GET['vote']);

    var_dump($_GET['park'] );
    var_dump($park);
    var_dump(intval($_GET['vote']));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <title>Php Hotel</title>
</head>
<body>
    
    <div class="container">
        <div class="row text-center text-primary">
            <h1 class="color-blue">Booking</h1>
        </div>
    </div>

    <div class="container pt-4">    
        <div class="row">

            <!-- filter  -->
            <div class="col-2">

                <!-- form -->
                <form action="index.php" method="GET">
                
                    <!-- parking -->
                    <div class="mb-3">

                        <h5 class="fw-bold">Parking</h5>
                        <div>
                            <input type="radio" id="yesPark" name="park" value="yes">
                            <label for="yesPark">Yes</label>
                        </div>
                        <div>
                            <input type="radio" id="noPark" name="park" value="no">
                            <label for="noPark">No</label>
                        </div>
                    </div>

                    <!-- vote -->
                    <div class="mb-3">

                        <h5 class="fw-bold">Vote</h5>
                        <div>
                            <input type="radio" id="over4" name="vote" value="4">
                            <label for="over4">4 e più</label>
                        </div>
                        <div>
                            <input type="radio" id="over3" name="vote" value="3">
                            <label for="over3">3 e più</label>
                        </div>
                        <div>
                            <input type="radio" id="over2" name="vote" value="2">
                            <label for="over2">2 e più</label>
                        </div>
                        <div>
                            <input type="radio" id="over1" name="vote" value="1">
                            <label for="over1">1 e più</label>
                        </div>
                    </div>
                
                    <button type="submit" class="btn btn-primary">Filtra</button>
                </form>
            </div>

            <!-- hotels -->
            <div class="col-10 d-flex flex-wrap gap-4">
                <?php

                    // se entrambi i filtri sono diversi da null o da 0
                    if ($park !== null && $vote !== 0) {

                        // creo il ciclo per selezionare ogni elemento di $hotels
                        foreach($hotels as $elem) {
                            
                            // se parking è uguale al valore di $park e vote è >= del valore di $vote
                            if ( $elem['parking'] == $park && $elem['vote'] >= $vote ) {

                                echo 
                                '<div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">'. $elem['name'] .'</h5>
                                        <h6 class="card-subtitle mb-2 text-body-secondary">
                                            Distance to center: '. $elem['distance_to_center'] .
                                        'km</h6>
                                        <h6 class="card-subtitle mb-2 text-body-secondary">
                                            Vote: '. $elem['vote'] .
                                        '</h6>
                                        <h6 class="card-subtitle mb-2 text-body-secondary">
                                            Parking: ' . $_GET['park'] .
                                        '</h6>
                                        <p class="card-text">'. $elem['description'] .'</p>
                                    </div> 
                                </div>';
                            }
                        }
                       

                    } else {

                        // se nessun filtro è stato selezionato mi resetta tutto
                        foreach($hotels as $elem) {
    
                            // Se il parcheggio c'è
                            if ($elem['parking'] == true) {
    
                                echo 
                                '<div class="card" style="width: 18rem;">
                                    <div class="card-body"> <h5 class="card-title">'. $elem['name'] .'</h5>
                                        <h6 class="card-subtitle mb-2 text-body-secondary">
                                            Distance to center: '. $elem['distance_to_center'] .
                                        'km</h6>
                                        <h6 class="card-subtitle mb-2 text-body-secondary">
                                            Vote: '. $elem['vote'] .
                                        '</h6>
                                        <h6 class="card-subtitle mb-2 text-body-secondary">
                                            Parking: Yes
                                        </h6>
                                        <p class="card-text">'. $elem['description'] .'</p>
                                    </div> 
                                </div>';
                                
                                // Se il parcheggio non c'è
                            } else {
    
                                echo 
                                '<div class="card" style="width: 18rem;">
                                    <div class="card-body"> <h5 class="card-title">'. $elem['name'] .'</h5>
                                        <h6 class="card-subtitle mb-2 text-body-secondary">
                                            Distance to center: '. $elem['distance_to_center'] .
                                        'km</h6>
                                        <h6 class="card-subtitle mb-2 text-body-secondary">
                                            Vote: '. $elem['vote'] .
                                        '</h6>
                                        <h6 class="card-subtitle mb-2 text-body-secondary">
                                            Parking: No
                                        </h6>
                                        <p class="card-text">'. $elem['description'] .'</p>
                                    </div> 
                                </div>';
                            }
                        }
                    }

                ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>