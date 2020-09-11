const Chat = require('../../../models/chat');

const getAll = (req, res)=>{
chat.find({"user":"Pikachu"}, (err,docs) => {
    if(!err){
        res.json({
            "status": "success",
                 "data" : {
                     "chat" : docs
                }
             });
        }
    })
}

const getOne = (req, res) =>{
    Chat.find({_id: req.params.id}, (err, doc) =>{
        if(!err){
            res.json({
                "status" : "success",
                "data" : {
                    "chat": doc
                }
            })
        }
    })
    
}

const getChatByUser = (req, res) =>{
    Chat.find({user: req.params.user}, (err, doc) =>{
        if(!err){
            res.json({
                "status" : "success",
                "data" : {
                    "chat": doc
                }
            })
        }
    })
    
}

const createOne = (req, res)=>{
    let chat = new Chat();
    chat.text = "Nodejs isn’t hard, or is it?";
    chat.user = "Pikachu";
    chat.completed = false;
    chat.save((err, doc) => {
        if(!err){
            res.json({
                "status": "success",
                 "data" : {
                     "chat" : doc
                 }
            });
        }
    })   
}

const updateOne = (req, res) => {
    Chat.findByIdAndUpdate({_id: req.params.id}, (err, doc) => {
        if(!err){
            res.json({
                "status" : "success",
                "data" : {
                    "chat": `Updated message with id: .${req.params.id}`
                }
            })
        }
    })
}

const removeOne = (req, res) => {
    Chat.findByIdAndDelete({_id: req.params.id}, (err, doc) => {
        if(!err){
            res.json({
                "status" : "success",
                "data" : {
                    "chat": "The message was removed"
                }
            })
        }
    })
}

module.exports.getAll = getAll;
module.exports.createOne = createOne;
module.exports.getOne = getOne;
module.exports.getChatByUser = getChatByUser;
module.exports.updateOne = updateOne;
module.exports.removeOne = removeOne;