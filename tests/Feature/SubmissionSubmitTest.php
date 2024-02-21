<?php

namespace Tests\Feature;

use App\Jobs\SaveSubmission;
use Illuminate\Support\Facades\Bus;
use Tests\TestCase;

class SubmissionSubmitTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testUserCanSubmitSubmission(): void
    {
        Bus::fake();

        $response = $this->postJson('/api/submit', [
            'name' => 'John',
            'email' => 'john@example.com',
            'message' => 'Test message']
        );

        $response->assertStatus(200);

        Bus::assertDispatched(SaveSubmission::class);
    }
}
