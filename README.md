J'adore GuardianSavings https://guardiansavings.org/ mais il n'y a pas de fonction simple de sauvegarde.

Si le site disparait (vu l'activité du blog on peut même déjà s'inquiéter un peu), on perd l'intégralité des tirelires de ses enfants
Je n'aime pas trop cette situation de dépendance.

Je cherche donc à reproduire le fonctionnement basique avec un bête site php, une base sqlite (facile à sauvegarder, et vu le nombre d'utilisateurs + la fréquence d'accès, on ne craint pas trop la surcharge).

C'est aussi l'occasion (pour moi) de reprendre un peu des bases de codes sans me reposer sur de multiples frameworks, ... car l'appli est tellement simple que ça ne justifie pas de sortir d'artillerie lourde.

*Le principe*
- création d'un compte (1 par famille typiquement) avec email + pass + un code pin pour valider les opérations
- pour chaque compte on peut créer des utilisateurs. Chaque utilisateur est un enfant
- le parent choisit un enfant dans la liste pour consulter le solde de son compte, et effectuer de nouvelles transactions (dépot/retrait)
- via une tâche planifiée, chaque mois on peut ajouter des intérêts (définis dans les paramètres de l'utilisateur)

Le projet est à son tout début, quasiment rien ne fonctionne (à part la création de compte/utilisateur) et il y a zéro sécurité.
