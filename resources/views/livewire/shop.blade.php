<div class="space-y-6">
    <div class="text-center mb-6">
        <h2 class="text-2xl font-press text-ut-orange mb-2">Shop 🛍️</h2>
        <p class="text-sm text-periwinkle">You have <span class="font-bold text-cornflower-blue">{{ $userCoins }}</span> coins</p>
    </div>

    @if (session()->has('success'))
        <div class="bg-green-900/50 border border-green-500 text-green-200 px-4 py-3 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="bg-red-900/50 border border-red-500 text-red-200 px-4 py-3 rounded-lg mb-4">
            {{ session('error') }}
        </div>
    @endif

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($rewards as $reward)
            <div class="bg-persian-indigo/60 border border-cornflower-blue/40 rounded-xl p-4 hover:bg-persian-indigo/80 transition relative">
                
                @if (in_array($reward->id, $ownedRewardIds))
                    <div class="absolute top-2 right-2 bg-green-600 text-white text-xs px-2 py-1 rounded-full font-bold">
                        ✓ Owned
                    </div>
                @endif

                <div class="text-center mb-3">
                    <span class="text-4xl">{{ $reward->type === 'badge' ? $reward->value : '🎨' }}</span>
                </div>

                <h3 class="font-press text-sm text-anti-flash-white mb-2">{{ $reward->name }}</h3>
                <p class="text-xs text-periwinkle mb-3">{{ $reward->description }}</p>

                <div class="flex justify-between items-center">
                    <span class="text-sm font-bold text-cornflower-blue">{{ $reward->cost }} 💰</span>
                    
                    @if (in_array($reward->id, $ownedRewardIds))
                        <button disabled class="bg-zinc-700 text-zinc-400 px-3 py-1 rounded text-xs cursor-not-allowed">
                            Purchased
                        </button>
                    @elseif ($userCoins >= $reward->cost)
                        <button 
                            wire:click="purchase({{ $reward->id }})"
                            class="bg-ut-orange hover:bg-ut-orange/80 text-white px-3 py-1 rounded text-xs font-bold transition">
                            Buy
                        </button>
                    @else
                        <button disabled class="bg-zinc-700 text-zinc-400 px-3 py-1 rounded text-xs cursor-not-allowed">
                            Not enough
                        </button>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
