<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Mutation;
use Illuminate\Http\Request;

use function Laravel\Prompts\error;

class MutationController extends Controller
{
    public function index()
    {
        return Mutation::paginate(request()->get('per_page', 10));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'type' => 'required',
            'quantity' => 'required|integer|min:1',
            'goods_id' => 'required|exists:goods,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $mutation = Mutation::create([
            'date' => $request->date,
            'type' => $request->type,
            'quantity' => $request->quantity,
            'goods_id' => $request->goods_id,
            'user_id' => $request->user_id,
        ]);


        return response()->json([
            'success' => true,
            'message' => 'Mutation created successfully.',
            'mutation' => $mutation,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mutation = Mutation::findOrFail($id);
        if (!$mutation) {
            return error('Mutation not found', 404);
        }
        return response()->json([
            'success' => true,
            'message' => 'Mutation retrieved successfully.',
            'mutation' => $mutation,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mutation = Mutation::find($id);
        if (!$mutation) {
            return error('Mutation not found', 404);
        }

        $mutation->update($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Mutation updated successfully.',
            'mutation' => $mutation,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mutation = Mutation::find($id);
        if (!$mutation) {
            return error('Mutation not found', 404);
        }

        $mutation->delete();
        return response()->json([
            'success' => true,
            'message' => 'Mutation deleted successfully.',
        ]);
    }
}
