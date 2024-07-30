<!-- resources/views/gold_prices/edit.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Edit Gold Price</title>
</head>
<body>
    <h1>Edit Gold Price</h1>

    <form action="{{ route('gold-prices.update', $goldPrice->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="price">Price:</label>
        <input type="text" name="price" id="price" value="{{ $goldPrice->price }}" required><br>

        <label for="currency">Currency:</label>
        <input type="text" name="currency" id="currency" value="{{ $goldPrice->currency }}" required><br>

        <label for="date">Date:</label>
        <input type="date" name="date" id="date" value="{{ $goldPrice->date }}" required><br>

        <button type="submit">Update</button>
    </form>
</body>
</html>
