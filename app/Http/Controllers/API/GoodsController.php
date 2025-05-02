<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Goods;
use Illuminate\Http\Request;

use function Laravel\Prompts\error;

class GoodsController extends Controller
{
    public function index()
    {
        return Goods::paginate(request()->get('per_page', 10));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'code' => 'required|string|max:255|unique:goods,code',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:active,non-active',
            'min_stock' => 'required|integer|min:0',
        ]);

        $goods = Goods::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'code' => $request->code,
            'location' => $request->location,
            'description' => $request->description,
            'status' => $request->status,
            'min_stock' => $request->min_stock,
        ]);


        return response()->json([
            'success' => true,
            'message' => 'Goods created successfully.',
            'goods' => $goods,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $goods = Goods::findOrFail($id);
        if (!$goods) {
            return response()->json([
                'success' => false,
                'message' => 'Goods not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Goods retrieved successfully.',
            'goods' => $goods,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $goods = Goods::find($id);
        if (!$goods) {
            return response()->json([
                'success' => false,
                'message' => 'Goods not found',
            ], 404);
        }

        $goods->update($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Goods updated successfully.',
            'goods' => $goods,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $goods = Goods::find($id);
        if (!$goods) {
            return response()->json([
                'success' => false,
                'message' => 'Goods not found',
            ], 404);
        }

        $goods->delete();
        return response()->json([
            'success' => true,
            'message' => 'Goods deleted successfully.',
        ]);
    }
}
