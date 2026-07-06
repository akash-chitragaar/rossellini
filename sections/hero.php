<!-- Hero Section -->
<section id="home" class="hero-section" style="background-image: linear-gradient(rgba(30, 5, 3, 0.82), rgba(80, 13, 7, 0.68)), url('<?php echo asset_url($hero['backgroundImage']); ?>');">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-lg-10 col-xl-8 mx-auto text-center hero-content">
                <span class="hero-badge">
                    <i class="bi bi-star-fill"></i>
                    <?php echo $hero['badge']; ?>
                </span>
                <h1 class="hero-title"><?php echo $hero['title']; ?></h1>
                <p class="hero-subtitle"><?php echo $hero['subtitle']; ?></p>
                <p class="hero-description"><?php echo $hero['description']; ?></p>
                <span class="visually-hidden"><?php echo $hero['seoText']; ?></span>
                <div class="hero-buttons">
                    <a href="<?php echo $restaurant['orderLink']; ?>" class="btn btn-primary btn-lg" target="_blank" rel="noopener">
                        <?php echo $hero['ctaText']; ?>
                    </a>
                    <a href="#reservations" class="btn btn-outline-light btn-lg">
                        Reserve a Table
                    </a>
                </div>
                <ul class="hero-chips">
                    <?php foreach ($hero['chips'] as $chip): ?>
                        <li><?php echo $chip; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>
