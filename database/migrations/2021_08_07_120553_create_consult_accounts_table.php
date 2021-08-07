<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consult_accounts', function (Blueprint $table) {
            $table->id();
            $table->string("ktp_number",30)->unique();
            $table->string("name");
            $table->date("birthday");
            $table->enum("gender",["M","F"]);
            $table->text("address");
            $table->string("phone");
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
        Schema::dropIfExists('consult_accounts');
    }
}
