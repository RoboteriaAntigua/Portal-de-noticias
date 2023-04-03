<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('news_reader', function (Blueprint $table){
            $table->id();

            $table->unsignedBigInteger('reader_id');
            $table->unsignedBigInteger('news_id');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

            //Llaves foraneas
            $table->foreign('news_id')->references('id')->on('News')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('reader_id')->references('id')->on('readers')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('reader_new');
    }
};
