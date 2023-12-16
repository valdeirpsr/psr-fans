<?php

use App\Models\Subscription;

use Illuminate\Foundation\Testing\RefreshDatabase;
use function PHPUnit\Framework\assertEquals;

uses(RefreshDatabase::class);

test('Valida o scopo NotExpired', function () {
    Subscription::factory()->expired()->createOneQuietly();
    Subscription::factory()->createOneQuietly();

    $count = Subscription::notExpired()->count();

    assertEquals(1, $count);
});
