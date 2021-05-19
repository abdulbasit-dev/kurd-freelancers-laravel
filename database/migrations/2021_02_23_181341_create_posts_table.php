<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('posts', function (Blueprint $table) {
      $table->id();
      $table->string("user_id");
      $table->string("title");
      $table->text("description");
      $table->foreignId("tag_id");
      $table->foreignId("city_id");
      $table->string("currency_type");
      $table->string("file")->nullable();
      $table->integer("fix_price")->nullable();
      $table->integer("start_range_price")->nullable();
      $table->integer("end_range_price")->nullable();
      $table->string("time_delivary_type");
      $table->integer("time_amount");
      $table->boolean("status")->default(false)->comment("false stant for pending");
      $table->boolean("reject")->default(false)->comment("false stant for not reject, true mean reject");;
      $table->string("reject_resone")->nullable();
      $table->timestamps();
      $table->softDeletes();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('posts');
  }
}
