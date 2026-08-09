<?php

namespace Tests\Feature;

use App\Filament\Auth\Pages\RegisterStudent;
use App\Models\Pengaturan;
use App\Models\User;
use Filament\Facades\Filament;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Filament::setCurrentPanel('admin');
    }

    public function test_student_can_register_and_store_settings_are_created(): void
    {
        Livewire::test(RegisterStudent::class)
            ->fillForm([
                'name' => 'Siswa Satu',
                'email' => 'siswa1@example.com',
                'password' => 'password123',
                'passwordConfirmation' => 'password123',
            ])
            ->call('register')
            ->assertHasNoErrors();

        $user = User::where('email', 'siswa1@example.com')->first();

        $this->assertNotNull($user);
        $this->assertSame('siswa', $user->role);

        $this->assertDatabaseHas('pengaturan', [
            'id_user' => $user->id,
            'key' => 'nama_aplikasi',
            'value' => 'Siswa Satu',
        ]);
        $this->assertDatabaseHas('pengaturan', [
            'id_user' => $user->id,
            'key' => 'alamat_toko',
        ]);
        $this->assertDatabaseHas('pengaturan', [
            'id_user' => $user->id,
            'key' => 'no_telepon',
        ]);

        $this->assertAuthenticatedAs($user);
    }

    public function test_register_page_is_accessible(): void
    {
        $this->get('/admin/register')->assertStatus(200);
    }

    public function test_pengaturan_created_per_user(): void
    {
        $user = User::factory()->create(['role' => 'siswa']);

        $this->actingAs($user);

        Pengaturan::create(['key' => 'nama_aplikasi', 'value' => 'Toko B']);

        $this->assertDatabaseHas('pengaturan', [
            'id_user' => $user->id,
            'key' => 'nama_aplikasi',
            'value' => 'Toko B',
        ]);
    }
}
