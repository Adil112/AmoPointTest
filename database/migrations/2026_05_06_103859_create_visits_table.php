<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->ipAddress('ip');
            $table->string('city')->nullable();
            $table->string('url');
            $table->text('user_agent');
            $table->string('device');
            $table->dateTime('hour');
            $table->timestamps();

            $table->unique(['ip', 'hour']);

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};
