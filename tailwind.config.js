/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: "class",
  content: ["app/Views/**/*.php", "app/Views/**/**/*.php", "app/Views/**/**/**/*.php"],
  theme: {
    extend: {},
  },
  plugins: [require("daisyui"), require("tailwind-scrollbar-hide")],
};
