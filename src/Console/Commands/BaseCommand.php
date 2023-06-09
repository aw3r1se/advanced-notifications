<?php

namespace Aw3r1se\AdvancedNotifications\Console\Commands;

use Aw3r1se\AdvancedNotifications\Classes\Message;
use Aw3r1se\AdvancedNotifications\Classes\Variable;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

abstract class BaseCommand extends Command
{
    abstract public function handle();

    protected function make(string $stub, string $class): void
    {
        $contents = File::get(__DIR__ . "/stubs/$stub.stub");

        $name = $this->argument('name');
        $contents = $this->replaceClassNameWith($stub . 'Stub', $name, $contents);

        $path = $this->definePath($class);
        $contents = $this->replaceNamespaceWith('NamespaceStub', $path, $contents);

        $this->put($path, $name, $contents);
    }

    /**
     * @param string $type
     * @return string
     */
    protected function definePath(string $type): string
    {
        return match ($type) {
            Message::class => config('an.messages_path'),
            Variable::class => config('an.variables_path'),
            default => config('an.path'),
        };
    }

    /**
     * @param string $old_name
     * @param string $new_name
     * @param string $contents
     * @return string
     */
    protected function replaceClassNameWith(
        string $old_name,
        string $new_name,
        string $contents,
    ): string {
        return preg_replace("#$old_name#ui", ucfirst($new_name), $contents);
    }

    /**
     * @param string $old
     * @param string $path
     * @param string $contents
     * @return string
     */
    protected function replaceNamespaceWith(
        string $old,
        string $path,
        string $contents,
    ): string {
        $new = $this->createNamespaceFromPath($path);

        return preg_replace("#$old#ui", $new, $contents);
    }

    /**
     * @param string $path
     * @param string $base
     * @return string
     */
    protected function createNamespaceFromPath(string $path, string $base = 'App'): string
    {
        $namespace = Str::of($path)
            ->after(app_path())
            ->replace('/', '\\')
            ->replace('.php', '');

        return "{$base}\\{$namespace}";
    }

    /**
     * @param string $path
     * @param string $name
     * @param string $contents
     * @return void
     */
    protected function put(
        string $path,
        string $name,
        string $contents
    ): void {
        File::ensureDirectoryExists($path);
        $path = $path . '/' . ucfirst($name) . '.php';
        if (File::exists($path)) {
            $this->error('File already exists');
            return;
        }
        File::put($path, $contents);
        $this->info("File created at $path");
    }
}
