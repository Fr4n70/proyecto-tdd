<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Event;
use Carbon\Carbon;

class ReadEventTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_can_display_list_of_events(): void
    {
       //Arrange
        Event::create([
            'name' => 'Evento 1',
            'featured' => 'meme.png',
            'date' => Carbon::now(),
            'time' => '12:00:00',
            'location' => 'EL SANTIAGO BERNABEU'
        ]);

        Event::create([
            'name' => 'Evento 2',
            'featured' => 'meme.png',
            'date' => Carbon::now(),
            'time' => '12:00:00',
            'location' => 'EL SANTIAGO BERNABEU'
        ]);

        //Act
        $response = $this->get('/events');

        //Assert
        $response->assertStatus(200);
 
        $response->assertSee('Evento 1');
        $response->assertSee('Evento 2');  
    }
}
