#! /bin/bash

process() {
    f=$1
    tmp=${f/%LC_TIME/tmp}
    mkdir $tmp
    git mv $f $tmp/cake.po
    git mv $tmp $f
}
find ../Locale/ -name LC_TIME -a -type f | while read filename
do
    process ${filename}
done
