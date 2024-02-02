/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.{html,js,php}"],
  theme: {
    extend: {
      screens: {
        'desktop': '1300px',
      },
      lineHeight: {
        '14': '56px',
      },
    },
  },
  plugins: [],
}
