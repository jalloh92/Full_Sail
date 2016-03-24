# Gemini Project / Problem Solver

## Problem Solver
This project address how Problem Solvers will be assigned problems, how they will solve them, and how they will mark as complete.

## Initiate Project
To get started, navigate to the folder where this project is stored in your terminal.
Then run the following:

```sh
npm install
npm start
```

Open Xcode and hit the "play" button to start the simulator

## Phase 1:
Solve or transfer a "missing item" problem for a single worker (out of scope : login system).

Expected data for a problem:
```sh
{"id": 1301090400,
"probType": "string",
"order":{
  "orderId":"a5296ab9-9eee-7ba0-0a79-b801594f2c91",
  "orderLoc":"AAA111",
  "unitSku":"a5296ab9-9eee-7ba0-0a79-b801594f2c91",
  "unitQty": 1,
  "unitLoc":"AAA111"
},
"probStatus":"string",
"transferReason":"string",
"updateTime": 1301090500
}
```
Note:  
1. The problem id is also the timestamp of when the problem started.
2. Problem Types are "missing", "broken", or "wrong item"
3. Problem Status is "active", "transferred", or "resolved"

## Phase 2:
