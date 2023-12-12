<?php

use App\Livewire\SubscribeModal;
use Livewire\Livewire;

test('renders successfully', function () {
    Livewire::test(SubscribeModal::class)
        ->assertStatus(200);
});
