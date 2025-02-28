1. **Page d'accueil**  
   ![Page d'accueil](https://res.cloudinary.com/drxas1wpe/image/upload/v1740773253/Screenshot_2025-02-28_at_20.49.10_msobba.png)

2. **Gestion des produits**  
   ![Gestion des produits](https://res.cloudinary.com/drxas1wpe/image/upload/v1740773253/Screenshot_2025-02-28_at_21.06.44_hqoacl.png)

---

# 🚀 StackShelf - Backend Symfony

**StackShelf** est le **backend Symfony** d'une application full stack qui permet de gérer des produits et des catégories. Il fournit une **API RESTful** pour le frontend React, avec des opérations CRUD complètes, une gestion des images via Cloudinary, et une base de données MySQL/PostgreSQL.

---

## 🚀 Fonctionnalités Clés

- **API RESTful** : Endpoints structurés pour la gestion des produits et des catégories.
- **Opérations CRUD Complètes** : Ajouter, modifier, supprimer des produits et des catégories.
- **Intégration de Cloudinary** : Téléchargement et gestion des images des produits.
- **Base de Données Relationnelle** : Utilisation de **Doctrine ORM** pour MySQL/PostgreSQL.
- **CORS Activé** : Communication fluide entre le frontend React et le backend Symfony.

---

## 🛠️ Technologies Utilisées

- **Symfony 6** (Framework PHP)
- **API Platform** (Génération d'API RESTful)
- **Doctrine ORM** (Gestion de la base de données)
- **Cloudinary** (Gestion des images)
- **MySQL/PostgreSQL** (Base de données)
- **CORS Bundle** (Communication frontend-backend)

---

## 🛠️ Installation & Configuration

### **Configuration du Backend (Symfony)**

1. Clonez le dépôt :
   ```bash
   git clone https://github.com/votre-utilisateur/backend-stackshelf.git
   cd backend-stackshelf
   ```

2. Installez les dépendances :
   ```bash
   composer install
   ```

3. Configurez la base de données :
   Créez un fichier `.env.local` et ajoutez les informations de connexion à votre base de données :
   ```ini
   DATABASE_URL="mysql://root:password@127.0.0.1:3306/stackshelf"
   ```

4. Exécutez les migrations :
   ```bash
   php bin/console doctrine:migrations:migrate
   ```

5. Configurez Cloudinary :
   Ajoutez vos clés Cloudinary dans le fichier `.env.local` :
   ```ini
   CLOUDINARY_CLOUD_NAME=votre_nom_cloudinary
   CLOUDINARY_API_KEY=votre_clé_api
   CLOUDINARY_API_SECRET=votre_clé_secrète
   ```

6. Lancez le serveur Symfony :
   ```bash
   symfony server:start
   ```

---

## 🔗 Points d'Accès de l'API

Voici les endpoints disponibles pour interagir avec le backend :

| Méthode   | Endpoint               | Description                  |
|----------|------------------------|------------------------------|
| `GET`    | `/api/produit`         | Obtenir tous les produits    |
| `POST`   | `/api/produit`         | Ajouter un nouveau produit  |
| `PUT`    | `/api/produit/{id}`    | Mettre à jour un produit    |
| `DELETE` | `/api/produit/{id}`    | Supprimer un produit        |
| `GET`    | `/api/categorie`       | Obtenir toutes les catégories |
| `POST`   | `/api/categorie`       | Ajouter une nouvelle catégorie |
| `PUT`    | `/api/categorie/{id}`  | Mettre à jour une catégorie |
| `DELETE` | `/api/categorie/{id}`  | Supprimer une catégorie     |

---

## ✅ Tests & Débogage

- **Tests de l'API** : Utilisez des outils comme **Postman** ou **Thunder Client** pour tester les endpoints de l'API.
- **Débogage Symfony** : Activez le mode debug pour vérifier les erreurs :
  ```bash
  APP_ENV=dev symfony server:start
  ```
- **Vérification des Migrations** : Vérifiez l'état des migrations :
  ```bash
  php bin/console doctrine:migrations:status
  ```

---

## 🚀 Déploiement

### **Déploiement du Backend (Heroku, DigitalOcean, etc.)**
1. Configurez un serveur distant (ex. **Heroku**, **DigitalOcean**).
2. Ajoutez les variables d'environnement nécessaires (base de données, Cloudinary, etc.).
3. Déployez le projet via Git :
   ```bash
   git push heroku main
   ```

---

## � Améliorations Futures

- Ajouter une **authentification JWT** pour sécuriser les endpoints.
- Implémenter une **pagination** pour les grands ensembles de données.
- Ajouter des **tests unitaires et fonctionnels** pour l'API.

---

## 📝 Auteur

Développé par **Thuthikaran Easvaran** pour le **test de recrutement Teach'r**.

📩 N'hésitez pas à me contacter pour toute question ou retour !

---
