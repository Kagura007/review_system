import React from 'react';
import { createRoot } from 'react-dom/client';
import Favorite from './components/Favorite';

const element = document.getElementById('favorite-app');

if (element) {
    createRoot(element).render(
        <Favorite />
    );
}
