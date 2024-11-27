<?php
namespace App\Http\Controllers;

use App\Models\Log;
use App\Services\ApiCacheService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ApiController extends Controller
{
    protected ApiCacheService $apiService;

    public function __construct(ApiCacheService $apiService)
    {
        $this->apiService = $apiService;
    }

    /**
     * @throws \JsonException
     */
    public function fetch(Request $request, $endpoint): JsonResponse
    {

        if ($endpoint === 'weather') {
            $data = $this->apiService->fetchWeatherData();

            //log the API Request
            Log::create([
                'api_endpoint' => $request->url(),
                'response_data' => json_encode($data, JSON_THROW_ON_ERROR),
            ]);
            return response()->json($data);
        }

        if($endpoint === 'news') {
            $data = $this->apiService->fetchNewsData();
            //log the API Request
            Log::create([
                'api_endpoint' => $request->url(),
                'response_data' => json_encode($data, JSON_THROW_ON_ERROR),
            ]);
            return response()->json($data);
        }
        return response()->json([]);
    }
}
