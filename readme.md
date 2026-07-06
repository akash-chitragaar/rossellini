# Rossellini's Italian Cuisine - Website

Official website for Rossellini's Italian Cuisine located at 136 S Atlantic Ave, Daytona Beach, FL 32118.

Live site: https://rossellinisrestaurantfl.com/

## Features

- **JSON-Controlled Content**: All website content managed through a single `config.json` file
- **Yelp Reservations & Waitlist**: Embedded Yelp Guest Manager widgets for booking a table or joining the waitlist
- **Mobile-responsive design**: Optimized for all devices
- **SEO optimized**: Complete meta tags, schema markup (Restaurant, FAQ, Article, Breadcrumb), and structured data
- **AI/LLM discovery**: `llms.txt` plus explicit AI crawler meta tags
- **Google Reviews integration**: Live reviews in the testimonials section
- **Google Maps integration**: Interactive location map
- **Modern UI**: Gradient designs with brand colors, Playfair Display accent typography
- **Performance optimized**: Lazy loading, preconnect, and optimized assets
- **Analytics**: Google Analytics 4 (`G-6DT3101J66`) and Ahrefs Analytics

## Page Sections

The site is a single landing page (`index.php`) composed of section includes:

1. **Navbar** - Navigation with Reserve a Table link and Order Online CTA
2. **Hero** - Badge, tagline, description, Order Online / Reserve a Table CTAs
3. **About** - Story and stats
4. **Reservations** - Yelp Reservations and Waitlist widgets, phone fallback
5. **Testimonials** - Live Google Reviews
6. **Location & Hours** - Bento grid with map, address, hours, and contact
7. **Footer** - Contact info, quick links, social links

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
│   ├── images/                  # Logo, hero, about, OG images
│   └── js/
│       ├── home-main.js         # Main JavaScript
│       └── reviews.js           # Google Reviews integration
├── includes/
│   └── schema.php               # Restaurant JSON-LD schema partial
├── sections/
│   ├── navbar.php               # Navigation bar
│   ├── hero.php                 # Hero section
│   ├── about.php                # About section
│   ├── reservations.php         # Yelp Reservations & Waitlist widgets
│   ├── testimonials.php         # Customer reviews (Google Reviews)
│   ├── location.php             # Location & hours
│   └── footer.php               # Footer section
├── .well-known/
│   └── ai-plugin.json           # AI plugin manifest
├── config.json                  # ⭐ MAIN CONFIGURATION FILE
├── index.php                    # Main landing page
├── llms.txt                     # AI/LLM site information
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
- Social media links (Google, Facebook, Instagram, Yelp)
- Yelp Reservations & Waitlist URLs (`restaurant.yelp`)
- Online ordering link (`restaurant.orderLink`)
- Brand colors (primary, secondary, accent)
- Hero section content (badge, tagline, description, chips)
- About section content and stats
- Menu highlights (featured items)
- Google Maps location

### Brand Colors

Current colors (defined in `config.json`):
```json
"colors": {
  "primary": "#e63b2e",      // Red
  "secondary": "#ff7a5c",    // Coral
  "accent": "#c1150b",       // Dark red
  "light": "#fff5f3",        // Warm off-white
  "dark": "#6b120a"          // Deep maroon
}
```

### Menu Items

To feature menu items on the homepage, set `"featured": true` in the `menuHighlights` array in `config.json`.

## Yelp Reservations & Waitlist

The reservations section embeds Yelp Guest Manager widgets (business slug: `rossellinis-daytona-beach-2`):

- **Reservations widget**: vertical, light theme, 250×490 iframe
- **Waitlist widget**: 300×330 iframe (minimum 300px wide — narrower clips the content)
- Both are lazy-loaded with crawlable anchor fallbacks, plus direct Yelp links
- Restaurant schema `acceptsReservations` points to the Yelp reservations URL

Widget URLs are configured in `config.json` under `restaurant.yelp`.

## Setup Instructions

1. Upload all files to your web server
2. Ensure PHP 7.4+ is enabled on your server
3. Verify .htaccess is working for clean URLs
4. Edit `config.json` to customize your content
5. Replace placeholder images in `assets/images/`
6. Configure SSL certificate for HTTPS (recommended)
7. Update Google Maps embed URL in `config.json`

## Technologies Used

- PHP 7.4+
- HTML5 / CSS3 (Custom + Bootstrap 5.3.2)
- JavaScript (Vanilla)
- Bootstrap Icons 1.11.1
- Google Fonts (Poppins, Inter & Playfair Display)
- Google Places API (via Reviews API)
- Yelp Guest Manager widgets

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
  "googlePlaceId": "ChIJ04dmZxba5ogRVjZTmKpFbeE",
  "reviewsApiUrl": "https://apireviews.restaurant.ink",
  "apiKey": "ro_live_pk_..."
}
```

### Testing:
Test API integration: `https://rossellinisrestaurantfl.com/api/reviews-api-wrapper.php?endpoint=test`

## Browser Support

- Chrome, Firefox, Safari, Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## SEO Features

- Structured data (JSON-LD): Restaurant, FAQPage, Article, BreadcrumbList
- `acceptsReservations` linked to Yelp Reservations
- Open Graph and Twitter Card tags
- Canonical URLs, sitemap.xml, robots.txt
- Geo-location meta tags
- llms.txt and AI crawler directives

## Developer

Developed by Ser.vi Worldwide LLC

## Support

For support or customization requests, contact: sal@ser.vi
