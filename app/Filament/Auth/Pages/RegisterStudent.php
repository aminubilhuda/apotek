<?php

namespace App\Filament\Auth\Pages;

use App\Models\Pengaturan;
use Filament\Auth\Pages\Register;
use Illuminate\Database\Eloquent\Model;

class RegisterStudent extends Register
{
    protected ?Model $registeredUser = null;

    protected function handleRegistration(array $data): Model
    {
        return $this->registeredUser = parent::handleRegistration($data);
    }

    protected function afterRegister(): void
    {
        $user = $this->registeredUser;
        $name = $this->data['name'] ?? 'Apotek Saya';

        Pengaturan::create([
            'key' => 'nama_aplikasi',
            'value' => $name,
            'id_user' => $user->id,
        ]);
        Pengaturan::create([
            'key' => 'alamat_toko',
            'value' => '',
            'id_user' => $user->id,
        ]);
        Pengaturan::create([
            'key' => 'no_telepon',
            'value' => '',
            'id_user' => $user->id,
        ]);
    }
}
