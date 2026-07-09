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
    Schema::create('anggotas', function (Blueprint $table) {

        $table->id();
        $table->string('nama');
        $table->text('alamat');
        $table->string('no_hp');
        $table->string('email');
        $table->timestamps();

    });
}
};
