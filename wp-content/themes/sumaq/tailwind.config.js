/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./**/*.php", // Escanea todos los archivos PHP
    "./assets/js/**/*.js", // Opcional si usas JS en tu tema
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ["'Work Sans'", "sans-serif"], // Configura Work Sans como predeterminada
      },
    },
  },
  plugins: [],
};
