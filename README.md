# Autentification JWT avec Symfony
Projet dans lequel on utilise Symfony Security et le Lexik JWT Bundle pour créer une inscription avec hashage de mot de passe et une authentification avec JWT

## How To Use
1. Cloner le projet
2. Faire un `composer install`
3. Générer les clés privée/publique avec `php bin/console lexik:jwt:generate-keypair` (si ça ne marche pas sur windows, installer OpenSSL, fichier d'installation disponible sur le teams)
4. Lancer le serveur avec `symfony server:start`
