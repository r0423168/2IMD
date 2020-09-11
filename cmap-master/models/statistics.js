const mongoose = require('mongoose');
const Schema = mongoose.Schema;
const statisticsSchema = new Schema({
    number : {
        type : Number, 
        required: true
    },
    country : {
        type : String,
        required: true
    }
});

const Statistics = mongoose.model('statistics',statisticsSchema);

module.exports = Statistics;