<?php

// app/Http/Controllers/GoldPriceController.php

namespace App\Http\Controllers;

use App\Models\GoldPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GoldPriceController extends Controller
{
    protected $apiUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->apiUrl = 'https://api.metalpriceapi.com/v1/';
        $this->apiKey = env('METALS_API_KEY'); // Store API key in the .env file
    }

    public function index()
    {
        $goldPrices = GoldPrice::all();

        try {
            $response = Http::get($this->apiUrl . 'latest', [
                'api_key' => $this->apiKey,
                'base' => 'MYR',
                'currencies' => 'XAU,XAG'
            ]);

            if ($response->successful()) {
                $latestPrice = $response->json();
                $goldPriceInMYR = 1 / $latestPrice['rates']['XAU'];
                $silverPriceInMYR = 1 / $latestPrice['rates']['XAG'];
            } else {
                $goldPriceInMYR = null;
                $silverPriceInMYR = null;
            }
        } catch (\Exception $e) {
            $goldPriceInMYR = null;
            $silverPriceInMYR = null;
        }

        return view('gold_prices.index', compact('goldPrices', 'goldPriceInMYR', 'silverPriceInMYR'));
    }

    public function create()
    {
        return view('gold_prices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'price' => 'required|numeric',
            'currency' => 'required|string',
            'date' => 'required|date'
        ]);

        GoldPrice::create($request->all());

        return redirect()->route('gold-prices.index')->with('success', 'Gold price added successfully');
    }

    public function show(GoldPrice $goldPrice)
    {
        return view('gold_prices.show', compact('goldPrice'));
    }

    public function edit(GoldPrice $goldPrice)
    {
        return view('gold_prices.edit', compact('goldPrice'));
    }

    public function update(Request $request, GoldPrice $goldPrice)
    {
        $request->validate([
            'price' => 'required|numeric',
            'currency' => 'required|string',
            'date' => 'required|date'
        ]);

        $goldPrice->update($request->all());

        return redirect()->route('gold-prices.index')->with('success', 'Gold price updated successfully');
    }

    public function destroy(GoldPrice $goldPrice)
    {
        $goldPrice->delete();

        return redirect()->route('gold-prices.index')->with('success', 'Gold price deleted successfully');
    }
}
