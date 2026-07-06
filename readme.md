# Rossellini's Italian Cuisine - Website

Official website for Rossellini's Italian Cuisine located at 136 S Atlantic Ave, Daytona Beach, NY.

## Features

- **JSON-Controlled Content**: All website content managed through a single `config.json` file
- **Mobile-responsive design**: Optimized for all devices
- **SEO optimized**: Complete meta tags, schema markup, and structured data
- **Google Maps integration**: Interactive location map
- **App download page**: Dedicated page with auto-detection for iOS/Android
- **Clean URL structure**: .htaccess rewrite rules for SEO-friendly URLs
- **Modern UI**: Beautiful gradient designs with brand colors
- **Performance optimized**: Lazy loading, preconnect, and optimized assets

## Pages

1. **Home Page** (`home.php`) - Main landing page with:
   - Hero section with call-to-action
   - About section with stats
   - Menu highlights (8 featured items)
   - Customer testimonials
   - Location & hours
   - App download banner
   - Footer with contact info

   - Auto-detection of iOS/Android devices
   - Direct links to App Store and Google Play
   - Feature highlights
   - Mobile-optimized design

## URLs

- **Main Domain**: https://rossellinisrestaurantfl.com → redirects to home.php
- **Home Page**: https://rossellinisrestaurantfl.com/home

## App Store Links

- **iOS App Store**: https://apps.apple.com/us/app/rossellinis-italian-cuisine/id6755202972
- **Google Play Store**: https://play.google.com/store/apps/details?id=com.wnapp.id1762219277961

## File Structure

```
rosallini/
├── api/
│   ├── cache/                   # API cache directory
│   ├── reviews-api-wrapper.php  # Google Reviews API wrapper
│   └── readme.md                # API documentation
├── assets/
│   ├── css/
│   │   └── home-style.css       # Main stylesheet
│   ├── images/
│   │   ├── logo.png             # Restaurant logo
│   │   ├── hero-bg.jpg          # Hero background
│   │   └── about-deli.jpg       # About section image
│   └── js/
│       ├── home-main.js         # Main JavaScript
│       └── reviews.js           # Google Reviews integration
├── includes/
├── sections/
│   ├── navbar.php               # Navigation bar
│   ├── hero.php                 # Hero section
│   ├── about.php                # About section
│   ├── menu.php                 # Menu highlights
│   ├── testimonials.php         # Customer reviews (Google Reviews)
│   ├── location.php             # Location & hours
│   └── footer.php               # Footer section
├── config.json                  # ⭐ MAIN CONFIGURATION FILE
├── home.php                     # Main landing page
├── index.php                    # Redirects to home.php
├── .htaccess                    # URL rewrite rules
├── robots.txt                   # Search engine directives
└── sitemap.xml                  # SEO sitemap
```

## Configuration

### Editing Content

All website content is controlled by `config.json`. Simply edit this file to update:

- Restaurant name, tagline, and description
- Contact information (phone, email, address)
- Business hours
- Social media links
- Brand colors (primary, secondary, accent)
- Hero section content
- About section content and stats
- Menu highlights (featured items)
- Testimonials
- Google Maps location

### Brand Colors

Current colors (defined in `config.json`):
```json
"colors": {
  "primary": "#1e3a5f",      // Dark blue
  "secondary": "#f39c12",    // Orange/Gold
  "accent": "#e74c3c",       // Red
  "light": "#f8f9fa",        // Light gray
  "dark": "#0d1b2a"          // Very dark blue
}
```

### Menu Items

To feature menu items on the homepage, set `"featured": true` in the `menuHighlights` array in `config.json`.

## Setup Instructions

1. Upload all files to your web server
2. Ensure PHP 7.4+ is enabled on your server
3. Verify .htaccess is working for clean URLs
4. Edit `config.json` to customize your content
5. Replace placeholder images in `assets/images/`
6. Configure SSL certificate for HTTPS (recommended)
7. Update Google Maps embed URL in `config.json`

## Google Maps Setup

1. Go to [Google Maps](https://www.google.com/maps)
2. Search for your restaurant
3. Click "Share" → "Embed a map"
4. Copy the iframe URL
5. Paste it into `config.json` under `locations.mapEmbed`

## Technologies Used

- PHP 7.4+
- HTML5
- CSS3 (Custom + Bootstrap 5.3.2)
- JavaScript (Vanilla)
- Bootstrap 5.3.2
- Bootstrap Icons 1.11.1
- Google Fonts (Poppins & Inter)
- Google Places API (via Reviews API)

## Google Reviews Integration

The website displays live Google reviews fetched from Google Places API:

### Features:
- **Live Reviews**: Displays 4 and 5-star reviews from Google
- **Automatic Caching**: 24-hour cache reduces API costs by 99%
- **Fallback System**: Static reviews shown if API unavailable
- **Secure**: API keys never exposed to frontend
- **Fast Loading**: Cached responses for instant page loads

### How It Works:
1. Frontend (`reviews.js`) calls local API wrapper
2. API wrapper (`reviews-api-wrapper.php`) calls central Reviews API
3. Reviews API fetches from Google Places API
4. Response cached for 24 hours
5. Reviews displayed in testimonials section

### Configuration:
Reviews API settings in `config.json`:
```json
"api": {
  "restaurantId": "rossellinis",
  "googlePlaceId": "ChIJIdDN9LvzwokRkp0eiG8Sfv4",
  "reviewsApiUrl": "https://apireviews.restaurant.ink",
  "apiKey": "nr_live_pk_..."
}
```

### Testing:
Test API integration: `https://rossellinisrestaurantfl.com/api/reviews-api-wrapper.php?endpoint=test`

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Performance Features

- Lazy loading for images
- Preconnect for external resources
- Optimized CSS and JavaScript
- Smooth scroll animations
- Back-to-top button
- Mobile-first responsive design

## SEO Features

- Structured data (JSON-LD)
- Open Graph tags
- Twitter Card tags
- Canonical URLs
- Sitemap.xml
- Robots.txt
- Geo-location meta tags
- Local business schema

## Developer

Developed by Ser.vi Worldwide LLC

## Support

For support or customization requests, contact: sal@ser.vi

