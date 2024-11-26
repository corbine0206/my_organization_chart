<?php

namespace App\Http\Controllers;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Position::with('head', 'subordinates');

        if ($request->filled('search')) {
            $query->where('position_name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('reports_to')) {
            $query->where('reports_to', $request->reports_to);
        }

        if ($request->filled('sort')) {
            $sortOrder = $request->sort === 'desc' ? 'desc' : 'asc';
            $query->orderBy('position_name', $sortOrder);
        }

        // Execute the query and get the results
        $positions = $query->get();

        // Return the positions as a JSON response
        return response()->json($positions);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'position_name' => 'required|unique:positions',
            'reports_to' => 'nullable|exists:positions,id',
        ]);

        $position = Position::create($request->only(['position_name', 'reports_to']));

        return response()->json($position, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Position $position)
    {
        return response()->json($position->load('head', 'subordinates'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Position $position)
    {
        $request->validate([
            'position_name' => 'required|unique:positions,position_name,' . $position->id,
            'reports_to' => 'nullable|exists:positions,id',
        ]);

        $position->update($request->only(['position_name', 'reports_to']));

        return response()->json($position);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Position $position)
    {
        // Check if the position exists
        if (!$position) {
            // Return a custom error message if the position doesn't exist
            return response()->json(['message' => 'Position not found'], Response::HTTP_NOT_FOUND);
        }

        // Delete the position
        $position->delete();

        // Return success message after deletion
        return response()->json(['message' => 'Position deleted successfully'], Response::HTTP_NO_CONTENT);
    }

}
