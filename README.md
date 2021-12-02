
# Priki


### About Prki

Il s'agit d'un site où les utilisateurs peuvent soumettre des bonnes pratiques de développeur, en les
argumentant et en les étayant au moyen de références externes.
Chaque utilisateur peut commenter les pratiques proposées.
Certains utilisateurs disposent de droits qui leur permettent de marquer une pratique proposée comme
'best'


## User Stories


#### Modifications récentes

    En tant que visiteur
    Je veux que la page d’accueil de Priki ne me montre que les ajouts ou modifications récentes
    Pour pouvoir rester à jour sans devoir rechercher les nouveautés 


    DoD

        - La page d’accueil liste les pratiques stockées dans la base de données en affichant le texte complet de la 
          pratique, son domaine et sa date de modification 
        - Les dates sont au format “2 avril 2021” 
        - Seules les pratiques qui sont dans l’état ‘Publié’ sont visibles 
        - S’il n’y a aucune pratique qui répond au critère de filtre, 
          le message “Aucune pratique à afficher ici” est affiché 
        - La page d’accueil contient un champ numérique “nouveau de X jours” 
        - Quand j’arrive sur la page d’accueil, X vaut 5 et les seules pratiques affichées 
          sont celles qui ont été modifiées dans les 5 derniers jours. 
        - Quand je modifie X, le contenu de la page est immédiatement mis à jour 
        - L’application utilise un layout global dans lequel les vues viennent s’insérer 
        - L’application présente une interface propre et ergonomique, 
          basée sur des assets css pré-existant (Tailwind, Bootstrap, Bulma, …) 
        - Les assets css et js sont pré-processés pour être placé dans public 


#### Liste par domaine

    En tant que visiteur
    Je veux pouvoir consulter la liste des pratiques d’un domaine particulier 


    DoD

        - La barre de navigation du site contient une dropdown list labellisée ‘Domaine:’ 
        - Par défaut, la dropdown list affiche la valeur ‘Tous (xxx)’. Xxx est le nombre total de pratiques publiées.  
        - Les valeurs de la dropdown list sont les noms des domaines, suivis de ‘(xxx)’, 
          le nombre de pratiques publiées dans ce domaine  
        - Quand je sélectionne un domaine de la dropdown (‘Tous’ inclus), 
          le contenu de la page est mis à jour pour n’afficher que les pratiques qui correspondent à la sélection  
        - Lorsque ‘Tous’ les domaines est sélectionné, l’affichage des pratiques montre le texte complet, 
          le domaine et la date de modification. Lorsqu’un domaine spécifique est sélectionné, 
          l’affichage des pratiques ne contient pas le domaine 
        - Le domaine nous servira de contexte général, y compris quand nous éditerons les textes, 
          opinions et commentaires. Le domaine choisi est donc mémorisé dans la session php 
