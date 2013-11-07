#! /bin/bash
## File updating/update.sh
#
# This script will update localized files to match
# currently checked out cakephp version.
#
# @since 2013-11-04
# @author Michelle Baert <rocky dot road at rocky-shore dot net>

#=========================================== Settings
# Absolute path to this script, e.g. /home/user/bin/foo.sh
SCRIPT=$(readlink -f "$0")
# Absolute path this script is in, thus /home/user/bin
SCRIPTPATH=$(dirname "$SCRIPT")
# import variables in current environment
. "$SCRIPTPATH/settings"

# fetch current versions
CAKEPHP_VERSION=`grep -v '^//' $CAKEPHP_WORKTREE/lib/Cake/VERSION.txt`
CAKEPHP_COMMIT=`git --git-dir $CAKEPHP_WORKTREE/.git rev-parse HEAD`
PROJECT_VERSION="CakePHP v$CAKEPHP_VERSION commit $CAKEPHP_COMMIT"

# ========================================== Check
echo Processing $PROJECT_VERSION

cd $LOCALIZED_WORKTREE
LOCALIZED_BRANCH=`git rev-parse --abbrev-ref HEAD`
if [[ "$LOCALIZED_BRANCH" != "$CAKEPHP_VERSION" ]] ; then
    echo "Wrong branch: " $LOCALIZED_BRANCH
fi

if [[ -e PROJECT_VERSION ]] ; then
    previous_version=`cat PROJECT_VERSION`
else
    previous_version=NONE
fi
# ========================================== Extract strings
if [[ $PROJECT_VERSION != $previous_version ]]; then
    $CAKE i18n extract \
        --extract-core yes \
        --exclude-plugins \
        --merge no \
        --app $CAKEPHP_WORKTREE/app/ \
        --paths $CAKEPHP_WORKTREE/app/ \
        --output $LOCALIZED_WORKTREE/Locale \
        || exit $?
    echo $PROJECT_VERSION > PROJECT_VERSION
fi
# Note: there is no --overwrite option, so the program will ask.
#       a solution would be to use the "yes" tool or similar,
#       but it might be dangerous for little benefit.
#    --ignore-model-validation \

# ========================================= Inject Project version
cd $LOCALIZED_WORKTREE/Locale/
sed -i "/Project-Id-Version:/ s/PROJECT VERSION/$PROJECT_VERSION/" *.pot

# ========================================= Process lang directories
. "$SCRIPTPATH/lib.sh"
cd $LOCALIZED_WORKTREE/Locale
for lang in $MY_LANG ; do
    cd $lang
    for dir in LC_MESSAGES ; do
        update_translation $dir
    done
    cd ..
done

# ========================================= EOF
echo Finished.