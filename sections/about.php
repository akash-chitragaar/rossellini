<!-- About Section -->
<section id="about" class="about-section section-padding" itemscope itemtype="https://schema.org/AboutPage">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="about-content">
                    <h2 class="section-title" itemprop="headline"><?php echo $about['title']; ?></h2>
                    <p class="section-subtitle" itemprop="description"><?php echo $about['subtitle']; ?></p>
                    <div itemprop="text">
                    <?php 
                    $paragraphs = explode("\\n\\n", $about['content']);
                    foreach ($paragraphs as $paragraph): 
                    ?>
                    <p class="lead"><?php echo $paragraph; ?></p>
                    <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-image">
                    <img src="<?php echo $about['image']; ?>" alt="About <?php echo $restaurant['name']; ?>" class="img-fluid rounded shadow-lg" width="753" height="753" loading="lazy">
                </div>
            </div>
        </div>
        
        <!-- Features -->
        <div class="row mt-5 g-4">
            <?php foreach ($config['features'] as $feature): ?>
            <div class="col-md-4">
                <div class="feature-card text-center">
                    <div class="feature-icon">
                        <i class="bi bi-<?php echo $feature['icon']; ?>"></i>
                    </div>
                    <h4 class="feature-title"><?php echo $feature['title']; ?></h4>
                    <p class="feature-description"><?php echo $feature['description']; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

