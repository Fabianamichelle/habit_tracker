<div class= "flex justify-center gap-6 text-xs font-press tracking-widest mt-2">
    <span class="text-ut-orange">🔥 Streak: {{ auth()->user()->current_streak ?? 0 }}</span>
    <span class="text-cornflower-blue">⭐ XP: {{ auth()->user()->xp ?? 0 }}</span>
    <span class="text-periwinkle">💰 Coins: {{ auth()->user()->coins ?? 0 }}</span>
</div>