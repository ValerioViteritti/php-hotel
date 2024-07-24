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

// var_dump($hotels[0])

?>

<!doctype html>
<html lang="en">
    <head>
        <title>PHP Hotel</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <div class="container my-5">
            <form action="index.php" method="get">
                <input type="radio" name="parking" >Con il parcheggio
                <input type="radio" name="rate1" >1
                <input type="radio" name="rate2" >2
                <input type="radio" name="rate3" >3
                <input type="radio" name="rate4" >4
                <input type="radio" name="rate5" >5
                <button class="btn btn-primary">Filtra</button>

            </form>
        <table class="table">
            <thead>
            <tr>
                <?php foreach ($hotels[0] as $title => $value): ?>
                <th> <?php echo ucfirst($title) ?> </th>
                <?php endforeach; ?>
            </tr>
            </thead>
            <tbody>
                <?php foreach ($hotels as $hotel):?>
                    <tr>
                        
                        <td> <?php echo $hotel['name'] ?> </td>
                        <td> <?php echo $hotel['description'] ?> </td>
                        <td class="text-center"> <?php echo $hotel['parking']? 'SI' : 'NO' ?> </td>
                        <td class="text-center"> <?php echo $hotel['vote'] ?> </td>
                        <td class="text-center"> <?php echo $hotel['distance_to_center'] . ' ' . 'km' ?> </td>
                        

                    </tr>
                <?php endforeach; ?>
            </tbody>
            
            
        </table>


        </div>


        
    </body>
</html>
