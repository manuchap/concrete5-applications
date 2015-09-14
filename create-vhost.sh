#!/bin/bash

globalApplicationFolder="_applications"
globalPackagesFolder="_packages5.7"
globalConcreteFolder="_concrete5_engine"


# Si il n'y a pas de sous domaine le domaine est le parametre
# sionon c'est domaine.sous-domaine
if [ "$2" != "" ]
then
  vhost="$1.$2"
  dirname="$1_$2"
  databaseName="myconcretelab_$1_$2"
else
  vhost=$1
  dirname="$1"
  databaseName="myconcretelab_$1"
fi

cp -r /Applications/MAMP/htdocs/c5-boilerplate /Applications/MAMP/htdocs/$vhost
ln -s /Applications/MAMP/htdocs/$globalConcreteFolder/concrete /Applications/MAMP/htdocs/$vhost/concrete
ln -s /Applications/MAMP/htdocs/$globalPackagesFolder /Applications/MAMP/htdocs/$vhost/packages

## Copier applicatio et en faire un lien
#mv -f /Applications/MAMP/htdocs/$vhost/application /Applications/MAMP/htdocs/$globalApplicationFolder/$dirname
ln -s /Applications/MAMP/htdocs/$globalApplicationFolder/$dirname /Applications/MAMP/htdocs/$vhost/application

## Creer la DB
mysql -uroot -proot -e "create database $databaseName"
