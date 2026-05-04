import Alpine from 'alpinejs';
import './stores/theme.js';
import './stores/notices.js';
import './stores/modals.js';
import './legacy-bridge.js';

window.Alpine = Alpine;
Alpine.start();
