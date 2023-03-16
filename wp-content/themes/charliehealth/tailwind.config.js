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
      'transparent': 'rgba(0,0,0,0)',
      'current': 'currentColor',
      'lightest-teal': '#ECF7FA',
      'bright-teal': '#B1FCFA',
      'darkest-blue': '#161940',
      text: '#46496D',
      'purple-gradient-start': '#EADAFF',
      'hover-blue': '#4331B0',
      'med-blue': '#262D70',
      'dark-blue': '#1D225F',
      white: '#FFFFFF',
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
      // 'purple-gradient-end': '#A698FF',
      // 'med-blue': '#262D70',
      // 'lightest-purple': '#F8F8FF',
      // 'light-purple': '#F0EFFC',
      // 'lightest-blue': '#F5F6F8',
      // 'light-blue': '#F3F4F9',
      // cream: '#F8F4F0',
      // 'light-purple-gradient-start': '#F0EFFC',
      // 'light-purple-gradient-end': '#FFFFFF',
    },
    extend: {
      fontSize: {
        display: [
          '4rem',
          {
            lineHeight: '110%',
            letterSpacing: '-0.04em',
            fontWeight: '400',
          },
        ],
        h1: [
          '3rem',
          {
            lineHeight: '110%',
            letterSpacing: '-0.03em',
            fontWeight: '400',
          },
        ],
        h2: [
          '2.25rem',
          {
            lineHeight: '110%',
            letterSpacing: '-0.03em',
            fontWeight: '400',
          },
        ],
        h3: [
          '1.5rem',
          {
            lineHeight: '130%',
            letterSpacing: '-0.05em',
            fontWeight: '400',
          },
        ],
        h4: [
          '1.375rem',
          {
            lineHeight: '130%',
            letterSpacing: '-0.05em',
            fontWeight: '400',
          },
        ],
        h5: [
          '1rem',
          {
            lineHeight: '140%',
            letterSpacing: '-0.01em',
            fontWeight: '500',
          },
        ],
        h6: [
          '.875rem',
          {
            lineHeight: '140%',
            letterSpacing: '-0.02em',
            fontWeight: '400',
          },
        ],
        p: [
          '1.125rem',
          {
            lineHeight: '210%',
            letterSpacing: '-0.02em',
            fontWeight: '400',
          },
        ],
      },
      transitionProperty: {
        right: 'right',
      },
    },
  },
  plugins: [],
  corePlugins: {
    container: false,
    //  preflight: false,
  },
};
