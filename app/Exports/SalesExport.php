<?php

namespace App\Exports;

use App\Models\Sale;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SalesExport implements FromView
{
    private $to;
    private $from;
    private $sales;
    private $total;

    public function __construct($from, $to)
    {
        $this->to = $to;
        $this->from = $from;
        $this->sales = Sale::whereBetween("updated_at", [$from, $to])->where("payment_status", "paid");    
        $this->total = $this->sales->sum('total');
    }

    public function view(): View
    {
        return view('reports.export', [
            'total' => $this->total,
            'sales' => $this->sales->get(),
            'startDate' => $this->from,
            'endDate' => $this->to,
        ]);
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Sale::all();
    }
}
