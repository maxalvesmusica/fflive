<?php
namespace App\Domains\Games\Database;

use Codecasts\Support\Domain\Migration;
use Illuminate\Database\Schema\Blueprint;
/**
 * Class CreateUsersTable.
 */
class CreateGamesTable extends Migration
{
    /**
     * @var \Illuminate\Database\Schema\Builder
     */
    protected $schema;
    /**
     * Migration constructor.
     */
    public function __construct()
    {
        $this->schema = app('db')->connection()->getSchemaBuilder();
    }
    /**
     * Run the migrations.
     */
    public function up()
    {
        $this->schema->create('games', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('match_id');
            $table->string('score');
            $table->string('result');
            $table->index(['user_id', 'match_id']);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->drop('games');
    }
}