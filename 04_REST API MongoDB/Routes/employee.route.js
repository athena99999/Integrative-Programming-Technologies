const express = require('express');
const router = express.Router();
const Employee = require('../Models/employee.model');

//GET ALL
router.get('/', async(req, res, next) =>{
    try{
        const result = await Employee.find({}, {__v:0});
        res.send(result);
    }catch(error){
        res.send(error.message);
    }
});

router.get('/:id', async(req, res, next) =>{
    try{
        const id = req.params.id;
        const result = await Employee.findById(id);
        res.send(result);
    }catch(error){
        res.send(error.message);
    }
});

router.post('/', async(req, res, next) =>{
    try{
        const employee = new Employee(req.body);
        await employee.save();
        const result = await Employee.find({}, {__v:0});
        res.send(result);
    }catch(error){
        res.send(error.message);
    }
});

router.patch('/:id', async(req, res, next) =>{
    try{
        const id = req.params.id;
        const update = req.body;
        const result = await Employee.findByIdAndUpdate(id, update);
        res.send(result);
    }catch(error){
        res.send(error.message);
    }
});

router.delete('/:id', async(req, res, next) =>{
    try{
        const id = req.params.id;
        await Employee.findByIdAndDelete(id);
        const result = await Employee.find({}, {__v:0});
        res.send(result);
    }catch(error){
        res.send(error.message);
    }
});

module.exports = router;