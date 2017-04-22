<?php



use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagesTable extends Migration
{
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title');
            $table->string('slug')->index();
            $table->longText('content');
            $table->json('meta')->nullable();
            $table->enum('status', ['DRAFT', 'PUBLISHED'])->default('DRAFT');
            $table->enum('type', ['RAW', 'MARKDOWN', 'HTML'])->default('MARKDOWN');
            $table->timestamp('published_at');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('pages');
    }
}
