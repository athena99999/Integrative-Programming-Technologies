const express = require('express');
const router = express.Router();
const Task = require("../Models/task.model");

//GET ALL EMPLOYEE
router.get('/', async (req, res, next) => {
    try{
        const result = await Task.find({}, {__v:0});
        res.send(result);
    }catch(error){
        res.send(error.message);
    }
})

//GET SPECIFIC ID
router.get('/:id', async(req, res, next) => {
    const id = req.params.id;
    try{
        const result = await Task.findById(id);
        res.send(result);
    }catch(error){
        res.send(error.message);
    }
});

//POST
router.post ('/', async (req, res, next) => {
    try{
        const task = new Task(req.body);
        const result = await task.save();
        res.send(result);
    } catch(err){
        res.send(err.message);
    }
});

//PATCH
//patch by id
router.patch('/:id', async (req, res, next) => {
    try{
        const id = req.params.id;
        const update = req.body
        const result = await Task.findByIdAndUpdate(id, update);
        
        res.send(result);
    } catch (error) {
        res.send(error);
    }
});

//DELETE
router.delete('/:id', async (req, res, next) => {
    const id = req.params.id;
    try{
        const result = await Task.findByIdAndDelete(id);
        res.send(result);
    }catch(error){
        res.send(error.message);
    }
});

module.exports = router;

