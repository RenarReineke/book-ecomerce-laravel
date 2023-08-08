<?php

use App\Models\Author;
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
        Schema::create('author_product', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(Author::class)->constrained()
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreignIdFor(Product::class)->constrained()
            ->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('author_product');
    }
};
