<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bom_material', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Bom::class);
            $table->foreignIdFor(\App\Models\Material::class);
            $table->smallInteger('bm_quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bom_material');
    }
};
