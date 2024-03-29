const mongoose = require('mongoose');
const Schema = mongoose.Schema;

const EmployeeSchema = new Schema({
    first_name:{
        type: String,
        required: true
    },
    last_name:{
        type: String,
        required: true
    },
    phone_number:{
        type: Number,
        required: true
    }
});

const employee = mongoose.model('employee_details', EmployeeSchema);
module.exports = employee;