<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Profile as ProfileModel;

class CreateTableProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        if(!Schema::hasTable('profiles')){
            Schema::create('profiles', function (Blueprint $table) {
                $table->id();
                $table->integer('user_id');
                $table->string('fio')->nullable();
                $table->string('phone_numer')->nullable();
                $table->date('date_birthday')->nullable();
                $table->text('description')->nullable();
                $table->integer('gender')->nullable()->default(ProfileModel::NOT_SPECIFIED);
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('table_profile');
    }
}
