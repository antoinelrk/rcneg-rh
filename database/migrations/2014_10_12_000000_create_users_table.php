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
            $table->bigIncrements('id');
            $table->bigInteger('member_code')->unique();
            $table->string('indicative')->unique()->nullable();
            $table->string('last_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('address')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('city')->nullable();
            $table->string('region')->nullable();
            $table->string('country')->nullable();
            $table->integer('club_id')->nullable();
            $table->string('phone')->nullable();
            $table->string('self_phone')->nullable();
            $table->longText('comment')->nullable();
            $table->integer('type_id')->nullable();
            $table->date('birth_at')->nullable();
            $table->string('portrait')->nullable();
            $table->integer('cd_function')->nullable();
            $table->timestamp('login_at')->nullable();
            $table->boolean('om')->default(false);
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
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
