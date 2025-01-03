/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./**/*.php", // Escanea todos los archivos PHP
    "./assets/js/**/*.js", // Escanea JS en tu tema
  ],
  theme: {
    extend: {
      container: {
        center: true, // Centra automáticamente el contenedor
        padding: "1rem", // Padding global para el contenedor
      },
      fontFamily: {
        body: ["'Inter'", "sans-serif"], // Fuente para texto
        title: ["'Work Sans'", "sans-serif"], // Fuente para títulos
      },
      colors: {
        primary: "#CBCBCB", // Agregar primary-color personalizado
      },
      maxWidth: {
        lg: "1024px", // Contenedor no excede 1024px en pantallas grandes
      },
      screens: {
        xs: "320px",
        sm: "640px",
        md: "768px",
        lg: "1024px",
        xl: "1280px",
        "2xl": "1536px",
        "3xl": "1920px",
        "4k": "2560px",
      },
    },
  },
  plugins: [],
};
