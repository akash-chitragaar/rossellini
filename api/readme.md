# Rossellini's - Reviews API Integration

This folder contains the API wrapper for fetching Google reviews and location data from the centralized Reviews API.

## Structure

```
api/
├── reviews-api-wrapper.php   # Server-side API wrapper
├── cache/                     # Cache directory (auto-managed by API)
│   └── .gitkeep
└── readme.md                  # This file
```

## How It Works

1. **Frontend** (`assets/js/reviews.js`) calls the local API wrapper
2. **API Wrapper** (`reviews-api-wrapper.php`) securely calls the central Reviews API
3. **Reviews API** (`apireviews.restaurant.ink`) fetches data from Google Places API
4. **Response** is cached for 24 hours to reduce API costs

## Configuration

All configuration is managed in `config.json`:

```json
{
  "restaurant": {
    "api": {
      "restaurantId": "rossellinis",
      "googlePlaceId": "ChIJIdDN9LvzwokRkp0eiG8Sfv4",
      "reviewsApiUrl": "https://apireviews.restaurant.ink",
      "apiKey": "nr_live_pk_1b2c3d4e5f6a7b8c9d0e1f2a3b4c5d6e"
    }
  }
}
```

## Endpoints

### Get Reviews
```
GET api/reviews-api-wrapper.php?endpoint=reviews
```

Returns 4 and 5-star reviews from Google Places.

### Get Locations
```
GET api/reviews-api-wrapper.php?endpoint=locations
```

Returns business hours, phone numbers, and address information.

### Test Configuration
```
GET api/reviews-api-wrapper.php?endpoint=test
```

Verifies API configuration is correct.

## Usage in Frontend

The reviews are automatically loaded on page load via `assets/js/reviews.js`:

```javascript
// Fetch reviews
const reviewsData = await window.Rossellinis.fetchReviews();

// Render reviews
window.Rossellinis.renderReviews(reviewsData);
```

## Fallback Reviews

If the API is unavailable, the system automatically falls back to static reviews defined in `assets/js/reviews.js`.

## Caching

- Reviews are cached for **24 hours**
- Cache is managed by the central Reviews API
- Reduces Google API costs by 99%
- Improves page load performance

## Security

- API keys are **never exposed** to the frontend
- Server-to-server communication only
- CORS protection
- Rate limiting (100 requests/hour per IP)

## Troubleshooting

### Reviews not loading?

1. Check browser console for errors
2. Test API wrapper: `yoursite.com/api/reviews-api-wrapper.php?endpoint=test`
3. Verify API key in `config.json`
4. Check cache directory permissions (755)

### Using fallback reviews?

This is normal if:
- First time loading (cache building)
- API temporarily unavailable
- Network issues

The system will automatically retry on next page load.

## Support

For issues with the Reviews API, contact: sal@ser.vi

