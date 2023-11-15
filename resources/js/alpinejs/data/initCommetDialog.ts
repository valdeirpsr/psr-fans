import eventBus from "@/packages/eventBus";

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
  comment: '',

  send: function () {
    /* @TODO: Request */
  },

  init() {
    this._onPopState = () => {
      this.isVisible = false;
      window.removeEventListener('popstate', this._onPopState);
    };

    eventBus('comments').on((postId) => {
      this.isVisible = true;
      window.addEventListener('popstate', this._onPopState)

      /* @TODO: Add Ziggy Route */
      history.pushState({ commentDialog: true }, '', `/post/${postId}`);

    })
  },

  closeModal($el: PointerEvent) {
    if ($el.currentTarget === $el.target) history.back();
  },
});
