# Bootstrap project
[![Build Status](https://travis-ci.org/cristiroma/drupal.boilerplate.8.svg?branch=blt)](https://travis-ci.org/cristiroma/drupal.boilerplate.8)

This project uses BLT Aquia boilerplate http://blt.readthedocs.io/en/8.x/
For local development it uses drupalVM http://docs.drupalvm.com/en/latest/

This project is meant to be a quick startup for a new Drupal 8 project with some common configurations and modules.

## First time setup
* Download this repo and git init the folder.
* Change names in project.yml
* Change names in box/config.yml
* Change names in drush/site-aliases/aliases.drushrc.php.
* Run scripts from [Getting started](#getting-started)
* Log in to drupal ```drush @[project.machine_name].local uli```

Now you should be able to see the website at [http://PROJECT_NAME.local]

##### After your staging server is ready and you would like to sync the db
* change in project.yml setup.strategy from import to sync
* copy files from demo-files to files
* change in settings.php file_public_path to sites/default/files
* Set your staging server url in /admin/config/system/stage_file_proxy
* Make changes in .travis.yml according to your project (more info in .travis.yml)
* Remove or change behat example features for boilerplate project after you start customizing your project.

## Pre-requisites for local development
* have your ssh key authorized on your project server in order to make db sync
* install git
* install composer
* install virtual box and vagrant (optional ansible) (as described in drupalVM http://docs.drupalvm.com/en/latest/)

## Getting started

```bash
composer self-update
composer install
composer run-script blt-alias
source ~/.bash_profile
blt vm
blt setup
```
Now you should be able to see the website at [http://PROJECT_NAME.local]

## Encountered issues on setup
* if you cannot make ssh from within vagrant, but you can from your local machine, use ```ssh-add ~/.ssh/id_rsa``` (or whatever key name is)

## Ongoing development
* Primary development branch: develop
* Local drush alias: @boilerplate.local
* Local site URL: http://boilerplate.local

### Common commands
* Run ```blt custom:refresh``` to build your local environment **without database and public files**
* Run ```blt custom:refresh-db``` to build your local environment **including database and public files**

### Configuration management
This project uses config_split for managing configurations. There are 2 splits: prod and dev which are activated automatically by  
In order to preserve the config split integrity while working in a team, the following workflow should be applied 

1. drush csex -y
2. git commit
3. git pull (merge and solve potential conflicts)
4. blt custom:refresh (if config import fails, fix the issues and commit)
5. git push

### Merging config management with production
Proposed solution
* git checkout to prod-config branch (new branch)
* download the config zip from prod and overwrite the config in local folder
* git commit new changes to prod-config
* git checkout develop
* git merge prod-config into develop
* solve possible git conflicts
* commit new changes to develop
* import new configs into local env to validate
* [warn] only and right after production update, merge master (or develop) into prod config (This could be automated)


### Updating production
The repo for artifacts is https://github.com/cristiroma/drupal.boilerplate.8
From prod project root
```bash 
git pull
./update.sh
```


## Resources

* Redmine - 
* GitLab - 
* GitLab Artifact - 
* GitHub - 
* TravisCI - 


## Extras
### VM
If you have conflicts on vagrant IP on local development or wish to make extra configuration or overwrite only on your local VM, you can create a ```/box/local.config.yml``` file.

