import './bootstrap';

import Alpine from 'alpinejs';
import notification from './notification';

window.Alpine = Alpine;
Alpine.data('notification', notification);

Alpine.start();
