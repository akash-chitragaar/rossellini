<!-- Testimonials Section -->
<section id="reviews" class="testimonials-section section-padding">
    <div class="container">
        <div class="section-header text-center mb-5">
            <h2 class="section-title">What Our Customers Say</h2>
            <p class="section-subtitle">Don't just take our word for it - hear from our happy customers</p>

            <!-- Google Reviews Badge -->
            <div id="google-badge" class="google-badge mx-auto mt-4" style="display: none;">
                <i class="bi bi-google"></i>
                <div class="badge-content">
                    <div class="badge-label">Google Rating</div>
                    <div class="badge-rating">
                        <span id="badge-rating"></span>
                        <span class="stars" id="badge-stars"></span>
                    </div>
                    <div class="badge-count">Based on <span id="badge-count"></span> reviews</div>
                </div>
            </div>
        </div>

        <!-- Loading State -->
        <div id="testimonials-loading" class="text-center py-5">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading reviews...</span>
            </div>
        </div>

        <!-- Reviews Grid Container -->
        <div class="row g-4" id="reviews-container" style="display: none;">
            <!-- Reviews will be injected here -->
        </div>

        <!-- Google Reviews Link -->
        <div class="text-center mt-5" id="google-link-container" style="display: none;">
            <a href="<?php echo $restaurant['social']['Google']; ?>" class="btn btn-outline-primary" target="_blank" rel="noopener">
                <i class="bi bi-google me-2"></i>Read More Reviews on Google
            </a>
        </div>
    </div>
</section>

<style>
/* Google Badge Styling - Compact Modern Design */
.google-badge {
    max-width: 260px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
    padding: 0.875rem 1.25rem;
    border-radius: 12px;
    box-shadow: 0 3px 15px rgba(0,0,0,0.08);
    gap: 0.875rem;
    border: 1px solid rgba(0,0,0,0.05);
    transition: all 0.3s ease;
}

.google-badge:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 20px rgba(0,0,0,0.12);
}

.google-badge .bi-google {
    font-size: 1.75rem;
    color: #4285F4;
    filter: drop-shadow(0 1px 3px rgba(66, 133, 244, 0.3));
}

.badge-content {
    text-align: center;
    flex: 1;
}

.badge-label {
    font-size: 0.625rem;
    color: #888;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-weight: 600;
    margin-bottom: 0.125rem;
}

.badge-rating {
    font-size: 1.25rem;
    font-weight: 800;
    color: #1a1a1a;
    margin: 0.125rem 0;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.375rem;
}

.badge-rating #badge-rating {
    background: linear-gradient(135deg, #e63b2e 0%, #ff7a5c 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.badge-rating .stars {
    color: #FFB800;
    font-size: 0.9rem;
    letter-spacing: 1px;
    filter: drop-shadow(0 1px 2px rgba(255, 184, 0, 0.3));
}

.badge-count {
    font-size: 0.65rem;
    color: #666;
    font-weight: 500;
}

.badge-count span {
    font-weight: 700;
    color: #333;
}

/* Testimonial Cards */
.testimonial-card {
    background: #fff;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    height: 100%;
    display: flex;
    flex-direction: column;
    transition: all 0.3s ease;
}

.testimonial-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
}

.testimonial-rating {
    color: #ffc107;
    font-size: 1.25rem;
    margin-bottom: 1rem;
}

.testimonial-text {
    font-size: 0.95rem;
    line-height: 1.7;
    color: #555;
    margin-bottom: 1.5rem;
    font-style: italic;
    flex-grow: 1;
}

.testimonial-author {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-top: auto;
    padding-top: 1rem;
    border-top: 1px solid #eee;
}

.testimonial-name {
    font-weight: 600;
    color: #333;
    margin: 0;
    font-size: 1rem;
}

.testimonial-date {
    font-size: 0.85rem;
    color: #999;
    margin: 0;
}

/* Responsive */
@media (max-width: 768px) {
    .testimonial-card {
        padding: 1.5rem;
    }
    
    .google-badge {
        max-width: 240px;
        padding: 0.75rem 1rem;
        gap: 0.75rem;
    }
    
    .google-badge .bi-google {
        font-size: 1.5rem;
    }
    
    .badge-rating {
        font-size: 1.125rem;
    }
    
    .badge-rating .stars {
        font-size: 0.875rem;
    }
}

@media (max-width: 576px) {
    .testimonial-card {
        padding: 1.25rem;
    }
    
    .google-badge {
        max-width: 220px;
        padding: 0.625rem 1rem;
        gap: 0.625rem;
    }
    
    .google-badge .bi-google {
        font-size: 1.375rem;
    }
    
    .badge-rating {
        font-size: 1rem;
    }
    
    .badge-rating .stars {
        font-size: 0.75rem;
    }
    
    .badge-label {
        font-size: 0.55rem;
    }
    
    .badge-count {
        font-size: 0.6rem;
    }
}
</style>

<script>
    async function loadGoogleReviews() {
        const container = document.getElementById('reviews-container');
        const loading = document.getElementById('testimonials-loading');
        const googleLink = document.getElementById('google-link-container');

        try {
            const response = await fetch('api/reviews-api-wrapper.php?endpoint=reviews');
            const data = await response.json();

            if (data.success && data.reviews && data.reviews.length > 0) {
                loading.style.display = 'none';
                container.style.display = 'flex';
                googleLink.style.display = 'block';

                // Update and show badge
                const badge = document.getElementById('google-badge');
                if (data.average_rating) {
                    const rating = parseFloat(data.average_rating);
                    document.getElementById('badge-rating').textContent = rating.toFixed(1);
                    
                    // Generate star display
                    const fullStars = Math.floor(rating);
                    const hasHalfStar = rating % 1 >= 0.5;
                    const emptyStars = 5 - fullStars - (hasHalfStar ? 1 : 0);
                    
                    let starsHTML = String.fromCharCode(9733).repeat(fullStars);
                    if (hasHalfStar) starsHTML += String.fromCharCode(11088);
                    starsHTML += String.fromCharCode(9734).repeat(emptyStars);
                    
                    document.getElementById('badge-stars').textContent = starsHTML;
                }
                if (data.total_reviews_count) {
                    document.getElementById('badge-count').textContent = data.total_reviews_count.toLocaleString();
                }
                badge.style.display = 'flex';

                // Get reviews sorted by most recent first (max 6)
                const reviews = data.reviews
                    .sort((a, b) => b.time - a.time)
                    .slice(0, 6);

                reviews.forEach(review => {
                    const excerpt = review.text && review.text.length > 250
                        ? review.text.substring(0, 250) + '...'
                        : (review.text || 'Great experience!');

                    const stars = String.fromCharCode(9733).repeat(review.rating) + String.fromCharCode(9734).repeat(5 - review.rating);

                    const col = document.createElement('div');
                    col.className = 'col-md-6 col-lg-4';
                    col.innerHTML = `
                        <div class="testimonial-card">
                            <div class="testimonial-rating">${stars}</div>
                            <p class="testimonial-text">"${excerpt}"</p>
                            <div class="testimonial-author">
                                <div>
                                    <p class="testimonial-name">${review.author_name || 'Anonymous'}</p>
                                    <p class="testimonial-date">${review.relative_time || 'Recently'}</p>
                                </div>
                            </div>
                        </div>
                    `;
                    container.appendChild(col);
                });

            } else {
                loading.style.display = 'none';
            }
        } catch (error) {
            console.error('Error loading reviews:', error);
            loading.style.display = 'none';
        }
    }

    document.addEventListener('DOMContentLoaded', loadGoogleReviews);
</script>
