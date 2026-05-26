<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Event;   
use Carbon\Carbon;

class DeleteEventTest extends TestCase
{
    use RefreshDatabase;

    public function test_delete_event(): void
    {
        //Arrange
        $event = Event::create([
            'name' => 'Conferencia de YouDevs',
            'featured' => 'meme.png',
            'date' => Carbon::now(),
            'time' => '12:00:00',
            'location' => 'YouDevslandia'
        ]);

        //Act
        $response = $this->delete('/events/' . $event->id);

        //Assert
        $response->assertStatus(204);
        $this->assertDatabaseMissing('events', ['id' => $event->id]);
    }
}