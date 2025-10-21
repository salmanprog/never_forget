<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ExtractTranslatableText extends Command
{
    protected $signature = 'translations:extract';
    protected $description = 'Extract translatable text from blade files';

    public function handle()
    {
        $this->info('Extracting translatable text...');
        
        $bladeFiles = File::glob(resource_path('views/**/*.blade.php'));
        $strings = [];
        
        foreach ($bladeFiles as $file) {
            $content = File::get($file);
            
            // Extract strings from _t() function
            preg_match_all('/_t\([\'"](.+?)[\'"]\)/', $content, $matches);
            if (!empty($matches[1])) {
                $strings = array_merge($strings, $matches[1]);
            }
            
            // Extract strings from @_ directive
            preg_match_all('/@_\([\'"](.+?)[\'"]\)/', $content, $matches);
            if (!empty($matches[1])) {
                $strings = array_merge($strings, $matches[1]);
            }
            
            // Extract strings from __() function
            preg_match_all('/__\([\'"](.+?)[\'"]\)/', $content, $matches);
            if (!empty($matches[1])) {
                $strings = array_merge($strings, $matches[1]);
            }
        }
        
        $strings = array_unique($strings);
        sort($strings);
        
        $output = "<?php\n\nreturn [\n";
        foreach ($strings as $string) {
            $key = Str::slug($string, '_');
            $output .= "    '{$key}' => '{$string}',\n";
        }
        $output .= "];\n";
        
        File::put(resource_path('lang/en/auto_extracted.php'), $output);
        
        $this->info('Extracted ' . count($strings) . ' strings to resources/lang/en/auto_extracted.php');
    }
}