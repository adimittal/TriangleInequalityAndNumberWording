index.php simply calls test on some inputs

/src folder has the class with the coded functions
/test folder has the unit tests for the coded functions since I like to do test driven development

Both questions are tested with a bunch of cases

The answers to the technical questions are in the Word Doc 

[1]

Given an array of unsorted integers, where all values are > 0, write code to produce the number of sets that satisfy the following:

a + b > c

a + c > b

b + c > a

There are no duplicates in the array. You may apply a sort function to the array if you want.



Ex for input of an array [2,5,4,3] your code should return the integer 3 because there are 3 combinations that satisfy the three conditions above

[2,3,4], [2,4,5], [3,4,5]

Note that we don’t count different orderings of the same numbers more than once.



[2]

Write a program that can take in any integer n and output a string that represents the spoken version of that number in english. You can assume n will only come in the following range

-1000000000 <= n <= 1000000000

(ie negative 1 billion to positive 1 billion)

n is an integer; there will be no decimal places to worry about.

examples:

n = 123

output = ‘one hundred twenty three’

n = -1100

output = ‘negative one thousand one hundred’

(also valid would be output = ‘negative eleven hundred’. you don’t need to account for both. as long as one valid result can be returned)

n = 76,000,123

output = ‘seventy six million one hundred twenty three’

You do not need to put hyphens ‘-’ or commas ',' or ‘and’ in your answer.

Technical Questions - Answers in Word Doc
Give your thoughts on the technical details needed to build a code versioning system like github? How would you incorporate code reviews, different developer teams, and code rollbacks?
If someone asked you to build a city building simulator(ie Sim City), what would your technical writeup be? You are given a grant of ten billion dollars (dollar amount isn't important). Focus on the data structures used to store all of your city data as it grows(buildings, roads, budget, population etc ...).