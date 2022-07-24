<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('package_id')->nullable();
            $table->string('currency')->nullable();
            $table->double('package_price', 8, 2)->nullable();
            $table->double('amount_paid', 8, 2)->default(0);
            $table->double('app_fee', 8, 2)->nullable();
            $table->string('reference')->nullable();
            $table->string('status')->nullable();

            $table->string('flutterwave_reference')->nullable();
            $table->string('device_fingerprint')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('account_id')->nullable();


            $table->boolean('is_active')->default(0);
            $table->boolean('has_ads')->default(0);
            $table->timestamp('expiry_date')->nullable();
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
        Schema::dropIfExists('subscriptions');
    }
}
