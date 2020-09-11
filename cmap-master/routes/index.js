var express = require('express');
var router = express.Router();

/* GET home page. */
router.get('/', function(req, res, next) {
  res.render('index');
});

//get update from statistics
router.get('/:id', function (req, res, next){
  res.render('revise');
});

module.exports = router;
