<?php

namespace Krmoller\Matvaretabell;

use Exception;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class Matvaretabell
{

    /**
     * Reads a xlsx file and transforms its content into an array.
     *
     * @param string $filePath
     * @return array The xlsx content as an array
     * @throws Exception if the file can't be read
     */
    public static function getFoods(string $filePath) : array
    {
        $reader = IOFactory::createReader('Xlsx');
        $reader->setReadDataOnly(TRUE);
        $spreadsheet = $reader->load($filePath);
        $sheet = $spreadsheet->getSheet(0);

        return self::sheetToArray($sheet);
    }

    private static function sheetToArray(Worksheet $sheet) : array
    {

        $columnsToPick = self::getRelevantIndexes($sheet);

        $arr = [];

        foreach ($sheet->getRowIterator() as $row) {

            if ($row->isEmpty()) {
                break;
            }

            $cellsArr = self::getValidCells($row, $columnsToPick);

            if ($cellsArr) {
                $arr[] = $cellsArr;
            }

        }

        return $arr;
    }

    private static function getValidCells($row, $indexList) : array
    {
        // only get the cells with the relevant key

        $cells = $row->getCellIterator();

        $cellsArr = [];
        $i = 0;
        $columnCount = 0;

        foreach ($cells as $cell) {

            if ($i === 0 && strlen($cell->getValue()) <> 6) {
                break;
            }

            if (in_array($i, $indexList)) {
                $keyName = config('matvaretabell.columns')[array_keys(config('matvaretabell.columns'))[$columnCount]];
                $cellsArr[$keyName] =  $cell->getValue();
                $columnCount++;
            }

            $i++;
        }

        return $cellsArr;
    }

    private static function getRelevantIndexes(Worksheet $sheet) : array
    {
        // look for the first column with value 'matvareid'
        // and then pick the cells with the names we want.
        // this can maybe be improved
        $arr = [];
        foreach ($sheet->getRowIterator() as $row) {
            $cells = $row->getCellIterator();
            foreach ($cells as $cell) {
                if ( strtolower($cell->getValue()) == 'matvareid') {
                    $arr = self::pickIndexes($cells);
                    break;
                }
            }
        }
        return $arr;
    }

    private static function pickIndexes($cells) : array
    {
        $arr = [];
        $i = 0;

        foreach ($cells as $cell) {
            // pick keys that exists const COLUMNS
            if (in_array($cell->getValue(),array_keys(config('matvaretabell.columns')))) {
                $arr[] = $i;
            }
            $i++;
        }

        return $arr;

    }

}
