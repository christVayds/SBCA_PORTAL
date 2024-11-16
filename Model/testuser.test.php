<?php

include '../Class/Users.class.php';

$students = [
    [
        "id" => "P2023-12345",
        "name" => ["Peter", "Benjamin", "Parker"],
        "gender" => "Male",
        "birthday" => "1995-08-10",
        "address" => "20 Ingram Street, Queens, New York",
        "course" => "BSIT"
    ],
    [
        "id" => "C2022-98765",
        "name" => ["Clark", "Joseph", "Kent"],
        "gender" => "Male",
        "birthday" => "1978-06-18",
        "address" => "Smallville, Kansas",
        "course" => "BSPsych"
    ],
    [
        "id" => "B2024-45678",
        "name" => ["Bruce", "Thomas", "Wayne"],
        "gender" => "Male",
        "birthday" => "1972-02-19",
        "address" => "1007 Mountain Drive, Gotham City",
        "course" => "BSBA"
    ],
    [
        "id" => "T2023-12367",
        "name" => ["Tony", "Edward", "Stark"],
        "gender" => "Male",
        "birthday" => "1970-05-29",
        "address" => "10880 Malibu Point, Malibu, California",
        "course" => "BSIT"
    ],
    [
        "id" => "S2024-76543",
        "name" => ["Steve", "Grant", "Rogers"],
        "gender" => "Male",
        "birthday" => "1918-07-04",
        "address" => "Brooklyn, New York",
        "course" => "BSBA"
    ],
    [
        "id" => "D2024-89123",
        "name" => ["Diana", "Princess of", "Themyscira"],
        "gender" => "Female",
        "birthday" => "2001-03-25",
        "address" => "Themyscira",
        "course" => "BSPsych"
    ],
    [
        "id" => "B2023-44567",
        "name" => ["Barry", "Allen", "Allen"],
        "gender" => "Male",
        "birthday" => "1989-03-14",
        "address" => "Central City",
        "course" => "BSIT"
    ],
    [
        "id" => "A2022-55987",
        "name" => ["Arthur", "Curry", "Curry"],
        "gender" => "Male",
        "birthday" => "1986-01-29",
        "address" => "Atlantis",
        "course" => "BSPsych"
    ],
    [
        "id" => "N2023-99873",
        "name" => ["Natasha", "Alianovna", "Romanoff"],
        "gender" => "Female",
        "birthday" => "1984-11-22",
        "address" => "Moscow, Russia",
        "course" => "BSPsych"
    ],
    [
        "id" => "W2024-66789",
        "name" => ["Wanda", "Django", "Maximoff"],
        "gender" => "Female",
        "birthday" => "1989-02-10",
        "address" => "Sokovia",
        "course" => "BSPsych"
    ],
    [
        "id" => "S2022-34521",
        "name" => ["Stephen", "Vincent", "Strange"],
        "gender" => "Male",
        "birthday" => "1930-11-18",
        "address" => "177A Bleecker Street, Greenwich Village, New York",
        "course" => "BSIT"
    ],
    [
        "id" => "J2024-22157",
        "name" => ["James", "Howlett", "Logan"],
        "gender" => "Male",
        "birthday" => "2005-07-14",
        "address" => "Canada",
        "course" => "BSIT"
    ],
    [
        "id" => "C2023-78546",
        "name" => ["Charles", "Francis", "Xavier"],
        "gender" => "Male",
        "birthday" => "1932-03-16",
        "address" => "Westchester County, New York",
        "course" => "BSPsych"
    ],
    [
        "id" => "B2022-32189",
        "name" => ["Bruce", "Robert", "Banner"],
        "gender" => "Male",
        "birthday" => "1969-12-18",
        "address" => "Dayton, Ohio",
        "course" => "BSIT"
    ],
    [
        "id" => "O2024-11243",
        "name" => ["Oliver", "Jonas", "Queen"],
        "gender" => "Male",
        "birthday" => "1985-05-16",
        "address" => "Star City",
        "course" => "BSBA"
    ],
    [
        "id" => "H2023-87965",
        "name" => ["Hal", "Jordan", "Jordan"],
        "gender" => "Male",
        "birthday" => "1973-02-20",
        "address" => "Coast City",
        "course" => "BSIT"
    ],
    [
        "id" => "S2024-55632",
        "name" => ["Scott", "Summers", "Summers"],
        "gender" => "Male",
        "birthday" => "1963-08-29",
        "address" => "Anchorage, Alaska",
        "course" => "BSPsych"
    ],
    [
        "id" => "R2022-99876",
        "name" => ["Reed", "Nathaniel", "Richards"],
        "gender" => "Male",
        "birthday" => "1969-11-14",
        "address" => "Baxter Building, Manhattan, New York",
        "course" => "BSIT"
    ],
    [
        "id" => "S2024-45321",
        "name" => ["Susan", "Storm", "Richards"],
        "gender" => "Female",
        "birthday" => "1970-12-04",
        "address" => "Baxter Building, Manhattan, New York",
        "course" => "BSPsych"
    ],
    [
        "id" => "B2023-76234",
        "name" => ["Benjamin", "Jacob", "Grimm"],
        "gender" => "Male",
        "birthday" => "1969-09-20",
        "address" => "Yancy Street, Lower East Side, New York",
        "course" => "BSIT"
    ]
];

$other = [
    [
        "id" => "L2023-45632",
        "name" => ["Loki", "Laufeyson", "Odinson"],
        "gender" => "Male",
        "birthday" => "2000-07-09",
        "address" => "Asgard",
        "course" => "BSBA"  // Master manipulator and strategist
    ],
    [
        "id" => "T2022-97651",
        "name" => ["Thanos", "The", "Mad Titan"],
        "gender" => "Male",
        "birthday" => "1975-02-18",
        "address" => "Titan",
        "course" => "BSPsych"  // Obsessed with balance and philosophical
    ],
    [
        "id" => "J2024-55348",
        "name" => ["Joker", "n/a", "Vaydal"],
        "gender" => "Male",
        "birthday" => "2000-12-04",
        "address" => "Gotham City",
        "course" => "BSPsych"  // Psychological mastermind
    ],
    [
        "id" => "M2024-63215",
        "name" => ["Magneto", "Max", "Eisenhardt"],
        "gender" => "Male",
        "birthday" => "1930-10-18",
        "address" => "Genosha",
        "course" => "BSBA"  // Leadership of mutant armies
    ],
    [
        "id" => "V2023-75462",
        "name" => ["Victor", "Von", "Doom"],
        "gender" => "Male",
        "birthday" => "2002-05-16",
        "address" => "Latveria",
        "course" => "BSIT"  // Genius scientist and inventor
    ],
    [
        "id" => "L2022-38562",
        "name" => ["Lex", "X", "Luther"],
        "gender" => "Male",
        "birthday" => "1973-09-28",
        "address" => "Metropolis",
        "course" => "BSBA"  // Corporate magnate and strategic thinker
    ],
    [
        "id" => "H2024-16582",
        "name" => ["Harley", "n/a", "Queen"],
        "gender" => "Female",
        "birthday" => "2001-06-17",
        "address" => "Gotham City",
        "course" => "BSPsych"  // Former psychiatrist turned villain
    ],
    [
        "id" => "U2023-87234",
        "name" => ["Ultron", "n/a", "Segobia"],
        "gender" => "Male",
        "birthday" => "2005-02-02",
        "address" => "Unknown",
        "course" => "BSIT"  // AI with technological domination
    ],
    [
        "id" => "G2023-74832",
        "name" => ["Green", "Goblin", "Samalca"],
        "gender" => "Male",
        "birthday" => "1965-03-14",
        "address" => "New York City",
        "course" => "BSBA"  // Corporate tycoon and strategist
    ],
    [
        "id" => "C2022-97513",
        "name" => ["Cheetah", "Barbara", "Minerva"],
        "gender" => "Female",
        "birthday" => "1985-11-30",
        "address" => "Washington D.C.",
        "course" => "BSPsych"  // Obsessive and psychological edge
    ],
    [
        "id" => "B2024-63175",
        "name" => ["Black", "Manta", "Borbon"],
        "gender" => "Male",
        "birthday" => "1990-09-12",
        "address" => "Atlantis",
        "course" => "BSIT"  // Technologically proficient
    ],
    [
        "id" => "D2023-45389",
        "name" => ["Darkseid", "n/a", "Quiqui"],
        "gender" => "Male",
        "birthday" => "2001-04-10",
        "address" => "Apokolips",
        "course" => "BSPsych"  // Philosopher of destruction
    ],
    [
        "id" => "H2022-54219",
        "name" => ["Hela", "n/a", "Baldesotto"],
        "gender" => "Female",
        "birthday" => "2003-01-17",
        "address" => "Helheim",
        "course" => "BSPsych"  // Goddess of death, psychological dominance
    ],
    [
        "id" => "B2023-81923",
        "name" => ["Black", "n/a", "Adam"],
        "gender" => "Male",
        "birthday" => "1995-12-01",
        "address" => "Kahndaq",
        "course" => "BSBA"  // Leadership and tyrannical tendencies
    ],
    [
        "id" => "V2024-72135",
        "name" => ["Venom", "n/a", "Lim"],
        "gender" => "Male",
        "birthday" => "1988-08-09",
        "address" => "New York City",
        "course" => "BSPsych"  // Dual personalities and mind control
    ],
    [
        "id" => "D2022-49653",
        "name" => ["Deathstroke", "Slade", "Wilson"],
        "gender" => "Male",
        "birthday" => "1991-07-20",
        "address" => "Washington D.C.",
        "course" => "BSBA"  // Military strategist and mercenary
    ],
    [
        "id" => "R2023-69843",
        "name" => ["Red", "Skull", "Arbiso"],
        "gender" => "Male",
        "birthday" => "1935-05-19",
        "address" => "Germany",
        "course" => "BSBA"  // Military and political strategist
    ],
    [
        "id" => "P2024-85316",
        "name" => ["Poison", "Ivy", "Tangan"],
        "gender" => "Female",
        "birthday" => "1994-03-21",
        "address" => "Gotham City",
        "course" => "BSPsych"  // Botanical expert with psychological manipulation
    ],
    [
        "id" => "S2023-19486",
        "name" => ["Sinestro", "n/a", "Utrera"],
        "gender" => "Male",
        "birthday" => "1983-10-08",
        "address" => "Korugar",
        "course" => "BSBA"  // Former Green Lantern turned dictator
    ],
    [
        "id" => "K2022-36284",
        "name" => ["Kingpin", "Wilson", "Fisk"],
        "gender" => "Male",
        "birthday" => "1971-09-22",
        "address" => "Hell's Kitchen, New York",
        "course" => "BSBA"  // Crime lord and businessman
    ]
];


foreach($students as $student){
    $fullname = implode(" ", $student['name']);
    echo $fullname;
    echo '<br>';

    $email = strtolower($student['name'][0][0] . $student['name'][2] . '@sbca.edu.ph');
    $bdate = $student['birthday'] . ' 00:00:00';
    $course = strtolower($student['course']) . '1';
    $password = '123456789';

    $new_user = new Students(strtolower($student['name'][0]), strtolower($student['name'][1]), strtolower($student['name']['2']), $course, $student['id'], $email, $password, $bdate, $student['gender'], $student['address']);

    if($new_user->save()){
        echo "Saved";
    } else {
        echo "Email Already used";
    }
}
