document.addEventListener('DOMContentLoaded', function() {
    M.AutoInit();
    initListJS();
    M.updateTextFields();
});

initListJS = () => {
    new List('list_container', {
        valueNames: ['Film'],
        page: 10,
        pagination: true
      });
}
