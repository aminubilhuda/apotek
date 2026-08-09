<?php

namespace Tests\Feature;

use App\Models\TransaksiPenjualan;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NotaAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_only_owner_can_print_nota(): void
    {
        $siswaA = User::factory()->create(['role' => 'siswa']);
        $siswaB = User::factory()->create(['role' => 'siswa']);

        $transaksi = TransaksiPenjualan::withoutGlobalScope('userScope')->create([
            'id_user' => $siswaA->id,
            'tanggal_transaksi' => now(),
            'total_harga' => 10000,
        ]);

        $this->actingAs($siswaB)
            ->get(route('transaksi.cetak-nota', $transaksi))
            ->assertStatus(404);

        $this->actingAs($siswaA)
            ->get(route('transaksi.cetak-nota', $transaksi))
            ->assertStatus(200)
            ->assertSee('Rp');
    }

    public function test_guest_cannot_print_nota(): void
    {
        $transaksi = TransaksiPenjualan::withoutGlobalScope('userScope')->create([
            'tanggal_transaksi' => now(),
            'total_harga' => 10000,
        ]);

        $this->get(route('transaksi.cetak-nota', $transaksi))->assertRedirect();

        $this->assertGuest();
    }

    public function test_admin_can_print_any_student_nota(): void
    {
        $siswaA = User::factory()->create(['role' => 'siswa']);
        $admin = User::factory()->create(['role' => 'admin']);

        $transaksi = TransaksiPenjualan::withoutGlobalScope('userScope')->create([
            'id_user' => $siswaA->id,
            'tanggal_transaksi' => now(),
            'total_harga' => 5000,
        ]);

        $this->actingAs($admin)
            ->get(route('transaksi.cetak-nota', $transaksi))
            ->assertStatus(200);
    }

    public function test_nota_shows_owners_store_name(): void
    {
        $siswaA = User::factory()->create(['role' => 'siswa', 'name' => 'Toko Siti']);

        $this->actingAs($siswaA);

        \App\Models\Pengaturan::create([
            'key' => 'nama_aplikasi',
            'value' => 'Apotek Siti Sehat',
        ]);

        $transaksi = TransaksiPenjualan::create([
            'tanggal_transaksi' => now(),
            'total_harga' => 20000,
        ]);

        $this->get(route('transaksi.cetak-nota', $transaksi))
            ->assertStatus(200)
            ->assertSee('Apotek Siti Sehat');
    }
}
