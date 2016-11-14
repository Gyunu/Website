#Boilerplate

This boilerplate is to get up and running quickly with Typescript, Sass and Webpack.
It requires sass, tslint and webpack CLI to be installed globally.

It contains a Vagrant file so you can use vagrant for development if you want.
Set the project name variable in the Vagrant file and it will be used to name directory structure, synced folder and apache configuration.

###Installation:

**Installing Vagrant**  
Change the project and password variables in the `Vagrantfile` to something of your choosing.
Run `vagrant up` to build the vagrant box using the project name and password for directories, structure and synced folder.
This folder will be synced to `/var/www/vhosts/[PROJECTNAME]` on the guest.

once vagrant is finished (it may take a while depending on your internet speed), `vagrant ssh` into the box and navigate to the vhost directory.

**Installing Node Via NVM**  

Run `nvm ls-remote` and install the latest LTS version of node (this was tested with `v6.9.1`) using `nvm install [VERSION NUMBER]`.

**Installing Front End**  

After you've installed node (using NVM or other) run `npm install` and wait for it to finish. Then run `npm run -s deploy` to get a built version of the boiler plate.

A `src` folder is created along to hold source files. `src/ts` holds your typescript code, `sass` holds your sass files, `js` holds the typescript compilated files and `fonts` are any fonts that you use.

A `dist` folder is also created to hold your built files, `js` holds the minified js, `css` holds the minified css and `fonts` holds your fonts. An `index.html` file is generated, but is empty - so fill it with your favourite boilerplate.

**Scripts available:**   

Check the `package.json` for the list of available commands - the main ones being:  

`npm run build` Builds the current src files with sourcemaps for development.   
`npm run deploy` Builds the current src files for deployment with no sourcemaps.  

`tslint` is run on both scripts, both `sass` and `webpack` (using the `uglify` plugin) minify before outputting to dist.

**Tips:**

It is recommended you use `npm run -s` instead of `npm run` to squash the readback of the scripts. It makes the output easier to read.

The `webpack` config files are for the build `script` and `deployment` script respectively so add in any configuration you like to those files for development or deployment.

To forward standard ports on OSX follow these instructions:
http://salvatore.garbesi.com/vagrant-port-forwarding-on-mac/

Determine the vagrant ip by sshing into the box and running ifconfig
then you can use that ip to access the website, or alias it in hosts
