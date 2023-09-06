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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('short_description');
            $table->text('description');
            $table->text('designation');
            $table->text('salary_range');
            $table->enum('level',['beginning','intermediate','expert']);
            $table->string('experiance');
            $table->enum('type',['remote','onsite']);
            $table->integer('company_id')->references('id')->on('companies');

            $table->integer('created_by');
            $table->enum('status',['open','close']);
            $table->string('location');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
