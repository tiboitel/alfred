<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ProcessAIRequest implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $userInput;

    /**
     * Create a new job instance.
     */
    public function __construct($userInput)
    {
    	$this->userInput = $userInput;   
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
	    try {

	    	$response = Http::post(env('TEXT_GEN_API_URL'), [
	    		'input' => $this->userInput,
		]);

		if ($response->failed()) {
			Log::error('AI Service Unavailable, 500');
		}

		$data = $response->json();

		Log::info('AI Response: ', $data);
	    } catch (\Exception $e) {
		    Log::error('AI Request failed: ' . $e->getMessage());
	    }

	    // Process response later (e.g. store in database etc..)
    }
}
