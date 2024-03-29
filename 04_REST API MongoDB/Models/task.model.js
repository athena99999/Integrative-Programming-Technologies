const mongoose = require('mongoose');
const Schema = mongoose.Schema;

const TaskSchema = new Schema ({
    task_name:{
        type: String,
        required: true
    },
    date:{
        type: Date,
        required: true
    }
});

const Task = mongoose.model('task_details', TaskSchema);
module.exports = Task;