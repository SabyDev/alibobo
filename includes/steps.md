Étapes pour la réalisation du formulaire "mot de passe oublié"
vérifier si l'utilisateur existe en vérifiant si l'email existe, si il n'existe pas, rediriger vers un message d'erreur

si l'utilisateur existe : envoyer un email contenant un token horodaté à l'utilisateur

après clique sur le lien du token de l'utilisateur, redirection vers le token prévu à cet effet puis affichage d'un formulaire proposant à l'utilisateur de renouveler son mot de passe

vérification du nouveau mot de passe (entrer le mot de passe deux fois)

valider le nouveau mot de passe et l'inscrire dans la base de données (update) puis afficher un message de confirmation de changement de mot de passe sur la page login