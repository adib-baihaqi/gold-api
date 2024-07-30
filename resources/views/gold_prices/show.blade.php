<!-- resources/views/gold_prices/show.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>View Gold Price</title>
</head>
<body>
    <h1>View Gold Price</h1>

    <p>Price: {{ $goldPrice->price }}</p>
    <p>Currency: {{ $goldPrice->currency }}</p>
    <p>Date: {{ $goldPrice->date }}</p>

    <a href="{{ route('gold-prices.edit', $goldPrice->id) }}">Edit</a>

    <form action="{{ route('gold-prices.destroy', $goldPrice->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="
