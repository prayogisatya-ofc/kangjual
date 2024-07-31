<?php

namespace App\Filament\Widgets;

use App\Models\Transaction;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {

        $totalPenghasilan = Transaction::where('status', 'payed')
            ->with('product')
            ->get()
            ->sum(function($transaction){
                return $transaction->product->price ?? 0;
            });

        $penghasilanBulanIni = Transaction::where('status', 'payed')
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->with('product')
            ->get()
            ->sum(function($transaction){
                return $transaction->product->price ?? 0;
            });

        $transaksiBerhasil = Transaction::where('status', 'payed')->count();

        return [
            Stat::make('Total Penghasilan', 'Rp '. number_format($totalPenghasilan, 0, ',', '.')),
            Stat::make('Penghasilan Bulan ini', 'Rp '.number_format($penghasilanBulanIni, 0, ',', '.')),
            Stat::make('Transaksi Berhasil', $transaksiBerhasil),
        ];
    }
}
