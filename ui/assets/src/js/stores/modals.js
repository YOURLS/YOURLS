import Alpine from 'alpinejs';

document.addEventListener('alpine:init', () => {
  Alpine.store('modals', {
    open: null,
    show(name, payload = null) {
      this.open = { name, payload };
    },
    hide() {
      this.open = null;
    },
    is(name) {
      return this.open && this.open.name === name;
    },
  });
});
