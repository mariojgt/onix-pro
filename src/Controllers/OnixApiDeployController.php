<?php

namespace Mariojgt\Onix\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Mariojgt\Onix\Model\OnixPage;
use Mariojgt\Onix\Model\OnixBlock;
use App\Http\Controllers\Controller;
use Mariojgt\Onix\Model\OnixSetting;
use Illuminate\Support\Facades\Process;

class OnixApiDeployController extends OnixController
{
    public function startDeploy(Request $request)
    {
        $request->validate([
          'mode'       => 'required',
        ]);

        // Create a blank file in the public folder so we can use to check the terminal information
        $file = fopen(public_path('deploy.text'), 'w');
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
        file_put_contents(public_path('deploy.text'), $process->output());
        // Now we can close the file
        fclose($file);
    }

    public function readyDeployStatusFile(Request $request)
    {
        // Check if the file exist
        if (file_exists(public_path('deploy.text'))) {
            $lines = [];
            // Read the file
            $file = file_get_contents(public_path('deploy.text'));
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
}
