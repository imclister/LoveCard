<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;




use App\Models\Card;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('hash', 20);
            $table->foreignIdFor(Card::class)->nullable();
            $table->foreignIdFor(User::class);
            $table->string('Owner', 120);
            $table->string('Nickname', 120);
            $table->string('Status', 15);
            $table->string('Mood', 15);
            $table->boolean('IsPasswordProtected');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
