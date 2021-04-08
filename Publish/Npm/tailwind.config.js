const plugin = require('tailwindcss/plugin')

module.exports = {
    darkMode: 'class',
    purge: [],
    theme: {
      extend: {},
    },
    variants: {
        extend: {
          textOpacity: ['dark']
        }
    },
    plugins: [],
  }
