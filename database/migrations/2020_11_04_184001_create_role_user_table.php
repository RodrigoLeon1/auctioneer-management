<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleUserTable extends Migration
{

    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {


            $table->foreignId('user_id')
                ->constrained()->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreignId('role_id')
                ->constrained()->references('id')->on('roles')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users_x_roles');
    }
}