document.addEventListener('DOMContentLoaded', function() {
    var elems1 = document.querySelectorAll('.modal');
    var instances1 = M.Modal.init(elems1);
    var elems = document.querySelectorAll('select');
    var instances2 = M.FormSelect.init(elems);
  });