from library import Library, Printer

class MainHandler():
    def __init__(self):
        print "Main created"

    #takes the raw_input from the user
    mpg = int(raw_input("Enter your car's miles per gallon: "))
    tank_size = int(raw_input("Enter the size of your car's tank (in gallons): "))
    percent_left = int(raw_input("Enter what percentage of your tank is left as a number from 1 to 100.  For example 25 is 25%: "))

    #perform calculations via Library
    lib = Library() # instantiate Library
    tank_cap = lib.det_tank_capacity(mpg, tank_size) # perform the method det_tank_capacity from Library; assign output to tank_cap
    miles_to_go = lib.det_miles_left(tank_cap, percent_left) # perform the method det_miles_left from Library; assign output to miles_to_go

    #print results to user
    printing = Printer() # instantiate Printer
    printing.print_results(tank_cap, miles_to_go) # perform the method print_results from Printer; takes tank_cap and
    #  miles_to_go from above

main = MainHandler() # instantiate MainHandler