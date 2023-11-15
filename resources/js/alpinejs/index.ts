import AlpineJs from 'alpinejs';
import initMediaCard from './data/initMediaCard';
import initCommetDialog from './data/initCommetDialog';
import initMediaViewer from './data/initMediaViewer';

document.addEventListener('alpine:init', () => {
  /* @ts-ignore */
  AlpineJs.data('initMediaCard', initMediaCard);
  AlpineJs.data('initCommentDialog', initCommetDialog);
  AlpineJs.data('initMediaViewer', initMediaViewer);
});

window.Alpine = AlpineJs;
AlpineJs.start();
