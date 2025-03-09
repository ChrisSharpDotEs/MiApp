module.exports = {
    plugins: [
      require('autoprefixer'),
      require('postcss-purgecss')({
        content: ['./public/**/*.php'],
        safelist: ['keep-this-class'],
        defaultExtractor: content => content.match(/[\w-/:]+(?<!:)/g) || [],
      }),
    ],
  };
  