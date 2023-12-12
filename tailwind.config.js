import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './vendor/laravel/jetstream/**/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
  ],
  theme: {
    extend: {
      container: {
        center: true
      },

      colors: {
        approved: '#029ef2',
        expired: '#ef4444',
      },
    },
  },
  plugins: [forms, typography],
  safelist: [
    'bg-approved',
    'bg-expired',
  ]
}

