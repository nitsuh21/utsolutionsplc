<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use APP\Models\User;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('blogs')){
            Schema::create('blogs', function (Blueprint $table) {
                $table->id();
                $table->string('Title');
                $table->longText('Body');
                $table->string('image');
                $table->string('catagory');
                $table->integer('viewcount')->default('0')->nullable();
                $table->foreignIdFor(User::class);
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
        Schema::dropIfExists('blogs');
    }
}
