<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); //big int auto_increment
            $table->string('name'); //name: varchar 
            $table->string('email')->unique(); //email: varchar && khong co 2 email trung
            $table->timestamp('email_verified_at')->nullable(); //
            $table->string('password'); //password: varchar
            $table->string('address');

            // đưa vào config
            $table->integer('gender')->default(1);
            $table->integer('role')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
