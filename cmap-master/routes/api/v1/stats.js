const express = require('express');
const router = express.Router();
const statusController = require('../../../controllers/api/v1/stats');

//get statistics
router.get('/', statusController.getStatistics);

//add statistics
router.post('/', statusController.addStatistics);

//update statistics
router.put('/:country', statusController.updateStatistics);

module.exports = router;