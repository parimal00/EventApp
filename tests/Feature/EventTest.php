<?php

namespace Tests\Feature;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */


    public function test_event_required_fields_validation()
    {
        $this->json('POST', 'api/v1/events', ['Accept' => 'application/json'])
            ->assertStatus(422)
            ->assertJson([
                "errors" => [
                    "title" => ["The title field is required."],
                    "description" => ["The description field is required."],
                    "start_date" => ["The start date field is required."],
                    "end_date" => ["The end date field is required."],
                ]
            ]);
    }

    public function test_start_date_before_today_returns_validation_error()
    {
        $eventData = [
            "title" => "Title",
            "description" => "Description",
            "start_date" => Carbon::yesterday(),
            "end_date" => today()
        ];
        $this->json('POST', 'api/v1/events', $eventData, ['Accept' => 'application/json'])
            ->assertStatus(422)
            ->assertJson([
                "errors" => [
                    "start_date" => ["The start date must be a date after or equal to today."],
                ]
            ]);
    }

    public function test_end_date_after_start_date_returns_validation_error()
    {
        $eventData = [
            "title" => "Title",
            "description" => "Description",
            "start_date" => Carbon::tomorrow()->format('y-m-d'),
            "end_date" => today()->format('y-m-d')
        ];
        $this->json('POST', 'api/v1/events', $eventData, ['Accept' => 'application/json'])
            ->assertStatus(422)
            ->assertJson([
                "errors" => [
                    "end_date" => ["The end date must be a date after or equal to start date."],
                ]
            ]);
    }

    public function test_event_fetches_event_collection_successfully()
    {
        $this->json('GET', 'api/v1/events/', ['Accept' => 'application/json'])
            ->assertStatus(200);
    }

    public function test_event_is_successfully_stored()
    {
        $eventData = [
            "title" => "Title",
            "description" => "Description",
            "start_date" => today()->format('y-m-d'),
            "end_date" => Carbon::tomorrow()->format('y-m-d')
        ];
        $this->json('POST', 'api/v1/events', $eventData, ['Accept' => 'application/json'])
            ->assertStatus(201)
            ->assertJsonStructure([
                "data" => [
                    'title',
                    'description',
                    'start_date',
                    'end_date',
                ],
            ]);
    }

    public function test_event_returns_404_status_for_no_id_while_fetching_single_event()
    {
        $event_id = 0;
        $this->json('GET', 'api/v1/events/' . $event_id, ['Accept' => 'application/json'])
            ->assertStatus(404);
    }

    public function test_event_fetches_single_event_successfully()
    {
        $event_id = optional(Event::first())->id;
        $this->json('GET', 'api/v1/events/' . $event_id, ['Accept' => 'application/json'])
            ->assertStatus(200);
    }

    public function test_event_returns_404_status_for_no_id_while_updating()
    {
        $event_id = 0;
        $eventData = [
            "title" => "Title",
            "description" => "Description",
            "start_date" => today()->format('y-m-d'),
            "end_date" => Carbon::tomorrow()->format('y-m-d')
        ];
        $this->json('PUT', 'api/v1/events/' . $event_id, $eventData, ['Accept' => 'application/json'])
            ->assertStatus(404);
    }

    public function test_event_is_successfully_updated()
    {
        $event_id = optional(Event::first())->id;
        $eventData = [
            "title" => "Title",
            "description" => "Description",
            "start_date" => today()->format('y-m-d'),
            "end_date" => Carbon::tomorrow()->format('y-m-d')
        ];
        $this->json('PUT', 'api/v1/events/' . $event_id, $eventData, ['Accept' => 'application/json'])
            ->assertStatus(204);
    }
}
