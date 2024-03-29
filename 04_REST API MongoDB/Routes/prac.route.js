const express = require('express'); //router
const router = express.Router(); 
const Employee = require("../Models/employee.model");

// 1 GET ALL EMPLOYEE
router.get('/', async (req, res, next) => {
    try{
        const result = await Employee.find({}, {__v:0});
        res.send(result);
    }catch(error){
        res.send(error.message);
    }
});

// 2 POST
router.post('/', async (req, res, next) => {
    try{
        const employee = new Employee(req.body);
        const result = await employee.save();
        res.send(result);
    }catch(err){
        res.send(err.message);
    }
});

// 3 GET SPECIFIC ID
router.get('/:id', async (req, res, next) => {
    try{
        const id = req.params.id;
        const result = await Employee.findById(id);
        res.send(result);
    }catch (error){
        res.send(error.message);
    }
});

// 4 PATCH by id
router.patch('/:id', async (req, res, next) => {
    try{
        const id = req.params.id;
        const update = req.body
        const result = await Employee.findByIdAndUpdate(id, update);
        res.send(result);
    } catch (error) {
        res.send(error);
    }
});

// 5 DELETE
router.delete('/:id', async (req, res, next) => {
    try{
        const id = req.params.id;
        const result = await Employee.findByIdAndDelete(id);
        res.send(result);
    }catch(error){
        res.send(error.message);
    }
});

module.exports = router;
