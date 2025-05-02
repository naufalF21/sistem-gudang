<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Stock;
use Illuminate\Http\Request;

use function Laravel\Prompts\error;

class StockController extends Controller
{
    public function index()
    {
        return Stock::paginate(request()->get('per_page', 10));
    }

    public function store(Request $request)
    {
        $request->validate([
            'goods_id' => 'required|exists:goods,id',
            'quantity' => 'required|integer|min:0',
        ]);

        $stock = Stock::create([
            'goods_id' => $request->goods_id,
            'quantity' => $request->quantity,
        ]);


        return response()->json([
            'success' => true,
            'message' => 'Stock created successfully.',
            'stock' => $stock,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $stock = Stock::findOrFail($id);
        if (!$stock) {
            return response()->json([
                'success' => false,
                'message' => 'Stock not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Stock retrieved successfully.',
            'stock' => $stock,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $stock = Stock::find($id);
        if (!$stock) {
            return response()->json([
                'success' => false,
                'message' => 'Stock not found',
            ], 404);
        }

        $stock->update($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Stock updated successfully.',
            'stock' => $stock,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stock = Stock::find($id);
        if (!$stock) {
            return response()->json([
                'success' => false,
                'message' => 'Stock not found',
            ], 404);
        }

        $stock->delete();
        return response()->json([
            'success' => true,
            'message' => 'Stock deleted successfully.',
        ]);
    }
}
