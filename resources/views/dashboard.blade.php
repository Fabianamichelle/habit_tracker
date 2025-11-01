<x-layouts.app :title="__('Dashboard')">
    <div 
        x-data="{ visible: false, tab: 'habits' }"
        x-init="setTimeout(() => visible = true, 100)"
        x-show="visible"
        x-transition:enter="transition transform ease-out duration-700"
        x-transition:enter-start="opacity-0 scale-50 rotate-6"
        x-transition:enter-end="opacity-100 scale-100 rotate-0"
        class="flex flex-col flex-1 gap-6 p-6 rounded-xl"
    >
        
        <!-- Top section -->
        <div class="text-center text-white space-y-2">
            <h1 class="text-3xl font-bold">Welcome Back!</h1>
            <p class="text-sm text-gray-400">Track your progress and build your streaks</p>
        </div>

        <!-- Navigation Tabs -->
        <div class="flex justify-center gap-4">
            <button 
                @click="tab = 'habits'" 
                :class="tab === 'habits' ? 'bg-purple-600 text-white' : 'bg-zinc-700 text-gray-300'"
                class="px-6 py-2 rounded-lg font-semibold transition">
                Habits
            </button>
            <button 
                @click="tab = 'weekly'" 
                :class="tab === 'weekly' ? 'bg-purple-600 text-white' : 'bg-zinc-700 text-gray-300'"
                class="px-6 py-2 rounded-lg font-semibold transition">
                Weekly
            </button>
            <button 
                @click="tab = 'shop'" 
                :class="tab === 'shop' ? 'bg-purple-600 text-white' : 'bg-zinc-700 text-gray-300'"
                class="px-6 py-2 rounded-lg font-semibold transition">
                Shop
            </button>
        </div>

        <!-- Tab Content Area -->
        <div class="flex-1">
            <!-- Habits Section -->
            <div x-show="tab === 'habits'" x-transition>
                <livewire:habits-list />
            </div>

            <!-- Weekly Section -->
            <div x-show="tab === 'weekly'" x-transition>
                <div class="p-6 text-center text-gray-300">
                    <p class="text-lg">Weekly progress charts coming soon 📈</p>
                </div>
            </div>

            <!-- Shop Section -->
            <div x-show="tab === 'shop'" x-transition>
                <div class="p-6 text-center text-gray-300">
                    <p class="text-lg">Unlock themes and badges coming soon 🛍️</p>
                </div>
            </div>
        </div>
</x-layouts.app>

