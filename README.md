
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

        - La page d’accueil liste les pratiques stockées dans la base de données en affichant le texte complet de la pratique, son domaine et sa date de modification 
        - Les dates sont au format “2 avril 2021” 
        - Seules les pratiques qui sont dans l’état ‘Publié’ sont visibles 
        - S’il n’y a aucune pratique qui répond au critère de filtre, le message “Aucune pratique à afficher ici” est affiché 
        - La page d’accueil contient un champ numérique “nouveau de X jours” 
        - Quand j’arrive sur la page d’accueil, X vaut 5 et les seules pratiques affichées sont celles qui ont été modifiées dans les 5 derniers jours. 
        - Quand je modifie X, le contenu de la page est immédiatement mis à jour 
        - L’application utilise un layout global dans lequel les vues viennent s’insérer 
        - L’application présente une interface propre et ergonomique, basée sur des assets css pré-existant (Tailwind, Bootstrap, Bulma, …) 
        - Les assets css et js sont pré-processés pour être placé dans public 
