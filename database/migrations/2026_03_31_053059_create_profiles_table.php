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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->foreignId('user_id'); // Foreign Key
            $table->string('full_name'); // Varchar
            $table->string('headline');
            $table->string('location');
            $table->string('availability_status')->nullable();
            $table->text('bio')->nullable()->default(null); // Long text, can be empty
            $table->string('contact');
            

            $table->timestamps(); // Adds created_at and updated_at
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
