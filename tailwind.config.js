module.exports = {
  content: [
    './pages/**/*.{html,js}',
    './components/**/*.{html,js}',
  ],
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      fontFamily: {
        PoppinsRegular: ['Poppins-Regular', 'Yu Gothic UI Light', 'cursive'],
        PoppinsBold: ['Poppins-Bold', 'sans-serif'],
        PoppinsBlack: ['Poppins-Black', 'sans-serif'],
        PoppinsBlackItalic: ['Poppins-BlackItalic', 'sans-serif'],
        PoppinsExtraBold: ['Poppins-ExtraBold', 'sans-serif'],
        PoppinsSemiBoldItalic: ['Poppins-SemiBoldItalic', 'sans-serif'],

      },

      colors: {
        catalystLight: {   // from lightest to darkest.
          f1: '#F9F9F9',
          f2: '#F4FAFF',
          f3: '#F5F5F5',
          f4: '#F4FAFF',
          f5: '#F4F8F9',   // use for table-header i.e. clos, description , domain et.c
          f6_bg: '#F9F8FF', // background for middle-section

          e1: '#E0E0E0',
          e2: '#E5E9EF',
          e3: '#E5F3FD',
          e4: '#E8F6FE',
          e5: '#EDFAFD',
          e6: '#EFFFFC',
          b1: '#BED6EB',   // header-vertical line.
          89: '#89DEFE',

        },
        catalystDark: {
          d1: '#1A1A1A',
          d2: '#1B1B1B',   // main section sub-para / i.e. following data needs to be.
          d3: '#3B3E43',   // main section major heading /  Course profile /

        },

        catalystBlue: {
          d1: '#011D6F',
          d2: '#001D6E',  // authentication type ,
          d3: '#CEE6FC',  // authentication type ,

          ld1: '#01409B', // dashboard top header  , header-login
          dl2: '#003D9C', // form_main_heading
          dl3: '#0259C2',
          dl4: '#016BDD',

          l1: '#0175E9',
          l11: '#108BFE',  // sidebar / nav
          l2: '#0184FC',   // form button /  CourseInstructorDetail , CLO , Mapping Table
          l3: '#3EA1FE',   // footer
          l4: '#36BDFF',
          l5: '#4DBCFE',
          l6: '#4DBEFF',
          l61: '#41A3FD',   //  for table-row left most data (i.e. Clo-1 to n )
          l7: '#5BB0FE',
          l8: '#0284FC',  // for AIW , CID text bg.

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
