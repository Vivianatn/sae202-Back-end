# SAE 202 Documentation 

Après le clone du dossier avec git clone https://github.com/Vivianatn/_sae202 le renommer en sae202 avec la commande suivante : (sudo) mv /var/www/_sae202 sae202

MMI = Votre mmi24xxx personnel

## Création du conf pour mettre le site en ligne

Aller dans /etc/apache2/sites-available sur votre VPS, ensuite tapez la commande (sudo) nano sae202.conf et collez tout ça :

```apache
<VirtualHost *:443>

  ServerName MMI.sae202.ovh
  ServerAdmin MMI1@mmi-troyes.fr
  DocumentRoot /var/www/sae202
  DirectoryIndex index.php

        <Directory /var/www/sae202>
                Options Indexes FollowSymlinks
                AllowOverride All
                Require all granted
                RewriteEngine On
                RewriteCond %{REQUEST_FILENAME} !-f
                RewriteCond %{REQUEST_FILENAME} !-d
                RewriteRule ^([^/]+) index.php/$1
        </Directory>

        <Directory /var/www/sae202/admin>
                AuthType Basic
                AuthBasicProvider file
                AuthName "Administration sae202"
                AuthUserFile "/home/MMI/htpassword.mmi"
                <RequireAny>
                Require ip 195.83.128.43 194.199.63.200 194.199.63.199
                Require valid-user
                </RequireAny>
        </Directory>

</VirtualHost>
```


Ensuite faites CTRL+S puis CTRL+X (CMD si vous êtes sur MAC).

## Création des Alias

Aller ensuite dans /etc/apache2/conf-available sur votre VPS, ensuite taper la commande suivante (sudo) nano agence.conf et coller tout ça :

```apache
Alias /agence /var/www/agence

<Directory /var/www/agence>
DirectoryIndex index.php
Options -Indexes
AllowOverride All
</Directory>

Ensuite faites CTRL+S puis CTRL+X (CMD si vous êtes sur MAC).

Dans le même dossier, faites (sudo) nano admin.conf et coller tout ça :

Alias /gestion /var/www/sae202/admin

<Directory /var/www/sae202/admin>
DirectoryIndex admin.php
Options -Indexes
AllowOverride All
</Directory>
```

Ensuite faites CTRL+S puis CTRL+X (CMD si vous êtes sur MAC).

## Activer tous les fichiers et relancer apache

Ensuite pour activer tous les fichiers faites dans le même dossier (conf-available) les deux commandes suivantes : (sudo) a2enconf agence.conf et (sudo) a2enconf admin.conf.

Pour ativer le site en lui même aller dans le dossier sites-available et taper cette commande (sudo) a2enconf admin.conf.

Ensuite pour que tout soit parfait il faut relancer apache alors tapez cette commande : service apache2 reload.

Maintenant avec l'URL suivant vous pouvez voir le site hébergé sur vos VPS : http://MMI.sae202.ovh

## Les bases de données

Il faut d'abord créer une database pour nos tables du site on l'appellera sae202Base voici les commandes pour créer cette database ainsi que l'utilisateur qui va avec :
```sql
create database sae202Base;
create user 'sae202user'@'localhost' identified by 'password';
grant all on sae202Base.* TO 'sae202User'@'localhost';
```

Et normalement tout est bon dans votre admisql : MMI.mmi-troyes.fr/adminsql

Normalement dans le dossier data dans sae202 il y a un fichier sae202Base.sql. Pour importer toutes les tables nécessaires vous pouvez soit mettre le fichier dans importer de adminsql soit vous faites la commande suivante : mysqldump sae202Base < sae202Base.sql

Et les bases de données sont prêtes.

## Finalisation et certification ssl (mettre en https)

Ensuite, tapez la commande certbot et un menu s'affichera. Tapez le numéro qui correspondra à l'URL  de votre site donc un truc comme MMI.sae202.ovh et taper sur entrée. Et normalement la certification est faite et si ça ne le fait pas faites vous un partage de connexion avec votre PC et recommencer l'opération.

Et normalement vous aurez accès à votre avec cet URL si tout se passe bien et si vous avez tout bien fait : https://MMI.sae202.ovh
