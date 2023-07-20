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
      'darkest-blue': '#161A3D',
      'light-blue': '#F3F4F9',
      'light-purple': '#F0EFFC',
      cream: '#F8F4F0',
      white: '#FFFFFF',
      'off-white': '#f8f7f7',
      'tag-gray': '#f8f7f7',
      'card-border': '#d4d5dc',
      'lightest-purple': '#F8F8FF',
      'dark-teal': '#1f5f68',
      'teen': '#8F92CD',
      'young-adult': '#DAC1FB',
      'parent': '#FDBF7C',
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
      // orange: '#E07058',
      // 'med-blue': '#262D70',
      // 'lightest-blue': '#F5F6F8',
      // 'light-purple-gradient-start': '#F0EFFC',
      // 'light-purple-gradient-end': '#FFFFFF',
    },
    borderRadius: {
      none: '0',
      sm: '0.625rem',
      md: '1.25rem',
      lg: '2.5rem',
    },
    extend: {
      fontSize: {
        h1: [
          '2rem',
          {
            lineHeight: '2rem',
            letterSpacing: '0',
            fontWeight: '400',
          },
        ],
        // 'h1-md': [
        //   '3rem',
        //   {
        //     lineHeight: '110%',
        //     letterSpacing: '-0.03em',
        //     fontWeight: '400',
        //   },
        // ],
        'h1-lg': [
          '3rem',
          {
            lineHeight: '3rem',
            letterSpacing: '0',
            fontWeight: '400',
          },
        ],
        'h1-display': [
          '2.25rem',
          {
            lineHeight: '2.75rem',
            letterSpacing: '0',
            fontWeight: '400',
          },
        ],
        'h1-display-lg': [
          '4rem',
          {
            lineHeight: '4.2rem',
            letterSpacing: '0',
            fontWeight: '400',
          },
        ],
        h2: [
          '1.75rem',
          {
            lineHeight: '2.3rem',
            letterSpacing: '0',
            fontWeight: '400',
          },
        ],
        'h2-lg': [
          '2.25rem',
          {
            lineHeight: '1.21',
            letterSpacing: '0',
            fontWeight: '400',
          },
        ],
        h3: [
          '1.25rem',
          {
            lineHeight: '1.625rem',
            letterSpacing: '0',
            fontWeight: '400',
          },
        ],
        'h3-lg': [
          '1.5rem',
          {
            lineHeight: '2rem',
            letterSpacing: '0',
            fontWeight: '400',
          },
        ],
        h4: [
          '1.25rem',
          {
            lineHeight: '1.625',
            letterSpacing: '0',
            fontWeight: '400',
          },
        ],
        'h4-lg': [
          '1.5rem',
          {
            lineHeight: '1.8rem',
            letterSpacing: '0',
            fontWeight: '400',
          },
        ],
        h5: [
          '1rem',
          {
            lineHeight: '140%',
            letterSpacing: '0',
            fontWeight: '500',
          },
        ],
        h6: [
          '0.875rem',
          {
            lineHeight: '140%',
            letterSpacing: '0',
            fontWeight: '400',
          },
        ],
        p: [
          '1rem',
          {
            lineHeight: '1.5rem',
            letterSpacing: '0',
            fontWeight: '400',
          },
        ],
        'p-lg': [
          '1.125rem',
          {
            lineHeight: '1.8rem',
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
