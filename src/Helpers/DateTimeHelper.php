<?php

/**
 * Convert a time string in HH:MM:SS format to minutes.
 *
 * @param string $time Time in HH:MM:SS format.
 * @return float Time in minutes.
 */
if (!function_exists('convertTimeToMinutes')) {

    function convertTimeToMinutes(string $time): float
    {
        $timeParts = explode(':', $time);
        return ($timeParts[0] * 60) + ($timeParts[1]) + ($timeParts[2] / 60);
    }
}

/**
 * Convert a date string to database format (Y-m-d).
 *
 * @param string $date Date in d/m/Y or similar format.
 * @return string|null Formatted date or null if input is empty.
 */
if (!function_exists('formatDateForDatabase')) {
    function formatDateForDatabase(string $date): ?string
    {
        if (!empty($date)) {
            return date("Y-m-d", strtotime(str_replace('/', '-', $date)));
        }
        return null;
    }
}


/**
 * Convert a month string to database format (Y-m).
 *
 * @param string $month Month in d/m/Y or similar format.
 * @return string|null Formatted month or null if input is empty.
 */
if (!function_exists('formatMonthForDatabase')) {

    function formatMonthForDatabase(string $month): ?string
    {
        if (!empty($month)) {
            return date("Y-m", strtotime(str_replace('/', '-', $month)));
        }
        return null;
    }
}

/**
 * Convert a date string to a specific format (d/m/Y).
 *
 * @param string $date Date in Y-m-d format.
 * @return string|null Formatted date or null if input is empty.
 */
if (!function_exists('formatDateToForm')) {

    function formatDateToForm(string $date): ?string
    {
        if (!empty($date)) {
            $dateTimestamp = strtotime($date);
            return date('d/m/Y', $dateTimestamp);
        }
        return null;
    }
}

/**
 * Generate a date range for a given month.
 *
 * @param string $month Month in Y-m format.
 * @return array List of dates with additional info.
 */
if (!function_exists('generateMonthDateRange')) {

    function generateMonthDateRange(string $month): array
    {
        $startDate = $month . '-01';
        $endDate = date("Y-m-t", strtotime($startDate));

        $target = strtotime($startDate);
        $workingDates = [];

        while ($target <= strtotime($endDate)) {
            $workingDates[] = [
                'date' => date('Y-m-d', $target),
                'day' => date('d', $target),
                'day_name' => date('D', $target),
            ];
            $target += (60 * 60 * 24);
        }
        return $workingDates;
    }
}

/**
 * Generate a date range between two dates.
 *
 * @param string $start_date Start date in Y-m-d format.
 * @param string $end_date End date in Y-m-d format.
 * @return array List of dates in the range.
 */
if (!function_exists('generateDateRange')) {

    function generateDateRange(string $start_date, string $end_date): array
    {
        $target = strtotime($start_date);
        $workingDates = [];

        while ($target <= strtotime($end_date)) {
            $workingDates[] = date('Y-m-d', $target);
            $target += (60 * 60 * 24);
        }
        return $workingDates;
    }
}

/**
 * Validate a date against a specific format.
 *
 * @param string $date Date to validate.
 * @param string $format Format to validate against.
 * @return bool True if valid, false otherwise.
 */
if (!function_exists('isValidDate')) {

    function isValidDate(string $date, string $format = 'Y-m-d'): bool
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) === $date;
    }
}

/**
 * Generate a date range using DatePeriod.
 *
 * @param string $begin Start date.
 * @param string $end End date.
 * @param string|null $interval Interval for date period.
 * @return array Array of DateTime objects in the range.
 */
if (!function_exists('createDateRange')) {

    function createDateRange(string $begin, string $end, string $interval = null): array
    {
        $begin = new DateTime($begin);
        $end = new DateTime($end);
        $end = $end->modify('+1 day');
        $interval = new DateInterval($interval ?: 'P1D');

        return iterator_to_array(new DatePeriod($begin, $interval, $end));
    }
}

/**
 * Sum an array of time strings in HH:MM:SS format.
 *
 * @param array $array Array of time strings.
 * @param bool $hours Return total hours only if true.
 * @return string Total time in HH:MM:SS format.
 */
if (!function_exists('sumTimeArray')) {

    function sumTimeArray(array $array, bool $hours = false): string
    {
        $sum = strtotime('00:00:00');
        $totalTime = 0;

        foreach ($array as $element) {
            $timeInSeconds = strtotime($element) - $sum;
            $totalTime += $timeInSeconds;
        }

        $h = sprintf('%02d', intval($totalTime / 3600));
        $totalTime -= ($h * 3600);
        $m = sprintf('%02d', intval($totalTime / 60));
        $s = sprintf('%02d', $totalTime - ($m * 60));

        return $hours ? $h : "$h:$m:$s";
    }
}

/**
 * Convert time string in HH:MM:SS to decimal hours.
 *
 * @param string $time Time in HH:MM:SS format.
 * @return float Time in decimal hours.
 */
if (!function_exists('convertTimeToDecimalHours')) {

    function convertTimeToDecimalHours(string $time): float
    {
        $hms = explode(":", $time);
        return ($hms[0] + ($hms[1] / 60) + ($hms[2] / 3600));
    }
}

/**
 * Generate an acronym from a string.
 *
 * @param string $string Input string.
 * @return string Acronym in uppercase.
 */
if (!function_exists('generateAcronym')) {

    function generateAcronym(string $string = ''): string
    {
        $words = explode(' ', trim($string));
        if (!$words) {
            return '';
        }
        $result = '';
        foreach ($words as $word) {
            $result .= substr($word, 0, 1);
        }
        return strtoupper($result);
    }
}

/**
 * Extract time (H:i) from a datetime string.
 *
 * @param string $dateTime DateTime string.
 * @return string Time in H:i format.
 */
if (!function_exists('extractTimeFromDateTime')) {

    function extractTimeFromDateTime(string $dateTime): string
    {
        return date('H:i', strtotime($dateTime));
    }
}

/**
 * Convert hour:minute string to total minutes.
 *
 * @param string $strHourMinute Time in HH:MM format.
 * @return int Total minutes.
 */
if (!function_exists('convertHourMinuteToMinutes')) {

    function convertHourMinuteToMinutes(string $strHourMinute): int
    {
        $from = date('Y-m-d 00:00:00');
        $to = date('Y-m-d ' . $strHourMinute . ':00');
        $diff = strtotime($to) - strtotime($from);
        return (int)($diff / 60);
    }
}

/**
 * Convert a numeric index to a corresponding Excel column name.
 *
 * @param int $num Column index (1-based).
 * @return string Column name (e.g., A, B, ..., Z, AA, AB, ...).
 */
if (!function_exists('convertNumberToColumnName')) {

    function convertNumberToColumnName(int $num): string
    {
        $numeric = ($num - 1) % 26;
        $letter = chr(65 + $numeric);
        $num2 = intval(($num - 1) / 26);
        return $num2 > 0 ? convertNumberToColumnName($num2) . $letter : $letter;
    }
}

/**
 * Divide a time string in HH:MM:SS by two.
 *
 * @param string $timeString Time in HH:MM:SS format.
 * @param int $value Value in integer format.
 * @return string Divided time in HH:MM:SS format.
 */
if (!function_exists('divideTimeStringByHalf')) {

    function divideTimeStringByHalf(string $timeString, int $value): string
    {
        list($hours, $minutes, $seconds) = explode(':', $timeString);
        $totalSeconds = $hours * 3600 + $minutes * 60 + $seconds;
        $totalSeconds /= $value;

        $hours = floor($totalSeconds / 3600);
        $minutes = floor(($totalSeconds % 3600) / 60);
        $seconds = $totalSeconds % 60;

        return sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
    }
}
