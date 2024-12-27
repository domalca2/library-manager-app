/** @type {import('tailwindcss').Config} */
// carga los estilos a todos .blade.php, js y componentes vue
module.exports = {
  content: [ 
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}

