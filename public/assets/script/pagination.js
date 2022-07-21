document.addEventListener('DOMContentLoaded', function() {

    const lines = document.querySelectorAll('.orderLine');
    const pagination = document.querySelector('.pagination');
    const lineCount = lines.length - 1;
    const productNumberPerPage = 5;
    const pageNumber = Math.ceil(lineCount / productNumberPerPage);

    function goToPage(i) {
        for (let j = 0; j < lines.length; j++) {
            lines[j].style.display = 'none';
        }
        for (let j = 0; j < productNumberPerPage; j++) {
            lines[(i - 1) * productNumberPerPage + j].style.display = 'table-row';
        }
    }


    for (i = 1; i <= pageNumber; i++) {
        let page = i;
        let button = document.createElement('button');
        button.classList.add('pageButton');
        button.innerHTML = i;
        document.querySelector('.pagination').appendChild(button);
        button.addEventListener('click', () => {
            goToPage(page);
        });
    }

    let j = 0;
    
    lines.forEach((line) =>  {
        j++;
        if (j > productNumberPerPage) {
            line.style.display = 'none';
        }
        
    })

    

})