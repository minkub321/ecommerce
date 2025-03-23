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
        Schema::create('shipping_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // เชื่อมกับตาราง users
            $table->string('full_name'); // ชื่อ-นามสกุล
            $table->string('phone_number'); // เบอร์โทรศัพท์
            $table->text('address'); // ที่อยู่เต็ม
            $table->string('district'); // ตำบล/แขวง
            $table->string('city'); // อำเภอ/เขต
            $table->string('province'); // จังหวัด
            $table->string('postal_code'); // รหัสไปรษณีย์
            $table->timestamps();

            // Foreign key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      
    }
};
