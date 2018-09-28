{!! $php !!}

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBadgeColorsTo{{ $tableClass }}Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('{{$table}}', function (Blueprint $table) {
            $table->string('badgeForegroundColor', 25)->nullable();
            $table->string('badgeBackgroundColor', 25)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('{{$table}}', function (Blueprint $table) {
            $table->dropColumn('badgeForegroundColor');
            $table->dropColumn('badgeBackgroundColor');
        });
    }
}