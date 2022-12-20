<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices_details', function (Blueprint $table) {
//            هنا علشان احفظ الداتا الالي جاية من الفورم بتاع الاضافة علشان احفظ في جدولين الجدول ده وجدول الفواتير الرئيسي
            $table->id();
            $table->unsignedBigInteger('id_Invoice');
            $table->string('invoice_number', 50);
            $table->foreign('id_Invoice')->references('id')->on('invoices')->onDelete('cascade');
            $table->string('product', 50);
            $table->string('Section', 999);
//            مدفوعة وغير مدفوعه
            $table->string('Status', 50);
            $table->integer('Value_Status');
            $table->date('Payment_Date')->nullable();
            $table->text('note')->nullable();
//            هنا بقا مين الالي ضاف الفاتورة
            $table->string('user',300);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices_details');
    }
};
