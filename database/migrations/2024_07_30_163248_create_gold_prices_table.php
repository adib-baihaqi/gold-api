<?php

// database/migrations/xxxx_xx_xx_create_gold_prices_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoldPricesTable extends Migration
{
    public function up()
    {
        Schema::create('gold_prices', function (Blueprint $table) {
            $table->id();
            $table->decimal('price', 10, 2);
            $table->string('currency');
            $table->date('date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gold_prices');
    }
}
