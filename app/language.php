<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class language extends Model
{
    public static function add_word()
    {
        $file = resource_path();
        $lang_file = resource_path() . DIRECTORY_SEPARATOR . 'lang' . DIRECTORY_SEPARATOR . App::getLocale() . DIRECTORY_SEPARATOR . 'mb.php';
        $lines = file($lang_file);
        if (file_exists($lang_file)) {
            $last = sizeof($lines);
            echo $last . '<br>';
            unset($lines[$last - 1]);
            unset($lines[$last - 2]);
            unset($lines[$last - 3]);
            $fp = fopen($lang_file, 'w');
            fwrite($fp, implode('', $lines));
            $current = "John Smith\n";
            file_put_contents($lang_file, $current,FILE_APPEND );
            fclose($fp);
        }
    }
}
