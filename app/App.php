<?php

declare(strict_types = 1);

// Your Code
$csv_path = FILES_PATH . 'sample_1.csv';

if (!file_exists($csv_path)) {
    echo 'Transaction file sample_1.csv does not exist';
    return;
}

$transactions = array();

$csv_file = fopen($csv_path, 'r');
$header = fgetcsv($csv_file);
while (($row = fgetcsv($csv_file)) !== false) {

}
fclose($csv_file);

var_dump($transactions);