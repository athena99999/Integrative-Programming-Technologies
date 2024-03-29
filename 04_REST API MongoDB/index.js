const express = require('express');
const mongoose = require('mongoose');
const app = express();
app.use(express.json());

const url = "mongodb://localhost:27017";
const port = "3000";

// Connect to MongoDB database
mongoose.connect(url, {})
.then(result => console.log("Connected to the Database"))
.catch(err => console.error(err));


//
app.all('/test', (req, res) => {
    console.log();
    res.send();
})

// ROUTE
const TaskRoute = require( './Routes/task.route' );
app.use('/task', TaskRoute);

const EmployeeRoute = require('./Routes/employee.route');
app.use('/employee', EmployeeRoute)

// NOT FOUND
app.use((req, res, next) => {
    const error = new Error('Not Found!');
    error.status = 404;
    next(err);
})

// ERROR
app.use((err, req, res, next) => {
    res.status(err.status || 500);
    res.send({
        error: {
            status: err.status || 500,
            message: err.message
        }
    });
});

app.listen(port, () =>{
    console.log("Listening to Port 3000");
});
