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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->bigInteger('labels_per_roll');
            $table->bigInteger('number_of_rolls');
            $table->bigInteger('total_labels');
            $table->decimal('total_cost', 10,2);
            $table->unsignedBigInteger('reason_id');
            $table->text('description');
            $table->foreign('product_id')
            ->references('id')->on('products')->onDelete('cascade');
            $table->foreign('reason_id')
            ->references('id')->on('reasons')->onDelete('cascade');
            $table->integer('created_by');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
