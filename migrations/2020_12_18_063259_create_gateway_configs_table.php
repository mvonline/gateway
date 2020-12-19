<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Larabookir\Gateway\PortAbstract;
use Larabookir\Gateway\GatewayResolver;
use Larabookir\Gateway\Enum;

class GatewayConfig extends Migration
{
    function getTable()
    {
        return config('gateway.config_table', 'gateway_configs');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create($this->getTable(), function (Blueprint $table) {
            $table->engine = "innoDB";
            $table->unsignedBigInteger('id', true);
            $table->string('gateway_name', 255)->nullable();
            $table->integer('user_id')->nullable();
            $table->json('gateway_config')->nullable();
            $table->boolean('is_active')->default(false);
            $table->nullableTimestamps();
            $table->softDeletes();

            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop($this->getTable());
    }
}
