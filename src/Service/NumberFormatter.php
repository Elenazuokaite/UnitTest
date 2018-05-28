<?php

namespace App\Service;


class NumberFormatter {

    /**
     * @param float $number
     * @return string
     */
    public function format(float $number):string {

        if (abs($number) >= 999500) {
            $number = $number/1000000;
            $number = round($number, 2);
            $number = $this->addZeros($number);
            return $number . 'M';
        }
        if (abs($number) < 999500 && abs($number) >= 99950) {
            $number = round($number, -3);
            $number = $number/1000;
            return $number . 'K';
        }
        if (abs($number) < 99950 && abs($number) >= 999.995) {
            $number = round($number, 0);
            return substr_replace(''.$number, ' ', strlen(''.$number)-3, 0);
        }
        if (abs($number) < 999.995) {
            $number = round($number, 2);
            $number = $this->addZeros($number);
            return $number;
        }
    }

    /**
     * @param float $number
     * @return string
     */
    private function addZeros(float $number): string
    {
        $number = $number . '';
        $numberParts = explode('.', $number);
        if (count($numberParts) == 1) {
            $number = $number . '.00';
        } elseif (strlen($numberParts[1]) == 1) {
            $number = $number . '0';
        }
        return $number;
    }
}