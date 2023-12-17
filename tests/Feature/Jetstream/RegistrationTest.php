<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Session;
use Laravel\Fortify\Features;
use Laravel\Jetstream\Jetstream;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered(): void
    {
        if (! Features::enabled(Features::registration())) {
            $this->markTestSkipped('Registration support is not enabled.');

            return;
        }

        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_registration_screen_cannot_be_rendered_if_support_is_disabled(): void
    {
        if (Features::enabled(Features::registration())) {
            $this->markTestSkipped('Registration support is enabled.');

            return;
        }

        $response = $this->get('/register');

        $response->assertStatus(404);
    }

    public function test_new_users_can_register(): void
    {
        if (! Features::enabled(Features::registration())) {
            $this->markTestSkipped('Registration support is not enabled.');

            return;
        }

        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature(),
            'birthdate' => now()->subYears(18),
            'cpf' => '12345678909',
        ]);

        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', [
            'birthdate' => now()->subYears(18)->format('Y-m-d'),
            'cpf' => '12345678909',
        ]);

        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_only_adult_can_register(): void
    {
        if (! Features::enabled(Features::registration())) {
            $this->markTestSkipped('Registration support is not enabled.');

            return;
        }

        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature(),
            'birthdate' => now()->subYears(10),
            'cpf' => '12345678909',
        ]);

        $response->assertRedirect();
    }

    public function test_cpf_must_only_numbers(): void
    {
        if (! Features::enabled(Features::registration())) {
            $this->markTestSkipped('Registration support is not enabled.');

            return;
        }

        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature(),
            'birthdate' => now()->subYears(18),
            'cpf' => '123.456.789-09',
        ]);

        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', [
            'birthdate' => now()->subYears(18)->format('Y-m-d'),
            'cpf' => '12345678909',
        ]);
    }

    public function test_cpf_must_be_unique(): void
    {
        if (! Features::enabled(Features::registration())) {
            $this->markTestSkipped('Registration support is not enabled.');

            return;
        }

        User::factory()->create([
            'cpf' => '12345678909',
        ]);

        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature(),
            'birthdate' => now()->subYears(18),
            'cpf' => '123.456.789-09',
        ]);

        $response->assertInvalid('cpf');
    }

    public function test_if_there_plan_session_then_redirect_to_payment(): void
    {
        Session::put('plan', 1);

        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature(),
            'birthdate' => now()->subYears(18),
            'cpf' => '12345678909',
        ]);

        $response->assertRedirectToRoute('subscription.store');
    }
}
