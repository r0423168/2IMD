const mongoose = require('mongoose');
const Schema = mongoose.Schema;

const chatSchema = new Schema({
    message: String,
    username: String
})

const Chat = mongoose.model('Chat', chatSchema);

module.exports = Chat;