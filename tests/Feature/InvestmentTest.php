<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Wallet; 
use App\Models\Project; 
use App\Models\Investment; 
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InvestmentTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_view_investment_form()
    {
        // Create an investor user and a project
        $user = User::factory()->create(['role' => 'investor']);
        $project = Project::factory()->create(); // Create a project for investment

        $response = $this->actingAs($user)->get("/investor/project/{$project->id}"); // URL to view project

        $response->assertStatus(200);
    }

    public function test_authenticated_user_can_make_investment()
    {
        // Create an investor user and set up wallet
        $user = User::factory()->create(['role' => 'investor']);
        $user->wallet()->save(new Wallet(['balance' => 5000])); // Assuming you have a Wallet model
        
        // Create a project for investment
        $project = Project::factory()->create(['current_amount' => 0]);

        $response = $this->actingAs($user)->post("/investor/project/{$project->id}", [
            'amount' => 1000,
            'type' => 'stocks', // Assuming type is required but not used in the controller
        ]);

        $response->assertRedirect(route('investor.project', $project->id));
        $this->assertDatabaseHas('investments', [
            'user_id' => $user->id,
            'project_id' => $project->id,
            'amount' => 1000,
        ]);
        $this->assertEquals(4000, $user->wallet->refresh()->balance); // Check if wallet balance is updated
        $this->assertEquals(1000, $project->refresh()->current_amount); // Check if project amount is updated
    }

    public function test_unauthenticated_user_cannot_make_investment()
    {
        // Create a project for investment
        $project = Project::factory()->create();

        $response = $this->post("/investor/project/{$project->id}", [
            'amount' => 1000,
            'type' => 'stocks',
        ]);

        $response->assertRedirect('/login');
    }
}