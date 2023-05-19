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

    $park = $_GET['park'];

    $vote = $_GET['vote'];

    var_dump($park);
    var_dump($vote);

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
                            <input type="radio" id="yesPark" name="park" value="true">
                            <label for="yesPark">Yes</label>
                        </div>
                        <div>
                            <input type="radio" id="noPark" name="park" value="false">
                            <label for="noPark">No</label>
                        </div>
                    </div>

                    <!-- vote -->
                    <div class="mb-3">

                        <h5 class="fw-bold">Vote</h5>
                        <div>
                            <input type="radio" id="over4" name="vote" value="over4">
                            <label for="over4">4 e più</label>
                        </div>
                        <div>
                            <input type="radio" id="over3" name="vote" value="over3">
                            <label for="over3">3 e più</label>
                        </div>
                        <div>
                            <input type="radio" id="over2" name="vote" value="over2">
                            <label for="over2">2 e più</label>
                        </div>
                        <div>
                            <input type="radio" id="over1" name="vote" value="over1">
                            <label for="over1">1 e più</label>
                        </div>
                    </div>
                
                    <button type="submit" class="btn btn-primary">Filtra</button>
                </form>
            </div>

            <!-- hotels -->
            <div class="col-10 d-flex flex-wrap gap-4">
                <?php

                    if ($park != null || $vote != null) {


                        foreach($hotels as $elem) {
    
                            if ($park = $elem['parking']) {
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
                            }
                        }
                    } else {


                        foreach($hotels as $elem) {
    
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