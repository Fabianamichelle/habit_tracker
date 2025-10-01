# 🌟 Habit Tracker with Streaks & Rewards  

A lightweight habit tracker where you can log daily progress, build streaks, and unlock fun reward badges. Built with Laravel, Livewire, Tailwind, and Alpine.js.  

## 💡 Why This Project?  
I'm building this project to:  
- Practice **Laravel + the TALL stack** in a real-world style app  
- Get comfortable with **testing, Livewire components, and Tailwind UI**  
- Create something fun and motivating instead of a plain CRUD app  
- Show progress in my journey toward a **full-stack internship**  


## ✨ Features  
- Create, edit, and delete habits
- Customize character with Coins earned by XP
- Daily check-ins with automatic streak calculation  
- Reward badges at milestone streaks  
- Confetti celebrations 🎉  
- Background themes  🌙
- Music integration

## 🛠️ Built With  
- [Laravel](https://laravel.com/) – backend framework  
- [Livewire](https://livewire.laravel.com/) – reactive UI  
- [Alpine.js](https://alpinejs.dev/) – lightweight interactivity  
- [Tailwind CSS](https://tailwindcss.com/) – styling and layout  

## 📌 Roadmap  
- [ ] Set up Laravel with Breeze auth  
- [ ] Migrations: `habits`, `habit_entries`  
- [ ] Habit CRUD (add, edit, delete)  
- [ ] Livewire check-in button (toggle today)  
- [ ] Simple streak counter on dashboard  
- [ ] Basic Tailwind styling + dark mode toggle  
- [ ] First unit test (habit creation)  
- [ ] Reward badges (3, 7, 30 days)  
- [ ] Alpine.js confetti on badge unlock 🎉  

## 🚀 Stretch Goals  
- [ ] Weekly habits + weekly streak logic  
- [ ] Progress charts (ApexCharts or Chart.js)  
- [ ] “Freeze day” token to protect streaks  
- [ ] Shareable badge images / Open Graph cards  
- [ ] Notifications (daily reminder email)  
- [ ] Team/household: share a habit with another user  
- [ ] PWA basics (installable + offline check-ins)  

## 🧪 Testing  
- Unit tests for streak + reward logic  
- Feature tests for habit CRUD and check-ins  
- Livewire component tests for UI validation and state  

## 🚀 Getting Started  
Clone and run locally:  
```bash
git clone https://github.com/your-username/habit-tracker.git
cd habit-tracker
composer install
npm install && npm run dev
php artisan migrate --seed
php artisan serve
```

🌱 About This Project

This is a practice project created by Fabiana 🩵 while preparing for an internship. It’s where I mix curiosity, testing, and creativity into one full-stack build.
