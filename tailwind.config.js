module.exports = {
  purge: [ ] ,
  target: 'ie11',
  theme: {
    extend: {},
  },
  variants: {
      borderColor: ['responsive', 'hover', 'focus', 'focus-within'],
      opacity: ['responsive', 'hover', 'focus', 'disabled'],
      backgroundColor: ['responsive', 'hover', 'focus', 'focus-within','disabled'],
      cursorNotAllowed: ['responsive', 'hover', 'focus', 'focus-within','disabled']
  },
  plugins: [],
}
