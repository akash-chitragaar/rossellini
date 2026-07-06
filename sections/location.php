<!-- Location & Hours Section -->
<section id="location" class="location-section section-padding">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title"><?php echo $config['locations']['title']; ?></h2>
            <p class="section-subtitle"><?php echo $config['locations']['subtitle']; ?></p>
        </div>

        <!-- Bento Box Grid -->
        <div class="bento-grid">
            <!-- Large Map Box -->
            <div class="bento-box bento-map">
                <iframe src="<?php echo $config['locations']['mapEmbed']; ?>" width="100%" height="100%"
                    style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

            <!-- Address Box -->
            <div class="bento-box bento-address">
                <div class="bento-icon">
                    <i class="bi bi-geo-alt-fill"></i>
                </div>
                <h3>Address</h3>
                <p><?php echo $restaurant['address']['street']; ?><br>
                    <?php echo $restaurant['address']['city']; ?>, <?php echo $restaurant['address']['state']; ?>
                    <?php echo $restaurant['address']['zip']; ?></p>
                <a href="https://www.google.com/maps?sca_esv=22c7c7a659e0beaf&gs_lp=Egxnd3Mtd2l6LXNlcnAiEW5ld3JpdmVyZGFsZWRlbGkgKgIIATIHEAAYgAQYDTIGEAAYHhgNMgYQABgeGA0yCBAAGAgYHhgNMggQABgIGB4YDTIIEAAYCBgeGA0yCBAAGAgYHhgNMggQABgIGB4YDTILEAAYgAQYigUYhgMyBRAAGO8FSNEgUIgGWIgGcAJ4AZABAJgBZ6ABZ6oBAzAuMbgBAcgBAPgBAZgCA6ACbsICChAAGEcY1gQYsAOYAwDiAwUSATEgQIgGAZAGCJIHAzIuMaAHwQayBwMwLjG4B2nCBwMxLjLIBwQ&um=1&ie=UTF-8&fb=1&gl=in&sa=X&geocode=KSHQzfS788KJMZKdHohvEn7-&daddr=452+W+238th+St,+Daytona Beach,+NY+32118,+United+States"
                    class="bento-link" target="_blank" rel="noopener">
                    Get Directions <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>

            <!-- Hours Box -->
            <div class="bento-box bento-hours">
                <div class="bento-icon">
                    <i class="bi bi-clock-fill"></i>
                </div>
                <h3>Hours</h3>
                <div class="hours-bento" style="max-height: 180px; overflow-y: auto; padding-right: 5px;">
                    <?php
                    foreach ($restaurant['hours'] as $day => $hours):
                        ?>
                        <div class="hours-row-bento">
                            <span><?php echo ucfirst(substr($day, 0, 3)); ?></span>
                            <span><?php echo $hours; ?></span>
                        </div>
                    <?php
                    endforeach;
                    ?>
                </div>
            </div>

            <!-- Contact Box -->
            <div class="bento-box bento-contact">
                <div class="bento-icon">
                    <i class="bi bi-telephone-fill"></i>
                </div>
                <h3>Contact</h3>
                <p>
                    <a href="tel:<?php echo str_replace(['(', ')', ' ', '-'], '', $restaurant['phone']); ?>"><?php echo $restaurant['phone']; ?></a>
                </p>
            </div>
        </div>
    </div>
</section>

