import './bootstrap';
import './user-profile';
import './backToTop';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


// React
import React from 'react';
import { createRoot } from 'react-dom/client';
import Favorite from './components/Favorite';



// Reactのマウント処理
const elements = document.querySelectorAll('.favorite-app');

elements.forEach((element) => {
    // 💡 dataset から postId と一緒に endpointUrl も受け取る
    const postId = element.dataset.postId;
    const endpointUrl = element.dataset.endpointUrl;

    createRoot(element).render(
        // 💡 Favoriteコンポーネントに endpointUrl をプロパティとして渡す！
        <Favorite postId={postId} endpointUrl={endpointUrl} />
    );
});
