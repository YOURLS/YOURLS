import Alpine from 'alpinejs';

document.addEventListener('alpine:init', () => {
  Alpine.store('notices', {
    items: [],
    push(message, tone = 'info', timeout = 5000) {
      const id = Date.now() + Math.random();
      this.items.push({ id, message, tone });
      if (timeout > 0) {
        setTimeout(() => this.dismiss(id), timeout);
      }
    },
    dismiss(id) {
      this.items = this.items.filter((n) => n.id !== id);
    },
  });
});
