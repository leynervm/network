import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';

import L from 'leaflet';
import 'leaflet/dist/leaflet.css';
window.L = L;

window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();
