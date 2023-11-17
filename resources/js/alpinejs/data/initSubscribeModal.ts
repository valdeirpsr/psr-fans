export default () => ({
  isVisible: false,

  closeModal($el: PointerEvent) {
    if ($el.currentTarget === $el.target) this.isVisible = false;
  },
});
