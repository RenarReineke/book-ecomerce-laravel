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
        Schema::table('comments', function (Blueprint $table) {
            $table->dropConstrainedForeignIdFor(User::class);
            $table->dropConstrainedForeignIdFor(Client::class);
            $table->dropConstrainedForeignIdFor(Rewiew::class);
            $table->nullableMorphs('owner');
            $table->nullableMorphs('commentable');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropMorphs('owner');
            $table->dropMorphs('commentable');
            $table->foreignIdFor(User::class)->nullable()->constrained()
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreignIdFor(Client::class)->nullable()->constrained()
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreignIdFor(Rewiew::class)->nullable()->constrained()
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }
};
