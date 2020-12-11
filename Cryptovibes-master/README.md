# Cryptovibes

Virtual Currency App
We bouwen een app waarmee we virtuele IMD-currency (denk bitcoin, ethereum, ripple, …) kunnen sturen en ontvangen. Om te slagen voor deze opdracht, moet aan volgende basisvereisten worden voldaan.

Inspiratie op behance.net bijvoorbeeld: https://www.behance.net/gallery/81797717/Datacells-Wallet


Opvolging gebeurt via document: https://docs.google.com/spreadsheets/d/1WIeGhDu9kqk32Q2iYJdCKHltehWUyKZR8ynKYU5uUlY/edit#gid=0

Raak je er niet uit? Post je vragen dan in #code op https://weareimd.slack.com
1 / Frontend
De layout wordt gebouwd met CSS Grid en flexbox
Maak je design of branding eerst in Figma

Je werkt met SASS en BEM voor je CSS
De layout werkt responsive, we testen primair op mobiele toestellen
Elk teamlid kan de layout uitleggen aan de hand van CSS Grid en Flexbox en doet dit aan de hand van eigen commits. Geen commits = geen bewijs van opgeleverd werk
In dit vak testen we enkel binnen de laatste versie van Chrome. Je mag gebruik maken van de laatste CSS en JS-technieken.
Je schakelt parcel of gulp in als build-step
2 / Technische vereisten
Je werkt lokaal aan je app, maar deployed naar een online versie. Je app moet online werken en testbaar zijn. Heroku is een prima optie.
Je werkt op basis van een API
Vanuit je frontend kan je requests doen naar je API via fetch()
De databank die we gebruiken is MongoDB
Als hosting kan je gebruik maken van https://heroku.com/ voor je node app en van https://www.mongodb.com/cloud/atlas om je databank gratis te hosten
De backend is geschreven in nodejs in combinatie met het express framework
Voor het live gedeelte maken we gebruik van websockets met behulp van primus
We maken vanaf dag 1 gebruik van GIT
Sommige features krijgen het label  LIVE  — dat wil zeggen dat je gebruik moet maken van Web Sockets (met Primus) om live bij iedere geconnecteerde gebruiker een actie te triggeren 
Commit regelmatig, GIT is je bewijs van opgeleverd werk. Als je niet correct met GIT werkt heb je geen bewijs van je eigen werk. Het vaak gehoorde “mijn computer is gecrashed en ik heb alles in één keer overgezet naar een nieuwe GIT repo” gaat niet op. Goede, kleine, regelmatige commits in GIT, vanaf dag 1. 
Geen vragen = Geen problemen
3 / Functionaliteit
API
API/v1 
POST /transfers
Voegt een coin transactie toe in je database
Als iemand een nieuwe transactie binnenkrijgen moet dat  LIVE  zichtbaar zijn in de app van die persoon 
Toon dat er geld bij komt op de balance van die persoon
GET /transfers
Haalt all transfers op uit de database 
Let op dat je denkt over security (tokens!)
Je mag niet zomaar transfers van anderen op halen, enkel de transfers die te maken hebben met je eigen account (inkomend + uitgaand)
GET /transfers/:id
Haalt de details van één transfer uit de databank en geeft die terug als JSON
GET /leaderboard
Haalt per user het aantal coins op
Deze data kan dienen om een leaderboard uit te werken
Je API zou enkel aanspreekbaar mogen zijn als een gebruiker een correct token heeft
Lees over JWT of bekijk m’n course videos 
https://medium.com/dev-bits/a-guide-for-adding-jwt-token-based-authentication-to-your-single-page-nodejs-applications-c403f7cf04f4
Als je deze controle niet inbouwt kan iedereen anoniem via bijvoorbeeld postman je chatbox gaan spammen
FRONTEND
Aanloggen kan via een form of via http://www.passportjs.org/ (kies zelf hoe je gebruikers wil laten registeren/aanloggen. Email of username + password lijkt me in deze app beter dan bijvoorbeeld Facebook login)
GET /
Wie niet ingelogd is wordt doorverwezen naar /login of /signup
Wie wel ingelogd is krijgt het volgende te zien:
Overzicht van balance (vb: 13 coins)
 LIVE  Toon inkomende transacties live in de app van de ontvanger
Eventueel overzicht op zelfde view van de meest recente transactie?
GET /login
Login form
GET /signup
Signup form
Werk met firstname + lastname zodat je die later ook makkelijk kan terugvinden als je iemand een transactie wil sturen (makkelijker dan usernames)	
Signup kan énkel met een @student.thomasmore.be adres
BONUS FEATURE Idealiter zorg je ervoor dat dit adres bevestigd moet worden via een klein mailtje of een unieke code die je mailt naar deze personen, doe je dat niet dan gaan gebruikers meerdere accounts aanmaken om bijvoorbeeld terug nieuwe coins te krijgen
GET /transfer
Form om coins te sturen naar iemand
Tik de username en autocomplete deze om eenvoudig en snel de juiste user te kunnen selecteren
Tekstvak om aantal coins te kunnen versturen voorzien
Je moet hier kunnen meegeven waarom je deze coins doorstuurt, voorzie enkele eenvoudige vaste keuze (je mag er bij voegen als je vind dat ze reden geven tot coins ontvangen)
Reden: Development help
Reden: Design help
Reden: Feedback
Reden: Meeting deadlines
Reden: Other
Voorzie een tekstveld waar een vrije opmerking toegevoegd kan worden aan een transfer
Vb: “Bedankt voor je uitstekende debugging-hulp!”
BONUS FEATURE (vraag uitleg aan je docent indien nodig en werk deze énkel uit als de andere features reeds werken)
Voorzie een checkbox ON/OFF waarmee een gebruiker kan kiezen of deze transactie getoond mag worden aan iedereen op slack
Indien je deze optie aanvinkt, moet er een POST gebeuren naar volgende URL of naar je eigen slack test webhook (https://api.slack.com/messaging/webhooks)
https://hooks.slack.com/services/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
Let op: deze URL zal een bericht sturen naar mijn eigen test-slack. Als je zelf wil zien of je berichten goed aankomen kan je best zelf een eigen slack opzetten om te testen
De data die je wil versturen naar slack mag je zelf opbouwen, maar ik zou voor je payload gebruik maken van de https://api.slack.com/block-kit
Een voorbeeld van een geschikte payload (https://pastebin.com/r6mSThw3) kan de volgende zijn:



Controle of transactie wel mogelijk is (genoeg coins om te versturen?!)
 LIVE  Toon inkomende transacties live in de app van de ontvanger
GET /transfer/history
Hier toon je alle transacties (in- en uitgaand)
Van wie heb je iets ontvangen en waarom?
Aan wie heb je iets gestuurd en waarom?
De meest recente staat bovenaan
 LIVE  Als er nieuwe transacties binnenkomen moeten die live verschijnen in de lijst

LOGIC
We moeten ervoor zorgen dat transacties niet gemanipuleerd kunnen worden door slimme hackers in IMD, denk dus zeker na over het beveiligen van je geldstromen en accounts
Om ervoor te zorgen dat niet iedereen zijn of haar currency blijft opsparen maar juist ook wil uitgeven kunnen we volgend mechanisme toepassen
Na registratie krijgt iedere nieuwe gebruiker 100 Coins om te starten
BONUS FEATURE Het bedrag dat iemand uitgeeft op één maand tijd aan andere gebruikers, krijg je er op de eerste van elke maand terug bij op je balans. Hiervoor kan je bijvoorbeeld https://nodecron.com/ gebruiken. 
Bijvoorbeeld: iemand heeft 100 coins, maar geeft er deze maand 30 uit om anderen te bedanken. De balans is nu 70 coins. Op de eerste van elke maand wordt gekeken hoeveel er werd uitgegeven in de vorige maand (30 coins). Die 30 komen nu terug bij op de balans van deze gebruiker.
BONUS FEATURE wanneer bijvoorbeeld IMD-swag wordt gekocht met coins mag dat bedrag niet bovenop het budget komen. 
BONUS FEATURE  op 1 september van elk jaar wordt het budget terug aangezuiverd tot 100 coins (tenzij je er meer hebt, dan krijg je er gewoon 20 bovenop). 
BONUS FEATURE waarom geeft je geen kleine hoeveelheid coins aan iedereen op bepaalde specifieke data die voor IMD relevant kunnen zijn? Check bijvoorbeeld https://www.forevergeek.com/geek-holiday-calendar/ eens voor inspiratie. Zorg wel dat deze transacties zichtbaar zijn in de history met daarbij de reden waarop je ze gekregen hebt. Je kan deze uitdelen vanaf een superaccount genaamd WeAreIMD.

Tips: 
Begin met kleine stappen en bouw je complexiteit en volgorde op:
Bouw eerst je API uit (zonder authenticatie)
Test je API via postman, voor je een front-end bouwt
Bouw je frontend views uit (met css grid en flexbox)
Probeer al eens via de app een transfer te sturen naar de API
Wordt deze transfer bewaard in de databank?
Kan je via console.log de transfer zien binnenkomen in je controller?
Voeg stilaan SASS/BEM toe voor je CSS structuur 
Voeg als alles anoniem werkt je authenticatie toe
… commit commit commit
