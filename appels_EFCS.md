# Appels GraphQL - EFCS

## Entete HTTP pour les appels authentifies

```json
{
  "Authorization": "Bearer <TOKEN_SANCTUM>",
  "Accept": "application/json"
}
```

## 1) Consulter les informations de l'utilisateur authentifie

```graphql
query Me {
  me {
    id
    email
    first_name
    last_name
  }
}
```

## 2) Consulter les critiques de l'utilisateur authentifie

```graphql
query MyCritics {
  myCritics {
    id
    score
    comment
  }
}
```

## 3) Ajouter une critique pour l'utilisateur authentifie

```graphql
mutation AddMyCritic {
  addMyCritic(
    film_id: 1
    score: 85.5
    comment: "Tres bon film, bien rythme."
  ) {
    id
    film_id
    average_score
    total_ratings
  }
}
```

## 4) Admin - Ajouter un acteur, le lier a des films et mettre a jour leurs images dans un seul appel

```graphql
mutation AddActorAsAdmin {
  addActorAsAdmin(
    last_name: "Nolan"
    first_name: "Emma"
    birthdate: "1990-03-18 00:00:00"
    film_ids: [1, 2]
    film_images: [
      { film_id: 1, image: "academy-dinosaur.jpg" }
      { film_id: 2, image: "ace-goldfinger.jpg" }
    ]
  ) {
    last_name
    first_name
    birthdate
    films {
      id
      title
    }
  }
}
```
