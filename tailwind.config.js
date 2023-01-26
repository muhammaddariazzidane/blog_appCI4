/** @type {import('tailwindcss').Config} */
module.exports = {
  daisyui: {
    themes: ["light"],
  },
  darkMode: "class",
  content: ["app/Views/**/*.php", "app/Views/**/**/*.php", "app/Views/**/**/**/*.php"],
  theme: {
    extend: {},
  },
  plugins: [require("daisyui"), require("tailwind-scrollbar-hide")],
};
