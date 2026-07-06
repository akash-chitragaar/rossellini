<?php $yelp = $restaurant['yelp']; ?>
<!-- Reservations & Waitlist Section -->
<section id="reservations" class="reservations-section section-padding">
    <div class="container">
        <div class="section-header">
            <span class="section-eyebrow">Book Your Table</span>
            <h2 class="section-title">Reserve a Table at Rossellini's</h2>
            <p class="section-subtitle">Book ahead or join tonight's waitlist — skip the wait at Daytona Beach's favorite Italian restaurant</p>
        </div>

        <div class="reservations-grid">
            <!-- Yelp Reservations Widget -->
            <div class="reservation-card">
                <div class="reservation-card-header">
                    <div class="reservation-icon">
                        <i class="bi bi-calendar-check-fill"></i>
                    </div>
                    <div>
                        <h3>Make a Reservation</h3>
                        <p>Your table, ready when you arrive</p>
                    </div>
                </div>
                <div class="reservation-widget">
                    <iframe src="<?php echo $yelp['reservationsWidgetUrl']; ?>" width="250" height="490"
                        frameborder="0" scrolling="no" loading="lazy" title="Make a reservation">
                        <a href="<?php echo $yelp['reservationsLink']; ?>">Reserve at Rossellinis</a>
                    </iframe>
                </div>
                <a href="<?php echo $yelp['reservationsLink']; ?>" class="reservation-alt-link"
                    target="_blank" rel="noopener">
                    Or reserve on Yelp <i class="bi bi-arrow-up-right"></i>
                </a>
            </div>

            <!-- Yelp Waitlist Widget -->
            <div class="reservation-card">
                <div class="reservation-card-header">
                    <div class="reservation-icon">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <div>
                        <h3>Join the Waitlist</h3>
                        <p>Heading over now? Get in line early</p>
                    </div>
                </div>
                <div class="reservation-widget">
                    <iframe src="<?php echo $yelp['waitlistWidgetUrl']; ?>" width="300" height="330"
                        frameborder="0" scrolling="no" loading="lazy" title="Join our waitlist">
                        <a href="<?php echo str_replace('&', '&amp;', $yelp['waitlistLink']); ?>">Join the waitlist at Rossellinis</a>
                    </iframe>
                </div>
                <a href="<?php echo str_replace('&', '&amp;', $yelp['waitlistLink']); ?>" class="reservation-alt-link"
                    target="_blank" rel="noopener">
                    Or join the waitlist on Yelp <i class="bi bi-arrow-up-right"></i>
                </a>
            </div>
        </div>

        <p class="reservations-note">
            Prefer to talk? Call us at
            <a href="tel:<?php echo str_replace(['(', ')', ' ', '-'], '', $restaurant['phone']); ?>"><?php echo $restaurant['phone']; ?></a>
            — walk-ins always welcome.
        </p>
    </div>
</section>
