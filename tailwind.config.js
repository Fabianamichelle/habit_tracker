/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        press: ['"Press Start 2P"', 'system-ui'],
      },
      keyframes: {
        gradient: {
          '0%, 100%': { backgroundPosition: '0% 50%' },
          '50%': { backgroundPosition: '100% 50%' },
        },
      },
      animation: {
        gradient: 'gradient 15s ease infinite',
      },
      backgroundSize: {
        '200%': '200% 200%',
      },
      colors: {
        magenta: '#ff80bf',
        orchid: '#c77dff',
        plum: '#9d4edd',
        amethyst: '#7b2cbf',
        lilac: '#b892ff',
      },
    },
  },
  plugins: [],
}

