<!-- resources/views/gold_prices/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Add Gold Price</title>
</head>
<body>
    <h1>Add Gold Price</h1>

    <form action="{{ route('gold-prices.store') }}" method="POST">
        @csrf
        <label for="price">Price:</label>
        <input type="text" name="price" id="price" required><br>

        <label for="currency">Currency:</label>
        <input type="text" name="currency" id="currency" required><br>

        <label for="date">Date:</label>
        <input type="date" name="date" id="date" required><br>

        <button type="submit">Add</button>
    </form>
</body>
</html>
