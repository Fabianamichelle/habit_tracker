export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./resources/**/*.php",
  ],
  safelist: [
    'bg-ut-orange',
    'text-anti-flash-white',
    'bg-persian-indigo',
    'text-periwinkle',
    'hover:bg-cornflower-blue',
    'shadow-glow'
  ],
  theme: {
    extend: {
      colors: {
        'persian-indigo': '#27187e',
        'cornflower-blue': '#758bfd',
        'periwinkle': '#aeb8fe',
        'anti-flash-white': '#f1f2f6',
        'ut-orange': '#ff8600',
      },
      boxShadow: {
        glow: '0 0 10px rgba(117,139,253,0.6)',
      },
    },
  },
  plugins: [],
}
