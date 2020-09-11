const getAll = (req,res) => {
    res.send("GETTING messages");
}

const getOne = (req,res) => {
    res.send("GETTING message with id " +req.params.id);
}

const createOne = (req,res) => {
    res.send("POSTING a new message for user Jigglypuff");
}

const updateOne = (req,res) => {
    res.send("UPDATING a message with id "  +req.params.id);
}

const removeOne = (req,res) => {
    res.send("DELETING a message with id " +req.params.id);
}

module.exports.getAll = getAll; 
module.exports.getOne = getOne; 
module.exports.createOne = createOne; 
module.exports.updateOne = updateOne; 
module.exports.removeOne = removeOne; 