<?php

use App\Models\Series;
use App\Models\Product;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_series', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(Product::class)->constrained()
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreignIdFor(Series::class)->constrained()
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_series');
    }
};