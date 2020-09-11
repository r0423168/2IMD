const Statistics = require('../../../models/statistics');

//get statistics --> use find()
const getStatistics = (req, res) => {
    Statistics.find({}, (err,docs) => {
        if (!err){
            res.json({
                "status" : "succes",
                "data" : docs
            });
        }
    });
}

//add statistics --> use save()
const addStatistics = (req, res, next) => {
    let status = new Statistics();
    //country 
    status.country = req.body.country;
    //number of cases
    status.number = req.body.number;
    //save the changes made
    status.save((err, doc) => {
        if (!err){
            res.json({
                "status" : "succes",
                "data" : doc
            });
        }
        if (err){
            res.json({
                "status" : "error",
                "message" : "Not able to save statistics"
            });
        }
    });
}

//update statistics --> use findOne() or findOneAndUpdate()
const updateStatistics = (req, res) => {
    const query = {country: req.params.country};
    const update = {number: req.body.number};

    Statistics.findOneAndUpdate(query, update, (err,doc) => {
        if (err){
            res.json({
                "status" : "error",
                "message" : "Not able to save statistics"
            });
        }

        if (!err){
            res.json({
                "status" : "succes",
                "data" : doc
            });
        }
    });
}

module.exports.getStatistics = getStatistics;
module.exports.addStatistics = addStatistics;
module.exports.updateStatistics = updateStatistics;