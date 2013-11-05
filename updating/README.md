# Synchronizing Localized plugin with new versions of CakePhp

## Overview
For each major release of CakePhp, we are going to make a new branch
of **Localized**, so users would find what they need.

In this process, we want to keep as much as we can of existing translations
for each language.

## Requirements
  - Linux OS
  - git
  - a git clone of cakephp
  - gettext tools

## Setup
Check `settings.sh` and adjust to your needs .


## Checkout the versions you need
The script relies on .git data to track the extract version of translated program.

Make sure the current branch of Localized matches the checked out version of CakePhp.
