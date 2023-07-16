<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Transactions</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
                text-align: center;
            }

            table tr th, table tr td {
                padding: 5px;
                border: 1px #eee solid;
            }

            tfoot tr th, tfoot tr td {
                font-size: 20px;
            }

            tfoot tr th {
                text-align: right;
            }
        </style>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Check #</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($transactions['Date'] as $i => $date): ?>
                <tr>
                    <th><?= $date ?></th>
                    <th><?= $transactions['Check #'][$i] ?></th>
                    <th><?= $transactions['Description'][$i] ?></th>
                    <th><?= $transactions['Amount'][$i] ?></th>
                </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total Income:</th>
                    <td><?= $income_str ?></td>
                </tr>
                <tr>
                    <th colspan="3">Total Expense:</th>
                    <td><?= $expense_str ?></td>
                </tr>
                <tr>
                    <th colspan="3">Net Total:</th>
                    <td><?= $net_total_str ?></td>
                </tr>
            </tfoot>
        </table>
    </body>
</html>
