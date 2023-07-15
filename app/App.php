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
foreach ($header as $column) {
    $transactions[$column] = array();
}
while (($row = fgetcsv($csv_file)) !== false) {
    foreach ($row as $i => $value) {
        $column = $header[$i];
        $transactions[$column][] = $value;
    }
}
fclose($csv_file);

$currency_fmt = new NumberFormatter('en_US', NumberFormatter::CURRENCY);
$income = 0.0;
$expense = 0.0;
$currency = '';
foreach ($transactions['Amount'] as $amount_str) {
    $amount = $currency_fmt->parseCurrency($amount_str, $currency);
    if ($amount >= 0.0) {
        $income += $amount;
    } else {
        $expense += $amount;
    }
}
$income_str = $currency_fmt->formatCurrency($income, $currency);
$expense_str = $currency_fmt->formatCurrency($expense, $currency);
$net_total_str = $currency_fmt->formatCurrency($income + $expense, $currency);

require VIEWS_PATH . 'transactions.php';