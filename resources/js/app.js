import React from 'react';
import { createRoot } from 'react-dom/client';
import { App as InertiaApp } from '@inertiajs/inertia-react';
import { Inertia } from '@inertiajs/inertia';
import 'bootstrap';

const app = document.getElementById('app');

createRoot(app).render(
    <InertiaApp
        initialPage={JSON.parse(app.dataset.page)}
        resolveComponent={name => require(`./Pages/${name}`).default}

    />
);
