### CoffeeScript Compilation Utility ###

To compile all CoffeeScript files to a single JavaScript file make sure you have the following node packages installed:
* coffee-script
* rehab
* uglify-js
* jasmine-node
* jasmine-jquery

Within your .coffee files, place `#_require [filename]` on the files that have dependencies. For example: 

    #_require filename.coffee
    #_require filename2.coffee
    
    class app.Model2

Once the node packages are installed, run `cake build` and the Cakefile will take care of the rest!