<x-layouts.app :title="__('Dashboard')">
    <div 
        x-data="{ visible: false, tab: 'habits' }"
        x-init="setTimeout(() => visible = true, 100)"
        x-show="visible"
        x-transition:enter="transition transform ease-out duration-700"
        x-transition:enter-start="opacity-0 scale-50 rotate-6"
        x-transition:enter-end="opacity-100 scale-100 rotate-0"
       class="flex flex-col flex-1 gap-8 p-8 rounded-2xl bg-gradient-to-br from-persian_indigo via-cornflower_blue to-periwinkle text-anti_flash_white font-sans shadow-glow transition-all duration-700"

        <!-- Welcome Message -->
        @auth
        <div 
            x-data="{ show: true }" 
            x-show="show" 
            x-init="setTimeout(() => show = false, 05000)" 
        >
            <h2 class="text-center text-purple-400 mb-4">
            Welcome back, {{ auth()->user()->name }}! 🌸
            </h2>
        </div>
        @endauth

        <! Streak Section -->
        @auth
        <div
            class="flex justify-center gap-6 text-xs font-press tracking-widest mt-2">
            <span class="text-ut-orange">🔥 Streak: {{ auth()->user()->current_streak ?? 0 }}</span>
            <span class="text-cornflower-blue">⭐ XP: {{ auth()->user()->xp_points ?? 0 }}</span>
            <span class="text-periwinkle">💰 Coins: {{ auth()->user()->coins ?? 0 }}</span>
        </div>
        @endauth


        <!-- Top section -->
        <div class="text-center text-anti_flash_white space-y-3 font-press">
            <h1 class="text-lg text-ut_orange tracking-widest drop-shadow-md">Habit Tracker ✨</h1>
            <p class="text-xs text-periwinkle font-sans">
                Track your progress, earn XP, and keep your streak alive 🌟
            </p>
        </div>


        <!-- Navigation Tabs -->
    <div class="relative z-20 flex justify-center gap-4 bg-transparent backdrop-blur-md p-2 rounded-xl">
    <button 
        @click="tab = 'habits'"
        :class="tab === 'habits'
            ? 'bg-ut-orange !bg-ut-orange text-anti-flash-white shadow-glow'
            : 'bg-persian-indigo text-periwinkle hover:bg-cornflower-blue transition'"
            :hover="tab !== current && 'scale-105 shadow-glow'"
        class="px-6 py-3 rounded-lg font-press text-xs uppercase tracking-widest transition-all duration-300"
    >
        Habits
    </button>

    <button 
        @click="tab = 'weekly'"
        :class="tab === 'weekly'
            ? 'bg-ut-orange !bg-ut-orange text-anti-flash-white shadow-glow'
            : 'bg-persian-indigo text-periwinkle hover:bg-cornflower-blue transition'"
            :hover="tab !== current && 'scale-105 shadow-glow'"
        class="px-6 py-3 rounded-lg font-press text-xs uppercase tracking-widest transition-all duration-300"
    >
        Weekly
    </button>

    <button 
        @click="tab = 'shop'"
        :class="tab === 'shop'
            ? 'bg-ut-orange !bg-ut-orange text-anti-flash-white shadow-glow'
            : 'bg-persian-indigo text-periwinkle hover:bg-cornflower-blue transition'"
            :hover="tab !== current && 'scale-105 shadow-glow'"
        class="px-6 py-3 rounded-lg font-press text-xs uppercase tracking-widest transition-all duration-300"
    >
        Shop
    </button>
    </div>



        <!-- Tab Content Area -->
    <div class="flex-1 mt-6">
       <div class="bg-zinc-900/60 backdrop-blur-md border border-zinc-700 rounded-2xl p-6 shadow-glow">
        <!--Habit tab content -->
        <div x-show="tab === 'habits'" x-transition>
        <livewire:habits-list />
        </div>

        <!-- Weekly tab content -->
        <div x-show="tab === 'weekly'" x-transition>
        <p class="text-center text-periwinkle text-sm">Weekly progress charts coming soon 📈</p>
        </div>

        <!-- Shop tab content -->
        <div x-show="tab === 'shop'" x-transition>
        <p class="text-center text-periwinkle text-sm">Unlock themes and badges coming soon 🛍️</p>
        </div>
    </div>
</div>

<div class="fixed inset-0 z-0 pointer-events-none">
  <div class="absolute top-1/3 left-1/4 w-4 h-4 bg-periwinkle opacity-80 rounded-full"></div>
  <div class="absolute bottom-1/3 right-1/3 w-6 h-6 bg-cornflower-blue opacity-80 rounded-full"></div>
</div>
</x-layouts.app>

