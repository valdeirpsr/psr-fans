import { Magics } from 'alpinejs';
import 'share-api-polyfill';

type Options = {
  isLiked: boolean;
  url: string;
}

export default (opts: Options) => ({
  ...opts,

  toggleLike: function () {
    this.isLiked = ! this.isLiked;
  },

  share: function (this: Magics<Options>) {
    const data = {
      text: this.$refs.content.textContent?.trim(),
      url: this.$data.url,
    }

    navigator.share(data);
  },
});
