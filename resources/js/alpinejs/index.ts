import AlpineJs from 'alpinejs';
import initMediaCard from './data/initMediaCard';
import initCommetDialog from './data/initCommetDialog';

document.addEventListener('alpine:init', () => {
  /* @ts-ignore */
  AlpineJs.data('initMediaCard', initMediaCard);
  AlpineJs.data('initCommentDialog', initCommetDialog);
});

window.Alpine = AlpineJs;
AlpineJs.start();
