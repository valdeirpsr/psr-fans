<?php

use App\Models\User;
use Illuminate\Database\UniqueConstraintViolationException;

use function Pest\Laravel\assertDatabaseMissing;

it('O CPF não poderá ser alterado após o cadastro', function () {
    $user = User::factory()->createQuietly();

    /* Tenta alterar o CPF */
    $user->cpf = '12345678909';
    $user->save();

    assertDatabaseMissing('users', [
       'cpf' =>'12345678909',
    ]);
});

it('O cpf deve ser único', function () {
    $user = User::factory()->createQuietly();

    User::factory()->createQuietly([
        'cpf' => $user->cpf,
    ]);

})->throws(UniqueConstraintViolationException::class);
