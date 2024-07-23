<?php

namespace App\Livewire\Admin;

use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Dashboard Admin')]
class Dashboard extends Component
{
    public $total_count;
    public $chartHtml;
    public $chartScript;

    public $chartData = [];


    public function getChartData()
    {
        $sales = Order::selectRaw('MONTH(created_at) as month, SUM(grand_total) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return [
            'labels' => $sales->pluck('month')->map(fn ($month) => \DateTime::createFromFormat('!m', $month)->format('F'))->toArray(),
            'data' => $sales->pluck('total')->toArray(),
        ];
    }

    public function render()
    {
        return view('livewire.admin.dashboard', [
            'countorder' => Order::whereDate('created_at', Carbon::today())->count(),
            'countorderp' => Order::where('payment_status','pending')->count(),
            'countorders' => Order::where('status','processing')->count(),
            'countuser' => User::count(),
            'countusern' =>User::whereDate('created_at', Carbon::today())->count(),
            'countordercash' => Order::where('payment_method','cash')->count(),
            'countordercredit' => Order::where('payment_method','credit')->count(),
        ]);
    }
}
