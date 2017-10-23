# Bootstrap project
[![Build Status](https://travis-ci.org/cristiroma/drupal.boilerplate.8.svg?branch=blt)](https://travis-ci.org/cristiroma/drupal.boilerplate.8)

This project uses BLT Aquia boilerplate http://blt.readthedocs.io/en/8.x/
For local development it uses drupalVM http://docs.drupalvm.com/en/latest/

This project is meant to be a quick startup for a new Drupal 8 project with some common configurations and modules.

## First time setup
Download this repo and git init the folder. (optionally you can add this repo as a secondary origin)

Change names in project.yml

Change names in box/config.yml

Change names in drush/site-aliases/aliases.drushrc.php.

run scripts from Getting started

Log in to drupal ```drush @[project.machine_name].local uli```

Set your staging server url in /admin/config/system/stage_file_proxy

When your staging server is ready and you would like to sync the db, change in project.yml setup.strategy from import to sync 

## Pre-requisites for local development
* have your ssh key authorized on your project server in order to make db sync
* install git
* install composer
* install virtual box and vagrant (optional ansible) (as described in drupalVM http://docs.drupalvm.com/en/latest/)

## Getting Started

```bash
git clone git@gitlab.com:bioland/website.git
git checkout develop
composer self-update
composer install
composer run-script blt-alias
source ~/.bash_profile
blt vm
blt custom:setup
```
Now you should be able to see the website at http://bioland.local

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
[To be discussed]

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

