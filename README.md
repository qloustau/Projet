# Projet

Prérequis
------------
Php installer sur le pc via <a href="http://www.cndp.fr/crdp-dijon/Installer-et-configurer-Wampserver.html" target="_blank">Wamp</a> si cela n'est pas déjà fait

Installation
------------
Pour Windows :<br>
installer composer via cmder ou avec le <a href="https://www.hostinger.fr/tutoriels/installer-utiliser-composer/#gref" target="_blank">Composer Setup sous Windows</a>.<br>
Pour Linux/Unix/MacOS :<br>
Merci de suivre ce tuto en anglais pour l'installation de <a href="https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos" target="_blank">Composer via ligne de commande</a><br>
<br>
-Une fois composer installer déplacer vous dans le dossier du projet faire un **"composer install"**, cela va permettre d'intaller les dépendances du projet<br><br>
-Allez sur la <a href="localhost/phpmyadmin" target="_blank">base de donné mysql en localhost</a> avec l'utilisateur **"root"** et le mdp **""** créer une base de données nommé **"bdd_gestion_vehicule"** encoder en **utf8mb4_unicode_ci**<br><br>
-Tout cela peut être modifier dans les fichiers **.env** et **doctrine.yaml**.
Une fois cela effectuer faire un **"php bin\console do:mi:mi"** qui va permettre de faire la création de la base de donnée ainsi que les modifications apporter durant le projet.<br><br>
-Si vous avez besoin de créer des données virtuelles taper la commande **"php bin\console do:fi:lo"** sinon lancer la commande **"php bin\console se:ru"** de base symfony va lancer le projet en localhost avec le port 8000 si vous voulez changer cela ajouter l'adresse:port comme cela **"php bin\console localhost:8000'**
<br>