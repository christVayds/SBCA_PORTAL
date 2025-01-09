<?php

include '../Class/Users.class.php';

// $students = [
//     [
//         "id" => "L2023-20001",
//         "name" => ["Naruto", "Uzumaki", "n/a"],
//         "gender" => "Male",
//         "birthday" => "2000-10-10",
//         "address" => "Konoha",
//         "course" => "BSIT",
//     ],
//     [
//         "id" => "L2023-20002",
//         "name" => ["Sakura", "Haruno", "n/a"],
//         "gender" => "Female",
//         "birthday" => "2001-03-28",
//         "address" => "Konoha",
//         "course" => "BSBA",
//     ],
//     [
//         "id" => "L2023-20003",
//         "name" => ["Luffy", "Monkey", "n/a"],
//         "gender" => "Male",
//         "birthday" => "1997-05-05",
//         "address" => "East Blue",
//         "course" => "BSHM",
//     ],
//     [
//         "id" => "L2023-20004",
//         "name" => ["Goku", "Son", "n/a"],
//         "gender" => "Male",
//         "birthday" => "1989-04-16",
//         "address" => "Earth",
//         "course" => "BSPsych",
//     ],
//     [
//         "id" => "L2023-20005",
//         "name" => ["Hinata", "Hyuga", "n/a"],
//         "gender" => "Female",
//         "birthday" => "2000-12-27",
//         "address" => "Konoha",
//         "course" => "BSED",
//     ],
//     [
//         "id" => "L2023-20006",
//         "name" => ["Kagome", "Higurashi", "n/a"],
//         "gender" => "Female",
//         "birthday" => "2001-06-02",
//         "address" => "Tokyo",
//         "course" => "BSE",
//     ],
//     [
//         "id" => "L2023-20007",
//         "name" => ["Shinji", "Ikari", "n/a"],
//         "gender" => "Male",
//         "birthday" => "2000-08-18",
//         "address" => "Tokyo-3",
//         "course" => "BSSE",
//     ],
//     [
//         "id" => "L2023-20008",
//         "name" => ["Yusuke", "Urameshi", "n/a"],
//         "gender" => "Male",
//         "birthday" => "1999-03-16",
//         "address" => "Sapporo",
//         "course" => "BSIT",
//     ],
//     [
//         "id" => "L2023-20009",
//         "name" => ["Mikasa", "Ackerman", "n/a"],
//         "gender" => "Female",
//         "birthday" => "2001-12-10",
//         "address" => "Shiganshina",
//         "course" => "BSBA",
//     ],
//     [
//         "id" => "L2023-20010",
//         "name" => ["Levi", "Ackerman", "n/a"],
//         "gender" => "Male",
//         "birthday" => "1995-10-25",
//         "address" => "Wall Maria",
//         "course" => "BSHM",
//     ],
//     [
//         "id" => "L2023-20011",
//         "name" => ["Eren", "Yeager", "n/a"],
//         "gender" => "Male",
//         "birthday" => "2000-06-13",
//         "address" => "Shiganshina",
//         "course" => "BSPsych",
//     ],
//     [
//         "id" => "L2023-20012",
//         "name" => ["Natsu", "Dragneel", "n/a"],
//         "gender" => "Male",
//         "birthday" => "1995-07-07",
//         "address" => "Fairy Tail Guild",
//         "course" => "BSED",
//     ],
//     [
//         "id" => "L2023-20013",
//         "name" => ["Lucy", "Heartfilia", "n/a"],
//         "gender" => "Female",
//         "birthday" => "2000-03-10",
//         "address" => "Fairy Tail Guild",
//         "course" => "BSE",
//     ],
//     [
//         "id" => "L2023-20014",
//         "name" => ["Kamina", "Kamui", "n/a"],
//         "gender" => "Male",
//         "birthday" => "1997-04-06",
//         "address" => "Rising Village",
//         "course" => "BSSE",
//     ],
//     [
//         "id" => "L2023-20015",
//         "name" => ["Simon", "Viral", "n/a"],
//         "gender" => "Male",
//         "birthday" => "1999-01-17",
//         "address" => "Rising Village",
//         "course" => "BSIT",
//     ],
//     [
//         "id" => "L2023-20016",
//         "name" => ["Saitama", "One", "n/a"],
//         "gender" => "Male",
//         "birthday" => "1990-06-02",
//         "address" => "City Z",
//         "course" => "BSBA",
//     ],
//     [
//         "id" => "L2023-20017",
//         "name" => ["Genos", "Cyborg", "n/a"],
//         "gender" => "Male",
//         "birthday" => "1998-03-21",
//         "address" => "City Z",
//         "course" => "BSHM",
//     ],
//     [
//         "id" => "L2023-20018",
//         "name" => ["Killer", "Bee", "n/a"],
//         "gender" => "Male",
//         "birthday" => "1992-09-27",
//         "address" => "Hidden Cloud Village",
//         "course" => "BSPsych",
//     ],
//     [
//         "id" => "L2023-20019",
//         "name" => ["Hinata", "Shoyo", "n/a"],
//         "gender" => "Male",
//         "birthday" => "2000-04-01",
//         "address" => "Karasuno High",
//         "course" => "BSED",
//     ],
//     [
//         "id" => "L2023-20020",
//         "name" => ["Kageyama", "Tobio", "n/a"],
//         "gender" => "Male",
//         "birthday" => "2000-12-22",
//         "address" => "Karasuno High",
//         "course" => "BSE",
//     ]
// ];

$students = [
    [
        "id" => "L2023-20001",
        "name" => ["John", "Michael", "Doe"],
        "gender" => "Male",
        "birthday" => "2003-05-10",
        "address" => "New York",
        "course" => "BSIT",
    ],
    [
        "id" => "L2023-20002",
        "name" => ["Anna", "Marie", "Smith"],
        "gender" => "Female",
        "birthday" => "2002-08-21",
        "address" => "Los Angeles",
        "course" => "BSBA",
    ],
    [
        "id" => "L2023-20003",
        "name" => ["Michael", "David", "Johnson"],
        "gender" => "Male",
        "birthday" => "2001-12-14",
        "address" => "Chicago",
        "course" => "BSHM",
    ],
    [
        "id" => "L2023-20004",
        "name" => ["Sarah", "Elizabeth", "Brown"],
        "gender" => "Female",
        "birthday" => "2000-11-01",
        "address" => "Houston",
        "course" => "BSPsych",
    ],
    [
        "id" => "L2023-20005",
        "name" => ["James", "Alexander", "Wilson"],
        "gender" => "Male",
        "birthday" => "2001-03-29",
        "address" => "Phoenix",
        "course" => "BSED",
    ],
    [
        "id" => "L2023-20006",
        "name" => ["Emily", "Grace", "Moore"],
        "gender" => "Female",
        "birthday" => "2000-07-15",
        "address" => "Philadelphia",
        "course" => "BSE",
    ],
    [
        "id" => "L2023-20007",
        "name" => ["Daniel", "Joseph", "Taylor"],
        "gender" => "Male",
        "birthday" => "2000-04-20",
        "address" => "San Antonio",
        "course" => "BSSE",
    ],
    [
        "id" => "L2023-20008",
        "name" => ["Olivia", "Rose", "Martinez"],
        "gender" => "Female",
        "birthday" => "2001-09-02",
        "address" => "San Diego",
        "course" => "BSIT",
    ],
    [
        "id" => "L2023-20009",
        "name" => ["William", "Robert", "Anderson"],
        "gender" => "Male",
        "birthday" => "2000-02-10",
        "address" => "Dallas",
        "course" => "BSBA",
    ],
    [
        "id" => "L2023-20010",
        "name" => ["Sophia", "Charlotte", "Thomas"],
        "gender" => "Female",
        "birthday" => "2001-06-30",
        "address" => "Austin",
        "course" => "BSHM",
    ],
    [
        "id" => "L2023-20011",
        "name" => ["Matthew", "Jacob", "Jackson"],
        "gender" => "Male",
        "birthday" => "2000-03-15",
        "address" => "Jacksonville",
        "course" => "BSPsych",
    ],
    [
        "id" => "L2023-20012",
        "name" => ["Charlotte", "Amelia", "White"],
        "gender" => "Female",
        "birthday" => "2002-01-25",
        "address" => "Columbus",
        "course" => "BSED",
    ],
    [
        "id" => "L2023-20013",
        "name" => ["Ethan", "Matthew", "Harris"],
        "gender" => "Male",
        "birthday" => "2001-08-13",
        "address" => "Indianapolis",
        "course" => "BSE",
    ],
    [
        "id" => "L2023-20014",
        "name" => ["Ava", "Isabella", "Martin"],
        "gender" => "Female",
        "birthday" => "2002-04-08",
        "address" => "Fort Worth",
        "course" => "BSSE",
    ],
    [
        "id" => "L2023-20015",
        "name" => ["Lucas", "Henry", "Clark"],
        "gender" => "Male",
        "birthday" => "2001-01-12",
        "address" => "Charlotte",
        "course" => "BSIT",
    ],
    [
        "id" => "L2023-20016",
        "name" => ["Mia", "Sophia", "Rodriguez"],
        "gender" => "Female",
        "birthday" => "2001-09-18",
        "address" => "Detroit",
        "course" => "BSBA",
    ],
    [
        "id" => "L2023-20017",
        "name" => ["Alexander", "James", "Lee"],
        "gender" => "Male",
        "birthday" => "2000-05-02",
        "address" => "Seattle",
        "course" => "BSHM",
    ],
    [
        "id" => "L2023-20018",
        "name" => ["Isabella", "Lily", "Lopez"],
        "gender" => "Female",
        "birthday" => "2001-02-18",
        "address" => "Denver",
        "course" => "BSPsych",
    ],
    [
        "id" => "L2023-20019",
        "name" => ["Benjamin", "Elijah", "Gonzalez"],
        "gender" => "Male",
        "birthday" => "2000-10-04",
        "address" => "Washington",
        "course" => "BSED",
    ],
    [
        "id" => "L2023-20020",
        "name" => ["Amelia", "Olivia", "Perez"],
        "gender" => "Female",
        "birthday" => "2000-12-23",
        "address" => "Boston",
        "course" => "BSE",
    ]
];

foreach($students as $student){
    $fullname = implode(" ", $student['name']);

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

    echo $fullname;
    echo '<br>';
}
