<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable("user")) {
            Schema::create("user", function (Blueprint $table) {
                $table->increments("id")->unsigned();
                $table->string("firstname");
                $table->string("lastname");
                $table->string("email")->unique();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("user");
    }
}
