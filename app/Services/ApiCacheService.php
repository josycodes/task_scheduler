<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class ApiCacheService
{
    public function fetchWeatherData()
    {
        // Generate a unique cache key for the location
        $cacheKey = "weather_data_nigeria";

        // Cache the data for 1 hour
        return Cache::remember($cacheKey, 3600, function () {
            // Fetch data from WeatherAPI
            $response = Http::get('https://api.weatherapi.com/v1/current.json', [
                'key' => env('WEATHER_API_KEY'), // Your API key from WeatherAPI
                'q'   => 'nigeria',
            ]);

            // Check if the API response is successful
            if ($response->successful()) {
                return $response->json();
            }

            // Handle failure (return an empty array or log an error)
            return [];
        });
    }

    public function fetchNewsData(string $category = 'general')
    {
        // Generate a unique cache key for the category
        $cacheKey = "news_articles_{$category}";


        // Cache the data for 1 hour
        return Cache::remember($cacheKey, 3600, function () use ($category) {
            // Fetch news data from NewsAPI
            $response = Http::get('https://newsapi.org/v2/top-headlines', [
                'apiKey' => env('NEWS_API_KEY'), // Your API key from NewsAPI
                'country' => 'us', // Fetch news from the US
                'category' => $category,
            ]);

            // Check if the API response is successful
            if ($response->successful()) {
                return $response->json();
            }

            // Handle failure (return an empty array or log an error)
            return [];
        });
    }
}
