import './bootstrap';

import Alpine from 'alpinejs';

// Only start Alpine if it's not already started (prevents duplicate instance)
if (!window.Alpine) {
    window.Alpine = Alpine;
    Alpine.start();
}
