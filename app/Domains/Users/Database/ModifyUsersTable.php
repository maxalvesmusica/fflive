<?php
namespace App\Domains\Users\Database;

use Codecasts\Support\Domain\Migration;
use Illuminate\Database\Schema\Blueprint;
/**
 * Class CreateUsersTable.
 */
class ModifyUsersTable extends Migration
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
        $this->schema->table('users', function (Blueprint $table) {
            $table->string('loginff')->nullable();
            $table->decimal('balance', 10, 2)->nullable()->default('5.00');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->schema->table('users', function (Blueprint $table) {
            $table->dropColumn('loginff');
            $table->dropColumn('balance');
        });
    }
}