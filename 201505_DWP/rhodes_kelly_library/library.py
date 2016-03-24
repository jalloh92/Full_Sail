class Library():
    def __init__(self):
        print "Library created"

    def det_tank_capacity(self, mpg, tank_size):
        tank_capacity = mpg * tank_size
        return tank_capacity

    def det_miles_left(self, tank_capacity, percent_left):
        miles_left = tank_capacity * percent_left / 100
        return miles_left

class Printer():
    def __init__(self):
        print "Printer created"

    def print_results(self, tank_cap, miles_to_go):
        print "You can drive " + str(tank_cap) + " miles on a full tank."
        print "You can drive " + str(miles_to_go) + " more miles until you run out of gas."