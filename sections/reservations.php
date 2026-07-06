<?php $yelp = $restaurant['yelp']; ?>
<!-- Reservations & Waitlist Section -->
<section id="reservations" class="reservations-section section-padding">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Reserve a Table at Rossellini's – Italian Restaurant in Daytona Beach</h2>
            <p class="section-subtitle">Book ahead or join the waitlist — skip the wait at the best Italian restaurant near me</p>
        </div>

        <div class="reservations-grid">
            <!-- Yelp Reservations Widget -->
            <div class="reservation-card">
                <div class="bento-icon">
                    <i class="bi bi-calendar-check-fill"></i>
                </div>
                <h3>Make a Reservation</h3>
                <p>Pick a date and time — your table will be ready when you arrive.</p>
                <div class="reservation-widget">
                    <iframe src="<?php echo $yelp['reservationsWidgetUrl']; ?>" width="250" height="530"
                        frameborder="0" loading="lazy" title="Make a reservation">
                        <a href="<?php echo $yelp['reservationsLink']; ?>">Reserve at Rossellinis</a>
                    </iframe>
                </div>
                <a href="<?php echo $yelp['reservationsLink']; ?>" class="btn btn-primary reservation-cta"
                    target="_blank" rel="noopener">
                    Reserve on Yelp
                </a>
            </div>

            <!-- Yelp Waitlist Widget -->
            <div class="reservation-card">
                <div class="bento-icon">
                    <i class="bi bi-people-fill"></i>
                </div>
                <h3>Join the Waitlist</h3>
                <p>Heading over now? Get in line before you leave and spend less time waiting.</p>
                <div class="reservation-widget">
                    <iframe src="<?php echo $yelp['waitlistWidgetUrl']; ?>" width="250" height="326"
                        frameborder="0" loading="lazy" title="Join our waitlist">
                        <a href="<?php echo str_replace('&', '&amp;', $yelp['waitlistLink']); ?>">Join the waitlist at Rossellinis</a>
                    </iframe>
                </div>
                <a href="<?php echo str_replace('&', '&amp;', $yelp['waitlistLink']); ?>" class="btn btn-primary reservation-cta"
                    target="_blank" rel="noopener">
                    Join Waitlist on Yelp
                </a>
            </div>
        </div>
    </div>
</section>
