<?php namespace Anomaly\EditorFieldType\Command;

use Anomaly\EditorFieldType\EditorFieldType;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Filesystem\Filesystem;

/**
 * Class DeleteDirectory
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\EditorFieldType\Command
 */
class DeleteDirectory implements SelfHandling
{

    /**
     * The editor field type instance.
     *
     * @var EditorFieldType
     */
    protected $fieldType;

    /**
     * Create a new DeleteDirectory instance.
     *
     * @param EditorFieldType $fieldType
     */
    public function __construct(EditorFieldType $fieldType)
    {
        $this->fieldType = $fieldType;
    }

    /**
     * Handle the command.
     *
     * @param Filesystem $files
     */
    public function handle(Filesystem $files)
    {
        $path = $this->fieldType->getStoragePath();

        if ($path && $files->isDirectory(dirname($path))) {
            $files->deleteDirectory(dirname($path));
        }
    }
}
