/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
      './resources/**/*.blade.php',
      './resources/**/*.js',
      './resources/**/*.vue',
    ],
    theme: {
      extend: {
        colors: {
          beige: '#f5f5dc', // Soft beige color
        },
      },
    },
    plugins: [],
  }
  