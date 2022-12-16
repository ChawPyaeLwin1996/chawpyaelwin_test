<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Amount (required), Due Date (required), Client (foreign key to Client)
        Schema::create('billing', function (Blueprint $table) {
            $table->id();
            $table->string('amount')->require();           
            $table->string('due_date')->require();
            $table->foreign('client')
            ->references('id')->on('clients');
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('billing');
    }
}
