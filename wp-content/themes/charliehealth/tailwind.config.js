/**
 * See https://tailwindcss.com/docs/configuration for configuration details
 */

const glob = require('glob');

module.exports = {
  content: [
    './blocks/**/*.php',
    './inc/**/*.php',
    './template-parts/**/*.php',
    './**/*.php',
  ].concat(glob.sync('./*.php')),
  // have to use glob sync because otherwise base folder becomes tw dependency and infinite loop because of index.asset.php
  // glob returns array of actual files and this way build folder is definitively ignored
  theme: {
    screens: {
      md: '480px',
      lg: '1024px',
    },
    fontFamily: {
      heading: ['"ABC Social"', 'sans-serif'],
      'heading-serif': ['"ABC Arizona"', 'serif'],
      body: ['"GT America"', 'sans-serif'],
    },
    colors: {
      transparent: 'rgba(0,0,0,0)',
      current: 'currentColor',
      'lightest-teal': '#ECF7FA',
      'bright-teal': '#B1FCFA',
      text: '#46496D',
      'purple-gradient-start': '#EADAFF',
      'purple-gradient-end': '#A698FF',
      'hover-blue': '#4331B0',
      'med-blue': '#212984',
      'dark-blue': '#1D225F',
      'darker-blue': '#161A3D',
      'darker-blue-hover': '#1A1F45',
      'darkest-blue': '#161A3D',
      'light-blue': '#F3F4F9',
      'light-purple': '#F0EFFC',
      cream: '#F7F5F1',
      white: '#FFFFFF',
      'white-hover': '#F8F7F7',
      'off-white': '#f8f7f7',
      'tag-gray': '#f8f7f7',
      'card-border': '#d4d5dc',
      'lightest-purple': '#F8F8FF',
      'dark-teal': '#1f5f68',
      teen: '#8F92CD',
      'young-adult': '#DAC1FB',
      parent: '#FDBF7C',
      lavender: {
        100: '#F7EBFF',
        200: '#E7D3FF',
        300: '#DAC1FB',
      },
      'pale-blue': {
        100: '#D6D7F0',
        200: '#ADB0E1',
        300: '#8F92CD',
      },
      yellow: {
        300: '#FDBF7C',
      },
      secondary: {
        soft: '#1A1F45',
      },
      primary: {
        DEFAULT: '#161A3D',
        100: '#272D6C',
        200: '#1E225B',
        'black-blue': '#12142A',
      },
      grey: {
        warm: '#F7F5F1',
        cool: '#F8F7F7',
        deactivated: '#87889A',
      },
      salmon: '#F9E1D4',
      // 'light-teal': '#C8FFFF',
      // 'med-bright-teal': '#3EB7B5',
      // 'med-teal': '#39919D',
      // 'darkest-teal': '#0B3340',
      // 'dark-text': '#272A51',
      // 'light-text': '#6A6C85',
      // 'med-blue-60': '#5F6387',
      // 'med-blue-40': '#2A2D4F66',
      // 'med-blue-20': '#2A2D4F33',
      // 'orange-gradient-start': '#FFDEDA',
      // 'orange-gradient-end': '#FFA776',
      // 'bright-orange': '#FF9F81',
      orange: {
        200: '#F5A890',
        300: '#E07058',
      },
      // 'med-blue': '#262D70',
      // 'lightest-blue': '#F5F6F8',
      // 'light-purple-gradient-start': '#F0EFFC',
      // 'light-purple-gradient-end': '#FFFFFF',
    },
    // All borders at 10px
    borderRadius: {
      none: '0',
      sm: '10px',
      md: '10px',
      lg: '10px',
      circle: '50%',
    },
    extend: {
      fontSize: {
        h1: [
          '50px',
          {
            lineHeight: '110%',
            letterSpacing: '0',
            fontWeight: '400',
          },
        ],
        'h1-lg': [
          '64px',
          {
            lineHeight: '110%',
            letterSpacing: '0',
            fontWeight: '400',
          },
        ],
        'h1-display': [
          '70px',
          {
            lineHeight: '90%',
            letterSpacing: '0',
            fontWeight: '400',
          },
        ],
        'h1-display-lg': [
          '120px',
          {
            lineHeight: '90%',
            letterSpacing: '0',
            fontWeight: '400',
          },
        ],
        h2: [
          '35px',
          {
            lineHeight: '110%',
            letterSpacing: '0',
            fontWeight: '400',
          },
        ],
        'h2-lg': [
          '40px',
          {
            lineHeight: '110%',
            letterSpacing: '0',
            fontWeight: '400',
          },
        ],
        h3: [
          '25px',
          {
            lineHeight: '110%',
            letterSpacing: '0',
            fontWeight: '400',
          },
        ],
        'h3-lg': [
          '28px',
          {
            lineHeight: '110%',
            letterSpacing: '0',
            fontWeight: '400',
          },
        ],
        h4: [
          '18px',
          {
            lineHeight: '140%',
            letterSpacing: '0',
            fontWeight: '400',
          },
        ],
        'h4-lg': [
          '20px',
          {
            lineHeight: '140%',
            letterSpacing: '0',
            fontWeight: '400',
          },
        ],
        h5: [
          '16px',
          {
            lineHeight: '140%',
            letterSpacing: '0',
            fontWeight: '500',
          },
        ],
        h6: [
          '14px',
          {
            lineHeight: '140%',
            letterSpacing: '0',
            fontWeight: '400',
          },
        ],
        p: [
          '16px',
          {
            lineHeight: '160%',
            letterSpacing: '0',
            fontWeight: '400',
          },
        ],
        'p-lg': [
          '16px',
          {
            lineHeight: '160%',
            letterSpacing: '0',
            fontWeight: '400',
          },
        ],
        'nav-normal': [
          '18px',
          {
            lineHeight: '140%',
            letterSpacing: '0',
            fontWeight: '400',
          },
        ],
        'nav-small': [
          '16px',
          {
            lineHeight: '140%',
            letterSpacing: '0',
            fontWeight: '400',
          },
        ],
        mini: [
          '12px',
          {
            lineHeight: '140%',
            letterSpacing: '0',
            fontWeight: '400',
          },
        ],
      },
      spacing: {
        'sp-0': '0',
        'sp-1': '0.25rem',
        'sp-2': '0.5rem',
        'sp-3': '0.75rem',
        'sp-4': '1rem',
        'sp-5': '1.25rem',
        'sp-6': '1.5rem',
        'sp-7': '1.75rem',
        'sp-8': '2rem',
        'sp-10': '2.5rem',
        'sp-12': '3rem',
        'sp-14': '4rem',
        'sp-16': '6rem',
      },
      transitionProperty: {
        right: 'right',
      },
    },
  },
  plugins: [],
  corePlugins: {
    container: false,
    // container: {
    //   center: true,
    //   padding: '1.25rem',
    // },
    //  preflight: false,
  },
};
