<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\ProcessAIRequest;

class TestAIJob extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'test:ai {message?}';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Dispatch a test AI request job to check if queue is working.';

	/**
	 * Execute the console command.
	 */
	public function handle()
	{
		$message = $this->argument('message') ?? "Hello Alfred, plan my day!";

		// Dispatch the job
		ProcessAIRequest::dispatch($message);

		$this->info("[V] Dispatched AI job with message: \"$message\"");
	}
}
