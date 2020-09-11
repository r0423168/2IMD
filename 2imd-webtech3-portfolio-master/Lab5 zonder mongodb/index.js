const express = require('express')
const chatlogging = require('./middleware/chatlogging')
const app = express()
const port = 3000
const apiV1ChatRouter = require('./routers/api/v1/chat')

app.get('/', (req, res) => res.send('Welcome to IMD chat')) 
app.use('/api/v1/chat', apiV1ChatRouter)

app.listen(port, () => console.log(`Example app listening on port ${port}!`))