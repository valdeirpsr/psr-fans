import AlpineJs from 'alpinejs';
import initMediaCard from './data/initMediaCard';
import initCommetDialog from './data/initCommetDialog';
import initMediaViewer from './data/initMediaViewer';
import initSubscribeModal from './data/initSubscribeModal';
import initGiftModal from './data/initGiftModal';
import initLoginPage from './data/initLoginPage';

document.addEventListener('alpine:init', () => {
  /* @ts-ignore */
  AlpineJs.data('initMediaCard', initMediaCard);
  AlpineJs.data('initCommentDialog', initCommetDialog);
  AlpineJs.data('initMediaViewer', initMediaViewer);
  AlpineJs.data('initSubscribeModal', initSubscribeModal);
  AlpineJs.data('initGiftModal', initGiftModal);
  AlpineJs.data('initLoginPage', initLoginPage);
});

window.Alpine = AlpineJs;
AlpineJs.start();
