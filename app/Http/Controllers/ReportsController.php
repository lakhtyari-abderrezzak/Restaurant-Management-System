<?php

namespace App\Http\Controllers;

use App\Exports\SalesExport;
use App\Models\Sale;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportsController extends Controller
{
    // public function __construct(){
    //     return $this->middleware('auth');
    // }
    public function index(){
        // dd('oj');
        return view('reports.index');
    }
    public function show(Request $request){
        $request->validate([
            'from' => 'required',
            'to' => 'required',
        ]);
        $startDate = Date("Y-m-d H:i:s", strtotime($request->from." 00:00:00"));
        $endDate = Date("Y-m-d H:i:s", strtotime($request->to." 23:59:59"));
        $sales = Sale::whereBetween("updated_at", [$startDate,$endDate])->where("payment_status", "paid");

        return view('reports.index', [
            "startDate" => $startDate,
            "endDate" => $endDate,
            "total" => $sales->sum('total'),
            "sales" => $sales->get(),
        ]);
    }
    public function export(Request $request){
        return Excel::download(new SalesExport($request->from, $request->to), 'sales.xlsx');
    }
}
