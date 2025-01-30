<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\ProcessAIRequest;
use Illuminate\Support\Facades\Http;

class AIController extends Controller
{
    public function askAlfred(Request $request)
    {
        // Validate request
        $request->validate([
            'input' => 'required|string',
        ]);

        // Get user message
        $userMessage = $request->input('input');

        // Dispatch job to process AI request asynchronously
        ProcessAIRequest::dispatch($userMessage);

        return response()->json(['message' => 'Your request is being processed by Alfred.'], 202);
    }
}
