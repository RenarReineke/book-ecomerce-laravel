<?php

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rewiews', function (Blueprint $table) {
            $table->id();
            $table->text('text');
            $table->timestamps();
            $table->foreignIdFor(User::class)->constrained()
            ->onUpdate('cascade')->onDelete('restrict');
            $table->foreignIdFor(Product::class)->constrained()
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rewiews');
    }
};
