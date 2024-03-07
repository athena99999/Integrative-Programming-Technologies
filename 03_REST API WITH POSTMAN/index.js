const express = require('express');
const app = express();

app.use(express.json()); // bantug diay dli ko ka create post tungod kailangan ni #anotherlessonLearned

const colors = [
    {id: 1, name: 'red'},
    {id: 2, name: 'blue'},
    {id: 3, name: 'yellow'},
    {id: 4, name: 'green'},
];

app.get(`/api/post/:year/:month/:day`, (req, res) => {
    res.send(req.params);
})

//VIEW ALL
app.get('/api/colors', (req, res) => {
    res.send(colors);
})

//VIEW BY SPECIFIC ID
app.get('/api/colors/:id', (req, res) => {
    const color =  colors.find(c => c.id === parseInt(req.params.id));
    if(!color) res.status(404).send('The color with the given id is not found');
    res.send(color);
});

//CREATE
app.post('/api/colors', (req, res) => {
    if (!req.body.name || req.body.name.length < 3) {
        res.status(400).send('Name is required and should be a minimum of 3 characters');
        return;
    }
    const col = {
        id: colors.length + 1,
        name: req.body.name
    };
    
    res.status(200).send('Color added successfully');
    colors.push(col);
    res.send(col);
});

//UPDATE
app.put('/api/colors/:id', (req, res) => {
    const col = colors.find(c => c.id === parseInt(req.params.id));
    if(!col) res.status(404).send("The color with given id is not found");
    res.status(200).send('Color updated successfully');
    col.name = req.body.name;
    res.send(col);
    
});


//DELETE
app.delete('/api/colors/:id', (req, res) => {
    const col = colors.find(c => c.id === parseInt(req.params.id));
    if(!col) res.status(404).send("The color with given i is not found");
    res.status(200).send('Color delete successfully');
    const index = colors.indexOf(col);
    colors.splice(index, 1);

    res.send(col);
});


const port = process.env.PORT || 3000;
app.listen(port, () => console.log(`listening on port ${port}`));
