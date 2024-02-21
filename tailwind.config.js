/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {},
    fontSize: {
      'twell': ['1.5rem;', {
        lineHeight: '2.25rem;',
        fontWeight: '400',
      }],
      'h2lr': ['3rem;', {
        lineHeight: '4.5rem;',
        fontWeight: '600',
      }],
      'uspas': ['1.1rem;', {
        lineHeight: '2.25rem;',
        fontWeight: '500',
      }],
      'acc': ['1rem;', {
        lineHeight: '1.5rem;',
        fontWeight: '400',
      }],
      'butlog': [' 1.1rem;', {
        lineHeight: '1.875rem;',
        fontWeight: '500',
      }],
    },
  },
  plugins: [],
}

