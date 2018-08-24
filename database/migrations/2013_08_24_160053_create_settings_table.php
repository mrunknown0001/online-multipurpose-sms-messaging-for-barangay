<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->string('app_name')
                ->nullable()
                ->comment('Name of the System');
            $table->string('barangay_name')
                ->nullable()
                ->comment('Name of the Barangay');
            $table->string('logo')
                ->nullable()
                ->comment('Path of the Logo of the Barangay');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
