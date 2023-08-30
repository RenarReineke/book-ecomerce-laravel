<?php

use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->decimal('price');
            $table->integer('amount')->default(0);
            $table->integer('pages')->nullable();
            $table->string('size')->nullable();
            $table->string('cover_type')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('year')->nullable();
            $table->integer('rating')->nullable();
            $table->index('created_at');
            $table->timestamps();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('series_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')
            ->cascadeOnUpdate()->nullOnDelete();
            $table->foreign('series_id')->references('id')->on('series')
            ->cascadeOnUpdate()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
