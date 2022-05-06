<?php

namespace App\Helpers;

class RegistrationHelper {

    public static function getNewRegistrationYear() {
        $year = intval(date('Y'));
        $month = intval(date('m'));
        $reg_start = config('registration_start_month');

        if ($reg_start != 0 && $month >= $reg_start) {
            return year + 1;
        }
        return year;
    }

    public static function isActive($registration) {
        if (!isset($registration))
            return false;
        $testYear = intval($registration->year);
        $year = intval(date('Y'));
        $month = intval(date('m'));
        $reg_start = config('registration_start_month');

        if ($year == $testYear) {
            return true;
        }

        if ($testYear - 1 == $year && $reg_start != 0 && $month >= $reg_start) {
            return true;
        }

        return false;
    }

    public static function isYearActive($testYear) {
        $testYear = intval($testYear);
        $year = intval(date('Y'));
        $month = intval(date('m'));
        $reg_start = config('registration_start_month');

        if ($year == $testYear) {
            return true;
        }

        if ($testYear - 1 == $year && $reg_start != 0 && $month >= $reg_start) {
            return true;
        }

        return false;
    }

}