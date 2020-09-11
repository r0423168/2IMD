const express = require('express')
const router = express.Router();
const chatController = require('../../../controllers/api/v1/chat');

router.get('/', chatController.getAll); 
router.get('/:id', chatController.getOne);
router.post('/', chatController.createOne);
router.put('/:id', chatController.updateOne);
router.delete('/:id', chatController.removeOne);

module.exports = router;