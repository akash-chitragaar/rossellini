<!-- Desktop Footer -->
<footer class="footer-section footer-desktop">
    <div class="container">
        <div class="row g-4">
            <!-- About Column -->
            <div class="col-lg-4 col-md-6">
                <div class="footer-about">
                    <img src="assets/images/logo.png" alt="<?php echo $restaurant['name']; ?>" class="footer-logo mb-3" width="60" height="60">
                    <h5><?php echo $restaurant['name']; ?></h5>
                    <p style="color: rgba(255, 255, 255, 0.7);">Authentic Italian cuisine in Daytona Beach — made in Italy, imported to Daytona. Your beachside Italian restaurant.</p>
                </div>
            </div>
            
            <!-- Quick Links Column -->
            <div class="col-lg-2 col-md-6">
                <h5 class="footer-title">Quick Links</h5>
                <ul class="footer-links">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#menu">Menu</a></li>
                    <li><a href="#location">Location</a></li>
                </ul>
            </div>
            
            <!-- Contact Column -->
            <div class="col-lg-3 col-md-6">
                <h5 class="footer-title">Contact Us</h5>
                <ul class="footer-contact">
                    <li>
                        <i class="bi bi-geo-alt-fill me-2"></i>
                        <div>
                            <?php echo $restaurant['address']['street']; ?><br>
                            <?php echo $restaurant['address']['city']; ?>, <?php echo $restaurant['address']['state']; ?> <?php echo $restaurant['address']['zip']; ?>
                        </div>
                    </li>
                    <li>
                        <i class="bi bi-telephone-fill me-2"></i>
                        <a href="tel:<?php echo str_replace(['(', ')', ' ', '-'], '', $restaurant['phone']); ?>"><?php echo $restaurant['phone']; ?></a>
                    </li>
                </ul>
            </div>
            
            <!-- Hours Column -->
            <div class="col-lg-3 col-md-6">
                <h5 class="footer-title">Hours</h5>
                <div class="footer-hours-box">
                    <p class="mb-2"><strong>Monday - Sunday</strong></p>
                    <p class="mb-0"><?php echo $restaurant['hours']['monday']; ?></p>
                </div>
                
                <div class="social-links mt-4">
                    <?php if (!empty($restaurant['social']['Google'])): ?>
                    <a href="<?php echo $restaurant['social']['Google']; ?>" target="_blank" rel="noopener" aria-label="Google">
                        <i class="bi bi-google"></i>
                    </a>
                    <?php endif; ?>
                    <?php if (!empty($restaurant['social']['facebook'])): ?>
                    <a href="<?php echo $restaurant['social']['facebook']; ?>" target="_blank" rel="noopener" aria-label="Facebook">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <?php endif; ?>
                    <?php if (!empty($restaurant['social']['instagram'])): ?>
                    <a href="<?php echo $restaurant['social']['instagram']; ?>" target="_blank" rel="noopener" aria-label="Instagram">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <?php endif; ?>
                    <?php if (!empty($restaurant['social']['yelp'])): ?>
                    <a href="<?php echo $restaurant['social']['yelp']; ?>" target="_blank" rel="noopener" aria-label="Yelp">
                        <i class="bi bi-yelp"></i>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <hr class="footer-divider">
        
        <div class="row">
            <div class="col-md-6 text-center text-md-start">
                <p class="footer-copyright mb-0">
                    &copy; <?php echo date('Y'); ?> <?php echo $restaurant['name']; ?>. All rights reserved.
                </p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <p class="footer-powered mb-0">
                    Powered by <a href="https://get.ser.vi/" target="_blank" rel="noopener">Ser.vi</a>
                </p>
            </div>
        </div>
    </div>
</footer>

<!-- Mobile Footer -->
<footer class="footer-section footer-mobile">
    <div class="container">
        <div class="row g-4">
            <!-- About Column -->
            <div class="col-12 mb-4">
                <img src="assets/images/logo.png" alt="<?php echo $restaurant['name']; ?>" class="footer-logo mb-3" width="60" height="60">
                <h3 class="footer-brand"><?php echo $restaurant['name']; ?></h3>
                <p class="mb-3">Authentic Italian cuisine in Daytona Beach — made in Italy, imported to Daytona. Your beachside Italian restaurant.</p>
                <div class="social-links">
                    <?php if (!empty($restaurant['social']['Google'])): ?>
                    <a href="<?php echo $restaurant['social']['Google']; ?>" target="_blank" rel="noopener" aria-label="Google">
                        <i class="bi bi-google"></i>
                    </a>
                    <?php endif; ?>
                    <?php if (!empty($restaurant['social']['facebook'])): ?>
                    <a href="<?php echo $restaurant['social']['facebook']; ?>" target="_blank" rel="noopener" aria-label="Facebook">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <?php endif; ?>
                    <?php if (!empty($restaurant['social']['instagram'])): ?>
                    <a href="<?php echo $restaurant['social']['instagram']; ?>" target="_blank" rel="noopener" aria-label="Instagram">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <?php endif; ?>
                    <?php if (!empty($restaurant['social']['yelp'])): ?>
                    <a href="<?php echo $restaurant['social']['yelp']; ?>" target="_blank" rel="noopener" aria-label="Yelp">
                        <i class="bi bi-yelp"></i>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Contact Column -->
            <div class="col-12 mb-4">
                <h4><i class="bi bi-geo-alt me-2"></i>Contact Us</h4>
                <ul class="footer-contact">
                    <li>
                        <i class="bi bi-map"></i>
                        <span>
                            <?php echo $restaurant['address']['street']; ?><br>
                            <?php echo $restaurant['address']['city']; ?>, <?php echo $restaurant['address']['state']; ?> <?php echo $restaurant['address']['zip']; ?>
                        </span>
                    </li>
                    <li>
                        <i class="bi bi-telephone-fill"></i>
                        <a href="tel:<?php echo str_replace(['(', ')', ' ', '-'], '', $restaurant['phone']); ?>"><?php echo $restaurant['phone']; ?></a>
                    </li>
                </ul>
            </div>
            
            <!-- Hours Column -->
            <div class="col-12">
                <h4><i class="bi bi-clock me-2"></i>Business Hours</h4>
                <ul class="footer-hours">
                    <li>
                        <strong>Monday - Sunday:</strong>
                        <span><?php echo $restaurant['hours']['monday']; ?></span>
                    </li>
                </ul>
                <a href="<?php echo $restaurant['orderLink']; ?>" class="btn btn-primary mt-3" target="_blank" rel="noopener">
                    Order Online Now
                </a>
            </div>
        </div>
        
        <hr class="footer-divider">
        
        <div class="row">
            <div class="col-12 text-center mb-3">
                <p class="footer-copyright mb-0">
                    &copy; <?php echo date('Y'); ?> <?php echo $restaurant['name']; ?>. All Rights Reserved.
                </p>
            </div>
            <div class="col-12 text-center">
                <p class="footer-powered mb-0">
                    Powered by <a href="https://get.ser.vi/" target="_blank" rel="noopener">Ser.vi</a>
                </p>
            </div>
        </div>
    </div>
</footer>

