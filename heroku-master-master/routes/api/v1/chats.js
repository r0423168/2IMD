const express = require('express');
const router = express.Router();
const chatController = require('../../../controllers/api/v1/chats');

router.get("/", chatController.getAll);

router.get('/:id', chatController.getChat);

router.post("/", chatController.create);

router.put('/:id', chatController.updateChat);

router.delete('/:id', chatController.removeChat);

module.exports = router;