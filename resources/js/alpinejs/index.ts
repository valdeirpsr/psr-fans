import AlpineJs from 'alpinejs';
import initMediaCard from './data/initMediaCard';

document.addEventListener('alpine:init', () => {
  /* @ts-ignore */
  AlpineJs.data('initMediaCard', initMediaCard);
});

window.Alpine = AlpineJs;
AlpineJs.start();
