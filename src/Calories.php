<?php

namespace App;

class Calories
{
    public static function sumCalories(array $elvs)
    {
        $result = [];
        foreach ($elvs as $calories) {
            $result[] = array_sum($calories);
        }
        return $result;
    }

    public static function getHighestCalories(array $calories, $elves = 1)
    {
        rsort($calories);
        return array_sum(array_slice($calories,0,$elves));
    }

    public static function readCaloriesFromFile($filename)
    {
        $elvesCalories = [];
        $currentElfCalories = [];
        $file = fopen($filename, 'r');
        while (!feof($file)) {
            $line = (int)fgets($file);
            if ($line == 0) {
                $elvesCalories[] = $currentElfCalories;
                $currentElfCalories = [];
            }
            if ($line !== 0) {
                $currentElfCalories[] = $line;
            }
        }
        fclose($file);
        return $elvesCalories;
    }
}