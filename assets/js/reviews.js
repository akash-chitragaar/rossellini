/**
 * Google Reviews Integration
 * Fetches and displays reviews from Google Places API via our secure wrapper
 */

// Configuration
const REVIEWS_API_URL = 'api/reviews-api-wrapper.php';
const MAX_REVIEWS_DISPLAY = 6; // Number of reviews to show
const FALLBACK_REVIEWS = [];

/**
 * Fetch reviews from API
 */
async function fetchReviews() {
    try {
        const response = await fetch(REVIEWS_API_URL + '?endpoint=reviews');
        
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        
        const data = await response.json();
        
        if (data.success && data.reviews && data.reviews.length > 0) {
            return {
                reviews: data.reviews.slice(0, MAX_REVIEWS_DISPLAY),
                averageRating: data.average_rating,
                totalReviews: data.total_reviews_count,
                cached: data.cached || false
            };
        } else {
            console.warn('No reviews returned from API');
            return {
                reviews: [],
                averageRating: 0,
                totalReviews: 0,
                cached: false,
                fallback: false
            };
        }
    } catch (error) {
        console.error('Error fetching reviews:', error);
        return {
            reviews: [],
            averageRating: 0,
            totalReviews: 0,
            cached: false,
            fallback: false,
            error: error.message
        };
    }
}

/**
 * Render star rating
 */
function renderStars(rating) {
    let stars = '';
    for (let i = 0; i < 5; i++) {
        if (i < rating) {
            stars += '<i class="bi bi-star-fill"></i>';
        } else {
            stars += '<i class="bi bi-star"></i>';
        }
    }
    return stars;
}

/**
 * Truncate text to specified length
 */
function truncateText(text, maxLength = 150) {
    if (text.length <= maxLength) return text;
    return text.substring(0, maxLength).trim() + '...';
}

/**
 * Render reviews in the testimonials section
 */
function renderReviews(reviewsData) {
    const container = document.querySelector('#testimonials .row');
    
    if (!container) {
        console.error('Reviews container not found');
        return;
    }
    
    // Clear existing content
    container.innerHTML = '';
    
    // If no reviews, show a message
    if (!reviewsData.reviews || reviewsData.reviews.length === 0) {
        container.innerHTML = `
            <div class="col-12 text-center">
                <p class="text-muted">Loading reviews from Google...</p>
            </div>
        `;
        return;
    }
    
    // Render each review
    reviewsData.reviews.forEach(review => {
        const reviewCard = document.createElement('div');
        reviewCard.className = 'col-md-4';
        
        reviewCard.innerHTML = `
            <div class="testimonial-card">
                <div class="testimonial-rating">
                    ${renderStars(review.rating)}
                </div>
                <p class="testimonial-text">"${truncateText(review.text)}"</p>
                <div class="testimonial-author">
                    <strong>${review.author_name}</strong>
                    <small class="text-muted d-block">${review.relative_time || 'Recently'}</small>
                </div>
            </div>
        `;
        
        container.appendChild(reviewCard);
    });
    
    // Add cache indicator if cached
    if (reviewsData.cached) {
        console.log('✓ Reviews loaded from cache');
    }
}

/**
 * Update Google Rating Badge
 */
function updateRatingBadge(reviewsData) {
    const ratingNumber = document.getElementById('ratingNumber');
    const reviewCount = document.getElementById('reviewCount');
    const ratingStars = document.getElementById('ratingStars');
    
    if (!ratingNumber || !reviewCount || !ratingStars) {
        return;
    }
    
    // Update rating number
    if (reviewsData.averageRating > 0) {
        ratingNumber.textContent = reviewsData.averageRating.toFixed(1);
    } else {
        ratingNumber.textContent = '--';
    }
    
    // Update review count
    if (reviewsData.totalReviews > 0) {
        reviewCount.textContent = `${reviewsData.totalReviews} reviews`;
    } else {
        reviewCount.textContent = 'No reviews yet';
    }
    
    // Update stars display
    const rating = reviewsData.averageRating;
    const fullStars = Math.floor(rating);
    const hasHalfStar = rating % 1 >= 0.5;
    
    let starsHTML = '';
    for (let i = 0; i < 5; i++) {
        if (i < fullStars) {
            starsHTML += '<i class="bi bi-star-fill"></i>';
        } else if (i === fullStars && hasHalfStar) {
            starsHTML += '<i class="bi bi-star-half"></i>';
        } else {
            starsHTML += '<i class="bi bi-star"></i>';
        }
    }
    ratingStars.innerHTML = starsHTML;
}

/**
 * Initialize reviews on page load
 */
document.addEventListener('DOMContentLoaded', async function() {
    console.log('Loading Google reviews...');
    
    const reviewsData = await fetchReviews();
    updateRatingBadge(reviewsData);
    renderReviews(reviewsData);
    
    console.log(`Loaded ${reviewsData.reviews.length} reviews`);
    console.log(`Average rating: ${reviewsData.averageRating}/5`);
    console.log(`Total reviews: ${reviewsData.totalReviews}`);
});

/**
 * Fetch location data (optional - for future use)
 */
async function fetchLocationData() {
    try {
        const response = await fetch(REVIEWS_API_URL + '?endpoint=locations');
        
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        
        const data = await response.json();
        
        if (data.success) {
            return data.locations;
        }
    } catch (error) {
        console.error('Error fetching location data:', error);
        return null;
    }
}

// Export functions for external use
window.NewRiverDeli = {
    fetchReviews,
    fetchLocationData,
    renderReviews
};

