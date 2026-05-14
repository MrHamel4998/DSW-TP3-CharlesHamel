# Travail pratique 3 - Liste Appels GraphQL

## Nom/Prénom : Charles Hamel


# Consulter un film en particulier

```graphql
query Film {
    film(id: "1") {
        title
        critics {
            id
            score
            comment
        }
    }
}
```

```json
{
    "data": {
        "film": {
            "title": "ACADEMY DINOSAUR",
            "critics": [
                {
                    "id": "1",
                    "score": 5.4,
                    "comment": "Bien"
                }
            ]
        }
    }
}
```

# Consultation de tous les acteurs d’un certain film

```graphql
query Film {
    film(id: "2") {
        title
        actors {
            last_name
            first_name
            birthdate
        }
    }
}
```

```json
"data": {
    "film": {
        "title": "ACE GOLDFINGER",
        "actors": [
            {
                "last_name": "FAWCETT",
                "first_name": "BOB",
                "birthdate": null
            },
            {
                "last_name": "Babin",
                "first_name": "Tom",
                "birthdate": "2000-05-14 00:00:00"
            }
        ]
    }
}
```

# Recherche de films - Cas 1 : Sans critère avec pagination (demandez la page 1)

```graphql
query Films {
    films(page: 1) {
        paginatorInfo {
            count
            currentPage
        }
        data {
            id
            title
            description
            release_year
            length
        }
    }
}
```

```json
{
    "data": {
        "films": {
            "paginatorInfo": {
                "count": 10,
                "currentPage": 1
            },
            "data": [
                {
                    "id": "1",
                    "title": "ACADEMY DINOSAUR",
                    "description": "A Epic Drama of a Feminist And a Mad Scientist who must Battle a Teacher in The Canadian Rockies",
                    "release_year": 2006,
                    "length": 86
                },
                {
                    "id": "2",
                    "title": "ACE GOLDFINGER",
                    "description": "A Astounding Epistle of a Database Administrator And a Explorer who must Find a Car in Ancient China",
                    "release_year": 2006,
                    "length": 48
                },
                {
                    "id": "3",
                    "title": "ADAPTATION HOLES",
                    "description": "A Astounding Reflection of a Lumberjack And a Car who must Sink a Lumberjack in A Baloon Factory",
                    "release_year": 2006,
                    "length": 50
                },
                {
                    "id": "4",
                    "title": "AFFAIR PREJUDICE",
                    "description": "A Fanciful Documentary of a Frisbee And a Lumberjack who must Chase a Monkey in A Shark Tank",
                    "release_year": 2006,
                    "length": 117
                },
                {
                    "id": "5",
                    "title": "AFRICAN EGG",
                    "description": "A Fast-Paced Documentary of a Pastry Chef And a Dentist who must Pursue a Forensic Psychologist in The Gulf of Mexico",
                    "release_year": 2006,
                    "length": 130
                },
                {
                    "id": "6",
                    "title": "AGENT TRUMAN",
                    "description": "A Intrepid Panorama of a Robot And a Boy who must Escape a Sumo Wrestler in Ancient China",
                    "release_year": 2006,
                    "length": 169
                },
                {
                    "id": "7",
                    "title": "AIRPLANE SIERRA",
                    "description": "A Touching Saga of a Hunter And a Butler who must Discover a Butler in A Jet Boat",
                    "release_year": 2006,
                    "length": 62
                },
                {
                    "id": "8",
                    "title": "AIRPORT POLLOCK",
                    "description": "A Epic Tale of a Moose And a Girl who must Confront a Monkey in Ancient India",
                    "release_year": 2006,
                    "length": 54
                },
                {
                    "id": "9",
                    "title": "ALABAMA DEVIL",
                    "description": "A Thoughtful Panorama of a Database Administrator And a Mad Scientist who must Outgun a Mad Scientist in A Jet Boat",
                    "release_year": 2006,
                    "length": 114
                },
                {
                    "id": "10",
                    "title": "ALADDIN CALENDAR",
                    "description": "A Action-Packed Tale of a Man And a Lumberjack who must Reach a Feminist in Ancient China",
                    "release_year": 2006,
                    "length": 63
                }
            ]
        }
    }
}
```

# Recherche de films - Cas 2 : Avec le mot-clé "AL" (sur titre ou descritpion) avec pagination (demandez la page 1)

```graphql
query Films {
    films(page: 1, title: "%AL%") {
        paginatorInfo {
            count
            currentPage
        }
        data {
            id
            title
            description
            release_year
            length
        }
    }
}
```

```json
{
    "data": {
        "films": {
            "paginatorInfo": {
                "count": 10,
                "currentPage": 1
            },
            "data": [
                {
                    "id": "9",
                    "title": "ALABAMA DEVIL",
                    "description": "A Thoughtful Panorama of a Database Administrator And a Mad Scientist who must Outgun a Mad Scientist in A Jet Boat",
                    "release_year": 2006,
                    "length": 114
                },
                {
                    "id": "10",
                    "title": "ALADDIN CALENDAR",
                    "description": "A Action-Packed Tale of a Man And a Lumberjack who must Reach a Feminist in Ancient China",
                    "release_year": 2006,
                    "length": 63
                },
                {
                    "id": "11",
                    "title": "ALAMO VIDEOTAPE",
                    "description": "A Boring Epistle of a Butler And a Cat who must Fight a Pastry Chef in A MySQL Convention",
                    "release_year": 2006,
                    "length": 126
                },
                {
                    "id": "12",
                    "title": "ALASKA PHANTOM",
                    "description": "A Fanciful Saga of a Hunter And a Pastry Chef who must Vanquish a Boy in Australia",
                    "release_year": 2006,
                    "length": 136
                },
                {
                    "id": "13",
                    "title": "ALI FOREVER",
                    "description": "A Action-Packed Drama of a Dentist And a Crocodile who must Battle a Feminist in The Canadian Rockies",
                    "release_year": 2006,
                    "length": 150
                },
                {
                    "id": "14",
                    "title": "ALICE FANTASIA",
                    "description": "A Emotional Drama of a A Shark And a Database Administrator who must Vanquish a Pioneer in Soviet Georgia",
                    "release_year": 2006,
                    "length": 94
                },
                {
                    "id": "15",
                    "title": "ALIEN CENTER",
                    "description": "A Brilliant Drama of a Cat And a Mad Scientist who must Battle a Feminist in A MySQL Convention",
                    "release_year": 2006,
                    "length": 46
                },
                {
                    "id": "16",
                    "title": "ALLEY EVOLUTION",
                    "description": "A Fast-Paced Drama of a Robot And a Composer who must Battle a Astronaut in New Orleans",
                    "release_year": 2006,
                    "length": 180
                },
                {
                    "id": "17",
                    "title": "ALONE TRIP",
                    "description": "A Fast-Paced Character Study of a Composer And a Dog who must Outgun a Boat in An Abandoned Fun House",
                    "release_year": 2006,
                    "length": 82
                },
                {
                    "id": "18",
                    "title": "ALTER VICTORY",
                    "description": "A Thoughtful Drama of a Composer And a Feminist who must Meet a Secret Agent in The Canadian Rockies",
                    "release_year": 2006,
                    "length": 57
                }
            ]
        }
    }
}
```

# Recherche de films - Cas 3 : Avec le mot-clé "AL" (sur titre ou descritpion), minimum année 2006, entre 120 et 150 minutes avec pagination (demandez la page 1)

```graphql
query Films {
    films(page: 1, title: "%AL%", min_year: 2006, min_length: 120, max_length: 150) {
        paginatorInfo {
            count
            currentPage
        }
        data {
            id
            title
            description
            release_year
            length
        }
    }
}
```

```json
{
    "data": {
        "films": {
            "paginatorInfo": {
                "count": 5,
                "currentPage": 1
            },
            "data": [
                {
                    "id": "11",
                    "title": "ALAMO VIDEOTAPE",
                    "description": "A Boring Epistle of a Butler And a Cat who must Fight a Pastry Chef in A MySQL Convention",
                    "release_year": 2006,
                    "length": 126
                },
                {
                    "id": "12",
                    "title": "ALASKA PHANTOM",
                    "description": "A Fanciful Saga of a Hunter And a Pastry Chef who must Vanquish a Boy in Australia",
                    "release_year": 2006,
                    "length": 136
                },
                {
                    "id": "13",
                    "title": "ALI FOREVER",
                    "description": "A Action-Packed Drama of a Dentist And a Crocodile who must Battle a Feminist in The Canadian Rockies",
                    "release_year": 2006,
                    "length": 150
                },
                {
                    "id": "73",
                    "title": "BINGO TALENTED",
                    "description": "A Touching Tale of a Girl And a Crocodile who must Discover a Waitress in Nigeria",
                    "release_year": 2006,
                    "length": 150
                },
                {
                    "id": "99",
                    "title": "BRINGING HYSTERICAL",
                    "description": "A Fateful Saga of a A Shark And a Technical Writer who must Find a Woman in A Jet Boat",
                    "release_year": 2006,
                    "length": 136
                }
            ]
        }
    }
}
```

# Consulter les informations de l’utilisateur authentifié

```graphql
query Me {
    me {
        id
        name
        email
    }
}
```

```json
{
    "data": {
        "me": {
            "id": "2",
            "name": "Admin2",
            "email": "admin2@example.com"
        }
    }
}
```
# Consulter les critiques de l’utilisateur authentifié

```graphql
query MyCritics {
    myCritics {
        id
        score
        comment
    }
}
```

```json
{
    "data": {
        "myCritics": [
            {
                "id": "1",
                "score": 5.4,
                "comment": "Bien"
            }
        ]
    }
}
```

# Ajout d’une critique de film

```graphql
mutation AddMyCritic {
    addMyCritic(film_id: "2", score: 85.0, comment: "Bon film") {
        id
        film_id
        average_score
        total_ratings
    }
}
```

```json
{
    "data": {
        "addMyCritic": {
            "id": "2",
            "film_id": "2",
            "average_score": 63.05,
            "total_ratings": 4
        }
    }
}
```

# Ajout d’un acteur (lier l'acteur au film 1, mettre à jour l'image du film 2)

```graphql
mutation AddActorAsAdmin {
    addActorAsAdmin(
        last_name: "Hamel"
        first_name: "Charles"
        birthdate: "1999-02-02 13:12:00"
        film_ids: ["1"]
        film_images: [
            {
                film_id: "2"
                image: "https://example.com/image1.png"
            }
        ]
    ) {
        id
        last_name
        first_name
        birthdate
    }
}
```

```json
{
    "data": {
        "addActorAsAdmin": {
            "id": "202",
            "last_name": "Hamel",
            "first_name": "Charles",
            "birthdate": "1999-02-02 13:12:00"
        }
    }
}
```