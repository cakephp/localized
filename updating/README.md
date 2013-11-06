# Synchronizing Localized plugin with new versions of CakePhp

## Overview
For each major release of CakePhp, we are going to make a new branch
of this project, so users would find what they need.

In this process, we want to keep as much as we can of existing translations
for each language.

## Requirements
  - Linux OS
  - git
  - a git clone of cakephp
  - gettext tools

## Operation
### Setup
Check [settings](settings) and adjust to your needs .

In the 'versionning' branch, where these tools are maintained, the target language is defined to 'test'.

### Checkout the versions you need
The script relies on .git data to track the extract version of translated program.

Make sure the current branch of *Localized* matches the checked out version of *CakePhp*.

## Update.sh
This script should handle all steps to start a new ''Localized'' branch,
dedicated to a specific cakephp version.

It is still in infancy, so be careful !
Here are the main tasks it performs.

### Generate new templates (.POT files)
This is done with the [i18n shell of cakephp][i18n-sh].

``` sh
    $CAKE i18n extract \
        --extract-core yes \
        --exclude-plugins \
        --merge no \
        --app $CAKEPHP_WORKTREE/app/ \
        --paths $CAKEPHP_WORKTREE/app/ \
        --output $LOCALIZED_WORKTREE/Locale \
        || exit $?
```

Note: there is no `--overwrite` option, so the program will ask.  a
      solution would be to use the "yes" tool or similar, but it might
      be dangerous for little benefit.

[i18n-sh]: http://book.cakephp.org/2.0/en/console-and-shells/i18n-shell.html  "I18N shell in cakephp2 cookbook"

### Maintaining Project-Id-Version in .POT and .PO headers

The release version is extracted from `$CAKEPHP_WORKTREE/lib/Cake/VERSION.txt`
and it is completed with the the current git commit-id.

The computed `Project-Id-Version` is saved in [PROJECT_VERSION](PROJECT_VERSION)
and injected in .POT and .PO files.

### Maintaining compendiums of known translations.
Ref: http://www.gnu.org/software/gettext/manual/html_node/Using-Compendia.html
This is a [built-in feature of gettext][gt_compendium] , which will allow us to keep old translations for future reference.

We merge all .PO files in the directory and keep only the translated messages.

``` sh
 msgcat --use-first -F *.po | msgattrib --translated -o compendium.po
```
[gt_compendium]: http://www.gnu.org/software/gettext/manual/html_node/Compendium.html "Gettext manual: Using Translation Compendia"

### New .PO files

``` sh
msgmerge --compendium compendium.po -o $po /dev/null $pot
```
A new value for `PO-Revision-Date` is injected in the newly created file.

### Producing stats
**TODO** Producing stats

### Updating .PO files
The .PO files are then maintained by translators.

### LC_TIME

**TODO** : find documentation on LC_TIME files format.


