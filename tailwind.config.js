module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      fontFamily: {
        pop_regular: ['Poppins-Regular', 'sans-serif'],
        pop_bold: ['Poppins-Bold', 'sans-serif'],
      },

      colors: {
        palette_c1_bg: {
          50: '#016BDD',
          100: '#0175E9',
          200: '#0184FC',
          300: '#3EA1FE',
          400: '#E0E0E0',
          500: '#EFFFFC',
          600: '#F4FAFF',
          700: '#F5F5F5',
          800: '#EDFAFD',
          900: '#FFFFFF',
        },
        palette_c2_bg: {
          50: '#1A1A1A',
          100: '#001D6E',
          200: '#01409B',
          300: '#5BB0FE',
          400: '#4DBCFE',
          500: '#36BDFF',
          600: '#89DFFE',
          700: '#E5E9EF',
          800: '#E8F6FE',
          900: '#F9F9F9',
        },
        palette_ms_bg: {
          50: '#011D6F',
          100: '#003D9C',
          200: '#0259C2',
          300: '#016BDD',
          400: '#0184FC',
          500: '#4DBEFF',
          600: '#89DEFE',
          700: '#BED6EB',
          800: '#E5F3FD',
          900: '#F4FAFF',
        },
        palette_Catalyst: {
          authentication_type: '#001D6E',
          form_main_heading: '#003D9C',
          form_btn: '#0184FC',
          footer: '#3EA1FE',
        },
      }
    },
  },
  variants: {
    extend: {
    },
  },
  plugins: [

  ],
}
