<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('donation_and_feedbacks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->decimal('donation_amount', 15, 2)->nullable();
            $table->string('payment_method', 50);
            $table->string('proof_of_payment')->nullable();
            $table->text('developer_message')->nullable();
            $table->text('feedback_content')->nullable();
            $table->string('feedback_type', 50);
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('donation_and_feedbacks');
    }
};