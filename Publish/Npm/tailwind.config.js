const plugin = require('tailwindcss/plugin')

module.exports = {
    content: [
        // Path to my php view it will only purge stuff we going to use
        "./resources/vendor/Onix/**/*.js",
        "./resources/vendor/Onix/**/*.txt",
        "./vendor/mariojgt/onix/**/*.php",
        "./resources/views/**/*.php",
    ],
    theme: {
      extend: {},
    },
    plugins: [
        require('daisyui'),
    ],
  }
