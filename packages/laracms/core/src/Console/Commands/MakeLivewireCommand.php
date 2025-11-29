<?php

namespace LaraCms\Core\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class MakeLivewireCommand extends Command
{
    protected $signature = 'laracms:make-livewire {name : The name of the component}';

    protected $description = 'Create a new Livewire v4 component in the LaraCMS package';

    public function __construct(protected Filesystem $files)
    {
        parent::__construct();
    }

    public function handle(): int
    {
        $name = $this->argument('name');
        $parsedName = $this->parseComponentName($name);

        $componentPath = $this->getComponentPath($parsedName);
        $viewPath = $this->getViewPath($parsedName);

        if ($this->files->exists($componentPath)) {
            $this->components->error("Component [{$componentPath}] already exists!");
            return self::FAILURE;
        }

        if ($this->files->exists($viewPath)) {
            $this->components->error("View [{$viewPath}] already exists!");
            return self::FAILURE;
        }

        // Create component class
        $this->ensureDirectoryExists(dirname($componentPath));
        $classContent = $this->getClassStub($parsedName);
        $this->files->put($componentPath, $classContent);

        // Create view
        $this->ensureDirectoryExists(dirname($viewPath));
        $viewContent = $this->getViewStub($parsedName);
        $this->files->put($viewPath, $viewContent);

        $this->components->info("Livewire component [{$parsedName['class']}] created successfully.");
        $this->components->info("Class: {$componentPath}");
        $this->components->info("View: {$viewPath}");
        $this->components->info("Usage: <livewire:{$parsedName['tag']} />");

        return self::SUCCESS;
    }

    protected function parseComponentName(string $name): array
    {
        $name = str_replace(['/', '\\'], '.', $name);
        $parts = explode('.', $name);
        $className = Str::studly(array_pop($parts));
        $namespace = collect($parts)->map(fn($part) => Str::studly($part))->implode('\\');

        $fullNamespace = 'LaraCms\\Core\\Livewire' . ($namespace ? '\\' . $namespace : '');
        $tagName = 'laracms-' . Str::kebab($name);
        $viewName = Str::kebab($name);

        // Title aus dem Klassennamen (z.B. "CreatePost" -> "Create Post")
        $title = Str::headline($className);

        return [
            'class' => $className,
            'namespace' => $fullNamespace,
            'tag' => $tagName,
            'view' => $viewName,
            'title' => $title,
            'path' => $namespace ? $namespace . '\\' . $className : $className,
        ];
    }

    protected function getComponentPath(array $parsedName): string
    {
        $basePath = __DIR__ . '/../../Livewire';
        $relativePath = str_replace('\\', '/', $parsedName['path']);

        return "{$basePath}/{$relativePath}.php";
    }

    protected function ensureDirectoryExists(string $directory): void
    {
        if (!$this->files->isDirectory($directory)) {
            $this->files->makeDirectory($directory, 0755, true);
        }
    }

    protected function getViewPath(array $parsedName): string
    {
        $basePath = __DIR__ . '/../../../resources/views/livewire';
        $relativePath = Str::kebab(str_replace('\\', '/', $parsedName['path']));

        return "{$basePath}/{$relativePath}.blade.php";
    }

    protected function getClassStub(array $parsedName): string
    {
        return <<<STUB
<?php

namespace {$parsedName['namespace']};

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('laracms::layouts.admin')]
#[Title('{$parsedName['title']}')]
class {$parsedName['class']} extends Component
{
    public function render()
    {
        return view('laracms::livewire.{$parsedName['view']}');
    }
}
STUB;
    }

    protected function getViewStub(array $parsedName): string
    {
        return <<<'STUB'
<div>
    {{-- Component content --}}
</div>
STUB;
    }
}
