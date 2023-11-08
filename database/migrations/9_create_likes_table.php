<?php

use App\Models\User;
use App\Models\Post;
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
        Schema::create('likes', function (Blueprint $table) {
            $table->foreignIdFor(User::class)
            ->cascadeOnUpdate()
            ->cascadeOnDelete()
            ->constrained();
            $table->foreignIdFor(Post::class)
            ->cascadeOnUpdate()
            ->cascadeOnDelete()
            ->constrained();
            $table->dateTimeTz('created_at');
            $table->dateTimeTz('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};
