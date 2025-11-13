<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class StatsHeader extends Component
{
    public $xp;
    public $coins;
    public $streak;

    public function mount()
    {
        $this->loadStats();
    }

    #[On('stats-updated')]
    public function loadStats()
    {
        logger('StatsHeader: loadStats() called');
        $user = auth()->user();
        $this->xp = $user->xp;
        $this->coins = $user->coins;
        $this->streak = $user->current_streak;
    }

    public function render()
    {
        return view('livewire.stats-header');
    }
}