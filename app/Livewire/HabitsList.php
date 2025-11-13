<?php

namespace App\Livewire;
use Livewire\Component;
use App\Models\Habit;
use Carbon\Carbon;

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
        
        $user = auth()->user();
        Habit::create([
            'user_id' => $user->id,
            'name' => $this->name,
            'description' => $this->description,
            'logged_for' => now(),
        ]);
        
        $this->reset(['name', 'description']);
        session()->flash('message', 'Habit created successfully!');
        // Livewire will re-render automatically; keep message for feedback
    }

   public function toggleComplete($habitId)
    {
        $habit = Habit::find($habitId);

        if ($habit) {
            $habit->completed = ! $habit->completed;
            $habit->save();

            // Handle user streak update
            if ($habit->completed && auth()->check()) {
                $user = auth()->user();

                if (!$user->last_streak_date) {
                    // First streak ever
                    $user->current_streak = 1;
                } elseif (Carbon::parse($user->last_streak_date)->isYesterday()) {
                    // Continue streak
                    $user->current_streak += 1;
                } elseif (!Carbon::parse($user->last_streak_date)->isToday()) {
                    // Streak broken, reset
                    $user->current_streak = 1;
                }

                $user->last_streak_date = now();

                // Award XP and Coins
                if ($user->current_streak % 5 === 0) {
                    // Every 5-day streak
                    $user->xp += 50;
                    $user->coins += 20;
                } else {
                    // Regular completion
                    $user->xp += 10;
                    $user->coins += 5;
            }
                //milestone popup 
            if ($isMilestone)
              $this->dispatch('xp-milestone')->self();


                $user->save();
            }

            // if habit is uncomepleted, do not update streak or award xp/coins take away points 
            if (! $habit->completed && auth()->check()) {
                $user = auth()->user();
                // Decrease XP and Coins for uncompleting
                $user->xp = max(0, $user->xp - 15); // prevent negative XP
                $user->coins = max(0, $user->coins - 8); // prevent negative Coins
                $user->save();
            }

            // Force Livewire to refresh the stats display
            $this->dispatch('stats-updated')->self();

            // Refresh habits for UI
            $this->habits = Habit::where('user_id', auth()->id())
                ->latest('logged_for')
                ->get();
        }

   

        
    }

    // add an editHabit method 
    public $editingHabitId = null; // track which habit is being edited
    public $editName = '';
    public $editDescription = '';

    public function editHabit($habitId)
    {
        $habit = Habit::find($habitId);
        if ($habit && $habit->user_id === auth()->id()) {
            $this->editingHabitId = $habit->id;
            $this->editName = $habit->name;
            $this->editDescription = $habit->description;
        }
    }

    // add an updateHabit method
    public function updateHabit()
    {
        $this->validate([
            'editName' => 'required|min:3',
            'editDescription' => 'nullable'
        ]);
        $habit = Habit::find($this->editingHabitId);
        if ($habit && $habit->user_id === auth()->id()) {
            $habit->name = $this->editName;
            $habit->description = $this->editDescription;
            $habit->save();
            $this->editingHabitId = null; // exit edit mode
            session()->flash('message', 'Habit updated successfully!');
        }
    }


    // add to deleteHabit method 
    public function deleteHabit($habitId)
    {
        $habit = Habit::find($habitId);
        if ($habit && $habit->user_id === auth()->id()) {
            $habit->delete();
            session()->flash('message', 'Habit deleted successfully!');
        }
    }



    public function render()
    {
       $habits = Habit::where('user_id', auth()->id())
        ->orderBy('logged_for', 'desc')
        ->get();
        return view('livewire.habits-list', [
            'habits' => $habits
        ]);
    }
}