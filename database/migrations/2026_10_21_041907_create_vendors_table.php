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
        if (!Schema::hasTable('vendors')) {
            Schema::create('vendors', function (Blueprint $table) {
                $table->id();
                $table->string('code', 50);
                $table->string('name', 150);
                $table->text('office_address');
                $table->string('email', 100);
                $table->string('phone', 30);
                $table->string('tax_id', 50);
                $table->string('business_license_number', 50);
                $table->enum('status', ['active', 'inactive', 'suspend'])->default('active');
                $table->string('pic_name', 100);
                $table->string('pic_position', 100);
                $table->string('pic_email', 100);
                $table->string('pic_phone', 30);
                $table->timestamps();
            });
        } else {
            Schema::table('vendors', function (Blueprint $table) {
                if (!Schema::hasColumn('vendors', 'updated_at')) {
                    $table->timestamp('updated_at')->nullable()->after('created_at');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
