<?php

use App\Models\Product;
use App\Models\Tag;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products_tags', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(Product::class)->constrained()
            ->onUpdate('cascade')->onDelete('null');
            $table->foreignIdFor(Tag::class)->constrained()
            ->onUpdate('cascade')->onDelete('null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_tags');
    }
};
