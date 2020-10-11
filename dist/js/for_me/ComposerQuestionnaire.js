var formChoix = document.getElementById('formChoix');
var typeQuestion = document.getElementById('type-question');

// recuperer le 2 divs

var div_quest_rep = document.createElement('div');
div_quest_rep.setAttribute('class', 'card card-danger');

var div_assertion = document.createElement('div');
div_quest_rep.setAttribute('class', 'card card-primary');

// ajouter les elements a la racine

div_quest_rep.innerHTML = `
    <div class="card-header">
        <h3 class="card-title">Question/reponse</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <input type="text" class="form-control" placeholder="Question">
            </div>
            <div class="col-6">
                <input type="text" class="form-control" placeholder="Reponse">
            </div>
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Appliquer</button>
    </div>
`;

div_assertion.innerHTML = `
    <div class="card-header">
        <h3 class="card-title">Assertion</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form">
        <div class="card-body">
            <div class="form-check">
                <input type="text" class="form-control my-colorpicker1" placeholder="Question">
            </div> <br/>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="radio1" checked>
                <input type="text" class="form-control my-colorpicker1" placeholder="1ere assertion">
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="radio1">                
                <input type="text" class="form-control my-colorpicker1" placeholder="2eme assertion">
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="radio1">                
                <input type="text" class="form-control my-colorpicker1" placeholder="3eme assertion">
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="radio1">                
                <input type="text" class="form-control my-colorpicker1" placeholder="4eme assertion">
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Appliquer</button>
        </div>
    </form>
    </div>
`;

function validerAssertion() {
    typeQuestion.innerHTML = "";
    typeQuestion.append(div_assertion);
}

function validerQuestRep() {
    typeQuestion.innerHTML = "";
    typeQuestion.append(div_quest_rep);
}

formChoix.addEventListener('submit', function (event) {
    event.preventDefault();
    alert('Ok')
    if(assert_rad.checked){
        alert('assert_rad');
    } else if(assert_rad.checked){
        alert('assert_rad');
    }
});