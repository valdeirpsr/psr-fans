import eventBus from "@/packages/eventBus";

export const EVENT_KEY = Symbol('media-viewer');

export default (opts) => ({
  ...opts,

  /**
   * Evento PopState é utilizado para fechar o modal quando o
   * usuário clicar em voltar a página
   */
  _onPopState: undefined,

  /**
   * Informa se o modal está ou não visível
   */
  isVisible: false,

  /**
   * Comentário do usuário que poderá ser enviado
   */
  source: undefined,

  /**
   * Mimetype da mídia
   */
  mimeType: undefined,

  send: function () {
    /* @TODO: Request */
  },

  init() {
    this._onPopState = () => {
      this.isVisible = false;
      window.removeEventListener('popstate', this._onPopState);
    };

    eventBus(EVENT_KEY).on((postId, src, mimeType) => {
      this.isVisible = true;
      this.source = src;
      this.mimeType = mimeType;

      window.addEventListener('popstate', this._onPopState)

      /* @TODO: Add Ziggy Route */
      history.pushState({ commentDialog: true }, '', `/post/${postId}`);

    })
  },

  closeModal($el: PointerEvent) {
    if ($el.currentTarget === $el.target) history.back();
  },
});
