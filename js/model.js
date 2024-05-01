function boxtoggle(initialBoxId, expandedBoxId) {

    var initialBox = document.getElementById(initialBoxId);
    var expandedBox = document.getElementById(expandedBoxId);

    if (initialBox.style.display === 'block') {
        initialBox.style.display = 'none';
        expandedBox.style.display = 'block';
    } else {
        initialBox.style.display = 'block';
        expandedBox.style.display = 'none';
    }
    
}