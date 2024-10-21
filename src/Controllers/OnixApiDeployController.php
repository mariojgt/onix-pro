<?php

namespace Mariojgt\Onix\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Mariojgt\Onix\Model\OnixPage;
use Mariojgt\Onix\Model\OnixBlock;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Mariojgt\Onix\Model\OnixSetting;
use Illuminate\Support\Facades\Process;

class OnixApiDeployController extends OnixController
{
    protected $outPutFile;

    public function __construct()
    {
        $this->outPutFile = 'deploy.txt';
    }


    public function startDeploy(Request $request)
    {
        $validation = $request->validate([
            'mode' => 'required|in:blade, inersia',
        ]);

        switch ($validation['mode']) {
            case 'blade':
                $this->bladeFilesDeploy($request);
                break;
            case 'inersia':
                $this->inersiaFilesDeploy($request);
                break;
            default:
                return response()->json([
                    'status' => false,
                    'data'   => 'Mode not found',
                ]);
                break;
        }

        // This command will run vite build
        $this->runDeployCommand($request);

        return response()->json([
            'status' => true,
            'data'   => 'Deploy completed',
        ]);
    }

    public function readyDeployStatusFile(Request $request)
    {
        // Check if the file exist
        if (file_exists(public_path($this->outPutFile))) {
            $lines = [];
            // Read the file
            $file = file_get_contents(public_path($this->outPutFile));
            // On every \n we add to the array
            $lines = explode("\n", $file);
            $finalLines = [];
            // Loop the lines and append the lines and prefix the line with the line number
            foreach ($lines as $key => $line) {
                $finalLines[] = [
                    'line'          => $key,
                    'editor_prefix' => '>',
                    'text'          => $line,
                ];
            }
            // Return the file
            return response()->json([
                'status' => true,
                'data'   => $finalLines,
            ]);
        } else {
            return response()->json([
                'status' => false,
                'data'   => 'File not found',
            ]);
        }
    }

    public function bladeFilesDeploy(Request $request): bool
    {
        // Get all the pages
        $pages = OnixPage::all();
        // Loop the pages
        foreach ($pages as $page) {
            $pageHtml = $page->html;
            $page->deployed = 1;
            $page->save();
            // Save the page in to a blade file
            $replace = [
                'variables' => [
                    '{{html}}'
                ],
                'values' => [
                    $pageHtml
                ]
            ];

            // Create the default media file
            $this->loadStubFileAndSave(
                'BaseBladePage',
                resource_path('views/pages/onix'),
                $page->slug,
                '.blade.php',
                $replace
            );
        }

        return true;
    }

    /**
     * This function will run the npm run build command
     *
     * @param Request $request
     *
     * @return [type]
     */
    private function runDeployCommand(Request $request)
    {
        // Create a blank file in the public folder so we can use to check the terminal information
        $file = fopen(public_path($this->outPutFile), 'w');
        // clear the file
        ftruncate($file, 0);
        // Run the build command
        $process =  Process::start('npm run build');
        // Write in the file the command output
        fwrite($file, $process->output() . PHP_EOL);
        // and display the command output on while is running
        while ($process->running()) {
            // Now append the output to the file in a new line using 1 second delay
            fwrite($file, $process->output() . PHP_EOL);
            sleep(1);
        }
        // now at the end we replace the file with the final output
        file_put_contents(public_path($this->outPutFile), $process->output());
        // Now we can close the file
        fclose($file);
    }

    private function loadStubFileAndSave($stubFile, $saveFilePath, $fileName, $fileExtension = '.php', $replace = null) : void
    {
        File::isDirectory($saveFilePath) or File::makeDirectory($saveFilePath, 0777, true, true);
        $stub = file_get_contents(app_path('Onix/Stubs/' . $stubFile . '.stub'));
        if (!empty($replace)) {
            $stub = str_replace($replace['variables'], $replace['values'], $stub);
        }
        file_put_contents($saveFilePath . '/' . $fileName . $fileExtension, $stub);

        return;
    }
}
