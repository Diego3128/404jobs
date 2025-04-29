import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


document.addEventListener('DOMContentLoaded', startApp);

function startApp() {
    startCloseBtn();
}

function startCloseBtn() {
    const container = document.querySelector('.dashboard-notifications') || null;
    if (!container) return;
    container.addEventListener('click', (e) => {
        const target = e.target;
        if (target.classList.contains('close-btn')) {
            // delete parent element  .notification
            const parent = target.parentElement.parentElement;
            if (parent.classList.contains('notification')) {
                parent.remove();
            }
        }
    })
}
