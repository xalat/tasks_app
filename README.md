### Pour installer le projet

A la racine du projet: 
Lancer les conteneurs
`./start.sh  
`
Lancer les migrations DB
`docker exec -it laravel_app php artisan migrate
`

Installer les packages front 
`docker exec -it react_app npm install
`
### Lancement de l'application

Démarrer le serveur vite
`docker exec -it react_app npm run dev
`


