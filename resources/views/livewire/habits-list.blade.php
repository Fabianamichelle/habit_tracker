<div class="space-y-6">

    <!-- Habit Form -->
    <div class="p-4 bg-zinc-900 rounded-xl border border-zinc-700">
        <form wire:submit.prevent="saveHabit" class="space-y-4">
            <div>
                <label class="block text-sm text-gray-300 mb-1">Habit Name</label>
                <input wire:model="name" type="text" class="w-full px-3 py-2 rounded-lg bg-zinc-800 border border-zinc-700 text-white" placeholder="e.g. Meditate">
                @error('name') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm text-gray-300 mb-1">Description</label>
                <textarea wire:model="description" rows="2" class="w-full px-3 py-2 rounded-lg bg-zinc-800 border border-zinc-700 text-white" placeholder="Optional notes"></textarea>
            </div>

            <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg font-semibold">
                Add Habit
            </button>
        </form>

        @if (session()->has('message'))
            <p class="text-green-400 text-sm mt-3">{{ session('message') }}</p>
        @endif
    </div>

    <!-- Habit List -->
    <div class="space-y-4">
       @forelse ($habits as $habit)
    <div class="p-4 bg-zinc-800 border border-zinc-700 rounded-xl text-white">
        @if ($editingHabitId === $habit->id)
            <!-- Edit Form -->
            <input 
                wire:model="editName" 
                type="text" 
                class="w-full mb-2 px-3 py-2 rounded bg-zinc-900 border border-zinc-700"
                placeholder="Habit name"
            >
            <textarea 
                wire:model="editDescription" 
                rows="2" 
                class="w-full mb-2 px-3 py-2 rounded bg-zinc-900 border border-zinc-700"
                placeholder="Description">
            </textarea>

            <div class="flex gap-2">
                <button wire:click="updateHabit" class="bg-purple-300 hover:bg-purple-700 text-white px-3 py-1 rounded">Save</button>
                <button wire:click="$set('editingHabitId', null)" class="bg-gray-600 hover:bg-gray-700 text-white px-3 py-1 rounded">Cancel</button>
            </div>
        @else
            <!-- Normal View -->
            <div class="bg-persian-indigo/60 hover:bg-persian-indigo/80 border border-cornflower-blue/40 
            rounded-xl p-4 shadow-glow transition-all duration-300">
            <h2 class="text-lg font-semibold">{{ $habit->name }}</h2>
            <p class="text-sm text-gray-400">{{ $habit->description ?? 'No description' }}</p>

            <div class="flex gap-2 mt-2">
                <button wire:click="toggleComplete({{ $habit->id }})" class="text-xs px-3 py-1 rounded-md border border-purple-500 text-purple-300 hover:bg-purple-600 hover:text-white transition">
                    {{ $habit->completed ? 'Undo' : 'Mark Complete' }}
                </button>
                <button wire:click="editHabit({{ $habit->id }})" class="text-xs px-3 py-1 rounded-md border border-purple-400 text-purple-300 hover:bg-purple-600 hover:text-white transition">
                    Edit
                </button>
                <button wire:click="deleteHabit({{ $habit->id }})" class="text-xs px-3 py-1 rounded-md border border-purple-300 text-purple-300 hover:bg-purple-600 hover:text-white transition">
                    Delete
                </button>
            </div>
            </div>
        @endif
    </div>
@empty
    <p class="text-gray-400">No habits found.</p>
@endforelse

    </div>
</div>


