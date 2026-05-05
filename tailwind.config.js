const tokens = require('./ui/tokens/tokens.json');

const colorScale = (scaleName) => {
  const scale = tokens.color[scaleName] || {};
  const out = {};
  for (const step of Object.keys(scale)) {
    out[step] = `rgb(var(--color-${scaleName}-${step}) / <alpha-value>)`;
  }
  return out;
};

module.exports = {
  content: [
    './ui/**/*.blade.php',
    './ui/**/*.php',
    './includes/functions-html.php',
    './admin/**/*.php',
    './yourls-infos.php',
    './user/plugins/**/*.php',
    './user/pages/**/*.php',
  ],
  darkMode: ['selector', '[data-theme="dark"]'],
  theme: {
    extend: {
      colors: {
        neutral: colorScale('neutral'),
        primary: colorScale('primary'),
        success: colorScale('success'),
        warning: colorScale('warning'),
        danger:  colorScale('danger'),
        info:    colorScale('info'),
      },
      borderRadius: tokens.radius,
      boxShadow: tokens.shadow,
      zIndex: tokens.z,
      transitionDuration: tokens.duration,
      fontFamily: {
        sans: tokens.fontFamily.sans.split(', '),
        mono: tokens.fontFamily.mono.split(', '),
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
  ],
};
