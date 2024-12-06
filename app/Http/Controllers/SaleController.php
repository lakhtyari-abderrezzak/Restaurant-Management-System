<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Sale;
use App\Models\Servant;
use App\Models\Table;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::latest()->paginate(10);
        return view('sales.index', compact('sales'));
    }
    public function create()
    {
        $categories = Category::all();
        $sales = Sale::all();
        $menus = Menu::all();
        $tables = Table::all();
        $servants = Servant::all();

        return view(
            'sales.create',
            [
                'categories' => $categories,
                'sales' => $sales,
                'menus' => $menus,
                'tables' => $tables,
                'servants' => $servants
            ]
        );
    }
    public function store(Request $request, Table $table)
    {

        $request->validate([
            'servant_id' => 'required',
            'menu_id' => 'required',
            'table_id' => 'required',
            'quantity' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:0',
            'total' => 'required|numeric|min:0',
            'payment_type' => 'required',
        ]);

        $sale = new Sale;
        $sale->servant_id = $request->servant_id;
        $sale->quantity = $request->quantity;
        $sale->price = $request->price;
        $sale->total = $request->total;
        $sale->change = $request->change;
        $sale->payment_type = $request->payment_type;
        $sale->payment_status = $request->payment_status;
        $sale->save();
        $sale->menus()->sync($request->menu_id);
        $sale->tables()->sync($request->table_id);

        $sale->tables()->update([
            'status' => 0,
        ]);
        return redirect()->route('sales.index')->with('success', 'Sale Added Successfully');
    }
    public function edit(Sale $sale)
    {
        $categories = Category::all();
        $menus = $sale->menus()->where('sale_id', $sale)->get();
        $tables = Table::all();
        $servants = Servant::all();
        return view('sales.edit', [
            'categories' => $categories,
            'menus' => $menus,
            'tables' => $tables,
            'servants' => $servants,
            'sale' => $sale
        ]);
    }
    public function update(Request $request, Sale $sale)
    {
        $request->validate([
            'servant_id' => 'required',
            'menu_id' => 'required',
            'table_id' => 'required',
            'quantity' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:0',
            'total' => 'required|numeric|min:0',
            'payment_type' => 'required',
        ]);

        $sale->servant_id = $request->servant_id;
        $sale->quantity = $request->quantity;
        $sale->price = $request->price;
        $sale->total = $request->total;
        $sale->change = $request->change;
        $sale->payment_type = $request->payment_type;
        $sale->payment_status = $request->payment_status;
        $sale->save();
        $sale->menus()->sync($request->menu_id);
        $sale->tables()->sync($request->table_id);

        return redirect()->route('sales.index')->with('success', 'Sale Updated Successfully');
    }
    public function destroy(Sale $sale)
    {

        $sale->tables()->update([
            'status' => 1,
        ]);
        $sale->delete();
        return redirect()->route('sales.index')->with('success', 'Sale Deleted Successfully');

    }
}
