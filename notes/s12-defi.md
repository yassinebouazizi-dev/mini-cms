# Session 12 - Défi

1. Pourquoi role n'est-il pas dans #[Fillable], et comment votre contrôleur le modifie-t-il quand même ?
Votre contrôleur d'inscription ne passe que name, email et password à create() : un champ role ajouté à la main serait ignoré aujourd'hui. Hors de #[Fillable], role reste protégé même si un contrôleur passe un jour $request->all(), ou si une règle role apparaît dans une Form Request. Le contrôleur du niveau 1 affecte l'attribut lui-même, à partir d'une valeur validée et après la vérification de la policy, puis appelle save().

2. Pourquoi le callback de Gate::before doit-il renvoyer null, et non false, pour un auteur ?
false est une réponse définitive : Laravel refuserait alors tout à un auteur, même la modification de ses propres articles. null veut dire « pas d'avis » : Laravel continue et demande au Gate ou à la méthode de la Policy concernés.
