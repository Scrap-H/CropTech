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