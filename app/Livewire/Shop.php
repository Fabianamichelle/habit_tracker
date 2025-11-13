<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Reward;

class Shop extends Component
{
    public $userCoins;
    public $ownedRewardIds = [];

    public function mount()
    {
        $this->loadUserData();
    }

    public function loadUserData()
    {
        $user = auth()->user()->fresh();
        $this->userCoins = $user->coins ?? 0;
        $this->ownedRewardIds = $user->rewards->pluck('id')->toArray();
    }

    public function purchase($rewardId)
    {
        $reward = Reward::find($rewardId);
        $user = auth()->user();

        // Check if already owned
        if ($user->rewards->contains($rewardId)) {
            session()->flash('error', 'You already own this item!');
            return;
        }

        // Check if enough coins
        if ($user->coins < $reward->cost) {
            session()->flash('error', 'Not enough coins!');
            return;
        }

        // Deduct coins and attach reward
        $user->coins -= $reward->cost;
        $user->save();
        $user->rewards()->attach($rewardId, ['purchased_at' => now()]);

        session()->flash('success', "You purchased {$reward->name}! 🎉");

        // Refresh data
        $this->loadUserData();
        $this->dispatch('stats-updated'); // Update coins display
    }

    public function render()
    {
        $rewards = Reward::all();
        return view('livewire.shop', ['rewards' => $rewards]);
    }
}