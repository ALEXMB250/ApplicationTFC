// recuperer les elements html

var typeQuestion = document.getElementById('type-question');
var assert_radio = document.getElementById('assert_radio');
var quest_rep_radio = document.getElementById('quest_rep_radio');
var div_quest_rep = document.createElement('div');

// ajouter l'attribut classe avec la valeur card...

div_quest_rep.setAttribute('class', 'card card-danger');

var div_assertion = document.createElement('div');
// ajouter l'attribut classe avec la valeur card...
div_quest_rep.setAttribute('class', 'card card-primary');

var questionInput = document.getElementById('question-input');

var questionItemList = document.getElementById('question-item');
var question_rep_input = document.getElementById('question-rep-input');
var reponse_requestRes_input = document.getElementById('reponse-questRes-input');

// tableau des questions
let questionnaire = [];

// Ajouter un ecouteur d'evenement sur le typeQuestion de type submit
typeQuestion.addEventListener('submit', function (event) {
    event.preventDefault();

    if (event.target.classList.contains('question-form')) {
        var question_input = $("#question-rep-input").val();
        var reponse_input = $("#reponse-input").val();

        // envoyer les donnees de champs du formulaire tout en verifiant qu'aucun 
        // champs ne soit vide
        if(question_input[0] !== '' &&  reponse_input !== ''){

            console.log("Question : " + question_input + "\n" +
            "Reponse : "+ reponse_input);
            ajoutQuestion(question_input, [question_input], reponse_input);   
        } 

// instance d'objet 

// const qc = {
    // id : Date.now();
//     question : "alex@gmail",
//     asssertion : ["djj", 'dlkjs', 'dskjdhs'],
//     reponse : "kjhfskjhdkf"
// };
        
        
    } else if (event.target.classList.contains('form-assertion')) {

        var question_input = $("#quest-input").val();
        var assertions = [
            $("#assertion1_input").val(),
            $("#assertion2_input").val(),
            $("#assertion3_input").val(),
            $("#assertion4_input").val()
        ];

        var reponse;
        
        
        // envoyer les donnees de champs du formulaire tout en verifiant qu'aucun 
        // champs ne soit vide

        if (question_input !== "" && assertions[0] !== "" && assertions[1] !== "" &&
            assertions[2] !== "" && assertions[3] !== "") 
        {

            if($(":radio[data-key='assertion1_input']:checked").val())
            {
                reponse = assertions[0];
            } 
            
            else if($(":radio[data-key='assertion2_input']:checked").val())
            {
                reponse = assertions[1];
            } 
            
            else if($(":radio[data-key='assertion3_input']:checked").val())
            {
                reponse = assertions[2];
            } 
            
            else if($(":radio[data-key='assertion4_input']:checked").val())
            {
                reponse = assertions[3];
            }

            console.log
            (
                'question : ' + question_input + '\n' +
                'Reponse : ' + reponse + '\n' +
                'Assertion 1 ' + assertions[0] + '\n' +
                'Assertion 2 ' + assertions[1] + '\n' +
                'Assertion 3 ' + assertions[2] + '\n' +
                'Assertion 4 ' + assertions[3] + '\n'
            );

            ajoutQuestion(question_input, assertions, reponse);

        }

    }
});

// Ajouter un ecouteur d'evenement clique sur le input-radio assertion
assert_radio.addEventListener('click', function (event) {

    div_assertion.innerHTML = `
    <div class="card-header">
        <h3 class="card-title">Assertion</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" class="form-assertion">
        <div class="card-body">
            <div class="form-check">
                <input type="text" class="form-control my-colorpicker1" id="quest-input" placeholder="Question">
            </div> <br/>
            <div class="form-check">
                <input class="form-check-input" type="radio" data-key="assertion1_input" name="radio1" checked>
                <input type="text" class="form-control my-colorpicker1" id="assertion1_input" placeholder="1ere assertion">
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" data-key="assertion2_input" name="radio1">                
                <input type="text" class="form-control my-colorpicker1" id="assertion2_input" placeholder="2eme assertion">
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" data-key="assertion3_input" name="radio1">                
                <input type="text" class="form-control my-colorpicker1" id="assertion3_input" placeholder="3eme assertion">
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" data-key="assertion4_input" name="radio1">                
                <input type="text" class="form-control my-colorpicker1" id="assertion4_input" placeholder="4eme assertion">
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Appliquer</button>
        </div>
    </form>    
    `;

    // Supprimer tous les elements
    typeQuestion.innerHTML = "";
    // Afficher l'element dans le div_assertion
    typeQuestion.append(div_assertion);
});

// Ajouter un ecouteur d'evenement clique sur le input-radio question/reponse
quest_rep_radio.addEventListener('click', function (event) {
    

    div_quest_rep.innerHTML = `
        <div class="card-header">
            <h3 class="card-title">Question/reponse</h3>
        </div>
        <form role="form" class="question-form">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <input type="text" class="form-control" id="question-rep-input" placeholder="Question">
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" id="reponse-input" placeholder="Reponse">
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Appliquer</button>
            </div>
        </form>    
    `;

    // Supprimer tous les elements
    typeQuestion.innerHTML = "";
    // Afficher l'element dans le div_quest_rep
    typeQuestion.append(div_quest_rep);
});


function ajoutQuestion(question_input, assertions, reponse_input)
{
    // creer un objet question
    const question = {
        id : Date.now(),
        question : question_input,
        assertion : assertions,
        reponse : reponse_input
    }

    questionnaire.push(question);
    afficherQuestion(questionnaire);
}

function afficherQuestion(questionnaire) 
{

    questionItemList.innerHTML = '';

    questionnaire.forEach(element => {
        var div = document.createElement('div');
        div.setAttribute("class", "card card-primary");
        div.setAttribute("data-key", element.question.id);

        if(element.assertion.length === 1)
        {            
            
            div.innerHTML = `
            <div class="card-header">
                <h3 class="card-title">Question</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool"><i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <p>${element.question}</p>                      
                        </div>
                        <div class="form-group">
                            <h5>${element.reponse}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            `;

            questionItemList.append(div);
        } 

        else if(element.assertion.length === 4)
        {
            div.innerHTML = `
            <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Question</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool"><i class="fas fa-times"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                      <p>${element.question}</p>                      
                  </div>
                  <div class="form-group">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="radio1" checked>
                      <label for="radio1">${element.assertion[0]}</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="radio1" disabled>
                      <label for="radio1">${element.assertion[1]}</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="radio1" disabled>
                      <label for="radio1">${element.assertion[2]}</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="radio1" disabled>
                      <label for="radio1">${element.assertion[3]}</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
            `;
            questionItemList.append(div);
        }

    });;


}
