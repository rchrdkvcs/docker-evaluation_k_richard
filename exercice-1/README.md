# Exercice 1 : Validation d’acquis (16 points)

## 1. **Qu’est ce qu’un conteneur ?**

Un conteneur est une machine legere qui contient une application et ses dependances. Il est isolé du reste du
systeme.

## 2. **Est-ce que Docker a inventé les conteneurs Linux ? Qu’a apporté Docker à cette technologie ?**

Non. Docker à apporter des outils pour faciliter la creation, la distribution et l’execution des conteneurs.

## 3. **Pourquoi Docker est adapté pour les processus sans états ?**

Car les conteneurs sont ephemeres et ne stockent pas de donnees. Pour garder les donnes il faut utiliser des volumes.

## 4. **Quel artefact distribue-t-on avec Docker ?**

On distribue des images Docker.

## 5. **Différence entre `docker run` et `docker exec` ?**

`docker run` crée et démarre un nouveau conteneur. `docker exec` exécute une commande dans un conteneur déjà en cours
d’exécution.

## 6. **Processus supplémentaires dans un conteneur en cours d’exécution ?**

Oui, mais un conteneur est censé exécuter un seul processus.

## 7. **Pourquoi éviter le tag `latest` ?**

Car il n’est pas explicite et peut changer à tout moment. C'est pour cela qu'il est preferable d'utiliser des
versions explicites.

## 8. **Décrire `docker run -d -p 9001:80 --name my-php -v "$PWD":/var/www/html php:8.2-apache`**

On lance PHP 8.2 en arrière-plan (`-d`), sur le port 80 du conteneur vers le 9001 de la machine hote, et on monte le
répertoire courant dans `/var/www/html`, et le nomme `my-php`.

## 9. **Arrêter tous les conteneurs ?**

`docker stop $(docker ps -q)` ou `docker compose down` si le projet utilise Compose.

## 10. **Précautions pour les images légères ?**

Il faut utiliser des images legeres de type Alpine Linux, et éviter d’installer des paquets inutiles.

## 11. **Données perdues à l’arrêt d’un conteneur ?**

Vrai. Les données non stockées dans des volumes ou des bind mounts sont perdues, car le système de fichiers d’un
conteneur est éphémère.

## 12. **Une image peut-elle être modifiée après création ?**

Non, il peut etre re-build, mais l’image d’origine reste inchangée.

## 13. **Publier/obtenir des images ?**

Via des registres Docker (Docker Hub, GitLab Registry, etc.) avec `docker push` et `docker pull`.

## 14. **Image la plus petite possible ?**

Les images "scratch" (vide) ou Alpine Linux. Elles contiennent le strict minimum (musl libc, BusyBox).

## 15. **Communication client/serveur Docker ?**

Via un socket UNIX (`/var/run/docker.sock`) ou HTTP/HTTPS. HTTP seul est déconseillé (sécurité), sauf avec TLS.

## 16. **CMD vs ENTRYPOINT ?**

`ENTRYPOINT` définit le processus principal (peut être écrasé avec `--entrypoint`). `CMD` fournit des arguments par
défaut à l’ENTRYPOINT, écrasables à l’exécution.