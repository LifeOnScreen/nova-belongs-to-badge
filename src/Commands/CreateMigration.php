<?php

namespace LifeOnScreen\BelongsToBadge\Commands;

use Illuminate\Database\Console\Migrations\BaseCommand;
use Illuminate\Support\Str;

/**
 * Class CreateMigration
 */
class CreateMigration extends BaseCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:migration:add-badge-colors';

    /**
     * @var string
     */
    protected $signature = 'make:migration:add-badge-colors {table}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add badge color rows to table';

    /**
     * Execute the console command.
     *
     * @return void
     * @throws \Throwable
     */
    public function handle()
    {
        $tableClass = ucfirst(Str::camel($this->argument('table')));
        $contents = view('belongs-to-badge::migrationTemplate',
            [
                'table'      => $this->argument('table'),
                'tableClass' => $tableClass,
                'php'        => '<?php',
            ]
        )->render();

        $filename = $this->getMigrationPath() . '/' . date('Y_m_d_His') . '_add_badge_colors_to_' .
            $this->argument('table') . '_table.php';
        file_put_contents($filename, $contents);
        $this->info('Migration ' . $filename . ' crated.');

        return;
    }
}