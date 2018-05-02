<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('category', 127);
            $table->string('sub_category', 127);
            $table->string('procdure_code', 127)->unique();
            $table->string('procedure_name', 127);

            $table->string('guwahati_nabh', 127);
            $table->string('guwahati_non_nabh', 127);

            $table->string('banglore_nabh', 127);
            $table->string('banglore_non_nabh', 127);


            $table->string('mumbai_non_nabh', 127);
            $table->string('mumbai_nabh', 127);

            $table->string('chennai_non_nabh', 127);
            $table->string('chennai_nabh', 127);


            $table->string('kolkatta_non_nabh', 127);
            $table->string('kolkatta_nabh', 127);

            $table->string('delhi_non_nabh', 127);
            $table->string('delhi_nabh', 127);

            $table->boolean('status')->default(1);

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
        Schema::dropIfExists('packages');
    }
}
