<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdventController extends Controller
{
    public function dayOne()
    {
        $filePath = 'public/data.txt';
        $values = [];

        $file = Storage::disk('local')->get($filePath);
        $lines = explode("\n", $file);

        foreach ($lines as $line) {
            preg_match('/\d/', $line, $leftMatches);
            $leftNumber = isset($leftMatches[0]) ? $leftMatches[0] : '';

            $reversedInput = strrev($line);
            preg_match('/\d/', $reversedInput, $rightMatches);
            $rightNumber = isset($rightMatches[0]) ? $rightMatches[0] : '';

            $result = $leftNumber . $rightNumber;

            $values[] = $result;
        }

        $total = array_sum($values);

        echo "Total = " . $total;
    }
}
