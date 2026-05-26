<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Carbon\Carbon;
use App\Models\Event;

class UpdateEventTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */

    protected $event;

    public function setUp(): void
    {
        parent::setUp();

        //crear evento
        $this->event = Event::create([
            'name' => 'Evento actializado',
            'featured' => 'evento3.png',
            'date' => Carbon::now(),
            'time' => '12:00:00',
            'location' => 'Ubicación sin actualizar'
        ]);
    }

    public function test_example(): void
    {
        //Arrange
        $updatedData = [
            'name' => 'Evento actualizado',
            
        ];

        //Act
        $response = $this->put('/events/' . $this->event->id, $updatedData);

        //Assert
        $response->assertStatus(200);
        $this->assertDatabaseHas('events', $updatedData);
    }
}
