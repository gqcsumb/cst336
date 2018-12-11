$(document).ready(function(){
    
    var score = 0;
    $("form").submit(function(event) {
        
        event.preventDefault();
        
        //Get answers
        var hero = $("input[name='question1']").val().trim();
        var realName = $("select[name='realName']").val().trim();

        
        console.log(hero);
        console.log(realName);

        
        //Checks if answers are correct
        if(hero == realName){
            correctAnswer($("#realName-feedback"));
        } else {
            incorrectAnswer($("#realName-feedback"));
        }
        $("realName-feedback").append("The answer is <strong>"X"</strong>" );

        //Displays quiz score
        $("#score").html( score );
        $("#waiting").html("<img src='img/loading.gif' alt='submitting data' />");
        $("input[type='submit']").css("display","none");

        //Submits and stores score, retrieves average score
        $.ajax({
            type : "post",
            url  : "submitScores.php",            
            dataType : "json",
            data : {"score" : score},            
            success : function(data){
                console.log(data);
                $("#times").html(data.times);
                $("#average").html(data.average);
                $("#feedback").css("display", "block");
                $("input[type='sumbit']").css("display","");
            },
            complete: function(data,status) { //optional, used for debugging purposes
                // alert(status);
            }

        });//AJAX
        
    }); //formSubmit
    
    //Styles a question as answered correctly
    function correctAnswer(questionFeedback){
        questionFeedback.html("Correct! ");
        questionFeedback.addClass("correct");
        questionFeedback.removeClass("incorrect");
        score++;
    }

    //Styles a question as answered incorrectly
    function incorrectAnswer(questionFeedback){
        questionFeedback.html("Incorrect! ");
        questionFeedback.addClass("incorrect");
        questionFeedback.removeClass("correct");
    }
    
}); //documentReady       