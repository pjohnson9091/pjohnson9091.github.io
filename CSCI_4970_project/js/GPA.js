var $ = function(id) { return document.getElementById(id);};

function gpacalc()
{

//define valid grades and their values
var gr = new Array(11); 
var cr = new Array(11);
var ingr = new Array(11);
var incr = new Array(11);

// define valid grades and their values
var grcount = 10; 
gr[0] = "A+";
cr[0] = 5;
gr[1] = "A"; 
cr[1] = 4; 
gr[2] = "A-";
cr[2] = 3.66;
gr[3] = "B+";
cr[3] = 3.33;
gr[4] = "B";
cr[4] = 3;
gr[5] = "B-";
cr[5] = 2.66;
gr[6] = "C+";
cr[6] = 2.33;
gr[7] = "C";
cr[7] = 2;
gr[8] = "C-";
cr[8] = 1.66;
gr[9] = "D";
cr[9] = 1;
gr[10] = "F";
cr[10] = 0;
// retrieve user input
//ingr --input grade
//incr --input credit
ingr[0] = $("gr1").value.toUpperCase();
ingr[1] = $("gr2").value.toUpperCase();
ingr[2] = $("gr3").value.toUpperCase();
ingr[3] = $("gr4").value.toUpperCase();
ingr[4] = $("gr5").value.toUpperCase();
ingr[5] = $("gr6").value.toUpperCase();
ingr[6] = $("gr7").value.toUpperCase();
ingr[7] = $("gr8").value.toUpperCase();
incr[0] = $("cr1").value;
incr[1] = $("cr2").value;
incr[2] = $("cr3").value;
incr[3] = $("cr4").value;
incr[4] = $("cr5").value;
incr[5] = $("cr6").value;
incr[6] = $("cr7").value;
incr[7] = $("cr8").value;


// calculate gpa
var allgr =0;
var allcr = 0;
var gpaUnFixed = 0;
for (var x = 0; x < 5 + 3; x++)
        {
        if (ingr[x] == "") break;

            var validgrcheck = 0;
            for (var xx = 0; xx <= grcount; xx++)
                {
                if (ingr[x] == gr[xx])
                        {
                        allgr = allgr + (parseInt(incr[x],10) * cr[xx]);
                        allcr = allcr + parseInt(incr[x],10);
                        validgrcheck = 1;
                        break;
                        }
                }
        if (validgrcheck == 0)
            {
                alert("error- could not recognize the grade entered for class " + eval(x +  1) + ". please use standard college grades in the form of a A- B+ ...F.");
                return 0;
            }
        }

// this if-check prevents a divide by zero error
if (allcr == 0)
        {
        alert("error- you did not enter any credit values! gpa = n/a");
        return 0;
        }

gpaUnFixed = allgr / allcr;
gpaFixed = gpaUnFixed.toFixed(3);

var name = document.getElementById("name").value;
alert("Hello " +name+" you GPA is "+eval(gpaFixed));

return 0;
}
