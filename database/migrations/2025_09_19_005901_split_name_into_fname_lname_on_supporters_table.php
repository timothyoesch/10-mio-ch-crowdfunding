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
        Schema::table('supporters', function (Blueprint $table) {
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
        });

        // Migrate existing data from 'name' to 'first_name' and 'last_name'
        $supporters = \App\Models\Supporter::all();
        foreach ($supporters as $supporter) {
            if ($supporter->name) {
                $nameParts = explode(' ', $supporter->name, 2);
                $supporter->first_name = $nameParts[0];
                $supporter->last_name = $nameParts[1] ?? null;
                $supporter->save();
            }
        }

        Schema::table('supporters', function (Blueprint $table) {
            $table->dropColumn('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('supporters', function (Blueprint $table) {
            $table->string('name');
        });

        // Migrate data back from 'first_name' and 'last_name' to 'name'
        $supporters = \App\Models\Supporter::all();
        foreach ($supporters as $supporter) {
            $supporter->name = trim($supporter->first_name . ' ' . $supporter->last_name);
            $supporter->save();
        }

        Schema::table('supporters', function (Blueprint $table) {
            $table->dropColumn(['first_name', 'last_name']);
        });
    }
};
