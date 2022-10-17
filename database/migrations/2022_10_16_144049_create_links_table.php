<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->text('original_url')->nullable(false);
            $table->string('short_link', 8)->nullable(false)->unique();
            $table->integer('counter')->nullable(false)->default(0);
            $table->integer('max_count')
                ->nullable(false)
                ->default(0)
                ->comment('0 - unlimited quantity');
            $table->timestamp('expired_at')->nullable(false);
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
        Schema::dropIfExists('links');
    }
}
