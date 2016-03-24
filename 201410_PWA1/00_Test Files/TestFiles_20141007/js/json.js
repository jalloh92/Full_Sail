// json = javascript object notation; only diff is the quotes around the properties
// load the data first in the html file so that the main will then see the data



var person = { // person is global, keep data separate so it won't clutter main
    "first": "John",
    "last": "Doe",
    "age": 39,
    "sex": "M",
    "salary": 70000,
    "registered": true,
    "interests": [ "Reading", "Mountain Biking", "Hacking" ],
    "favorites": {
        "color": "Blue",
        "sport": "Soccer",
        "food": "Spaghetti"
    },
    "skills": [
        { // element 0 of array skills is an object
            "category": "PHP",
            "tests": [
                { "name": "One", "score": 90 }, // element 0 of array tests is an object
                { "name": "Two", "score": 96 }  // element 1 of array tests is an object
            ]
        },
        { // element 1 of array skills is an object
            "category": "CouchDB",
            "tests": [
                { "name": "One", "score": 32 },
                { "name": "Two", "score": 84 }
            ]
        },
        { // element 2 of array skills is an object
            "category": "Node.js",
            "tests": [
                { "name": "One", "score": 97 },
                { "name": "Two", "score": 93 }
            ]
        }
    ]
}