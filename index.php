<?php
// SEO Headers - Allow search engines to index and follow
header('X-Robots-Tag: index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1');

// Load configuration
$config = json_decode(file_get_contents('config.json'), true);
$restaurant = $config['restaurant'];
$hero = $config['hero'];
$about = $config['about'];
$specialties = $config['specialties'];
$menuHighlights = array_filter($config['menuHighlights'], function ($item) {
    return isset($item['featured']) && $item['featured'] === true;
});
$testimonials = $config['testimonials'];

// Get publication dates for byline dates
$publishedDate = isset($config['dates']['published']) ? $config['dates']['published'] : date('Y-m-d\TH:i:s\Z', filemtime('index.php'));
$modifiedDate = isset($config['dates']['modified']) ? $config['dates']['modified'] : date('Y-m-d\TH:i:s\Z');

// Cache busting: append the file's modification time to local asset URLs
// so browsers fetch a fresh copy whenever the file changes.
function asset_url($path)
{
    $mtime = @filemtime($path);
    return $mtime ? $path . '?v=' . $mtime : $path;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-6DT3101J66"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-6DT3101J66');
    </script>

    <!-- Ahrefs Analytics -->
    <script src="https://analytics.ahrefs.com/analytics.js" data-key="HDPDd6KJASevumV1NFsSYQ" async></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Primary Meta Tags -->
    <title>Rossellini's Italian Cuisine | Best Italian Restaurant Daytona Beach | Order Now</title>
    <meta name="title" content="Rossellini's Italian Cuisine | Best Italian Restaurant Daytona Beach | Order Now">
    <meta name="description"
        content="Daytona Beach's top-rated Italian restaurant. Fresh pasta, pizza, seafood. Fast pickup & delivery in 32118. Order online!">

    <!-- Primary keywords + local pack boosters -->
    <meta name="keywords"
        content="Best Italian Restaurant Daytona Beach FL, Rossellini's Italian Cuisine, Italian Restaurant Daytona Beach, Italian Food Delivery Daytona Beach, Italian restaurant near me Daytona Beach, Fresh Pasta Daytona Beach, Pizza Daytona Beach, Italian Restaurant 32118, Rossellini's, Italian restaurant Daytona Beach FL, best Italian restaurant Daytona Beach, pizza near me Daytona Beach, pasta near me, takeout Daytona Beach, food near me, restaurants near me, italian food near me, food open near me, Daytona Beach restaurants, italian restaurant, food near me open now, food, Rossellini's Italian Cuisine reviews, food delivery near me, Italian restaurants near me, Italian food near me, seafood near me">

    <!-- Canonical URL -->
    <link rel="canonical" href="https://rossellinisrestaurantfl.com/">
    
    <!-- AI/LLM Discovery -->
    <link rel="alternate" type="text/plain" href="https://rossellinisrestaurantfl.com/llms.txt" title="LLMs.txt - AI Model Information">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="restaurant">
    <meta property="og:url" content="https://rossellinisrestaurantfl.com/">
    <meta property="og:title" content="Rossellini's Italian Cuisine | Best Italian Restaurant in Daytona Beach | Order Now">
    <meta property="og:description"
        content="Fresh, fast, Italian restaurant in Daytona Beach. Daily-made ingredients, premium quality. Order online for pickup & delivery!">
    <meta property="og:image"
        content="https://rossellinisrestaurantfl.com/assets/images/og-image1.webp">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="Rossellini's Italian Cuisine - Authentic Italian Restaurant in Daytona Beach, FL">
    <meta property="og:locale" content="en_US">
    <meta property="og:site_name" content="Rossellini's Italian Cuisine">
    <meta property="article:published_time" content="<?php echo $publishedDate; ?>">
    <meta property="article:modified_time" content="<?php echo $modifiedDate; ?>">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://rossellinisrestaurantfl.com/">
    <meta property="twitter:title" content="Rossellini's Italian Cuisine | Best Italian Restaurant in Daytona Beach | Order Now">
    <meta property="twitter:description"
        content="Fresh, fast, Italian restaurant in Daytona Beach. Daily-made ingredients, premium quality. Order online now!">
    <meta property="twitter:image" content="https://rossellinisrestaurantfl.com/assets/images/og-image1.webp">
    <meta property="twitter:image:alt" content="Rossellini's Italian Cuisine - Authentic Italian Restaurant in Daytona Beach, FL">
    
    <!-- Local Business Schema Markup -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Restaurant",
        "@id": "https://rossellinisrestaurantfl.com/",
        "name": "Rossellini's Italian Cuisine",
        "image": "https://rossellinisrestaurantfl.com/assets/images/logo.png",
        "url": "https://rossellinisrestaurantfl.com/",
        "telephone": "<?php echo $restaurant['phone']; ?>",
        "email": "<?php echo $restaurant['email']; ?>",
        "priceRange": "$$",
        "servesCuisine": ["Italian", "Pizza", "Pasta", "Seafood"],
        "acceptsReservations": "https://www.yelp.com/reservations/rossellinis-daytona-beach-2/?from_reserve_now=1",
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
            "<?php echo $restaurant['social']['yelp']; ?>"
        ],
        "menu": "https://rossellinisrestaurantfl.com/#menu",
        "datePublished": "<?php echo $publishedDate; ?>",
        "dateModified": "<?php echo $modifiedDate; ?>",
        "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "4.7",
            "reviewCount": "150"
        }
    }
    </script>

    <!-- FAQ Schema for Featured Snippets -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [
            {
                "@type": "Question",
                "name": "What is the best Italian restaurant near me in Daytona Beach, FL?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Rossellini's Italian Cuisine is the best Italian restaurant near me in Daytona Beach, FL. Located on S Atlantic Ave, we serve fresh handmade pasta, pizza, seafood, and classic Italian dishes made with authentic recipes and premium imported ingredients."
                }
            },
            {
                "@type": "Question",
                "name": "Where can I find the best pizza near me in Daytona Beach?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Rossellini's Italian Cuisine on S Atlantic Ave offers authentic Italian pizza and fresh handmade pasta. We are your go-to spot for pizza near me in Daytona Beach, FL, made fresh daily with premium imported ingredients."
                }
            },
            {
                "@type": "Question",
                "name": "What are the hours for Rossellini's Italian Cuisine?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Rossellini's Italian Cuisine is open Monday through Sunday from 11:00 AM to 10:00 PM. We're located at 136 S Atlantic Ave, Daytona Beach, FL 32118."
                }
            },
            {
                "@type": "Question",
                "name": "Does Rossellini's Italian Cuisine offer delivery?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Yes, Rossellini's Italian Cuisine offers delivery and takeout in the 32118 area. You can order online for pickup or delivery through our website."
                }
            },
            {
                "@type": "Question",
                "name": "Does Rossellini's Italian Cuisine accept reservations?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Yes, Rossellini's Italian Cuisine accepts reservations. You can book a table or join the waitlist online through Yelp Reservations directly from our website, or reserve at https://www.yelp.com/reservations/rossellinis-daytona-beach-2/."
                }
            },
            {
                "@type": "Question",
                "name": "What makes Rossellini's Italian Cuisine the best Italian restaurant in Daytona Beach?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Rossellini's Italian Cuisine has been serving Daytona Beach with authentic Italian recipes, imported ingredients, fresh handmade pasta, and premium quality. We're known as the best Italian restaurant near me for our homemade pastas and community-focused service."
                }
            },
            {
                "@type": "Question",
                "name": "What food options are available at Rossellini's Italian Cuisine?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Rossellini's Italian Cuisine serves fresh pasta, pizza, seafood, chicken and veal entrées, salads, desserts, and daily specials. We're your top choice for food near me, restaurants near me, and Italian food near me in Daytona Beach, FL."
                }
            }
        ]
    }
    </script>

    <!-- Article Schema for Featured Snippets -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Article",
        "headline": "Rossellini's Italian Cuisine - Best Italian Restaurant Near Me in Daytona Beach, FL",
        "description": "Best Italian restaurant near me in Daytona Beach, FL! Located on S Atlantic Ave, serving fresh pasta, pizza, seafood, and classic Italian dishes. Food near me, restaurants near me, Italian food near me.",
        "image": "https://rossellinisrestaurantfl.com/assets/images/og-image1.webp",
        "author": {
            "@type": "Organization",
            "name": "Rossellini's Italian Cuisine"
        },
        "publisher": {
            "@type": "Organization",
            "name": "Rossellini's Italian Cuisine",
            "logo": {
                "@type": "ImageObject",
                "url": "https://rossellinisrestaurantfl.com/assets/images/logo.png"
            }
        },
        "datePublished": "<?php echo $publishedDate; ?>",
        "dateModified": "<?php echo $modifiedDate; ?>",
        "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "https://rossellinisrestaurantfl.com/"
        }
    }
    </script>

    <!-- Breadcrumb Schema -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement": [
            {
                "@type": "ListItem",
                "position": 1,
                "name": "Home",
                "item": "https://rossellinisrestaurantfl.com/"
            }
        ]
    }
    </script>

    <!-- Geo tags for Google's AI/local pack -->
    <meta name="geo.position" content="<?php echo $restaurant['geo']['latitude']; ?>;<?php echo $restaurant['geo']['longitude']; ?>">
    <meta name="geo.placename" content="Daytona Beach, FL">
    <meta name="geo.region" content="US-FL">
    <meta name="ICBM" content="<?php echo $restaurant['geo']['latitude']; ?>, <?php echo $restaurant['geo']['longitude']; ?>">

    <!-- Robots Meta - Allow ALL crawlers -->
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1, noarchive">
    <meta name="googlebot" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="bingbot" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    
    <!-- AI Crawlers Meta - Explicitly allow ALL AI/LLM bots and search engines -->
    <meta name="GPTBot" content="index, follow">
    <meta name="ChatGPT-User" content="index, follow">
    <meta name="Google-Extended" content="index, follow">
    <meta name="ClaudeBot" content="index, follow">
    <meta name="Claude-Web" content="index, follow">
    <meta name="Anthropic-AI" content="index, follow">
    <meta name="anthropic-ai" content="index, follow">
    <meta name="PerplexityBot" content="index, follow">
    <meta name="Perplexity-User" content="index, follow">
    <meta name="CCBot" content="index, follow">
    <meta name="Applebot" content="index, follow">
    <meta name="Applebot-Extended" content="index, follow">
    <meta name="cohere-ai" content="index, follow">
    <meta name="Bytespider" content="index, follow">
    <meta name="Diffbot" content="index, follow">
    <meta name="Omgilibot" content="index, follow">
    <meta name="YouBot" content="index, follow">
    <meta name="meta-externalagent" content="index, follow">
    <meta name="FacebookBot" content="index, follow">
    <meta name="FacebookExternalHit" content="index, follow">
    <meta name="Twitterbot" content="index, follow">
    <meta name="LinkedInBot" content="index, follow">
    <meta name="WhatsApp" content="index, follow">
    <meta name="SemrushBot" content="index, follow">
    <meta name="AhrefsBot" content="index, follow">
    <meta name="MJ12bot" content="index, follow">
    <meta name="DotBot" content="index, follow">
    <meta name="BLEXBot" content="index, follow">
    <meta name="ia_archiver" content="index, follow">
    <meta name="archive.org_bot" content="index, follow">
    <meta name="Wayback" content="index, follow">
    <meta name="DuckDuckBot" content="index, follow">
    <meta name="Baiduspider" content="index, follow">
    <meta name="YandexBot" content="index, follow">
    <meta name="Slurp" content="index, follow">
    
    <!-- Allow all AI models to crawl and scrape -->
    <meta name="AI-Crawler" content="index, follow">
    <meta name="LLM-Crawler" content="index, follow">
    <meta name="AI-Search-Engine" content="index, follow">

    <!-- Language -->
    <meta http-equiv="content-language" content="en-US">

    <!-- Mobile Optimization -->
    <meta name="theme-color" content="<?php echo $restaurant['colors']['primary']; ?>">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="Rossellini's">
    <meta name="format-detection" content="telephone=yes">
    <meta name="HandheldFriendly" content="true">

    <!-- Preconnect for Performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="preconnect" href="https://images.unsplash.com" crossorigin>
    <link rel="dns-prefetch" href="https://images.unsplash.com">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@1,500;1,600&display=swap"
        rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo asset_url('assets/css/home-style.css'); ?>">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo asset_url('assets/images/logo.png'); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo asset_url('assets/images/logo.png'); ?>">
</head>

<body>

    <!-- Navigation -->
    <?php include 'sections/navbar.php'; ?>

    <!-- Hero Section -->
    <?php include 'sections/hero.php'; ?>

    <!-- About Section -->
    <?php include 'sections/about.php'; ?>

    <!-- Reservations & Waitlist Section -->
    <?php include 'sections/reservations.php'; ?>

    <!-- Hidden FAQ Section for Search Engines (Not Displayed) -->
    <div style="display: none;" itemscope itemtype="https://schema.org/FAQPage">
        <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
            <h3 itemprop="name">What is the best Italian restaurant near me in Daytona Beach, FL?</h3>
            <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                <p itemprop="text">Rossellini's Italian Cuisine is the best Italian restaurant near me in Daytona Beach, FL. Located on S Atlantic Ave, we serve fresh handmade pasta, pizza, seafood, and classic Italian dishes made with authentic recipes and premium imported ingredients.</p>
            </div>
        </div>
        <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
            <h3 itemprop="name">Where can I find the best pizza near me in Daytona Beach?</h3>
            <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                <p itemprop="text">Rossellini's Italian Cuisine on S Atlantic Ave offers authentic Italian pizza and fresh handmade pasta. We are your go-to spot for pizza near me in Daytona Beach, FL, made fresh daily with premium imported ingredients.</p>
            </div>
        </div>
        <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
            <h3 itemprop="name">What are the hours for Rossellini's Italian Cuisine?</h3>
            <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                <p itemprop="text">Rossellini's Italian Cuisine is open Monday through Sunday from 11:00 AM to 10:00 PM. We're located at 136 S Atlantic Ave, Daytona Beach, FL 32118.</p>
            </div>
        </div>
        <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
            <h3 itemprop="name">Does Rossellini's Italian Cuisine offer delivery?</h3>
            <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                <p itemprop="text">Yes, Rossellini's Italian Cuisine offers delivery and takeout in the 32118 area. You can order online for pickup or delivery through our website.</p>
            </div>
        </div>
        <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
            <h3 itemprop="name">Does Rossellini's Italian Cuisine accept reservations?</h3>
            <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                <p itemprop="text">Yes, Rossellini's Italian Cuisine accepts reservations. You can book a table or join the waitlist online through Yelp Reservations directly from our website, or reserve at https://www.yelp.com/reservations/rossellinis-daytona-beach-2/.</p>
            </div>
        </div>
        <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
            <h3 itemprop="name">What makes Rossellini's Italian Cuisine the best Italian restaurant in Daytona Beach?</h3>
            <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                <p itemprop="text">Rossellini's Italian Cuisine has been serving Daytona Beach with authentic Italian recipes, imported ingredients, fresh handmade pasta, and premium quality. We're known as the best Italian restaurant near me for our homemade pastas and community-focused service.</p>
            </div>
        </div>
        <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
            <h3 itemprop="name">What food options are available at Rossellini's Italian Cuisine?</h3>
            <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                <p itemprop="text">Rossellini's Italian Cuisine serves fresh pasta, pizza, seafood, chicken and veal entrées, salads, desserts, and daily specials. We're your top choice for food near me, restaurants near me, and Italian food near me in Daytona Beach, FL.</p>
            </div>
        </div>
    </div>

    <!-- Testimonials Section -->
    <?php include 'sections/testimonials.php'; ?>

    <!-- Location & Hours Section -->
    <?php include 'sections/location.php'; ?>

    <!-- Footer -->
    <?php include 'sections/footer.php'; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS -->
    <script src="<?php echo asset_url('assets/js/home-main.js'); ?>"></script>

</body>

</html>

