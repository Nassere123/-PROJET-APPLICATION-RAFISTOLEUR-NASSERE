<?php

// database/migrations/xxxx_xx_xx_create_rafistoleurs_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRafistoleursTable extends Migration
{
    public function up()
    {
        Schema::create('rafistoleurs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('neighborhood');
            $table->string('speciality');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rafistoleurs');
    }
}
