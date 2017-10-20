# CHM Bioland project
[![Build Status](https://travis-ci.org/cristiroma/bioland.svg?branch=develop)](https://travis-ci.org/cristiroma/bioland)

This project uses BLT Aquia boilerplate http://blt.readthedocs.io/en/8.x/
For local development it uses drupalVM http://docs.drupalvm.com/en/latest/

## Pre-requisites for local development
* have your ssh key authorized on www.cbd-chm.net server
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
blt setup
```
Now you should be able to see the website at http://bioland.local

## Ongoing development
* Primary development branch: develop
* Local drush alias: @boilerplate.local
* Local site URL: http://boilerplate.local

### Common commands
* Run ```blt setup:refresh``` to build your local environment **without database and public files**
* Run ```blt setup:refresh-db``` to build your local environment **including database and public files**

### Configuration management
This project uses config_split for managing configurations. There are 2 splits: prod and dev which are activated automatically by  
In order to preserve the config split integrity while working in a team, the following workflow should be applied 

1. drush csex -y
2. git commit
3. git pull (merge and solve potential conflicts)
4. blt setup:refresh (if config import fails, fix the issues and commit)
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
