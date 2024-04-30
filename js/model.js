function boxtoggle(){
    
    var initialBox = document.querySelector('.initialbox');
    var expandedBox = document.querySelector('.expandedbox');


    if(initialBox.style.display === 'block'){

        initialBox.style.display = 'none';
        expandedBox.style.display = 'block';

    }else{

        initialBox.style.display = 'block';
        expandedBox.style.display = 'none';

    }

}