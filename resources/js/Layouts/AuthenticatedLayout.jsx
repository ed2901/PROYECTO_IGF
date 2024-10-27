import React from 'react';
import { Head } from '@inertiajs/inertia-react';

export default function AuthenticatedLayout({ header, children }) {
    return (
        <div>
            <Head title="Sistema de Triage" />
            <header className="bg-gray-800 p-4">
                <div className="container mx-auto">
                    {header}
                </div>
            </header>
            <main className="container mx-auto py-8">
                {children}
            </main>
        </div>
    );
}
