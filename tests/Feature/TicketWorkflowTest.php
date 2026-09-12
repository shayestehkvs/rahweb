<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class TicketWorkflowTest extends TestCase
{
    use RefreshDatabase;

    public function test_ticket_can_be_created(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->post('/api/tickets', [
                'title' => 'Test Ticket',
                'description' => 'Test Description',
                'attachment' => UploadedFile::fake()->create(
                    'test.pdf',
                    100,
                    'application/pdf'
                ),
            ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('tickets', [
            'title' => 'Test Ticket',
            'description' => 'Test Description',
            'user_id' => $user->id,
        ]);
    }
}
