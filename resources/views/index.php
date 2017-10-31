<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Oceanography</title>

    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

    <section class="header">
        <div>
            <h1>Oceanography</h1>

            <img src="img/Oceanus.png">
        </div>
    </section>

    <section class="description">
        <div>
            <p>
                Oceanography (compound of the Greek words ὠκεανός meaning "ocean" and γράφω meaning "write"), also known as oceanology, is the study of the physical and the biological aspects of the ocean. It is an Earth science covering a wide range of topics, including ecosystem dynamics; ocean currents, waves, and geophysical fluid dynamics; plate tectonics and the geology of the sea floor; and fluxes of various chemical substances and physical properties within the ocean and across its boundaries. These diverse topics reflect multiple disciplines that oceanographers blend to further knowledge of the world ocean and understanding of processes within: astronomy, biology, chemistry, climatology, geography, geology, hydrology, meteorology and physics. Paleoceanography studies the history of the oceans in the geologic past.
            </p>
        </div>
    </section>

        <div>
            <h2>We know the following oceans:</h2>

            <ul>
                <!-- links are accessing route 'ecean detail' as defined in web.php (routes folder) using get method -->
                <li><a href="<?php echo route('ocean detail', ['name' => 'arctic']); ?>">Arctic Ocean</a></li>
                <li><a href="<?php echo route('ocean detail', ['name' => 'atlantic']); ?>">Atlantic Ocean</a></li>
                <li><a href="<?php echo route('ocean detail', ['name' => 'indian']); ?>">Indian Ocean</li>
                <li><a href="<?php echo route('ocean detail', ['name' => 'pacific']); ?>">Pacific Ocean</li>
                <li><a href="<?php echo route('ocean detail', ['name' => 'southern']); ?>">Southern Ocean</li>
            </ul>
        </div>
    </section>
    
</body>
</html>