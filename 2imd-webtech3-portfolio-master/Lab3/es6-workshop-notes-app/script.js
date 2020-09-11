class Note {
  constructor(title) {
    this.title = title;
    this.element = this.createElement(title);
  }

  createElement(title) {
    let newNote = document.createElement('div'); //<div>
    newNote.setAttribute("class","card");        //<div class="card">

    let newP = document.createElement("p");      // <p> Todo</p>
    newP.innerHTML = title;

    newNote.appendChild(newP);                   //<div class="card"><p> Todo</p>
    
    let newA = document.createElement("a"); 
    newA.setAttribute("class","card-remove"); 
    newA.innerHTML ="Remove";
    newNote.appendChild(newA); 

    newA.addEventListener('click', this.remove.bind(newNote));

    return newNote;
  }

  add() {
    // HINT🤩
    // this function should append the note to the screen somehow
    document.querySelector(".notes").appendChild(this.element);
  }

  saveToStorage() {   
    // Na een hele dag tegen een rubber duckie te praten, fout gevonden 😃🥳 (http://duckie.me/)
    
   let memories = JSON.parse(localStorage.getItem('memories'));
        //eerst parsen naar array en dan converten in string via stringify (https://stackoverflow.com/questions/23728626/localstorage-and-json-stringify-json-parse/23728844)
     if (memories==null){               // lege array nodig
         memories = []; 
         console.log('memories');       //--> leest array uit 
     }                            
      memories.push(this.title);       //notes in lege array pushen
        console.log('memories');       //--> leest memories uit
      
    localStorage.setItem('memories', JSON.stringify(memories));
      console.log(localStorage.getItem('memories'));    //--> leest array uit
  }

  remove() {
    // HINT🤩 the meaning of 'this' was set by bind() in the createElement function
    // in this function, 'this' will refer to the current note element
      /* localStorage.removeItem('memory'); */    

    //verwijderen kan door klikken op 'remove' --> dus eventlistener gebruiken 
    let list = JSON.parse(localStorage.getItem(`memories`));          //array die je nodig hebt
    let title = this.querySelector(`p`).innerHTML;                    //hetgeen dat verwijdert moet worden
    let ArrayIndex = list.indexOf(title);                             //plaats bepalen van je array item

    // je wilt een item uit een array verwijderen --> gebruiken van splice
    list.splice(ArrayIndex, 1);
    localStorage.setItem(`memories`, JSON.stringify(list));

    this.remove();
  }   
}
    
class App {
  constructor() {
    console.log("👊🏼 The Constructor!");

    // HINT🤩
    // clicking the button should work   --> OK
    // pressing the enter key should also work  --> OK
    this.btnAdd = document.querySelector("#btnAddNote");
    this.btnAdd.addEventListener("click", this.createNote.bind(this));
   
    this.loadNotesFromStorage();

    //keycode voor enter = 13, en keydown nodig voor toevoegen
    let inputText = document.querySelector("#txtAddNote");
    inputText.addEventListener('keydown', enter => {
      if(enter.keyCode === 13){
        enter.preventDefault();
        document.querySelector("#btnAddNote").click();
        return true;
      }
    });
  }

  loadNotesFromStorage() {
    // HINT🤩
    // load all notes from storage here and add them to the screen
    // something like note.add() in a loop would be nice
    let memory = JSON.parse(localStorage.getItem('memories'));
        //console.log("item" + memories);

        if (memory.length > 0){
            memory.forEach(title => {         //elke note wil je laden bij refreshen --> forEach loop gebruiken
            let note = new Note(title);
            note.add();
    });
  }
}

  createNote(e) {
    // this function should create a new note by using the Note() class
    // HINT🤩
      //alert("click");
      let text = document.querySelector("#txtAddNote").value;

      let note = new Note(text);
      //console.log(note.element);
        note.add();
        note.saveToStorage();
        this.reset();
  }

  reset() {
    // this function should reset the form -->txtAddnote moet terug leeg zijn zodat je opnieuw kan typen in leeg veld
    document.querySelector("#txtAddNote").value = ('');
  }
}

let app = new App();