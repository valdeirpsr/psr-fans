import { Alpine } from '../../../../vendor/livewire/livewire/dist/livewire.esm';

Alpine.directive('clipboard', (el: HTMLElement, { expression }) => {
    const originalTextContent = el.textContent;

    el.addEventListener('click', () => {
        navigator.clipboard.writeText(expression)
        el.textContent = 'Copiado';
        setTimeout(() => el.textContent = originalTextContent, 1500);
    })
});
