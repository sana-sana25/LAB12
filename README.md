# LAB 12 - Application Android de Géolocalisation avec PHP/MySQL et Google Maps

##  Objectif du TP

L’objectif de ce TP est de développer une application Android capable de :

* récupérer la position GPS du téléphone,
* envoyer les coordonnées vers un serveur PHP,
* stocker les positions dans une base de données MySQL,
* afficher les positions enregistrées sur Google Maps.

---

#  Technologies utilisées

| Technologie     | Rôle                   |
| --------------- | ---------------------- |
| Android Studio  | Développement mobile   |
| Java            | Programmation Android  |
| Google Maps API | Affichage de la carte  |
| Volley          | Communication HTTP     |
| PHP             | Backend/API            |
| MySQL           | Base de données        |
| XAMPP           | Serveur Apache + MySQL |

---

# 📁 Architecture du projet

## Backend PHP (XAMPP)

```text id="jlwm6y"
htdocs/
└── localisation/
    ├── classe/
    │     └── Position.php
    │
    ├── connexion/
    │     └── Connexion.php
    │
    ├── dao/
    │     └── IDao.php
    │
    ├── service/
    │     └── PositionService.php
    │
    ├── createPosition.php
    └── showPositions.php
```

---

## Projet Android

```text id="7jlwmm"
Localisation/
│
├── MainActivity.java
├── MapsActivity.java
│
├── activity_main.xml
├── activity_maps.xml
│
├── AndroidManifest.xml
├── strings.xml
├── google_maps_api.xml
└── build.gradle
```

---

#  Base de données

## Création de la base

```sql id="jlwm4m"
CREATE DATABASE localisation;
```

---

## Création de la table

```sql id="zjlwm9"
CREATE TABLE position (
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    latitude DOUBLE NOT NULL,
    longitude DOUBLE NOT NULL,
    date DATETIME NOT NULL,
    imei VARCHAR(20) NOT NULL
);
```

---

#  Fonctionnement de l’application

## 1️⃣ Récupération GPS

L’application Android récupère :

* latitude,
* longitude,
* altitude,
* précision GPS.

---

## 2️⃣ Envoi HTTP

Les données sont envoyées via Volley vers :

```text id="jlwm2m"
createPosition.php
```

avec une requête HTTP POST.

---

## 3️⃣ Enregistrement MySQL

Le backend PHP :

* reçoit les données,
* crée un objet Position,
* exécute un INSERT dans MySQL.

---

## 4️⃣ Affichage Google Maps

L’activité MapsActivity :

* appelle `showPositions.php`,
* récupère le JSON,
* affiche les positions sous forme de markers.

---

#  Exemple de données insérées

| Ville      | Latitude | Longitude |
| ---------- | -------- | --------- |
| Casablanca | 33.5731  | -7.5898   |
| Fès        | 34.0331  | -5.0003   |

---

# 📱 Résultat obtenu

L’application affiche :

✅ les coordonnées GPS
✅ les positions enregistrées dans MySQL
✅ les markers sur Google Maps
✅ les villes marocaines insérées manuellement

---

# 🎥 Démonstration vidéo 


https://github.com/user-attachments/assets/0ebfbf0f-d892-4367-a5ff-0416a7601e6c






# Auteur
ASSEKNOUR SANA - ENSA Marrakech

4eme année Cybersécurité et systéme de télécommunications
