module.exports = {
  mode: 'jit',
  content: ['./public/**/*.html', './src/**/*.{vue,js,ts,jsx,tsx}'],
  
  theme: {
    extend: {},
    container : {
      center : true,
      padding : '2rem'
    },
  },
  plugins: [require('tw-elements/dist/plugin')],
}
