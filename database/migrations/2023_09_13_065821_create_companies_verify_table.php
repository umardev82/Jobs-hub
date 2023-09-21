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
        Schema::create('companies_verify', function (Blueprint $table) {
            $table->integer('company_id');
            $table->string('token');
            $table->timestamps();
        });
        Schema::table('companies', function (Blueprint $table) {
            $table->boolean('is_email_verified')->default(0)->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies_verify');
    }
};
