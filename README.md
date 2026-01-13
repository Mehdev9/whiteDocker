# Application Laravel avec Docker

Ce projet est une application Laravel containerisée avec Docker.

## Prérequis

-   Docker installé sur votre machine
-   Docker Compose installé (inclus avec Docker Desktop)
-   Git (optionnel, pour cloner le projet)

## Méthode 1 : Utiliser Docker Compose

Docker Compose permet de démarrer tous les services (application, base de données, phpMyAdmin) avec une seule commande.

### Démarrer l'application

```bash
docker-compose up -d
```

Cette commande va :

-   Construire l'image de l'application Laravel
-   Démarrer le conteneur de l'application (port 8080)
-   Démarrer le conteneur MySQL (port 3306)
-   Démarrer phpMyAdmin (port 8081)
-   Créer un réseau pour la communication entre les services

### Accéder à l'application

-   **Application Laravel** : http://localhost:8080

### Commandes Docker Compose utiles

**Voir les logs de tous les services :**

```bash
docker-compose logs -f
```

**Arrêter tous les services :**

```bash
docker-compose down
```

**Arrêter et supprimer les volumes :**

```bash
docker-compose down -v
```

**Exécuter une commande dans le conteneur :**

```bash
docker-compose exec app bash
```

**Voir l'état des services :**

```bash
docker-compose ps
```

## Méthode 2 : Utiliser Docker directement

Si vous préférez utiliser Docker sans Compose :

### Instructions pour exécuter le conteneur

### 1. Construire l'image Docker

Depuis le répertoire racine du projet, exécutez la commande suivante pour construire l'image Docker :

```bash
docker build -t laravel-app .
```

Cette commande va :

-   Télécharger l'image de base PHP 8.2 avec Apache
-   Installer toutes les dépendances système et PHP nécessaires
-   Copier le code source dans le conteneur
-   Configurer Laravel et Apache

### 2. Démarrer le conteneur

Une fois l'image construite, lancez le conteneur avec :

```bash
docker run -d -p 8080:80 --name white_docker laravel-app
```

**Explications des options :**

-   `-d` : Lance le conteneur en arrière-plan (mode détaché)
-   `-p 8080:80` : Mappe le port 80 du conteneur au port 8080 de votre machine
-   `--name white_docker` : Donne un nom au conteneur pour faciliter sa gestion
-   `laravel-app` : Nom de l'image à utiliser

### 3. Commandes Docker utiles

**Voir les conteneurs en cours d'exécution :**

```bash
docker ps
```

**Arrêter le conteneur :**

```bash
docker stop white_docker
```

**Redémarrer le conteneur :**

```bash
docker start white_docker
```

**Voir les logs du conteneur :**

```bash
docker logs white_docker
```

**Supprimer le conteneur :**

```bash
docker rm -f white_docker
```

## Vérification du fonctionnement de l'application

### Avec Docker Compose

**Vérifier l'état des services :**

```bash
docker-compose ps
```

Tous les services doivent être "Up".

**Accéder à l'application :**

-   Ouvrez http://localhost:8080 dans votre navigateur
-   Vous devriez voir la page d'accueil de Laravel

**Vérifier les logs :**

```bash
docker-compose logs app
```

### Avec Docker directement

### Méthode 1 : Via le navigateur web

1. Ouvrez votre navigateur web
2. Accédez à l'URL : `http://localhost:8080`
3. Vous devriez voir la page d'accueil de Laravel

**Résultat attendu :**

-   La page Laravel s'affiche correctement
-   Aucune erreur 500 ou 404

**Vérifications :**

-   Aucune erreur critique dans les logs
-   Apache démarre correctement
-   Pas d'erreurs PHP

### Méthode 2 : Vérifier que le conteneur est en cours d'exécution

```bash
docker ps
```

**Résultat attendu :**

-   Le conteneur `white_docker` apparaît dans la liste
-   Le statut est "Up" (en cours d'exécution)
-   Le port mapping `0.0.0.0:8080->80/tcp` est visible

### Méthode 3 : Inspecter l'état du conteneur

```bash
docker inspect white_docker
```

Cette commande affiche des informations détaillées sur le conteneur, notamment :

-   L'adresse IP du conteneur
-   Les variables d'environnement
-   L'état du conteneur
-   La configuration réseau

### Nettoyer les conteneurs et images

```bash
# Supprimer tous les conteneurs arrêtés
docker container prune

# Supprimer les images non utilisées
docker image prune
```

## Notes importantes

-   Le fichier `.env` est généré automatiquement à partir de `.env.example` lors de la construction de l'image
-   La clé d'application Laravel (`APP_KEY`) est générée automatiquement
-   Les permissions sur les dossiers `storage` et `bootstrap/cache` sont configurées automatiquement
-   Avec Docker Compose, la connexion à la base de données est automatiquement configurée
