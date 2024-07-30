<!DOCTYPE html>
<html>
<head>
    <title>Edit Gold Price</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6">Edit Gold Price</h1>

        <form action="{{ route('gold-prices.update', $goldPrice->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">Price:</label>
                <input type="text" name="price" id="price" value="{{ $goldPrice->price }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div>
                <label for="currency" class="block text-sm font-medium text-gray-700">Currency:</label>
                <input type="text" name="currency" id="currency" value="{{ $goldPrice->currency }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div>
                <label for="date" class="block text-sm font-medium text-gray-700">Date:</label>
                <input type="date" name="date" id="date" value="{{ $goldPrice->date }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div>
                <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
            </div>
        </form>
    </div>
</body>
</html>
