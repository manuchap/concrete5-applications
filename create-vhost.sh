#!/bin/bash

if [ "$1" == "" ]
  then
    echo 'ERROR : No instalation name'
    exit
fi


## Fill variable
root="/Applications/MAMP/htdocs"
globalApplicationFolder="_applications"
globalPackagesFolder="_packages5.7"
globalConcreteFolder="_concrete5_engine"
globalMysqlFolder="_mysql"



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

## On duplique le boilerplate, on y place concrete et packages.
echo " - Duplicate boilerplate"
cp -r $root/c5-boilerplate $root/$vhost
echo " - Creating symbolic links to concrete, packages"
ln -s $root/$globalConcreteFolder/concrete $root/$vhost/concrete
ln -s $root/$globalPackagesFolder $root/$vhost/packages


## Copier application si il n'existe pas dans le depot git
if [ ! -d $root/$globalApplicationFolder/$dirname ]
  then
    echo " - copying application to the git folder"
    mv -f $root/$vhost/application $root/$globalApplicationFolder/$dirname
  else
    # Si le dossier existe dans le depot git on supprime celui qui était dans le boilerplate
    echo " - Deleting application folder from boilerplate"
    rm -r -f $root/$vhost/application
fi
  # et en faire un lien symbolique du depot git vers le vhost
  echo " - create symbolic link for application"
  ln -s $root/$globalApplicationFolder/$dirname $root/$vhost/application

## On nettoie le dossier application
if [ -d $root/$vhost/application/files/cache ]
  then
  rm -r -f $root/$vhost/application/files/cache
fi
if [ -a $root/$vhost/.htaccess ]
  then
  relativevhost="$vhost\/index.php"
  sed -i -e 's/vhost/'$relativevhost'/g' $root/$vhost/.htaccess
fi

## on efface le fichier database.php si il existe
if [ -a $root/$vhost/application/config/database.php ]
  echo " - Deleting database config file"
  then rm -f $root/$vhost/application/config/database.php
fi
# on met a jour les donnée de connection de la DB du fichier database.php
  echo " - Create database config file + update database name"
  cp $root/$globalMysqlFolder/database.php $root/$vhost/application/config/database.php
  sed -i -e 's/databaseName/'$databaseName'/g' $root/$vhost/application/config/database.php



## On crée la DB si elle n'existe pas
dbQuery=`mysql -u root -proot --skip-column-names -e "SHOW DATABASES LIKE $databaseName"`
if [ "$dbQuery" != "$databaseName" ]
  then
    echo " - creating database $databaseName"
    mysql -uroot -proot -e "create database $databaseName"
fi

# Si le fichier de DB existe dans le depot git, on importe,
if [ -a $root/$globalMysqlFolder/$databaseName.sql.txt ]
  then
    echo " - importing/update database $databaseName"
    mysql -uroot -proot $databaseName < $root/$globalMysqlFolder/$databaseName.sql.txt
fi

echo " - Finished. You may want to update the C5 instalation : http://localhost:8888/$vhost/index.php/ccm/system/upgrade"
