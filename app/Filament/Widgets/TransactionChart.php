<?php

namespace App\Filament\Widgets;

use App\Models\Transaction;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class TransactionChart extends ChartWidget
{
    protected static ?string $heading = 'Grafik Penghasilan';

    protected function getData(): array
    {
        $oneYearAgo = Carbon::now()->subYear();
        $now = Carbon::now();

        $monthlySales = array_fill(0, 12, 0);

        $transactions = Transaction::where('status', 'payed')
            ->whereBetween('created_at', [$oneYearAgo, $now])
            ->with('product')
            ->get();

        foreach ($transactions as $transaction) {
            $monthIndex = Carbon::parse($transaction->created_at)->month - 1;
            $monthlySales[$monthIndex] += $transaction->product->price ?? 0;
        }
        
        return [
            'datasets' => [
                [
                    'label' => 'Total Penghasilan',
                    'data' => $monthlySales,
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
