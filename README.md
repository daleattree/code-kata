#Code Kata Base
This repo provides the basic skeleton needed to start a code kata.

It can be used by running the following 
```bash
git clone git@github.com:afrihost/code-kata-base.git <name_of_kata>
```
This will clone a copy of the skeleton in to a new directory that you specify in place of *\<name_of_kata\>*

## Usage
Your source code should go in the `Src` directory and will be autoloaded in the `Src` namespace

Your tests should go in the `Test` directory and will only be autoloaded if you do a `composer install` or `composer update` with `--dev`

Tests can be executed by running `./phpunit` in the root directory of the project. The default settings that *PHPUnit* will run with can be seen in the `phpunit.xml` file
