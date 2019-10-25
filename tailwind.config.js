module.exports = {
  theme: {
  	container: {
  		center: true,
      	padding: '2rem',
    },
    opacity: {
      	'0': '0',
      	'10': '.1',
      	'20': '.2',
      	'30': '.3',
      	'40': '.4',
      	'50': '.5',
      	'60': '.6',
      	'70': '.7',
      	'80': '.8',
      	'90': '.9',
      	'100': '1',
    },

    pagination: theme => ({
        // Costumize the color only. (optional)
        color: theme('colors.teal.600'),
    }),
    extend: {
      width: {
        '1/7': '14.2857143%',
        '2/7': '28.5714286%',
        '3/7': '42.8571429%',
        '4/7': '57.1428571%',
        '5/7': '71.4285714%',
        '6/7': '85.7142857%',
      }
    }
  },

  variants: {
  	appearance: ['responsive', 'hover', 'focus'],
  	outline: ['focus', 'responsive', 'hover'],
  	resize: ['responsive', 'hover', 'focus'],
  	userSelect: ['responsive', 'hover', 'focus'],
  	opacity: ['responsive', 'hover', 'focus', 'active', 'group-hover'],
  	float: ['responsive', 'hover', 'focus'],
    textColor: ['responsive', 'hover', 'focus', 'active', 'group-hover'],
    backgroundColor: ['responsive', 'hover', 'focus', 'active', 'group-hover'],
    flexWrap: ['responsive', 'hover', 'focus'],
  },
  plugins: [
  	require('tailwindcss-plugins/pagination'),
  ]
}
