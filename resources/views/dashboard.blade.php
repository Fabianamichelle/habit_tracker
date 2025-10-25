<x-layouts.app :title="__('Dashboard')">
    <div 
        x-data="{ visible: false }" 
        x-init="setTimeout(() => visible = true, 100)" 
        x-show="visible" 
        x-transition:enter="transition transform ease-out duration-700"
        x-transition:enter-start="opacity-0 scale-50 rotate-6"
        x-transition:enter-end="opacity-100 scale-100 rotate-0"
        class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl"
    >
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
    <div class="twinkle absolute inset-0 bg-[radial-gradient(white,transparent_70%)] opacity-40"></div></div>

        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
        </div>

        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
        </div>
    </div>
</x-layouts.app>
