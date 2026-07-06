<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Restaurant",
    "@id": "https://rossellinisrestaurantfl.com/",
    "name": "<?php echo $restaurant['name']; ?>",
    "image": "https://rossellinisrestaurantfl.com/assets/images/logo.png",
    "url": "https://rossellinisrestaurantfl.com/",
    "telephone": "<?php echo $restaurant['phone']; ?>",
    "email": "<?php echo $restaurant['email']; ?>",
    "priceRange": "$$",
    "servesCuisine": ["Italian", "Pizza", "Pasta", "Seafood"],
    "acceptsReservations": "False",
    "address": {
        "@type": "PostalAddress",
        "streetAddress": "<?php echo $restaurant['address']['street']; ?>",
        "addressLocality": "<?php echo $restaurant['address']['city']; ?>",
        "addressRegion": "<?php echo $restaurant['address']['state']; ?>",
        "postalCode": "<?php echo $restaurant['address']['zip']; ?>",
        "addressCountry": "US"
    },
    "geo": {
        "@type": "GeoCoordinates",
        "latitude": <?php echo $restaurant['geo']['latitude']; ?>,
        "longitude": <?php echo $restaurant['geo']['longitude']; ?>
    },
    "openingHoursSpecification": [
        <?php
        $daysMap = [
            'monday' => 'Monday',
            'tuesday' => 'Tuesday',
            'wednesday' => 'Wednesday',
            'thursday' => 'Thursday',
            'friday' => 'Friday',
            'saturday' => 'Saturday',
            'sunday' => 'Sunday'
        ];
        $hoursArray = [];
        foreach ($restaurant['hours'] as $day => $hours) {
            $times = explode(' - ', $hours);
            $hoursArray[] = json_encode([
                "@type" => "OpeningHoursSpecification",
                "dayOfWeek" => $daysMap[$day],
                "opens" => date('H:i', strtotime($times[0])),
                "closes" => date('H:i', strtotime($times[1]))
            ], JSON_UNESCAPED_SLASHES);
        }
        echo implode(',', $hoursArray);
        ?>
    ],
    "sameAs": [
        "<?php echo $restaurant['social']['Google']; ?>",
        "<?php echo $restaurant['social']['instagram']; ?>",
        "<?php echo $restaurant['social']['yelp']; ?>"
    ],
    "menu": "https://rossellinisrestaurantfl.com/#menu",
    "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "4.7",
        "reviewCount": "150"
    }
}
</script>