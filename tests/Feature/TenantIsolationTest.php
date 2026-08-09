<?php

namespace Tests\Feature;

use App\Models\Obat;
use App\Models\Pembelian;
use App\Models\TransaksiPenjualan;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TenantIsolationTest extends TestCase
{
    use RefreshDatabase;

    public function test_students_only_see_their_own_data(): void
    {
        $siswaA = User::factory()->create(['role' => 'siswa']);
        $siswaB = User::factory()->create(['role' => 'siswa']);

        $this->actingAs($siswaA);
        Obat::create([
            'kode_obat' => 'PCT001',
            'nama_obat' => 'Paracetamol A',
        ]);

        $this->actingAs($siswaB);
        Obat::create([
            'kode_obat' => 'PCT001',
            'nama_obat' => 'Paracetamol B',
        ]);

        $this->assertDatabaseHas('obat', ['id_user' => $siswaA->id, 'kode_obat' => 'PCT001']);
        $this->assertDatabaseHas('obat', ['id_user' => $siswaB->id, 'kode_obat' => 'PCT001']);

        $this->assertSame(1, Obat::count());
        $this->assertSame('Paracetamol B', Obat::first()->nama_obat);

        $this->actingAs($siswaA);
        $this->assertSame(1, Obat::count());
        $this->assertSame('Paracetamol A', Obat::first()->nama_obat);
    }

    public function test_same_kode_obat_allowed_between_students(): void
    {
        $siswaA = User::factory()->create(['role' => 'siswa']);
        $siswaB = User::factory()->create(['role' => 'siswa']);

        $this->actingAs($siswaA);
        Obat::create(['kode_obat' => 'PCT001', 'nama_obat' => 'Obat A']);

        $this->actingAs($siswaB);
        Obat::create(['kode_obat' => 'PCT001', 'nama_obat' => 'Obat B']);

        $this->assertDatabaseCount('obat', 2);
    }

    public function test_header_models_are_scoped_to_owner(): void
    {
        $siswaA = User::factory()->create(['role' => 'siswa']);
        $siswaB = User::factory()->create(['role' => 'siswa']);

        $this->actingAs($siswaA);
        TransaksiPenjualan::create(['tanggal_transaksi' => now(), 'total_harga' => 1000]);
        Pembelian::create(['tanggal_pembelian' => now(), 'total_harga' => 500]);

        $this->actingAs($siswaB);
        $this->assertSame(0, TransaksiPenjualan::count());
        $this->assertSame(0, Pembelian::count());

        $this->actingAs($siswaA);
        $this->assertSame(1, TransaksiPenjualan::count());
        $this->assertSame(1, Pembelian::count());
    }

    public function test_admin_sees_all_students_data(): void
    {
        $siswaA = User::factory()->create(['role' => 'siswa']);
        $admin = User::factory()->create(['role' => 'admin']);

        $this->actingAs($siswaA);
        Obat::create(['kode_obat' => 'A001', 'nama_obat' => 'Obat A']);

        $this->actingAs($admin);

        $this->assertSame(1, Obat::count());
        $this->assertSame('Obat A', Obat::first()->nama_obat);
    }

    public function test_unauthenticated_queries_are_not_scoped(): void
    {
        $siswaA = User::factory()->create(['role' => 'siswa']);
        $siswaB = User::factory()->create(['role' => 'siswa']);

        $this->actingAs($siswaA);
        Obat::create(['kode_obat' => 'A1', 'nama_obat' => 'Obat A']);

        $this->actingAs($siswaB);
        Obat::create(['kode_obat' => 'B1', 'nama_obat' => 'Obat B']);

        auth()->logout();

        $this->assertSame(2, Obat::count());
    }
}
