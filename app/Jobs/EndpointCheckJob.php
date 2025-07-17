<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\{ Endpoint };
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

class EndpointCheckJob implements ShouldQueue
{
    use Queueable;

    public function __construct(public Endpoint $endpoint) {

    }

    public function handle(): void
    {
        $url = $this->endpoint->url();
        
        $response = Http::get($url);

        $this->endpoint->checks()->create([
            'status_code'   => $response->status(),
            'response_body' => $this->responseBody($response)
        ]);

        $this->endpoint->update([
            'next_check' => $this->nextCheck(),
        ]);
    }

    private function nextCheck(): string
    {
        return now()->addMinutes($this->endpoint->frequency);
    }

    private function responseBody(Response $response): string|null
    {
        return $response->successful()
            ? null
            : (string) $response->body()
        ;
    }
}
