# Exercice 2 : Projet web avec Docker Compose

## 📋 Table des matières

- [Structure du projet](#-structure-du-projet)
- [Prérequis](#-prérequis)
- [Installation](#-installation)
- [Lancement du projet](#-lancement-du-projet)
- [Accès aux services](#-accès-aux-services)
- [Persistance des données](#-persistance-des-données)
- [Configuration des environnements](#-configuration-des-environnements)
- [Dépannage](#-dépannage)

---

## 📦 Prérequis

- Docker 20.10+
- Docker Compose 2.20+

---

## 🛠️ Installation

1. Cloner le dépôt :
   ```bash
   git clone [URL_DU_DEPOT]
   cd docker-evaluation/exercice-2
    ```
2. Créer un dossier data/ dans le dossier exercice-2:
    ```bash
    mkdir data
    ```

## 🚀 Lancement du projet

Environnement de développement

```bash
docker compose -f compose.yaml -f compose.dev.yaml up --build
```

Environnement de production

```bash
docker compose -f compose.yaml -f compose.prod.yaml up --build
```

Note : Les healthchecks de MySQL peuvent prendre 10-20s au premier démarrage.

## 🌐 Accès aux services

Client PHP : http://localhost

## 💾 Persistance des données

Les données MySQL sont stockées dans ./data

Le script d'initialisation init.sql se trouve dans docker/mysql/

## ⚙️ Configuration des environnements

Variables d'environnement (dev)

```yaml
MYSQL_ROOT_PASSWORD: root
MYSQL_USER: db_client
MYSQL_PASSWORD: password
DB_NAME: docker_doc_dev
```

Variables d'environnement (prod)

```yaml
MYSQL_ROOT_PASSWORD: a-strong-password
MYSQL_USER: db_client
MYSQL_PASSWORD: another-strong-password
DB_NAME: docker_doc
```

## 🔧 Dépannage

Problème récurrent : Données non chargées

Symptômes :

- La base de données apparaît vide
- Les tables/article ne sont pas créés

Solutions :

Réinitialiser les volumes Docker :

```bash
    docker compose down -v
    rm -rf data/
```

Vérifier les logs MySQL :

```bash
docker compose logs database | grep "Entrypoint"
```

Tester manuellement le script SQL :

```bash
    docker compose exec database mysql -u root -proot -e "SHOW DATABASES;"
```

Forcer la reconstruction :

```bash
    docker compose up --force-recreate --build
```

Autres problèmes courants

- Erreurs de connexion MySQL : Vérifier les variables d'environnement

- Permissions de fichiers : Exécuter chmod -R 755 src/ si besoin

- Cache Docker : Ajouter --no-cache lors du build