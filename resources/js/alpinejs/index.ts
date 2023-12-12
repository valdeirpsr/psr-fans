import { Alpine } from '../../../vendor/livewire/livewire/dist/livewire.esm';

import initMediaCard from './data/initMediaCard';
import initCommetDialog from './data/initCommetDialog';
import initMediaViewer from './data/initMediaViewer';
import initSubscribeModal from './data/initSubscribeModal';
import initGiftModal from './data/initGiftModal';
import initLoginPage from './data/initLoginPage';

document.addEventListener('alpine:init', () => {
  /* @ts-ignore */
  Alpine.data('initMediaCard', initMediaCard);
  Alpine.data('initCommentDialog', initCommetDialog);
  Alpine.data('initMediaViewer', initMediaViewer);
  Alpine.data('initSubscribeModal', initSubscribeModal);
  Alpine.data('initGiftModal', initGiftModal);
  Alpine.data('initLoginPage', initLoginPage);
});
