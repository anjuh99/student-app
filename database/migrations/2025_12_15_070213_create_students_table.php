<?php

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
        Schema::create('students', function (Blueprint $table) {
        $table->id(); // මේකෙන් ID එක ඉබේම හැදෙනවා
        
        // අපිට ඕන දේවල්
        $table->string('name');   // නම (අකුරු නිසා string)
        $table->string('email');  // ඊමේල්
        $table->integer('age');   // වයස (ඉලක්කමක් නිසා integer)

        $table->timestamps(); // Created_at වෙලාවල්
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
