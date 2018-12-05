<form>
    <!--Question 1-->
    1. What year was CSUMB founded?<br />
    <input type="text" name="question1" size="5" /><br />
    <div id="question1-feedback" class="answer"></div><br />

    <!--Question 2-->
    2. What is the name of CSUMB's mascot?<br />
    <input type="radio" name="question2" id="q2-1"  value="A"/><label for='q2-1'> Otto <br />
    <input type="radio" name="question2" id="q2-2"  value="B"/><label for='q2-2'> Albus <br />
    <input type="radio" name="question2" id="q2-3"  Value="C"/><label for='q2-3'> Monte Rey <br />
    <div id="question2-feedback" class="answer"></div><br />
    
    <!--Question 3-->
    3. What decommissioned Army base did CSUMB grow out of?<br />
    <input type="text" name="question3" size="25" /><br />
    <div id="question3-feedback" class="answer"></div><br />

    <!--Question 4-->
    4. Which president was at CSUMB's dedication ceremony in 1995<br />
    <input type="radio" name="question4" id="q4-1"  value="A"/><label for='q4-1'> George W. Bush <br />
    <input type="radio" name="question4" id="q4-2"  value="B"/><label for='q4-2'> Bill Clinton <br />
    <input type="radio" name="question4" id="q4-3"  Value="C"/><label for='q4-3'> Ronald Reagan <br />
    <div id="question4-feedback" class="answer"></div><br />

    <input id="submit" type="submit" value="Submit" />
    
    <!--Will display the "loading" or "spinning" animated gif-->
    <div id="waiting"></div>
</form>

<!--Will display the quiz score-->
<div id="scores"></div>