__author__ = 'kellyrhodes'


# set up input_array to hold the user input
input_array = []

# request user input for a noun & verb
string1 = raw_input("Give me a noun ")
string2 = raw_input("Give me a verb ")

# append user input to the input_array
input_array.append(string1)
input_array.append(string2)

# for loop to request user input for numbers & append to input_array
for i in range(0,2):
    #print i
    num = raw_input("Give me a number ")
    input_array.append(num)

# function madlibs takes array a as an argument.  Concats the user inputs to strings
def madlibs(a):
    my_string = "Once upon a time, there was a " + a[0] + ".  "
    my_string = my_string + "This " + a[0] + " liked to " + a[1] + " for " + str(a[2]) + " hours a day.  "
    my_string = my_string + "Because the " + a[0] + " liked to " + a[1] + " for " + str(a[2]) + " hours a day, it had " + a[3] + " friends.  "
    # if statement
    if int(input_array[3]) > 5:
        my_string = my_string + "That's a lot!"
    print my_string
    return my_string

# print input_array

# calls the function madlibs
madlibs(input_array)