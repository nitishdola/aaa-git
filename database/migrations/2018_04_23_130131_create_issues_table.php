<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id', false, true);
            $table->integer('employee_id', false, true);
            $table->date('date_of_issue');
            $table->float('quantity', 20,2);
            $table->float('opening_stock', 20,2);
            $table->float('closing_stock', 20,2);
            $table->timestamps();

            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('employee_id')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('issues');
    }
}
