<?php
declare(strict_types=1);

use App\Calories;
use PHPUnit\Framework\TestCase;

class CaloriesTest extends TestCase
{
    /**
     * @return void
     * @test
     */
    public function it_sums_one_elf_calories()
    {
        $elfCalories = [[8008, 2078, 2961, 2709]];
        $expected = [15756];

        $this->assertEquals($expected, Calories::sumCalories($elfCalories));
    }

    /**
     * @return void
     * @test
     */
    public function it_sums_multiple_elves_calories()
    {
        $elfCalories = [[8008, 2078, 2961, 2709], [8008, 2078, 2961, 2709]];
        $expected = [15756, 15756];

        $this->assertEquals($expected, Calories::sumCalories($elfCalories));
    }

    /**
     * @return void
     * @test
     */
    public function it_determines_elf_with_highest_calories()
    {
        $elfCalories = [
            [8008, 2078, 2961, 2709],
            [6810, 3227, 8499, 9527],
            [7088, 2669, 6653, 6788]
        ];
        $expected = 28063;
        $caloriesSum = Calories::sumCalories($elfCalories);
        $this->assertEquals($expected, Calories::getHighestCalories($caloriesSum));
    }
    /**
     * @return void
     * @test
     */
    public function it_determines_three_elves_with_highest_calories()
    {
        $elfCalories=Calories::readCaloriesFromFile('../src/calories-input.txt');
        $caloriesSum = Calories::sumCalories($elfCalories);
        $expected = 203420;
        $this->assertEquals($expected, Calories::getHighestCalories($caloriesSum,3));
    }
    /**
     * @return void
     * @test
     */
    public function it_reads_input_from_file()
    {
        $elfCalories=Calories::readCaloriesFromFile('../src/calories-input.txt');
        $caloriesSum = Calories::sumCalories($elfCalories);
        $expected = 68467;
        $this->assertEquals($expected, Calories::getHighestCalories($caloriesSum));
    }


}
