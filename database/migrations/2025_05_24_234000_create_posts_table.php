<?php

use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignIdFor(User::class)
                ->constrained()
                ->onDelete('cascade');
            $table->foreignIdFor(Category::class)
                ->constrained()
                ->onDelete('cascade');
            $table->boolean('habilitated')->default(false);
            $table->string('image_path')->nullable();
            $table->integer('rating')->default(0);
            $table->integer('views')->default(0);
            $table->text('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
