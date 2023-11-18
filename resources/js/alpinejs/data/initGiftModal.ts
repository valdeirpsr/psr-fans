export default () => ({
  isVisible: false,
  values: [5, 15, 50],
  value: 5,
  inputAnotherValueVisibled: false,

  closeModal($el: PointerEvent) {
    if ($el.currentTarget === $el.target) this.isVisible = false;
  },
});
