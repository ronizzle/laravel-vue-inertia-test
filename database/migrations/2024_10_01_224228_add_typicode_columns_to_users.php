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
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->nullable();
            $table->string('phone')->nullable();
            $table->string('website')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_catch_phrase')->nullable();
            $table->string('company_bs')->nullable();
            $table->string('address_street')->nullable();
            $table->string('address_suite')->nullable();
            $table->string('address_city')->nullable();
            $table->string('address_zipcode')->nullable();
            $table->string('address_geo_lat')->nullable();
            $table->string('address_geo_lng')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('username');
            $table->dropColumn('phone');
            $table->dropColumn('website');
            $table->dropColumn('company_name');
            $table->dropColumn('company_catch_phrase');
            $table->dropColumn('company_bs');
            $table->dropColumn('address_street');
            $table->dropColumn('address_suite');
            $table->dropColumn('address_city');
            $table->dropColumn('address_zipcode');
            $table->dropColumn('address_geo_lat');
            $table->dropColumn('address_geo_lng');
        });
    }
};
