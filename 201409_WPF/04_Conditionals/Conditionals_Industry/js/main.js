// Name = Kelly Rhodes
// Date = September 15, 2014
// Course = Web Programming Fundamentals, on campus, section 00
// Assignment = Conditionals (Personal, Professional, Wacky)

//---------------------------------------------------
// Part II:  Industry Conditionals
// I'm doing real estate part time to help pay for school
// Below is a closing cost estimator based on whether or not
// the client is buying or selling a home
console.log("Part II:  Industry Conditionals\nClosing Cost Calculator\n"); // printing to console


//---------------------------------------------------
//-------------SETTING UP VARIABLES------------------
//---------------------------------------------------
var clientType = null; // clients will be either buyer or sellers, setting to null initially


//-------------------------------------------------
//------------SETTING UP FUNCTIONS-----------------
//-------------------------------------------------


//----FUNCTION:  calcBuyerCosts---------------------

function calcBuyerClosingCosts(housePrice){ // code to be executed for calculating buyerClosingCosts & alerting user to the results
//  -------------variables in calcBuyerClosingCosts
    var userResponse = null; // local variable to store yes or no answer
    var lenderFees = 0; // this is the amount the lender charges the buyer associated with their new mortgage ($)
    var downPayment = 0; // this is the percentage (%) amount of down payment there is if there is a new mortgage

    var escrowAmount = Number(prompt("How much money did you place in escrow (in $)?")); // asking for amount placed in escrow in $ and storing it in escrowAmount, converting to a number
    if(isNaN(escrowAmount) || escrowAmount === ""){ // validating that they did not leave escrowAmount blank and entered a Number; if not, they are prompted to re-enter escrowAmount
        escrowAmount = prompt("You forgot to enter a value for escrow!  Please enter a number only and no special characters.");
    }
    console.log("escrowAmount is: " + escrowAmount);

    var surveyAmount = Number(prompt("How much did you pay for the survey (in $)?")); // asking for amount paid for the survey in $ and storing it into surveyAmount, converting to a number
    if(isNaN(surveyAmount) || surveyAmount === ""){ // validating that they did not leave surveyAmount blank and entered a Number; if not, they are prompted to re-enter surveyAmount
        surveyAmount = prompt("You forgot to enter a value for the survey!  Please enter a number only and no special characters.");
    }
    console.log("surveyAmount is: " + surveyAmount);

//  ---------if the buyer took out a loan, they will have the additional fees of lenderFees and downPayment
    do{
        userResponse = prompt("Please enter YES or NO.  Did you take out a loan to buy the house?").toUpperCase(); // asking them if they took out a loan.  Forcing answer to upper case
    } while (userResponse != "YES" && userResponse != "NO"); // if user enters anything other than "YES" or "NO" they
    // will be asked the question again.  Since we originally set this to null, the code will execute initially.

    if (userResponse === "YES"){ // if the user replies that they did take out a loan, they will be asked about lenderFees and downPayment
        lenderFees = Number(prompt("How much did the lender charge you for the appraisal, credit report and origination fee (in $) for the new mortgage?")); // asking user for amount charged in lender fees in $and storing it into lenderFees, converting to a number
        if(isNaN(lenderFees) || lenderFees === ""){ // validating that they did not leave lenderFees blank and that they entered a Number; if not, they are prompted to re-enter lenderFees
            lenderFees = prompt("You forgot to enter a value for the lender fees!  Please enter a number only and no special characters.");
        }
        console.log("lenderfees are: " + lenderFees);

        downPayment = Number(prompt("What percentage (%) of the loan is your down payment?")); // asking user for percentage amount of down payment, storing it in downPayment and converting to a Number
        if(isNaN(downPayment) || downPayment === ""){ // validating that they did not leave downPayment blank and entered a Number; if so, they are prompted to re-enter downPayment
            downPayment = prompt("You forgot to enter a value for the down payment!  Please enter a number only and no special characters.");
        }
        console.log("downPayment (%) is: " + downPayment);

        var closingCosts = housePrice * (downPayment / 100) - escrowAmount + surveyAmount + lenderFees; // calculating closing costs including the down payment, lender fees and survey fees and giving a credit for escrow.
    } else { // if buyer is not taking out a loan, they will need to pay cash for the balance of the loan
        closingCosts = housePrice - escrowAmount + surveyAmount; // buyer will need to bring the balance of the home price and also costs associated with the survey
    }

//  --------alerts & printing to the console for calcBuyerClosingCosts
    alert("You will need to have $" + closingCosts + " in order to close on your new home.");
    console.log("You are the buyer.  You will need to have $" + closingCosts + " in order to close on your new home.");
}



//----FUNCTION:  calcSellersNet---------------------

function calcSellersNet(housePrice){ // code to be executed for calculating sellerClosingCosts & alerting user to the results
//  -----variables in calcSellersNet

    var mortgageBalance = Number(prompt("What is the balance of your existing mortgage (in $)?")); // asking user for balance on mortgage in $ and storing it into mortgageBalance, converting to a Number
    if (isNaN(mortgageBalance) || mortgageBalance === "") { // validating that they did not leave mortgageBalance blank and entered a number ; if not, they are prompted to re-enter mortgageBalance
        mortgageBalance = prompt("You forgot to enter a value for the mortgage balance!  Please enter a number only and no special characters");
    }
    console.log("mortgageBalance is: " + mortgageBalance);

    var titleFees = Number(prompt("How much did the title company charge you for the title search (in $)?")); // asking user for title company charges in $ and storing it into titleFees, converting to a Number
    if(isNaN(titleFees) || titleFees === ""){ // validating that they did not leave titleFees blank and entered a number; if not, they are prompted to re-enter titleFees
        titleFees = prompt("You forgot to enter a value for the title fees!  Please enter a number only and no special characters");
    }
    console.log("titleFees are: " + titleFees);

    var deedTaxes = Number(prompt("What were the taxes on recording the deed (in $)?")); // asking user for the taxes on recording the deed in $ and storing it in deedTaxes, converting to a Number
    if(isNaN(deedTaxes) || deedTaxes === ""){ // validating that they did not leave deedTaxes blank and entered a number; if not, they are prompted to re-enter deedTaxes
        deedTaxes = prompt("You forgot to enter a value for the deed taxes!  Please enter a number only and no special characters");
    }
    console.log("deedTaxes are: " + deedTaxes);

    var agentCommission = Number(prompt("What percentage (%) of the sales price goes to both agents in terms of commission?")); // total commission in % for both agents in percentage, converting to a Number
    if(isNaN(agentCommission) || agentCommission === ""){ // validating that they did not leave agentCommission blank and entered a number; if not, they are prompted to re-enter agentCommission
        agentCommission = prompt("You forgot to enter a value for the agents' commission!  Please enter a number only and no special characters");
    }
    console.log("agentCommission is (%): " + agentCommission);

// ------calculations in calcSellersNet
    var agentFees = housePrice * agentCommission / 100; // agent fees are the sales price of the home times the percentage charged for commission
    console.log("agentFees are: " + agentFees);
    var sellersNet = housePrice - mortgageBalance - titleFees - deedTaxes - agentFees;

//  -----alerts & printing to the console
    // just in case there is not enough equity in the home, there are two different messages if sellersNet is positive or negative
    if(sellersNet > 0) { // if sellerNet is positive, a happy message will print
        alert("You are the seller.  You will receive $" + sellersNet + " at closing.  Woo-hoo!");
        console.log("You are the seller.  You will receive $" + sellersNet + " at closing.  Woo-hoo!");
    } else { // if sellersNet is negative, an appropriate response will print
        alert("You do not have enough equity in your home to cover the closing costs!  You need to find $" + sellersNet * -1 + " in order to close.");
        console.log("You do not have enough equity in your home to cover the closing costs!  You need to find $" + sellersNet * -1 + " in order to close.");
    }
}


//--------------------------------------------------
//--------------EXECUTABLE--------------------------
//--------------------------------------------------

var salesPrice = Number(prompt("How much did the home sell for?")); // asking for the sales price of the home in $ & storing it in salesPrice, converting it to a Number
if(isNaN(salesPrice) || salesPrice === ""){ // validating that they did not leave blank and entered a Number; if not, prompted to enter again
    salesPrice = prompt("You forgot to enter a value for the sales price!  Please enter a number only and no special characters.");
}
console.log("home sales price is:" + salesPrice);

do{ // if user enters anything other than "BUYER" or "SELLER" they will be asked the question again.  Since we originally set this to "null", the code will execute initially.
    clientType = prompt("Were you the buyer or seller?").toUpperCase(); //asking if the user is a buyer or seller
    //  & storing into clientType.  Also forcing it to be upper case to be able to verify the sting.
    console.log(clientType);
} while (clientType != "BUYER" && clientType != "SELLER");

// if the client is a buyer, the function calcBuyerClosingCosts will be executed; otherwise the calcSellersNet function will run.
// Both functions will be passed the salesPrice of the home.
clientType === "BUYER" ? calcBuyerClosingCosts(salesPrice) : calcSellersNet(salesPrice);

