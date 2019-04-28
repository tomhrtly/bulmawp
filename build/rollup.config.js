import babel from 'rollup-plugin-babel';

export default {
  input: 'assets/src/js/script.js',
  output: {
    file: 'assets/dist/js/script.js',
    name: 'bulmawp',
    format: 'iife',
    sourceMap: 'inline'
  },
  plugins: [
    babel({
      exclude: 'node_modules/**',
    }),
  ],
};
