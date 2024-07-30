<!-- resources/views/gold_prices/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gold Prices</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">

    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-6">Gold Prices</h1>

        @if (isset($goldPriceInMYR) && isset($silverPriceInMYR))
            <div class="flex mb-6">
                <div class="p-4 bg-slate-500 text-black rounded-lg mr-4 flex-1 shadow-md">
                    <h2 class="text-xl font-semibold">Gold (XAU)</h2>
                    <p>{{ number_format($goldPriceInMYR, 2) }} MYR</p>
                </div>
                <div class="p-4 bg-slate-500 text-black rounded-lg flex-1 shadow-md">
                    <h2 class="text-xl font-semibold">Silver (XAG)</h2>
                    <p>{{ number_format($silverPriceInMYR, 2) }} MYR</p>
                </div>
            </div>
        @else
            <p class="text-red-500 mb-6">Unable to fetch latest metal prices from API.</p>
        @endif

        <a href="{{ route('gold-prices.create') }}" class="mb-4 inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Add New Gold Price</a>

        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Price</th>
                    <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Currency</th>
                    <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Date</th>
                    <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($goldPrices as $goldPrice)
                    <tr class="bg-gray-100 border-b border-gray-200">
                        <td class="w-1/4 py-3 px-4">{{ $goldPrice->price }}</td>
                        <td class="w-1/4 py-3 px-4">{{ $goldPrice->currency }}</td>
                        <td class="w-1/4 py-3 px-4">{{ $goldPrice->date }}</td>
                        <td class="w-1/4 py-3 px-4 flex space-x-2">
                            <a href="{{ route('gold-prices.edit', $goldPrice->id) }}" class="bg-green-500 text-white py-1 px-2 rounded hover:bg-green-700">Edit</a>
                            <form action="{{ route('gold-prices.destroy', $goldPrice->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white py-1 px-2 rounded hover:bg-red-700">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
