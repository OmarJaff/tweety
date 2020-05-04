module.exports = {
  purge: ['./resources/views/components/master.blade.php'] ,
  target: 'ie11',
  theme: {
    extend: {},
  },
  variants: {
      borderColor: ['responsive', 'hover', 'focus', 'focus-within'],
  },
  plugins: [],
}
