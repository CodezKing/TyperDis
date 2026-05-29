<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Font;
use Illuminate\Http\Request;
use App\Http\Resources\DocumentResource;

class DocumentController
{
    public function index()
    {    
    $Document = Document::with(['user','Font'])->paginate(10);
    return DocumentResource::collection($Document);
}


/**
 * Remove the specified resource from storage
 */

public function destroy(string $id)
{
    $Document = Document::findOrFail($id);
    $Document->delete();

    return response()->json(['message'=>'Document deleted successfully'], 200);
}
}