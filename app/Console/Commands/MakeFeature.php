<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeFeature extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:feature {name} {--table=} {--label=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cria uma funcionalidade para o site';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $name = $this->argument('name');
        $table = $this->option('table');
        $label = $this->option('label');

        $this->buildModel($name, $table);
        $this->buildController($name, $table, $label);
        $this->buildFotosRequest($name, $table);
        $this->buildStoreRequest($name, $table);
        $this->buildUpdateRequest($name, $table);
        $this->buildMigration($table);
        $this->buildRoutes($name, $table);
        $this->buildViews($name, $table, $label);

        $this->newLine(3);

        $this->info('php artisan migrate');

        $this->newLine(3);
    }

    private function buildModel($name, $table)
    {
        $stubPath = app_path('Console/Commands/Stubs/Single/make-model.stub');

        if (!File::exists($stubPath)) {
            $this->error('O arquivo de stub personalizado não existe.');
            return;
        }

        // Ler o conteúdo do stub personalizado
        $conteudoStub = File::get($stubPath);

        // Substituir as palavras-chave no stub com o nome do modelo
        $conteudoStub = str_replace('{{className}}', $name, $conteudoStub);
        $conteudoStub = str_replace('{{table}}', $table, $conteudoStub);

        // Crie o arquivo de modelo no diretório adequado
        $modeloPath = app_path('Models/' . $name . '.php');

        if (File::exists($modeloPath)) {
            $this->error("O arquivo $name.php já existe.");
            return;
        }

        File::put($modeloPath, $conteudoStub);

        $this->info('Modelo gerado com sucesso: ' . $modeloPath);
    }

    private function buildController($name, $table, $label)
    {
        $stubPath = app_path('Console/Commands/Stubs/Single/make-controller.stub');

        if (!File::exists($stubPath)) {
            $this->error('O arquivo de stub personalizado não existe.');
            return;
        }

        // Ler o conteúdo do stub personalizado
        $conteudoStub = File::get($stubPath);

        // Substituir as palavras-chave no stub com o nome do modelo
        $conteudoStub = str_replace('{{className}}', $name, $conteudoStub);
        $conteudoStub = str_replace('{{table}}', $table, $conteudoStub);
        $conteudoStub = str_replace('{{variableName}}', strtolower($name), $conteudoStub);
        $conteudoStub = str_replace('{{labelName}}', $label, $conteudoStub);

        // Crie o arquivo de modelo no diretório adequado
        $modeloPath = app_path('Http/Controllers/Admin/' . $name . 'Controller.php');

        if (File::exists($modeloPath)) {
            $this->error("O arquivo {$name}Controller.php já existe.");
            return;
        }

        File::put($modeloPath, $conteudoStub);

        $this->info('Controller gerado com sucesso: ' . $modeloPath);
    }

    private function buildFotosRequest($name, $table)
    {
        $stubPath = app_path('Console/Commands/Stubs/Single/make-fotosrequest.stub');

        if (!File::exists($stubPath)) {
            $this->error('O arquivo de stub personalizado não existe.');
            return;
        }

        if (!is_dir(app_path("Http/Requests/$name/"))) {

            mkdir(app_path("Http/Requests/$name"), 0777);
        }

        // Ler o conteúdo do stub personalizado
        $conteudoStub = File::get($stubPath);

        // Substituir as palavras-chave no stub com o nome do modelo
        $conteudoStub = str_replace('{{className}}', $name, $conteudoStub);
        $conteudoStub = str_replace('{{table}}', $table, $conteudoStub);

        // Crie o arquivo de modelo no diretório adequado
        $modeloPath = app_path("Http/Requests/$name/" . $name . 'FotosRequest.php');

        if (File::exists($modeloPath)) {
            $this->error("O arquivo {$name}FotosRequest.php já existe.");
            return;
        }

        File::put($modeloPath, $conteudoStub);

        $this->info('FotosRequest gerado com sucesso: ' . $modeloPath);
    }

    private function buildStoreRequest($name, $table)
    {
        $stubPath = app_path('Console/Commands/Stubs/Single/make-storerequest.stub');

        if (!File::exists($stubPath)) {
            $this->error('O arquivo de stub personalizado não existe.');
            return;
        }

        if (!is_dir(app_path("Http/Requests/$name/"))) {

            mkdir(app_path("Http/Requests/$name"), 0777);
        }

        // Ler o conteúdo do stub personalizado
        $conteudoStub = File::get($stubPath);

        // Substituir as palavras-chave no stub com o nome do modelo
        $conteudoStub = str_replace('{{className}}', $name, $conteudoStub);
        $conteudoStub = str_replace('{{table}}', $table, $conteudoStub);

        // Crie o arquivo de modelo no diretório adequado
        $modeloPath = app_path("Http/Requests/$name/" . $name . 'StoreRequest.php');

        if (File::exists($modeloPath)) {
            $this->error("O arquivo {$name}StoreRequest.php já existe.");
            return;
        }

        File::put($modeloPath, $conteudoStub);

        $this->info('StoreRequest gerado com sucesso: ' . $modeloPath);
    }

    private function buildUpdateRequest($name, $table)
    {
        $stubPath = app_path('Console/Commands/Stubs/Single/make-updaterequest.stub');

        if (!File::exists($stubPath)) {
            $this->error('O arquivo de stub personalizado não existe.');
            return;
        }

        if (!is_dir(app_path("Http/Requests/$name/"))) {

            mkdir(app_path("Http/Requests/$name"), 0777);
        }

        // Ler o conteúdo do stub personalizado
        $conteudoStub = File::get($stubPath);

        // Substituir as palavras-chave no stub com o nome do modelo
        $conteudoStub = str_replace('{{className}}', $name, $conteudoStub);
        $conteudoStub = str_replace('{{variableName}}', strtolower($name), $conteudoStub);
        $conteudoStub = str_replace('{{table}}', $table, $conteudoStub);

        // Crie o arquivo de modelo no diretório adequado
        $modeloPath = app_path("Http/Requests/$name/" . $name . 'UpdateRequest.php');

        if (File::exists($modeloPath)) {
            $this->error("O arquivo {$name}UpdateRequest.php já existe.");
            return;
        }

        File::put($modeloPath, $conteudoStub);

        $this->info('UpdateRequest gerado com sucesso: ' . $modeloPath);
    }

    private function buildMigration($table)
    {
        $stubPath = app_path('Console/Commands/Stubs/Single/make-migration.stub');

        if (!File::exists($stubPath)) {
            $this->error('O arquivo de stub personalizado não existe.');
            return;
        }

        // Ler o conteúdo do stub personalizado
        $conteudoStub = File::get($stubPath);

        // Substituir as palavras-chave no stub com o nome do modelo
        $conteudoStub = str_replace('{{table}}', $table, $conteudoStub);

        // Crie o arquivo de modelo no diretório adequado
        $modeloPath = database_path('migrations/' . date('Y_m_d_His') . '_create_' . $table . '_table.php');

        File::put($modeloPath, $conteudoStub);

        $this->info('Migração gerada com sucesso: ' . $modeloPath);
    }

    private function buildRoutes($name, $table)
    {
        $routePath = base_path('routes/admin.php');
        $stubPath = app_path('Console/Commands/Stubs/Single/make-routes.stub');

        if (!File::exists($stubPath)) {
            $this->error('O arquivo de stub personalizado não existe.');
            return;
        }

        // Ler o conteúdo do stub personalizado
        $conteudoRoute = File::get($routePath);

        $conteudoStub = File::get($stubPath);

        // Substituir as palavras-chave no stub com o nome do modelo
        $conteudoStub = str_replace('{{table}}', $table, $conteudoStub);
        $conteudoStub = str_replace('{{className}}', $name, $conteudoStub);
        $conteudoStub = str_replace('{{variableName}}', strtolower($name), $conteudoStub);

        $conteudoRoute .= $conteudoStub;

        // Crie o arquivo de modelo no diretório adequado

        File::put($routePath, $conteudoRoute);

        $this->info('Rotas adicionadas ao arquivo app.php.');
    }

    private function buildViews($name, $table, $label)
    {
        $stubPaths = [
            'create' => app_path('Console/Commands/Stubs/Single/views/make-create.stub'),
            'edit' => app_path('Console/Commands/Stubs/Single/views/make-edit.stub'),
            'fotos' => app_path('Console/Commands/Stubs/Single/views/make-fotos.stub'),
            'list' => app_path('Console/Commands/Stubs/Single/views/make-list.stub')
        ];

        foreach ($stubPaths as $key => $stubPath) {

            if (!File::exists($stubPath)) {
                $this->error('O arquivo de stub personalizado não existe.');
                return;
            }

            // Ler o conteúdo do stub personalizado
            $conteudoStub = File::get($stubPath);

            // Substituir as palavras-chave no stub com o nome do modelo
            $conteudoStub = str_replace('{{className}}', $name, $conteudoStub);
            $conteudoStub = str_replace('{{table}}', $table, $conteudoStub);
            $conteudoStub = str_replace('{{variableName}}', strtolower($name), $conteudoStub);
            $conteudoStub = str_replace('{{labelName}}', $label, $conteudoStub);

            // Crie o arquivo de modelo no diretório adequado

            if (!is_dir(resource_path("views/admin/" . strtolower($name) . "/"))) {

                mkdir(resource_path("views/admin/" . strtolower($name) . "/"), 0777);
            }

            $modeloPath = resource_path("views/admin/" . strtolower($name) . "/" . $key . ".blade.php");

            if (File::exists($modeloPath)) {
                $this->error("O arquivo {$key}blade.php já existe.");
                return;
            }

            File::put($modeloPath, $conteudoStub);

            $this->info('View gerada com sucesso: ' . $modeloPath);
        }
    }
}
