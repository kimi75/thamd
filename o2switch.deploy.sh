#!/bin/bash

# Informations de connexion FTP
HOST="ftp.wxwx3825.odns.fr"
USER="wafa-lahmar-architecte@wafa-lahmar-architecte.com"
PASS="azh’kl&hlsqjdljkqslkduaoiz’uàçop%234MMLDSMùé’%AZeù%ez%&%Eazù"

# Nom de votre application Laravel
APP_NAME="wafa-lahmar-architecte.com"

# Chemin vers le répertoire d'installation de l'application Laravel sur votre serveur FTP
REMOTE_DIR="/home/wxwx3825/${APP_NAME}"

# Chemin vers votre application Laravel en local
LOCAL_DIR="$(pwd)"

# Chemin vers le répertoire d'installation de Vite sur votre serveur FTP
REMOTE_VITE_DIR="${REMOTE_DIR}/public/build"

# Chemin vers votre application Vite en local
LOCAL_VITE_DIR="${LOCAL_DIR}/public/build"

# build application
npm run build

# Création du répertoire d'installation s'il n'existe pas déjà
ftp -inv ${HOST} <<EOF
user ${USER} ${PASS}
mkdir ${REMOTE_DIR}
quit
EOF

# Transfert des fichiers Laravel
lftp -u ${USER},${PASS} ${HOST} <<EOF
mirror -R --delete --exclude=.git --exclude=node_modules ${LOCAL_DIR} ${REMOTE_DIR}
quit
EOF


# Installation des dépendances PHP avec composer
ssh ${USER}@${HOST} "cd ${REMOTE_DIR} && composer install --no-dev"

# Réglage des permissions
ssh ${USER}@${HOST} "cd ${REMOTE_DIR} && chmod -R 777 storage bootstrap/cache"

# Configuration du fichier .env
ssh ${USER}@${HOST} "cd ${REMOTE_DIR} && cp .env .env && php artisan key:generate"

# Lancement des migrations
#ssh ${USER}@${HOST} "cd ${REMOTE_DIR} && php artisan migrate --force"

# Transfert des fichiers Vite
lftp -u ${USER},${PASS} ${HOST} <<EOF
mirror -R --delete --exclude=node_modules ${LOCAL_VITE_DIR} ${REMOTE_VITE_DIR}
quit
EOF