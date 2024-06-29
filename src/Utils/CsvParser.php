<?php

declare(strict_types=1);

namespace PragmaGoTech\Interview\Utils;


use InvalidArgumentException;

class CsvParser
{
    public static function parseCsv(string $filePath): array
    {
        if (!file_exists($filePath)) {
            throw new InvalidArgumentException("Plik $filePath nie istnieje.");
        }

        $breakpoints = [];

        $file = fopen($filePath, 'r');
        if ($file) {
            while (($row = fgetcsv($file)) !== false) {
                $breakpoints[$row[0]] = (int) $row[1];
            }
            fclose($file);
        }

        return $breakpoints;
    }
}
