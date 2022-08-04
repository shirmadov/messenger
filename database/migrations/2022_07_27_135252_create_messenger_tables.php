<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessengerTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('chat_type')){
            Schema::create('chat_type', function (Blueprint $table) {
                $table->id();
                $table->string('type_name')->unique();
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('chat_list')){
            Schema::create('chat_list', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('chat_type_id');
                $table->softDeletes();
                $table->foreign('chat_type_id')->references('id')->on('chat_type')->onDelete('cascade');
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('messages')){
            Schema::create('messages', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('chat_list_id');
                $table->unsignedBigInteger('author_id');
                $table->longText('text')->nullable();
                $table->jsonb('read');
                $table->softDeletes();
                $table->foreign('chat_list_id')->references('id')->on('chat_list')->onDelete('cascade');
                $table->foreign('author_id')->references('id')->on('users');
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('message_files')){
            Schema::create('message_files', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('message_id');
                $table->string('document_name');
                $table->string('document_path');
                $table->string('document_type');
                $table->softDeletes();
                $table->foreign('message_id')->references('id')->on('messages')->onDelete('cascade');
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('user_to_user_chat')){
            Schema::create('user_to_user_chat', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('chat_list_id');
                $table->integer('user_fr_id');
                $table->integer('user_sc_id');
                $table->softDeletes();
                $table->foreign('chat_list_id')->references('id')->on('chat_list')->onDelete('cascade');
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('group_chat')){
            Schema::create('group_chat', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('chat_list_id');
                $table->integer('user_id');
                $table->softDeletes();
                $table->foreign('chat_list_id')->references('id')->on('chat_list')->onDelete('cascade');
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
        Schema::dropIfExists('chat_type');
        Schema::dropIfExists('chat_list');
        Schema::dropIfExists('messages');
        Schema::dropIfExists('message_files');
        Schema::dropIfExists('user_to_user_chat');
        Schema::dropIfExists('group_chat');
    }
}
