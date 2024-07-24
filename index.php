<?php 
// array degli hotel fornito
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
// copia dell'array originale da filtrare
$filtro_hotels = $hotels;

// filtro per parcheggio
if (isset($_GET['parking'])) {
    // filtra solo gli hotel col parcheggio
    // array_filter è una funzione PHP che filtra gli elementi di un array utilizzando una funzione di callback. Restituisce un nuovo array contenente solo gli elementi per i quali la funzione di callback restituisce true.
    $filtro_hotels = array_filter($filtro_hotels, function($hotel){
        return $hotel['parking'];
    });
}

// filtro per voti
// variabile per tenere traccia del voto selezionato
$selected_rate = null;
for ($i = 1; $i <= 5; $i++) {
    if (isset($_GET["rate$i"])) {
        // imposta il valore selezionato
        $selected_rate = $i;
        // uscita dal ciclo una volta trovato
        break;
    }
}

if (!is_null($selected_rate)) {
    // filtra gli hotel con voto uguale o superiore a quello selezionato
    $filtro_hotels = array_filter($filtro_hotels, function($hotel) use ($selected_rate) {
        return $hotel['vote'] >= $selected_rate;
    });
}

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

        <!-- Bootstrap CSS v5.3.2 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <div class="container my-5">
            <!-- form per il filtraggio -->
            <form action="index.php" method="get">
                <div>
                    <input type="checkbox" name="parking" id="parking" <?php echo isset($_GET['parking']) ? 'checked' : ''; ?>>
                    <label for="parking">Con il parcheggio</label>    
                </div>
                <?php for ($i = 1; $i <= 5; $i++): ?>
                    <div>
                        <input type="checkbox" name="rate<?php echo $i; ?>" id="rate<?php echo $i; ?>" value="<?php echo $i; ?>" <?php echo (isset($_GET["rate$i"]) && $_GET["rate$i"] == $i) ? 'checked' : '' ?>>
                        <label for="rate<?php echo $i; ?>"><?php echo $i; ?></label>
                    </div>
                <?php endfor; ?>
                
                <button type="submit" class="btn btn-primary">Filtra</button>
                <button class="btn btn-dark"><a class="text-white bg-dark" href="index.php">Azzera filtri</a></button>
                
            </form>

            <table class="table mt-4">
                <thead>
                    <tr>
                        <?php foreach ($hotels[0] as $title => $value): ?>
                            <th> <?php echo ucfirst($title) ?> </th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($filtro_hotels as $hotel): ?>
                        <tr>
                            <td> <?php echo $hotel['name'] ?> </td>
                            <td> <?php echo $hotel['description'] ?> </td>
                            <td class="text-center"> <?php echo $hotel['parking'] ? 'SI' : 'NO' ?> </td>
                            <td class="text-center"> <?php echo $hotel['vote'] ?> </td>
                            <td class="text-center"> <?php echo $hotel['distance_to_center'] . ' km' ?> </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
