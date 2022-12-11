const plugin = require('tailwindcss/plugin')

module.exports = {
    darkMode: 'class',
    mode: 'jit',
    purge: [
        // Path to my php view it will only purge stuff we going to use
        "./resources/vendor/Onix/**/*.js",
        "./resources/vendor/Onix/**/*.txt",
    ],
    theme: {
      extend: {},
    },
    variants: {
        extend: {
          textOpacity: ['dark']
        }
    },
    plugins: [
        require('daisyui'),
    ],
  }
