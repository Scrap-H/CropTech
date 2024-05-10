function boxtoggle(initialBoxId, expandedBoxId, expandBackgroundId) {

    var initialBox = document.getElementById(initialBoxId);
    var expandedBox = document.getElementById(expandedBoxId);
    var expandBackground = document.getElementById(expandBackgroundId);


    // Toggle visibility
    if (initialBox.style.display === 'block') {
        initialBox.style.display = 'none';
        expandedBox.style.display = 'block';
        expandBackground.style.display = 'block';
    } else {
        initialBox.style.display = 'block';
        expandedBox.style.display = 'none';
        expandBackground.style.display = 'none';
    }

}



function AppearDissapear(element) {
    var b1 = document.getElementById(element);

    if (b1.style.display === 'none' || b1.style.display === '') {

        b1.style.display = 'block';
    } else {

        b1.style.display = 'none';
    }
}

function AppearDissapearOtherEffect(TriggerID, AffectedID) {
    
var trigger = document.getElementById(TriggerID);
var affected = document.getElementById(AffectedID);

if (affected.style.display === 'none' || affected.style.display === '') {

    trigger.style.display = 'none'; 
    affected.style.display = 'block'; 

} else {

    trigger.style.display = 'block';
    affected.style.display = 'none';

}
}
