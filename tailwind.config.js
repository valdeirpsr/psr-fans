/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {
      container: {
        center: true
      },

      colors: {
        approved: '#029ef2',
        expired: '#ef4444',
      }
    },
  },
  plugins: [],
  safelist: [
    'bg-approved',
    'bg-expired',
  ]
}

