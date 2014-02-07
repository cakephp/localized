## File updating/lib.sh -*- shell-script[sh] -*-
#
# Tools for maintaining the localization files and releases
#
# @since 2013-11-05
# @author Michelle Baert <rocky dot road at rocky-shore dot net>

## ================================================== update_translation
# Updates all .po files for the current language according to templates.
#
# param $1 : LC_MESSAGES or LC_TIME subdir to process
# env $PROJECT_VERSION : the new value of Project-Id-Version
update_translation() {
    dir=$1
    mkdir -p $dir
    cd $dir
    echo Processing `pwd`

    # ----------------------------- Save old translations in compendiums
    msgcat --use-first -F *.po | msgattrib --translated -o compendium.po
    # if not specifying --use-first, we may have to resolve conflicts:
    #msgattrib --only-fuzzy compendium.po

    # ----------------------------------------- Update compendium header
    NOW=`date '+%F %T'`
    sed -i -e '/Project-Id-Version:/ s/:.*\\n/: '"$PROJECT_VERSION"'\\n/' \
        -e '/PO-Revision-Date:/ s/:.*\\n/: '"$NOW"'\\n/' \
        compendium.po

    # ------------------------------------------- retrieve PO Templates
    if [[ $dir == LC_MESSAGES ]] ; then
        pot_dir=../..
    else
        pot_dir=../../$dir
    fi

    # ------------------- generate an updated po file for each template
    for pot in $pot_dir/*.pot ; do
        msgmerge --compendium compendium.po \
            -o $(basename ${pot/%.pot/.po}) /dev/null $pot
    done
    cd ..
}