import AlpineJs from 'alpinejs';
import initMediaCard from './data/initMediaCard';
import initCommetDialog from './data/initCommetDialog';
import initMediaViewer from './data/initMediaViewer';
import initSubscribeModal from './data/initSubscribeModal';

document.addEventListener('alpine:init', () => {
  /* @ts-ignore */
  AlpineJs.data('initMediaCard', initMediaCard);
  AlpineJs.data('initCommentDialog', initCommetDialog);
  AlpineJs.data('initMediaViewer', initMediaViewer);
  AlpineJs.data('initSubscribeModal', initSubscribeModal);
});

window.Alpine = AlpineJs;
AlpineJs.start();
