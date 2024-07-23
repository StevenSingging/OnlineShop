<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class MonthlySalesChart extends Component
{
    public $chartData = [
        'dates' => [],
        'totals' => []
    ];

    public function mount()
    {
        $this->loadChartData();
    }

    public function loadChartData()
    {
        $orders = DB::table('orders')
                    ->select(DB::raw('DATE(created_at) as date'), DB::raw('SUM(grand_total) as total'))
                    ->whereMonth('created_at', now()->month)
                    ->whereYear('created_at', now()->year)
                    ->groupBy(DB::raw('DATE(created_at)'))
                    ->orderBy('date')
                    ->get();

        $this->chartData = [
            'dates' => $orders->pluck('date')->toArray(),
            'totals' => $orders->pluck('total')->toArray()
        ];
    }
    public function render()
    {
        return view('livewire.admin.monthly-sales-chart');
    }
}
