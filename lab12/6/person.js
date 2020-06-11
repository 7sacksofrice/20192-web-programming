// create class person
var Person = function() {};

// add constructor to class person by using prototype of person
Person.prototype.initialize = function(name, age)
{
    this.name = name;
    this.age = age;
}

// add function describe() returning name and age of person
// using prototype
Person.prototype.describe = function()
{
    return this.name + ", " + this.age + " years old.";
}

// create class Student
var Student = function() {};

// inherit class person
Student.prototype = new Person();

// add function learn() to class student
// using prototype
Student.prototype.learn = function(subject)
{
    console.log(this.name + " just learned " + subject);
}

// create an object of class student to test
var me = new Student();

me.initialize("John", 25);
me.learn("Inheritance");

/*********/
var Teacher = function(){};
Teacher.prototype = new Person();

Teacher.prototype.teach = function(subject) {
    console.log(this.name + " is now teaching " + subject);
}

var him = new Teacher();
him.initialize("Le Tuan", 60);
him.teach("Physics");