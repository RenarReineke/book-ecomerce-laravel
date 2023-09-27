<?php

use App\Models\Client;
use App\Models\Rewiew;
use App\Models\User;
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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('message')->nullable();
            $table->timestamps();
            $table->foreignIdFor(User::class)->nullable()->default(null)->constrained()
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreignIdFor(Client::class)->nullable()->constrained()
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreignIdFor(Rewiew::class)->constrained()
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
