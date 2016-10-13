#Boilerplate

This boilerplate is to get up and running quickly with Typescript, Sass and Webpack.
It requires sass, tslint and webpack CLI to be installed globally.

**Before installation:**  
`npm install -g sass && npm install -g webpack && npm install -g tslint`  


**During installation:**

A `src` folder is created along to hold source files. `src/ts` holds your typescript code, `sass` holds your sass files, `js` holds the typescript compilated files and `fonts` are any fonts that you use.

A `dist` folder is also created to hold your built files, `js` holds the minified js, `css` holds the minified css and `fonts` holds your fonts. An `index.html` file is generated, but is empty - so fill it with your favourite boilerplate.

**Scripts available:**   

`npm run build` Builds the current src files with sourcemaps for development.   
`npm run deploy` Builds the current src files for deployment with no sourcemaps.  

`tslint` is run on both scripts, both `sass` and `webpack` (using the `uglify` plugin) minify before outputting to dist.

**Tips:**

It is recommended you use `npm run -s` instead of `npm run` to squash the readback of the scripts. It makes the output easier to read.

The `webpack` config files are for the build `script` and `deployment` script respectively so add in any configuration you like to those files for development or deployment.
