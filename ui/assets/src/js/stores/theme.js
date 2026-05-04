import Alpine from 'alpinejs';

const STORAGE_KEY = 'yourls.theme';

function read() {
  try {
    return localStorage.getItem(STORAGE_KEY);
  } catch (e) {
    return null;
  }
}

function write(value) {
  try {
    localStorage.setItem(STORAGE_KEY, value);
  } catch (e) {
    /* private mode / disabled storage */
  }
}

function systemPrefersDark() {
  return typeof window.matchMedia === 'function'
    && window.matchMedia('(prefers-color-scheme: dark)').matches;
}

document.addEventListener('alpine:init', () => {
  Alpine.store('theme', {
    current: read() || (systemPrefersDark() ? 'dark' : 'light'),
    apply() {
      document.documentElement.setAttribute('data-theme', this.current);
    },
    set(value) {
      this.current = value;
      write(value);
      this.apply();
    },
    toggle() {
      this.set(this.current === 'dark' ? 'light' : 'dark');
    },
    init() {
      this.apply();
    },
  });
});
