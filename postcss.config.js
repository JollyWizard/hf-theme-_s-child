module.exports = {
  map: true,
  plugins: {

  /** Use first so that other plugins are applied after import. */
    'postcss-import': {}

  , /** Provides responsive helpers and bootstrap like DOM class decorators. */
    'tailwindcss': './tailwind.js'

  , /** Provides: variables, extends, and property-lookup. */
    'precss': {}

  }
}
