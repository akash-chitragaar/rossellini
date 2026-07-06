<!-- Hero Section -->
<section id="home" class="hero-section" style="background-image: linear-gradient(rgba(46, 8, 5, 0.75), rgba(107, 18, 10, 0.6)), url('<?php echo $hero['backgroundImage']; ?>');">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-lg-10 col-xl-8 mx-auto text-center hero-content">
                <h1 class="hero-title"><?php echo $hero['title']; ?></h1>
                <p class="hero-subtitle"><?php echo $hero['subtitle']; ?></p>
                <p class="hero-description"><?php echo $hero['description']; ?></p>
                <div class="hero-buttons">
                    <a href="<?php echo $restaurant['orderLink']; ?>" class="btn btn-primary btn-lg" target="_blank" rel="noopener">
                        <?php echo $hero['ctaText']; ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

