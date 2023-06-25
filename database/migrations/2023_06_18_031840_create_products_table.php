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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bottle_id');
            $table->unsignedBigInteger('created_by');
            $table->bigInteger('part_number')->unique();
            $table->string('name');
            $table->string('flavor');
            $table->string('location');
            $table->text('notes')->nullable();
            $table->foreign('bottle_id')
            ->references('id')->on('bottles')->onDelete('cascade');
            $table->foreign('created_by')
            ->references('id')->on('users')->onDelete('cascade');

            // $table->integer('modified_by');
            // $table->integer('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
