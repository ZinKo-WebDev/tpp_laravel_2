
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDefaultGuardNameToRolesTable extends Migration
{
    public function up()
        {
            Schema::table('roles', function (Blueprint $table) {
            $table->string('guard_name')->default('default_guard_name')->change();
            });
        }

    public function down()
        {
            Schema::table('roles', function (Blueprint $table) {
            $table->string('guard_name')->default(null)->change();
            });
        }
}
