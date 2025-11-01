<?php

namespace App\Livewire;
use Livewire\Component;
use App\Models\Habit;

class HabitsList extends Component
{
    public $name;
    public $description;
    
    protected $rules = [
        'name' => 'required|min:3',
        'description' => 'nullable'
    ];

    public function saveHabit()
    {
        logger('saveHabit called', ['name' => $this->name, 'description' => $this->description]);
        $this->validate();
        
        Habit::create([
            'name' => $this->name,
            'description' => $this->description,
            'logged_for' => now(),
            // allow creating habits without authentication
            'user_id' => auth()->id() ?? null,
        ]);
        
        $this->reset(['name', 'description']);
        session()->flash('message', 'Habit created successfully!');
        // Livewire will re-render automatically; keep message for feedback
    }

    public function toggleComplete($habitId)
    {
        $habit = Habit::findOrFail($habitId);
        $habit->completed = !$habit->completed;
        $habit->save();
    }

    public function render()
    {
        return view('livewire.habits-list', [
            'habits' => Habit::latest()->get()
        ]);
    }
}